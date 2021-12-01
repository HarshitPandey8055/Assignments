<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {
    function __construct( )
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
	}

	public function print($id)   
	{
   		$data['sitedata'] = sitedata();
		$data['booking_list'] = '';
		$this->db->select("a.*,b.*");
      	$this->db->from('booking a');
      	$this->db->join('payments b', 'a.bk_id = b.bk_id','LEFT');
      	$this->db->where('a.bk_id',$id);
      	$this->db->order_by('a.bk_id','desc');
      	$query = $this->db->get();
		if($query->num_rows() != 0) {
		    $data['booking_list'] = $query->result_array()[0];
		}
		$this->load->view('invoice',$data);
	}
}
