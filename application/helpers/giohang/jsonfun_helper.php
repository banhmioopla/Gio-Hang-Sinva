<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('json_to_arr')){
	/**
	 * Json To Array - chuyển chuỗi json thành mảng array
	 *
	 * @param	string json format
	 * @return	array
	 */	
	function json_to_arr( $json_string ){
		$json_string = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t]//.*)|(^//.*)#", '', $json_string);
		// print_r  (json_decode($json_string, true));
		return json_decode($json_string, true);
		
	}
}


 ?>