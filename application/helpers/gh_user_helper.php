<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('configUserRole'))
{
	function configEmployeeRole($status){
		$role = array();
		$role[1] = 'role-sales';
		$role[2] = 'role-teamlead';
		$role[3] = 'role-qlda';
		$role[4] = 'role-qlkd';
		$role[5] = 'role-qlda-teamlead';
		
		return $role[$status];
	}
}