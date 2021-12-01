<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends MY_Controller {
   
   function __construct( )
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
	}

	public function index()   
	{
		$this->db->select("a.bk_id,a.bk_fname,a.bk_lname,a.bk_pkage_name,a.bk_email,a.bk_phone,a.bk_message,a.bk_address,a.bk_date,a.bk_cat_id,a.bk_ser_id,a.bk_cat_name,a.bk_ser_name,a.bk_amt,a.bk_status,a.bk_created_date,b.payment_status,a.bk_confirm_email");
      	$this->db->from('booking a');
      	$this->db->join('payments b', 'a.bk_id = b.bk_id','LEFT');
      	$this->db->order_by('a.bk_id','desc');
      	$query = $this->db->get();
		if($query->num_rows() != 0)
		{
		    $data['booking_list'] = $query->result_array();
		}
		else
		{
		    $data['booking_list'] = '';
		}

		$this->template->render('bookinglist',$data);
	}
	public function updatebookings($id)   
	{
		$bkid = $this->uri->segment(3);
   		$status = $this->uri->segment(4);
		$data = [
            'bk_status' => $status,
        ];
        $this->db->where('bk_id', $bkid);
        $this->db->update('booking', $data);
		$this->session->set_flashdata('successmessage', 'Booking status updated successfully.');
		redirect('bookings');
	}
	public function bookinginfo()   
	{
		$bkid = $this->input->post('bkid');
		$bookinginfo = $this->db->select('*')->from('booking')->where('bk_id',$bkid)->get()->result_array();
		
		echo json_encode($bookinginfo[0]);
	}
	public function sendemailconfirmation()   
	{
		$this->load->model('email_model');
		$custemail = urldecode($this->uri->segment(4));
		$bk_id = urldecode($this->uri->segment(6));
		$bkdetails = $this->db->select('*')->from('booking')->where('bk_id',$bk_id)->get()->result_array();
		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','booking')->get()->result_array();
		if(!empty($gettemplate) && !empty($bkdetails)) {
		    $emailcontent = $gettemplate[0]['et_body'];
		    $value = '<b>Booking Details :</b><br><br> Time : '.$bkdetails[0]['bk_date'].'<br><br>Service : '.$bkdetails[0]['bk_cat_name'];
			$body = str_replace('{{details}}', $value, $emailcontent);
			$email = $this->email_model->sendemail($custemail,$gettemplate[0]['et_subject'],$body);
			if($email=='true') {
				$this->session->set_flashdata('successmessage', 'Email sent successfully..');
				$data = array('bk_confirm_email'=>1);
				$this->db->where('bk_id', $bk_id);
        		$this->db->update('booking',$data);
			} else {
				$this->session->set_flashdata('warningmessage', $email);
			}
			redirect('bookings');
		}
	}
}
 