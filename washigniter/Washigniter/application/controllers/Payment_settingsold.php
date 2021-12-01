<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpassword extends CI_Controller {
    function __construct()
 	{
	    parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->database();
		$this->load->library(array('form_validation','template'));
	}
	public function index()   
	{
		$data['u_username'] = '';
		$data['show'] = false;
		$query = $this->db->get("login");
		if ($query->num_rows() >= 1) {
			$result = $query->row_array();
			$data['u_username'] = $result['u_username'];
			if($result['u_resetpass']==1) {
					$data['show'] = true;
			}	
		}
		$this->template->render('resetpassword',$data);
	}
	public function resetpasswordsave()   
	{
		$data = [
            'u_password' => md5($this->input->post('password')),
            'u_username' => $this->input->post('u_username'),
            'u_resetpass'=>0
        ];
        $this->db->where('u_id', $this->session->userdata['session_data']['u_id']);
        $resp = $this->db->update('login', $data);

        if($resp) {
        	$this->session->set_flashdata('successmessage', 'Password updated successfully!.');
        	redirect('dashboard');
        } else {
        	$this->session->set_flashdata('warningmessage', 'Error in resetting password.');
			redirect('resetpassword');
        }
	
	}
}
