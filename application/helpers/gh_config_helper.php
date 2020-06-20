<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('configUserPath'))
{
	function configUserPath($role){
		$path = array();
		$path[1] = 'role-leader';
		$path[2] = 'role-sales';
		$path[4] = 'role-qlda';
		$path[3] = 'role-qlkd';
		$path[5] = 'role-qlda-teamlead';
		
		return $path[$role];
	}
}

if ( ! function_exists('configService'))
{
	function configService(){
		// Config from table 'apartment'
		// $service = array();
		$service = '{"list_service":[
									{ "key_service":"dien", "name":"Điện" },
									{ "key_service":"nuoc", "name":"Nước" },
									{ "key_service":"net", "name":"Internet" },
									{ "key_service":"maygiat", "name":"Máy giặt" },
									{ "key_service":"donphong",	"name":"Dọn phòng" },
									{ "key_service":"parking", "name":"Giữ Xe" },
									{ "key_service":"hoahong", "name":"Hoa hồng" },
									{ "key_service":"coc", "name":"Cọc" },
									{ "key_service":"songuoio", "name":"Số người ở tối đa" },
									{ "key_service":"thangmay", "name":"Thang máy" },
									{ "key_service":"bep","name":"Bếp" },
									{ "key_service":"pet","name":"Pet" },
									{ "key_service":"baove", "name":"Bảo vệ" },
									{ "key_service":"daihan", "name":"Dài hạn" },
									{ "key_service":"nganhan", "name":"Ngắn hạn"}]}';

		return $service;
	}
}

if ( ! function_exists('configMenu'))
{
	function configMenu($role = 'role-sales'){

		$menu = array();
		$menu[1] = "";
		$menu['role-sales'] = '{"menu":[
					    {
					    	"name": "Dự Án", "link": "#", 
					    	"sub": [{"name": "Dự Án","link": "Apartment/Show", "sub": null}]
					    },
					    {
					    	"name": "Google Drive", "link": "#", 
					    	"sub": [
						        {"name": "Ảnh Dự Án","link": "GoogleDrive/Show", "sub": null},
						        {"name": "Lịch Làm","link": "#", "sub": null}
					    ]},
					    {
					    	"name": "Hợp Đồng", "link": "#", 
					    	"sub": [
						        {"name": "Hợp Đồng","link": "#", "sub": null},
						        {"name": "Hợp Đồng Mới","link": "#", "sub": null}
					    ]},
					    {
					    	"name": "Xếp Hạng", "link": "#", 
					    	"sub": [
						        {"name": "XH Đơn","link": "#", "sub": null},
						        {"name": "XH Teams","link": "#", "sub": null}
					    ]},
					    {
					    	"name": "Tài Khoản", "link": "#", 
					    	"sub": [{"name": "Đổi Password","link": "User/Show", "sub": null}, 
					    			{"name": "Đăng Xuất","link": "Login/Show", "sub": null}]
					    }
				]}'; // end menu

		$menu['role-qlda'] = '{"menu":[
					     {
					    	"name": "Dự Án", "link": "#", 
					    	"sub": [{"name": "Dự Án","link": "Apartment/Show", "sub": null}]
					    },
					    {
					    	"name": "Google Drive", "link": "#", 
					    	"sub": [
						        {"name": "Ảnh Dự Án","link": "GoogleDrive/Show", "sub": null},
						        {"name": "Lịch Làm","link": "#", "sub": null}
					    ]},
					    {
					    	"name": "Hợp Đồng", "link": "#", 
					    	"sub": [
						        {"name": "Hợp Đồng","link": "#", "sub": null},
						        {"name": "Hợp Đồng Mới","link": "#", "sub": null}
					    ]},
					    {
					    	"name": "Xếp Hạng", "link": "#", 
					    	"sub": [
						        {"name": "XH Đơn","link": "#", "sub": null},
						        {"name": "XH Teams","link": "#", "sub": null}
					    ]},
					    {
					    	"name": "Tài Khoản", "link": "#", 
					    	"sub": [{"name": "Đổi Password","link": "User/Show", "sub": null}, 
					    			{"name": "Đăng Xuất","link": "Login/Show", "sub": null},
					    			{"name": "Thành Viên Mới","link": "User/ShowMembers", "sub": null}]
					    }
				]}'; // end menu
		$menu["role-qlda-teamlead"] = '{"menu":[
					    {
					    	"name": "Dự Án", "link": "#", 
					    	"sub": [{"name": "Dự Án","link": "Apartment/Show", "sub": null}]
					    },
					    {
					    	"name": "Google Drive", "link": "#", 
					    	"sub": [
						        {"name": "Ảnh Dự Án","link": "GoogleDrive/Show", "sub": null},
						        {"name": "Lịch Làm","link": "#", "sub": null}
					    ]},
					    {
					    	"name": "Hợp Đồng", "link": "#", 
					    	"sub": [
						        {"name": "Hợp Đồng","link": "#", "sub": null},
						        {"name": "Hợp Đồng Mới","link": "#", "sub": null}
					    ]},
					    {
					    	"name": "Xếp Hạng", "link": "#", 
					    	"sub": [
						        {"name": "XH Đơn","link": "#", "sub": null},
						        {"name": "XH Teams","link": "#", "sub": null}
					    ]},
					    {
					    	"name": "Tài Khoản", "link": "#", 
					    	"sub": [{"name": "Đổi Password","link": "User/Show", "sub": null}, 
					    			{"name": "Đăng Xuất","link": "Login/Show", "sub": null},
					    			{"name": "Thành Viên Mới","link": "User/ShowMembers", "sub": null}]
					    }
				]}'; // end menu
	
		return	$menu[$role];
	}
}


