<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends MY_Controller {
   
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
		$this->db->select('*');
		$this->db->from('packages');
		$this->db->join('vehicletype', 'vehicletype.vt_id = packages.p_vt_id','left');
		$query = $this->db->get();
	    if($query !== FALSE && $query->num_rows() > 0){
	  	$pdata = $query->result_array();
	  	foreach($pdata as $key => $packages) {
	  		$newdata[$key] = $packages;
	  		if($packages["p_s_list"]) {
		  		$sub_category = $this->db->query('SELECT * FROM service_list where ser_id in ('.$packages["p_s_list"].')');
		  		if($sub_category->num_rows()>0) {
		  			$newdata[$key]['service_list'] = $sub_category->result_array();
		  		} else {
		  			$newdata[$key]['service_list'] = array();
		  		}
		  	} else {
		  		$newdata[$key]['service_list'] = array();
		  	}
	  	}
	  	$data['pk'] =  $newdata;
	  } else {
	  	$data['pk'] =  array();
	  }
		$this->template->render('packages',$data);
	}
	public function add()   
	{
		$data['vehicletype'] = $this->db->select('*')->from('vehicletype')->where('vt_status',1)->order_by('vt_id','desc')->get()->result_array();
		$data['serviceslist'] = $this->db->select('*')->from('service_list')->where('ser_status',1)->order_by('ser_id','desc')->get()->result_array();
		$this->template->render('packages_add',$data);
	}
	public function add_save()   
	{
		$testxss = 1;
		if($testxss) {
			$insertarray = array('p_name'=>$this->input->post('p_name'),'p_price'=>$this->input->post('p_price'),'p_time'=>$this->input->post('p_time'),'p_vt_id'=>$this->input->post('p_vt_id'),'p_s_list'=>implode (",", $this->input->post('p_s_list')));
			$success = $this->db->insert('packages',$insertarray);
			if($success) {
				$this->session->set_flashdata('successmessage', 'New package added successfully!.');
				redirect('packages');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				redirect('packages');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('packages');
		}
	}
	public function deletepackage_list($p_id)   
	{
		$del = $this->db->where('p_id', $p_id)->delete('packages');
		$this->session->set_flashdata('successmessage', 'Package deleted successfully.');
		redirect('packages');
	}
	public function updatepackage_list($id)   
	{
		$status = $this->uri->segment(5);
		$data = [
            'p_status' => $status,
        ];
        $this->db->where('p_id', $id);
        $this->db->update('packages', $data);
		$this->session->set_flashdata('successmessage', 'Packages updated successfully.');
		redirect('packages');
	}
	public function editpackage()
	{
		$p_id = $this->uri->segment(3);
		$data['vehicletype'] = $this->db->select('*')->from('vehicletype')->where('vt_status',1)->order_by('vt_id','desc')->get()->result_array();
		$data['serviceslist'] = $this->db->select('*')->from('service_list')->where('ser_status',1)->order_by('ser_id','desc')->get()->result_array();
		$data['packagedata'] = $this->db->select('*')->from('packages')->where('p_id',$p_id)->get()->result_array();

		$this->template->render('packages_add',$data);
	}
	public function updatepackage() {
		$insertarray = array('p_name'=>$this->input->post('p_name'),'p_price'=>$this->input->post('p_price'),'p_time'=>$this->input->post('p_time'),'p_vt_id'=>$this->input->post('p_vt_id'),'p_s_list'=>implode (",", $this->input->post('p_s_list')));
		$this->db->where('p_id',$this->input->post('p_id'));
		$success = $this->db->update('packages',$insertarray);
		if($success) {
			$this->session->set_flashdata('successmessage', 'New package updated successfully!.');
			redirect('packages');
		} else {
			$this->session->set_flashdata('warningmessage', 'Something went wrong.');
			redirect('packages');
		}
	}
}
