<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('load_vendors'))
{
	function load_vendors($plugins){
		$link = array();
		foreach ($plugins as $plugin) {
			$path_json_file = "application/config/resources/vendors/".$plugin.".json";
			$data = file_get_contents($path_json_file);
			$link[$plugin] = json_decode($data, true);
		}
		

		return $link;
	}
}