<?php

if ( ! function_exists('load_columns'))
{
	function load_columns($table_name = null)
	{

		if($table_name === null ) return;

		$path_json_file = "application/config/resources/db/table_".$table_name.".json";
		$data = file_get_contents($path_json_file);
		$data = json_decode($data, true);
		return $data;
		
	}
}


