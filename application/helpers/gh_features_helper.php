<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('get_features'))
{
	function get_features($role){
		$features = [
			"product-manager" => [
				"product-crud",
				"user-crud",
			]
		]
		
		return $path[$role];
	}
}