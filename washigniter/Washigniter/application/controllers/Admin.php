<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    //To load initial libraries, functions
	function __construct( )
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
	}

	//To load login page
	public function index()    //Login Controller
	{
	  if (isset($this->session->userdata['session_data'])) 
	   {
		 $url=base_url()."dashboard";
		 header("location: $url");
	   } 
	   else 
	   {
	   	$data['show'] = false;
        $query = $this->db->get("login");
			if ($query->num_rows() >= 1) {
				$result = $query->row_array();
				if($result['u_resetpass']==1) {
					$data['show'] = true;
				}
		}

		$this->load->view('login',$data);
	   }
	}

	//To login functionality check
	public function login_action() 
	{   
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE) 
		{
		  $this->session->set_flashdata('warningmessage', "Email and Password is required and can't be empty.");
		  redirect('admin');
		}
		else 
		{ 
		$this->db->where('u_username', $this->input->post('username'));
        $this->db->where('u_password', md5($this->input->post('password')));
        $query = $this->db->get("login");
			if ($query->num_rows() >= 1) {
				$result = $query->row_array();
			} else {
				$result = FALSE;
			}

		    if($result != FALSE)
			{
					$session_data = array('u_id' => $result['u_id'],
										  'name' => $result['u_name'],
										  'email' => $result['u_username'],
										  'role' =>$result['u_role'],
										  'rolename' =>$result['u_rolename']);
					$this->session->set_userdata('session_data', $session_data);
					redirect('dashboard');
			}
			else 
			{
			$this->session->set_flashdata('warningmessage', 'Invalid credentials!');
			redirect('admin');
			}
		}
	}
	
	//To logout session from browser
	public function logout() {
		// Removing session data
		$sess_array = array('email' => '');
		$this->session->unset_userdata('session_data', $sess_array);
		$this->session->set_flashdata('successmessage', 'Successfully Logged out !.');
		redirect('admin');
	}
}
