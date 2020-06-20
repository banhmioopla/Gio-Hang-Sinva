<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartment extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('account') == "")
		{
			$this->session->sess_destroy();
			return redirect('Login');
		}
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->model('apartment_model');
		$this->load->model('apartment_tag_model');
		$this->load->model('admin_model');
		$this->load->model('marketplace_model');
		$this->load->helper('giohang/main'); // helper
		$this->load->helper('giohang/vendors'); // helper
	}

	public function index()
	{
		$this->Show();
	}

	public function Show()
	{
		$menu = array();
		$data = array();
		
		// print_r($this->apartment_tag_model->get()); die;
		$data = [
			'store_pass' => $this->marketplace_model->get_store_pass()[0]['public_pass'],
			'list_apm' => $this->apartment_model->Show(),
			'list_apm_tag' => $this->apartment_tag_model->get(),
			'list_district' => get_list_districts(), // main helper get dictricts in config
			'list_service' => get_list_services(), // main helper
			'apartment_tag' => $this->admin_model->get('apartment_tag'),
			'template' => 'body-contents/apm-list',
			'quote' => get_random_quote(),
			'district_active' => $this->session->district_active,
			'list_district_editable' => get_districts_CRUD($this->session->status, $this->session->account),
			'editable' => get_districts_CRUD(
							$this->session->status,
							$this->session->account) != null ? true : false
		];

		$menu = [
			'list_menu' => get_menubar($this->session->status),
			'account' => $this->session->account
		];

	    $referlink['base_url_plugins'] = base_url()."templates";
    	$referlink['base_url_assets'] =  base_url()."templates/example/assets/";
    	$referlink['title_head'] = "GH - Sinva";

    	$footer = [
    		'vendors' => 
    			load_vendors(
    				array(
						'jquery-bottom',
						'form-bottom',
						'data-table-bottom',
						'buttons-bottom',
						'Xeditable-bottom',
						'core-bottom'
					)
    			)
    	];

		$this->load->view('components/header',$referlink);
		$this->load->view('components/header-content', $menu);
		$this->load->view('main-content-page', $data);
		$this->load->view('components/footer', $footer);
		
		// control loading footer js scripts file, that splited by role user
		if($data['editable'] == true)
		{
			$this->load->view('ajax-scripts/apm-editable'); // yummy
			$this->load->view('ajax-scripts/apm-add-new-item'); // yummy
			$this->load->view('ajax-scripts/apm-delete'); // yummy
			$this->load->view('ajax-scripts/apm-order-item'); // yummy
			$this->load->view('ajax-scripts/apm-tags'); // yummy
			$this->load->view('ajax-scripts/apm-disable'); // yummy
			
		}
		else
		{
			$this->load->view('ajax-scripts/apm-datatable'); // yummy
		}
		$this->load->view('ajax-scripts/onload'); // yummy
	}
	public function ShowDisabled($value='')
	{
		$menu = array();
		$data = array();
		
		// print_r($this->apartment_tag_model->get()); die;
		$data = [
			'list_apm' => $this->apartment_model->ShowDisabled(),
			'list_apm_tag' => $this->apartment_tag_model->get(),
			'list_district' => get_list_districts(), // main helper get dictricts in config
			'list_service' => get_list_services(), // main helper
			'apartment_tag' => $this->admin_model->get('apartment_tag'),
			'template' => 'body-contents/apm-list-disable',
			'quote' => get_random_quote(),
			'district_active' => $this->session->district_active,
			'list_district_editable' => get_districts_CRUD($this->session->status, $this->session->account),
			'editable' => get_districts_CRUD(
							$this->session->status,
							$this->session->account) != null ? true : false
		];

		$menu = [
			'list_menu' => get_menubar($this->session->status),
			'account' => $this->session->account
		];

	    $referlink['base_url_plugins'] = base_url()."templates";
    	$referlink['base_url_assets'] =  base_url()."templates/example/assets/";
    	$referlink['title_head'] = "GH - Sinva";

    	$footer = [
    		'vendors' => 
    			load_vendors(
    				array(
						'jquery-bottom',
						'form-bottom',
						'data-table-bottom',
						'buttons-bottom',
						'Xeditable-bottom',
						'core-bottom'
					)
    			)
    	];

		$this->load->view('components/header',$referlink);
		$this->load->view('components/header-content', $menu);
		$this->load->view('main-content-page', $data);
		$this->load->view('components/footer', $footer);
		
		// control loading footer js scripts file, that splited by role user
		if($data['editable'] == true)
		{
			$this->load->view('ajax-scripts/apm-editable'); // yummy
			$this->load->view('ajax-scripts/apm-add-new-item'); // yummy
			$this->load->view('ajax-scripts/apm-delete'); // yummy
			$this->load->view('ajax-scripts/apm-order-item'); // yummy
			$this->load->view('ajax-scripts/apm-tags'); // yummy
			$this->load->view('ajax-scripts/apm-disable'); // yummy

		}
		$this->load->view('ajax-scripts/onload'); // yummy

	}

	public function Update()
	{
		$apm_id = $this->input->post('pk');
		$apm_field_name = trim($this->input->post('name'));
		$apm_info_value = trim($this->input->post('value'));
		$this->apartment_model->Update($apm_id, $apm_field_name, $apm_info_value);
	}

	public function Delete()
	{
		$apm_id = $this->input->post('apm_id');
		$this->apartment_model->Delete($apm_id);
	}

	public function Add($district_key){
		$data = array();
		$data['address'] = "căn mới";
		$data['id_district'] = $district_key;
		$data['tag_id'] = '[]';
		$data['active'] = 'true';
		$this->session->set_userdata(array('district_active' => (string)$district_key));
		// print_r($data); die;
		$this->apartment_model->Add($data);
		redirect('Apartment/Show','refresh');

	}

	public function OrderItem()
	{
		$array_id = $this->input->post('page_id_array');
		$district_order = $this->input->post('district');
		for($i = 0; $i<count($array_id); $i++)
		{
			 $this->apartment_model->OrderItem($array_id[$i], $district_order, $i);
		}
	}
	public function AddTag()
	{
		$apm_id = $this->input->post('apm_id');
		$tag_slug = trim($this->input->post('tag_slug'));

		$this->apartment_tag_model->add_tag($apm_id, $tag_slug);
	}

	public function DeleteTag()
	{
		$apm_id = $this->input->post('apm_id');
		$tag_slug = $this->input->post('tag_slug');

		$this->apartment_tag_model->delete_tag($apm_id, $tag_slug);
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

/* End of file Apartment.php */
/* Location: ./application/controllers/Apartment.php */