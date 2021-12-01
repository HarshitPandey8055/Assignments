<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicelist extends MY_Controller {
   
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
		//$data['service_list'] = $this->db->select('*')->from('service_list')->order_by('ser_id','desc')->get()->result_array();
		$this->db->select('*');
		$this->db->from('service_list');
		//$this->db->join('vehicletype', 'vehicletype.vt_id = service_list.cat_id','left');
		$query = $this->db->get();
		$data['service_list'] = $query->result_array();
		$this->template->render('servicelist',$data);
	}
	public function add()   
	{
		//$data['category'] = $this->db->select('*')->from('category')->order_by('cat_id','desc')->get()->result_array();
		$this->template->render('servicelist_add');
	}
	public function add_save()   
	{
		$testxss = xssclean($this->input->post());
		if($testxss) {
			$insertarray = array('ser_name'=>$this->input->post('ser_name'),'ser_desc'=>$this->input->post('ser_desc'),'ser_price'=>$this->input->post('ser_price'),'ser_time'=>$this->input->post('ser_time'));
			$success = $this->db->insert('service_list',$insertarray);
			if($success) {
				$this->session->set_flashdata('successmessage', 'New service added successfully!.');
				redirect('servicelist');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				redirect('servicelist');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('servicelist');
		}
	}
	public function deleteservice_list($id)   
	{
		$del = $this->db->where('ser_id', $id)->delete('service_list');
		$this->session->set_flashdata('successmessage', 'service list deleted successfully.');
		redirect('servicelist');
	}
	public function updateservice_list($id)   
	{
		$status = $this->uri->segment(5);
		$data = [
            'ser_status' => $status,
        ];
        $this->db->where('ser_id', $id);
        $this->db->update('service_list', $data);
		$this->session->set_flashdata('successmessage', 'service list updated successfully.');
		redirect('servicelist');
	}
	public function editservice()
	{
		$ser_id = $this->uri->segment(3);
		$data['servicedata'] = $this->db->select('*')->from('service_list')->where('ser_id',$ser_id )->get()->result_array();
		$this->template->render('servicelist_add',$data);
	}
	public function updateservice() {
		if(isset($_POST['ser_visibetofrontend'])) {
			$_POST['ser_visibetofrontend'] = 1;
		} else {
			$_POST['ser_visibetofrontend'] = 0;
		}
		$this->db->where('ser_id',$this->input->post('ser_id'));
		$this->db->update('service_list',$this->input->post());
		$this->session->set_flashdata('successmessage', 'service list updated successfully.');
		redirect('servicelist');
	}
}
