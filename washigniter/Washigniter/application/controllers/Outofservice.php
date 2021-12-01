<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outofservice extends MY_Controller {
   
   function __construct( )
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
	}

	public function index()   
	{
		$data['outofservice_list'] = $this->db->select('*')->from('outofservice')->order_by('oos_id','desc')->get()->result_array();
		$this->template->render('outofservice',$data);
	}
	public function add()   
	{
		$this->template->render('outofservice_add');
	}
	public function add_save()   
	{
		$postarray = array('oos_srtdate'=>$this->input->post('oos_srtdate'));
		$this->db->insert('outofservice',$postarray); 
		$this->session->set_flashdata('successmessage', 'new out of service added successfully..');
		redirect('outofservice');
	}
	public function deleteoutofservice($id)   
	{
		$del = $this->db->where('oos_id', $id)->delete('outofservice');
		$this->session->set_flashdata('successmessage', 'out of service deleted successfully.');
		redirect('outofservice');
	}
	public function updateoutofservice($id)   
	{
		$status = $this->uri->segment(5);
		$data = [
            'oos_status' => $status,
        ];
        $this->db->where('oos_id', $id);
        $this->db->update('outofservice', $data);
		$this->session->set_flashdata('successmessage', 'out of service updated successfully.');
		redirect('outofservice');
	}
	
}
 