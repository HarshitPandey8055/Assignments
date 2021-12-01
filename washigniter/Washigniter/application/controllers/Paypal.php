<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		$pyset = $this->db->select('*')->where('ps_type','paypal')->where('ps_status','1')->from('payment_setting')->get()->result_array();
	}
	function index()
	{
		

	}
}