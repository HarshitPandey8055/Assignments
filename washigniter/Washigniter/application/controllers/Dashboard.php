<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
   
	public function index()   
	{
		$data['service_count'] = count($this->db->select('*')->from('service_list')->where('ser_status!=','0')->get()->result_array());
		$where = "DATE(bk_date) = '".date('Y-m-d')."'";
		$data['todaybooking_count'] = count($this->db->select('*')->from('booking')->where($where)->get()->result_array());
		$data['totalbooking_count'] = count($this->db->select('*')->from('booking')->get()->result_array());
		$data['confirmed_count'] = count($this->db->select('*')->from('booking')->where('bk_status','2')->get()->result_array());
		$data['lastorders'] = $this->db->select('*')->from('booking')->limit(5)->order_by('bk_id','desc')->get()->result_array();
		$query = $this->db->query("SELECT  DATE(`bk_date`) Date, COUNT(`bk_id`) totalCOunt FROM booking GROUP BY  DATE(`bk_date`)");
		$data['chart'] = json_encode($query->result_array());
		
		$this->template->render('dashboard',$data);
	}
	

}
