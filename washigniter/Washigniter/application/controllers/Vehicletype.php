<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicletype extends MY_Controller {
   
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
		$data['vehicletype'] = $this->db->select('*')->from('vehicletype')->order_by('vt_id','desc')->get()->result_array();
		$this->template->render('vehicletype',$data);
	}
	public function add()   
	{
		$this->template->render('vehicletype_add');
	}
	public function add_save()   
	{
		$testxss = xssclean($this->input->post());
		if($testxss){
			if($this->input->post('vt_name')!='' && !empty($_FILES['file']['name'])) { 
			    $data = array(); 
				    $image = time().'-'.$_FILES['file']['name']; 
					$config = array(
							'upload_path' => 'assets/uploads', 
							'allowed_types' =>'jpg|jpeg|png',
							'overwrite' => TRUE,
							'max_size' => "1024",   
							'max_height' => "1000",
							'max_width' => "1000",
							'file_name' => $image
						);
				    	$this->load->library('upload',$config); 
				   		if($this->upload->do_upload('file')){ 
						     $uploadData = $this->upload->data(); 
						     $filename = $uploadData['file_name'];
						     $postarray = array('vt_name'=>$this->input->post('vt_name'),'vt_image'=>$filename);
						     $this->db->insert('vehicletype',$postarray); 
						     $success=true;
						     $msg = 'successfully uploaded '.$filename; 
					    } else { 
					    	 $success=false;
					     	 $msg = $this->upload->display_errors();
					    } 
				
				if($success) {
					$this->session->set_flashdata('successmessage', 'New vehicletype created successfully!.');
					redirect('vehicletype');
				} else {
					$this->session->set_flashdata('warningmessage', $msg);
					redirect('vehicletype');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Name and image is required');
			    redirect('vehicletype/add'); 
			} 
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('vehicletype');
		}
	}
	public function deletevehicletype($vt_id)   
	{
		$del = $this->db->where('vt_id', $vt_id)->delete('vehicletype');
		$this->session->set_flashdata('successmessage', 'vehicletype deleted successfully.');
		redirect('vehicletype');
	}
	public function updatevehicletype($vt_id)   
	{
		$status = $this->uri->segment(5);
		$data = [
            'vt_status' => $status,
        ];
        $this->db->where('vt_id', $vt_id);
        $this->db->update('vehicletype', $data);
		$this->session->set_flashdata('successmessage', 'vehicletype updated successfully.');
		redirect('vehicletype');
	}
}
