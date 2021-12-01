<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {
   
   function __construct( )
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
	}

	public function index()   
	{
		$data['booking_list'] = $this->db->select('*')->from('booking')->order_by('bk_id','desc')->get()->result_array();
		$this->template->render('bookinglist',$data);
	}
	public function workingtime()   
	{
		if($this->input->post()) {
			$this->db->empty_table('working_time');
	        $insertarray = array('time_from'=>$this->input->post('wrkingfromtime'),'time_to'=>$this->input->post('wrkingtotime'));
			$success = $this->db->insert('working_time',$insertarray);
			if($success) {
				$this->session->set_flashdata('successmessage', 'Setting saved successfully!.');
				redirect('settings/workingtime');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				redirect('settings/workingtime');
			}
		} else {
			$data['workingtime'] = $this->db->select('*')->from('working_time')->get()->result_array();
			$this->template->render('workingtime',$data);
		} 
	}
	public function websitesetting()   
	{
		$data['website_setting'] = $this->db->select('*')->from('website_setting')->get()->result_array();
		$this->template->render('websitesetting',$data);
	}
	public function websitesetting_save()   
	{
		$insertarray = array();
		$testxss = xssclean($this->input->post());
		if($testxss){
			 $success=true;
			if(!empty($_FILES['file']['name'])) { 
			    $data = array(); 
				    $image = time().'-'.$_FILES['file']['name']; 
					$config = array(
							'upload_path' => 'assets/uploads', 
							'allowed_types' =>'jpg|jpeg|png',
							'overwrite' => TRUE,
							'max_size' => "1024",   
							'max_width' => "250",
							'max_height' => "50",
							'file_name' => $image
						);
				    	$this->load->library('upload',$config); 
				   		if($this->upload->do_upload('file')){ 
						     $uploadData = $this->upload->data(); 
						     $insertarray['logo'] = $uploadData['file_name'];
					    } else { 
					    	 $success=false;
					    	 $msg = $this->upload->display_errors();
					    } 
			}
			if($success) {
				$insertarray['webiste_name'] = $this->input->post('website_name');
				$insertarray['frontend_show'] = $this->input->post('frontend_show');
			     $ws = $this->db->select('*')->from('website_setting')->get()->num_rows();
			     if($ws=='' || $ws==0) {
			     	$this->db->insert('website_setting',$insertarray); 
			     } else {
			     	$this->db->update('website_setting', $insertarray);
			     }
			     $success=true;
			     $msg = 'successfully uploaded '.$filename; 
				$this->session->set_flashdata('successmessage', 'Website setting saved successfully!.');
				redirect('settings/websitesetting');
			} else {
				$this->session->set_flashdata('warningmessage', $msg);
				redirect('settings/websitesetting');
			}
			
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('settings/websitesetting');
		}
	}
	public function logodelete()   
	{
		$updatearray = array('logo'=>'');
		$this->db->update('website_setting', $updatearray);
		echo true;
	}
	
	public function payment_settings()   
	{
		$pyset = $this->db->select('*')->where('ps_type','stripe')->from('payment_setting')->get()->result_array();
		if(count($pyset)>=1) {
			$data['payment_settings'] = $pyset[0];
		} else {
			$data['payment_settings'] = '';
		}
		$paypal  = $this->db->select('*')->where('ps_type','paypal')->from('payment_setting')->get()->result_array();
		if(count($paypal)>=1) {
			$data['paymentpaypal_settings'] = $paypal[0];
		} else {
			$data['paymentpaypal_settings'] = '';
		}
		$cash  = $this->db->select('*')->where('ps_type','cash')->from('payment_setting')->get()->result_array();
		if(count($cash)>=1) {
			$data['cash_settings'] = $cash[0];
		} else {
			$data['cash_settings'] = '';
		}
		$bank  = $this->db->select('*')->where('ps_type','bank transfer')->from('payment_setting')->get()->result_array();
		if(count($bank)>=1) {
			$data['bank_settings'] = $bank[0];
		} else {
			$data['bank_settings'] = '';
		}
		$this->template->render('payment_settings',$data);
	}
	
	public function payment_settings_save()   
	{
		if($this->input->post('ps_type')=='stripe') {
			$insertarray = array('ps_publishable_key'=>$this->input->post('ps_publishable_key'),'ps_secret_key'=>$this->input->post('ps_secret_key'),'ps_currency'=>$this->input->post('ps_currency'),'ps_type'=>$this->input->post('ps_type'),'ps_status'=>$this->input->post('ps_status'));
			$ws = $this->db->select('*')->from('payment_setting')->where('ps_type',$this->input->post('ps_type'))->get()->num_rows();
			
		     if($ws=='' || $ws==0) {
		     	$resp = $this->db->insert('payment_setting',$insertarray); 
		     } else {
		     	$this->db->where('ps_type','stripe');
		     	$resp = $this->db->update('payment_setting', $insertarray);
		     }
		     if($resp) {
				$this->session->set_flashdata('successmessage', 'Payment setting saved successfully!.');
				redirect('settings/payment_settings');
			} else {
				$this->session->set_flashdata('warningmessage', 'Error in saving payment settings!.');
				redirect('settings/payment_settings');
			}
		}
	}
	public function payment_settings_save_paypal()   
	{
		if($this->input->post('ps_type')=='paypal') {
			$insertarray = array('ps_publishable_key'=>$this->input->post('ps_mode_paypal'),'ps_secret_key'=>$this->input->post('ps_secret_key_paypal'),'ps_currency'=>$this->input->post('ps_currency_paypal'),'ps_type'=>'paypal','ps_status'=>$this->input->post('ps_status_paypal'));
			$ws = $this->db->select('*')->from('payment_setting')->where('ps_type','paypal')->get()->num_rows();
			
		     if($ws=='' || $ws==0) {
		     	$resp = $this->db->insert('payment_setting',$insertarray); 
		     } else {
		     	$this->db->where('ps_type','paypal');
		     	$resp = $this->db->update('payment_setting', $insertarray);
		     }
		     if($resp) {
				$this->session->set_flashdata('successmessage', 'Payment setting saved successfully!.');
				redirect('settings/payment_settings');
			} else {
				$this->session->set_flashdata('warningmessage', 'Error in saving payment settings!.');
				redirect('settings/payment_settings');
			}
		}
	}
	public function payment_settings_save_cash()   
	{
		if($this->input->post('ps_type')=='cash') {
			$insertarray = array('ps_status'=>$this->input->post('ps_status_cash'));
			$ws = $this->db->select('*')->from('payment_setting')->where('ps_type','cash')->get()->num_rows();
		     if($ws=='' || $ws==0) {
		     	$resp = $this->db->insert('payment_setting',$insertarray); 
		     } else {
		     	$this->db->where('ps_type','cash');
		     	$resp = $this->db->update('payment_setting', $insertarray);
		     }
		     if($resp) {
				$this->session->set_flashdata('successmessage', 'Payment setting saved successfully!.');
				redirect('settings/payment_settings');
			} else {
				$this->session->set_flashdata('warningmessage', 'Error in saving payment settings!.');
				redirect('settings/payment_settings');
			}
		}
	}
	public function payment_settings_save_banktransfer()   
	{

		if($this->input->post('ps_type')=='bank transfer') {
			$insertarray = array('ps_status'=>$this->input->post('ps_status_banktransfer'),'ps_publishable_key'=>$this->input->post('ps_publishable_key'));
			$ws = $this->db->select('*')->from('payment_setting')->where('ps_type','bank transfer')->get()->num_rows();
		     if($ws=='' || $ws==0) {
		     	$resp = $this->db->insert('payment_setting',$insertarray); 
		     } else {
		     	$this->db->where('ps_type','bank transfer');
		     	$resp = $this->db->update('payment_setting', $insertarray);
		     }
		     if($resp) {
				$this->session->set_flashdata('successmessage', 'Payment setting saved successfully!.');
				redirect('settings/payment_settings');
			} else {
				$this->session->set_flashdata('warningmessage', 'Error in saving payment settings!.');
				redirect('settings/payment_settings');
			}
		}
	}
	public function smtpconfig()   
	{
		$data['smtpconfig'] = $this->db->select('*')->from('settings_smtp')->get()->result_array();
		$this->template->render('smtpconfig',$data);
	}
	public function smtpconfigsave()   
	{
		$settings_smtp = $this->db->select('*')->from('settings_smtp')->get()->num_rows();
        if($settings_smtp =='' || $settings_smtp ==0) {
     		$response = $this->db->insert('settings_smtp',$this->input->post()); 
        } else {
     	  	$response = $this->db->update('settings_smtp',$this->input->post());
        }
        if($response) {
				$this->session->set_flashdata('successmessage', 'SMTP config saved successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		}
		redirect('settings/smtpconfig');
	}
	public function smtpconfigtestemail()   
	{
		$this->load->model('email_model');
		$email = $this->input->post('testemailto');
		$response = $this->email_model->sendemail($email,'SMTP Config Test','Test Email');
		if($response=='true') {
			$this->session->set_flashdata('successmessage', 'Email sent successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', $response);
		}
		redirect('settings/smtpconfig');
	}
	public function email_template()   
	{
		$data['emailtemplate'] = $this->db->select('*')->from('email_template')->get()->result_array();
		$this->template->render('email_template',$data);
	}
	public function edit_email_template()   
	{
		$et_id = $this->uri->segment(3);
		$data['emailtemplate'] = $this->db->select('*')->from('email_template')->where('et_id',$et_id)->get()->result_array();
		$this->template->render('email_template_edit',$data);
	}
	public function update_template() { 
		$this->db->where('et_id',$this->input->post('et_id'));
		$response = $this->db->update('email_template',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Template updated successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		}
		redirect('settings/email_template');
	}
}
 