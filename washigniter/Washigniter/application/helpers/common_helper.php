<?php
/**
 * @author   Natan Felles <natanfelles@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');


	function xssclean($post)
	{
		$rtn = true; 
		if($post) {
			foreach ($post as $key => $data) {
				if (preg_match("/</i", $data, $match))  {
   					$rtn = false; 
   				}
			}
		}
		return $rtn;
	}

	function output($data) 
	{
		if(isset($data)) {
			return html_escape($data);
		} else {
			return '';
		}
	}

	if (!function_exists('getRecordOnId'))
	{
	    function sitedata() {
	    	$CI =& get_instance();
	        $CI->db->from('website_setting');
	        $query = $CI->db->get();
	        $siteinfo = $query->result_array();
	        if(count($siteinfo)>=1) {
	        	return $siteinfo[0];
	        } 
	    }
	}