if ( ! function_exists('configDistricts'))
{
	function configDistricts(){
		$district = array('1' => '1' ,'2' => '2' ,
						  '3' => '3' ,'4' => '4' ,
						  '5' => '5' ,'6' => '6' ,
						  '7' => '7' ,'8' => '8' ,
						  '9' => '9' ,'10' => '10' ,
						  '11' => '11' ,'12' => '12' ,
						  'binhtan' => 'Bi.Ta' ,'tanbinh' => 'Ta.Bi' ,
						  'govap' => 'Go.Va' ,'binhthanh' => 'Bi.Tha' ,
						  'phunhuan' => 'Fu.Nhu','mini' => 'Mini'
						);
		return $district;
	}
}

if ( ! function_exists('configQLDA'))
{
	function configQLDA($role, $account_id){
		$list_district = array();
		if($role == 'role-qlda-teamlead')
		{
			switch ($account_id) {
				case '171020045':
					$list_district = array(1,2);
					break;
				case '171020036':
					$list_district = array('binhthanh');
					break;
				case '171020047':
					$list_district = array(4,8);
					break;
				case '171020035':
					$list_district = array(5,10);
					break;
				case '171020029':
					$list_district = array(3,'tanbinh','phunhuan');
					break;
				
				default:
					$list_district = array_keys(configDistricts());
					break;
			}
			
		} 
		else {
			$list_district = array_keys(configDistricts());
		}

		return $list_district;

	}
}

if ( ! function_exists('configUserFeature'))
{
	function configUserFeature($role, $account_id){
		$apmModify = new StdClass;
	
		if ($role == 'role-qlda-teamlead' or $role == 'role-qlda') {
			$apmModify->editable = true;
			$apmModify->list_district = configQLDA($role, $account_id);
			// $apmModify = "{'editable': true, 'list_district': configQLDA($role, $account_id) }";
			return json_encode($apmModify);
			
		}
		else{
			$apmModify->editable = false;
			$apmModify->list_district = configQLDA($role, $account_id);
			// $apmModify = "{'editable': false, 'list_district': configQLDA($role, $account_id) }";
			return json_encode($apmModify);
		}
		

		

	}
}

 ?>