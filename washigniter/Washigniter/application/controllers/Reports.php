<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends MY_Controller {
   function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
	}
	public function index()   
	{
		$this->template->render('reports');
	}
	public function generatereport()   
	{
		if($this->input->post('reportdate')!='') {
			$reportdate = explode(' - ', $this->input->post('reportdate'));
				$this->db->select('*');
			    $this->db->from('booking');
			    $this->db->where('bk_date>=', date("Y-m-d H:i:s", strtotime( $reportdate[0])));
			    $this->db->where('bk_date<=', date("Y-m-d H:i:s", strtotime( $reportdate[1])));
			    $query = $this->db->get();
		        $data['reportdata'] = $query->result_array();
		        if(!empty($data['reportdata'])) {
		        	$this->template->render('reports',$data);
		        } else {
		        	$this->session->set_flashdata('warningmessage', 'No data found for the date - '.$this->input->post('reportdate'));
					redirect('reports');
		        }
		        
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Report date is required');
			redirect('reports');
		}
	}	
}
 