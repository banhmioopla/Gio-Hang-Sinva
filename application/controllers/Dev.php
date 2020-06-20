<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dev extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->helper('giohang/main'); // helper
		$this->load->helper('giohang/vendors'); // helper
		$this->load->model('admin_model');


	}

	public function index()
	{
		$menu = [
			'list_menu' => get_menubar(get_user_role(5)),
			'account' => $this->session->account
		];

		$referlink['base_url_plugins'] = base_url()."templates";
    	$referlink['base_url_assets'] =  base_url()."templates/example/assets/";
    	$referlink['title_head'] = "GH - Dev";
    	$data = [
    		'template' => 'body-contents/dev',
    		'apartment_tag' => $this->admin_model->get('apartment_tag'),
    		'room_status' => $this->admin_model-> get('room_status'),
    		'district_list' => $this->admin_model-> get('district'),
    	];

    	$footer = [
    		'vendors' => load_vendors(
    				array(
						'jquery-bottom',
						'form-bottom',
						'data-table-bottom',
						'buttons-bottom',
						'Xeditable-bottom',
						'core-bottom'
						))
    	];

    	$this->load->view('components/header',$referlink);
		$this->load->view('components/header-content', $menu);
		$this->load->view('main-content-page', $data);
		$this->load->view('components/footer', $footer);
		$this->load->view('ajax-scripts/dev');

	}
	public function add_catelog($table)
	{
		$data = [
			'slug' => $this->text_to_slug($this->input->post($table.'-new')),
			'name' => $this->input->post($table.'-new')

		];
		$this->admin_model->add($table, $data);
		redirect('Apartment','refresh');

	}

	public function writeToTableJson()
	{
		$table_name = $this->input->post('table_name');
		$data['columns'] = $this->admin_model->get_columns($table_name);
		$data['column_arr'] = [];
		foreach ($data['columns'] as $index => $column) {
			array_push($data['column_arr'], $column['COLUMN_NAME']);
		}
		$fp = fopen('application/config/resources/db/table_apartment.json', 'w');
		fwrite($fp, print_r(json_encode($data['column_arr'], JSON_PRETTY_PRINT), TRUE));
		fclose($fp);

	}

	public function text_to_slug($text)
	{
		$unwanted_array = array(
        
        'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 
        'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ạ' => 'a',
        'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',
        'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e', 
        'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',
        'ì' => 'i', 'í' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
        'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
        'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o',
        'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',
        'ù' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 
        'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',
        'đ' => 'd',
        ' ' => '-' );
		return strtr( mb_strtolower($text), $unwanted_array );
	}


	

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */