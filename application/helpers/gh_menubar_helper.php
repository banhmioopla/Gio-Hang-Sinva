<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


if ( ! function_exists('menu'))
{
	function gh_menu($role)
	{
		$arrMenuName = array(
							// array(
							// 	'title' => "Dự Án",
							// 	'submenu' => array(
							// 				'#'=>'Dự Án'
							// 			    )
							// ),
							// array(
							// 	'title' => "Google Drive",
							// 	'submenu' => array(
							// 				'#'=>'Ảnh Dự Án',
							// 				'#'=>'Lịch Làm'
							// 			    )
							// ),
							array(
								'title' => "Hợp Đồng",
								'submenu' => array(
											{'submenu-title'=>'Hợp Đồng',
											'submenu-link'=>'#'},
											{'submenu-title'=>'Hợp Đồng 02',
											'submenu-link'=>'#'}

											// '#'=>'Hợp Đồng Mới',
											// '#'=>'Khách Hàng',
											// '#'=>'Khách Hàng Tiềm Năng'
										    )
							),
							);

		return $arrMenuName;
	}

}



 ?>