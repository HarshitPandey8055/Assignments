<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
	}

	public function index()
	{
		redirect('/');
	}

	public function check()
	{
		$pyset = $this->db->select('*')->where('ps_type','stripe')->where('ps_status','1')->from('payment_setting')->get()->result_array();

		//check whether stripe token is not empty
		if(!empty($_POST['stripeToken']) && !empty($pyset))
		{
			//get token, card and user info from the form
			$token  = $_POST['stripeToken'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$card_num = $_POST['card_num'];
			$card_cvc = $_POST['cvc'];
			$card_exp_month = $_POST['exp_month'];
			$card_exp_year = $_POST['exp_year'];
			
			//include Stripe PHP library
			require_once APPPATH."third_party/stripe/init.php";
			
			//set api key
			$stripe = array(
			  "secret_key"      => (isset($pyset[0]['ps_secret_key']) && $pyset[0]['ps_secret_key']!='')?$pyset[0]['ps_secret_key']:'',
			  "publishable_key" => (isset($pyset[0]['ps_publishable_key']) && $pyset[0]['ps_publishable_key']!='')?$pyset[0]['ps_publishable_key']:''
			);
			
			\Stripe\Stripe::setApiKey($stripe['secret_key']);
			
			//add customer to stripe
			$customer = \Stripe\Customer::create(array(
				'email' => $email,
				'source'  => $token
			));
			
			//item information
			$currency = (isset($pyset[0]['ps_currency']) && $pyset[0]['ps_currency']!='')?strtolower($pyset[0]['ps_currency']):'';
			$amt = $_POST['amt']*100;
			//charge a credit or a debit card
			$charge = \Stripe\Charge::create(array(
				'customer' => $customer->id,
				'amount'   => $amt,
				'currency' => $currency,
				'description' => $_POST['servicename'],
				'metadata' => array(
				'item_id' => $_POST['bookid'],
				"address" => $_POST['address']
				)
			));
			
			//retrieve charge details
			$chargeJson = $charge->jsonSerialize();
			//check whether the charge is successful
			if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
			{
				//order details 
				$amount = $chargeJson['amount'];
				$balance_transaction = $chargeJson['balance_transaction'];
				$currency = $chargeJson['currency'];
				$status = $chargeJson['status'];
				$date = date("Y-m-d H:i:s");
			
				
				//insert tansaction data into the database
				$dataDB = array(
					'bk_id'=>$_POST['bookid'],
					'paid_amount' => $amount/100, 
					'paid_amount_currency' => $currency, 
					'txn_id' => $balance_transaction, 
					'payment_status' => $status,
					'created' => $date,
					'modified' => $date
				);
				if ($this->db->insert('payments', $dataDB)) {
					if($this->db->insert_id() && $status == 'succeeded'){
						$this->session->set_flashdata('successmessage', 'Payment made successfully.Your Transaction NO : ' .$balance_transaction.'');
						 redirect('/');
					}else{
						$this->session->set_flashdata('warningsmessage', 'Transaction has been failed');
						 $this->load->view('payment_form');
					}
				}
				else
				{
					$this->session->set_flashdata('warningsmessage', 'Something went wrong');
					redirect('/');
				}

			}
			else
			{
				$statusMsg = "";
				$this->session->set_flashdata('warningsmessage', 'Invalid Token');
				redirect('/');
			}
		} else {
			$this->session->set_flashdata('warningsmessage', 'Something went wrong');
			redirect('/');
		}
	}
	public function paypalcheck()
	{

		if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) && !empty($_GET['st'])){ 
		     $date = date("Y-m-d H:i:s");
		     $dataDB = array(
					'bk_id'=>$_GET['item_number'],
					'paid_amount' => $_GET['amt'], 
					'paid_amount_currency' => $_GET['cc'], 
					'txn_id' => $_GET['tx'], 
					'payment_status' => $_GET['st'],
					'created' => $date,
					'modified' => $date
				);
				if ($this->db->insert('payments', $dataDB)) {
					if($this->db->insert_id()){
						$this->session->set_flashdata('successmessage', 'Payment made successfully.Your Transaction NO : ' .$_GET['tx'].'');
						 redirect('/');
					}
				}
		} else {
			$this->session->set_flashdata('warningsmessage', 'Transaction has been failed');
			redirect('/');
		}
	}
	public function paypalcancelled()
	{
		$this->session->set_flashdata('warningsmessage', 'Transaction cancelled');
		redirect('/');
	}

	
}
