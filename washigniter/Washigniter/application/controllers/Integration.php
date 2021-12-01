<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Integration extends MY_Controller {
   
   function __construct( )
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
	}
	public function index()   
	{
		$this->template->render('integration');
	}
}
 