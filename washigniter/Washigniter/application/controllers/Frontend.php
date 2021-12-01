<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontend extends CI_Controller {
   function __construct( )
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
	}
 
	public function index()   
	{
		$data['blockeddates'] = array();
		$startingTime =array();
		$data['workingtime'] = '';
		$data['workingtime'] = $this->db->select('*')->from('working_time')->get()->result_array();	

		$data['service_list'] = $this->db->select('*')->from('service_list')->where('ser_status!=','0')->order_by('ser_id','desc')->get()->result_array();
		$data['packages_list'] = $this->db->select('*')->from('packages')->where('p_status!=','0')->order_by('p_id','desc')->get()->result_array();
		$data['vehicletype_list'] = $this->db->select('*')->from('vehicletype')->where('vt_status!=','0')->order_by('vt_id','desc')->get()->result_array();
		$notavail = $this->db->select('bk_date')->from('booking')->where('bk_status!=','3')->get()->result_array();
		$outofservice_list = $this->db->select('*')->from('outofservice')->where('oos_status!=','0')->order_by('oos_id','desc')->get()->result_array();
		if(!empty($outofservice_list)) {
			foreach ($outofservice_list as $key => $outofservice) {
			$date = explode("- ",$outofservice['oos_srtdate']);
				$startingTime[] = $this->outofservice($data['workingtime'][0]['diff'], 0, $date[0], $date[1], '', ''); 
			}
		}
		if(count($startingTime)>=1) {
			$data['blockeddates'] = array_merge($notavail,$startingTime[0]);
		} else {
			$data['blockeddates'] = $notavail;
		}
		$data['paymentgt'] = $this->db->select('*')->from('payment_setting')->where('ps_status','1')->get()->result_array();
		
		$_SESSION['form_submit']=''; 	
		$this->load->view('frontendbooking',$data);
	}
	function outofservice($duration, $cleanup, $start, $end, $break_start, $break_end) {
	    $start         = new DateTime($start);
	    $end           = new DateTime($end);
	    $break_start           = new DateTime($break_start);
	    $break_end           = new DateTime($break_end);
	    $interval      = new DateInterval("PT" . $duration . "M");
	    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
	    $periods = array();

	    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
	        $endPeriod = clone $intStart;
	        $endPeriod->add($interval);

	        if(strtotime($break_start->format('H:i A')) < strtotime($endPeriod->format('H:i A')) && strtotime($endPeriod->format('H:i A')) < strtotime($break_end->format('H:i A'))){
	            $endPeriod = $break_start;
	            $periods[]['bk_date'] = $intStart->format('Y-m-d H:i');
	            $intStart = $break_end;
	            $endPeriod = $break_end;
	            $intStart->sub($interval);
	        }else{
	            $periods[]['bk_date'] = $intStart->format('Y-m-d H:i');
	        }
	    }
    	return $periods;
	}
	public function servicelist()   
	{
		$catid = $this->input->post('catid');
		$servicelist = $this->db->select('*')->from('service_list')->where('cat_id',$catid)->or_where('cat_id',0)->get()->result_array();
		if(count($servicelist)>=1) {
			echo json_encode($servicelist); 
		} else {
			echo 0;
		}
	}
	public function add_booking()   
	{
		if($this->input->post() && empty($_SESSION['form_submit']))
		{ 
			if(isset($_POST['services_list'])) {
				$serviceids = implode(',', $this->input->post('services_list'));
				$bk_ser_name = $this->getservicename($this->input->post('services_list'));
			} else {
				$serviceids = 0;
				$bk_ser_name = '';
			}
			
			
			$insertarray = array('bk_fname'=>$this->input->post('first_name'),'bk_lname'=>$this->input->post('last_name'),'bk_email'=>$this->input->post('email_id'),'bk_phone'=>$this->input->post('phone'),'bk_message'=>$this->input->post('message'),'bk_address'=>$this->input->post('address'),'bk_date'=>date('Y-m-d H:i', strtotime($this->input->post('dates'))),'bk_cat_id'=>$this->input->post('servicecategoryid'),'bk_ser_id'=>$serviceids,'bk_cat_name'=>$this->input->post('servicecategoryname'),'bk_ser_name'=>$bk_ser_name,'bk_amt'=>$this->input->post('bk_amt'),'bk_pkage_name'=>$this->input->post('pckageid'));
			$booked = $this->db->insert('booking',$insertarray);
			$bk_id = $this->db->insert_id();
		}
		if($booked) {
			$_SESSION['form_submit']='true';
			if($this->input->post('pgmethod')=='bank transfer' || $this->input->post('pgmethod')=='cash' || $this->input->post('pgmethod')=='') {
				$dataDB = array(
					'bk_id'=>$bk_id,
					'paid_amount' => $this->input->post('pgmethod'), 
					'paid_amount_currency' => '', 
					'txn_id' => $this->input->post('pgmethod'), 
					'payment_status' => 'Completed',
					'created' => date('Y-m-d H:i'),
					'modified' => date('Y-m-d H:i')
				);
				$this->db->insert('payments', $dataDB);
				$this->session->set_flashdata('successmessage', 'Appointment booked successfully.');
				redirect('/');
			 } else {
				$this->session->set_flashdata('successmessage', 'Appointment booked successfully. Please proceed with payment and don\'t refresh this page..');
			if($this->input->post('pgmethod')=='stripe') {
				$pyset = $this->db->select('*')->where('ps_type','stripe')->where('ps_status','1')->from('payment_setting')->get()->result_array();
				if(count($pyset)>=1) {
					$pb_key = $pyset[0]['ps_publishable_key'];
				} else {
					$pb_key = '';
				}
				$data = array('name' =>$this->input->post('first_name').' '.$this->input->post('last_name'),'email'=>$this->input->post('email_id'),'cat_id'=>$this->input->post('servicecategoryid'),'servicename'=>$bk_ser_name,'bookid'=>$bk_id,'amt'=>round($this->input->post('bk_amt')),'address'=>$this->input->post('address'),'pb_key'=>$pb_key);
				$this->load->view('payment_form',$data);
			} else if($this->input->post('pgmethod')=='paypal') {
				$paypalset = $this->db->select('*')->where('ps_type','paypal')->where('ps_status','1')->from('payment_setting')->get()->result_array();
				if(count($paypalset)>=1) {
					$paypalid = $paypalset[0]['ps_secret_key'];
					$paypalurl = $paypalset[0]['ps_publishable_key'];
					$ps_currency = $paypalset[0]['ps_currency'];
				} else {
					$paypalurl = '';
					$paypalid='';
					$ps_currency = '';
				}
				$data = array('name' =>$this->input->post('first_name').' '.$this->input->post('last_name'),'email'=>$this->input->post('email_id'),'cat_id'=>$this->input->post('servicecategoryid'),'servicename'=>$bk_ser_name,'bookid'=>$bk_id,'amt'=>round($this->input->post('bk_amt')),'address'=>$this->input->post('address'),'paypalid'=>$paypalid,'paypalurl'=>$paypalurl,'ps_currency'=>$ps_currency);
				$this->load->view('payment_form_paypal',$data);
			} else {
				$_SESSION['form_submit']=''; 
				$this->session->set_flashdata('successmessage', 'Appointment booked successfully.');
				redirect('/');
			}
			}
		} else {
			$_SESSION['form_submit']=''; 
			$this->session->set_flashdata('warningmessage', 'Error while booking appointment. Please try again..');
			redirect('/');
		}
	}
	public function getservicename($id)   
	{
		$servicename = array();
		$servicelist = $this->db->select('*')->from('service_list')->where_in('ser_id',$id)->get()->result_array();
		if(!empty($servicelist)) {
			foreach ($servicelist as $key => $value) {
					$servicename[] = $value['ser_name'].'-'.$value['ser_desc'];
			}
		}
		if(!empty($servicename)) {
			return implode(',', $servicename);
		} else {
			return '';
		}
	}
	public function bankdetails()   
	{
		$bankdetails = array();
		$bankdetails = $this->db->select('*')->from('payment_setting')->where_in('ps_type','bank transfer')->get()->result_array();
		if(!empty($bankdetails)) {
			echo $bankdetails[0]['ps_publishable_key'];
		} else {
			echo 0;
		}
	}
	public function package()   
	{
		$p_vt_id = $this->input->post('p_vt_id');
		$package = $this->db->select('*')->from('packages')->where(array('p_vt_id'=>$p_vt_id,'p_status'=>1,))->get()->result_array();
		if(count($package)>=1) {
			foreach ($package as $key => $data) {
				$sllitext = array();
				$packagearray[$key] = $data;
				$sid = explode (",", $data['p_s_list']);
				$res = "'" . implode ( "','", $sid) . "'";
				$where =  "ser_id in (".$res.")";
				$service_list =  $this->db->select('*')->from('service_list')->where($where)->get()->result_array();
				$packagearray[$key]['service_list'] = $service_list;
				foreach ($service_list as  $sl) {
					$sllitext[] = '<li>'.trim($sl['ser_name']).'</li>';
				}
				$packagearray[$key]['service_list_text'] = implode("",$sllitext);
				//echo $this->db->last_query();
			} 
		

			echo json_encode($packagearray); 
		} else {
			echo 0;
		}
	}
	
}
