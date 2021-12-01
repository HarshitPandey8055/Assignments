<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_list extends MY_Controller {
   
   function __construct( )
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
	}

	public function index()   
	{
		$this->db->select("*");
      	$this->db->from('payments');
      	$this->db->join('booking', 'payments.bk_id =booking.bk_id');
      	$query = $this->db->get();
		if($query->num_rows() != 0)
		{
		    $data['pylist'] = $query->result_array();
		}
		else
		{
		    $data['pylist'] = '';
		}

		$this->template->render('paymentlist',$data);
	}
	
}
 