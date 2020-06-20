<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('get_user_role'))
{
	function get_user_role($db_status){
		$status = [
			1 => null,
			2 => 'consultant',
			3 => null,
			4 => 'product-manager',
			5 => 'team-leader'
		];

		return $status[$db_status];
	}
}

if ( ! function_exists('get_list_districts'))
{
	function get_list_districts(){
		$path_json_file = "application/config/resources/districts.json";
		$data = file_get_contents($path_json_file);
		$data = json_decode($data, true);
		
		$arr_districts = array();
		foreach ($data as $index => $district) {
			foreach ($district as $key => $value) {
				$arr_districts[$key] = $value;
			}
			
		}
		
		return $arr_districts;
	}
}

if ( ! function_exists('get_list_services'))
{
	function get_list_services(){
		$path = $path_json_file = "application/config/resources/services.json";
		$data = file_get_contents($path_json_file);
		$data = json_decode($data, true);

		return $data;
	}
}

if ( ! function_exists('get_menubar'))
{
	function get_menubar($role = null){
		if ($role != null)
		{
			$path_json_file = "application/config/resources/nav-".$role.".json";
			$data = file_get_contents($path_json_file);
			$data = json_decode($data, true);

			return $data;
		}

		return;
	}
}

if ( ! function_exists('get_districts_CRUD'))
{
	function get_districts_CRUD($role = null, $account = null)
	{
		$path_json_file = "application/config/resources/districts-CRUD.json";
		$data = file_get_contents($path_json_file);
		$data = json_decode($data, true);
		if (($role == 'team-leader' OR $role == 'product-manager') AND $account != null)
		{
			foreach ($data as $index => $obj) {
				if( $obj['account'] == $account)
				{
					return $obj['district'];
				}
			}
		}
		else
		{
			return null;
		}
		
	}
}


if ( ! function_exists('get_random_quote'))
{
	function get_random_quote()
	{
		$path_json_file = "application/config/resources/quotes.json";
		$data = file_get_contents($path_json_file);
		$data = json_decode($data, true);

		return $data[rand(0, count($data) - 1)];
		
	}
}
