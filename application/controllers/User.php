<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('account'))
		{
			$this->session->sess_destroy();
			return redirect('Login');
		}
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->library('email');
		$this->load->helper('giohang/main');
		$this->load->helper('giohang/vendors'); // helper
		$this->load->helper('cookie');
		$this->load->model('user_model');

		//Do your magic here
	}

	public function index()
	{
		$this->ShowMembers();
	}

	public function Show()
	{

		$data = [
			'user_id' => $this->session->userdata('account'),
			'template' => 'body-contents/user-profile'
		];

		$menu = [
			'list_menu' => get_menubar($this->session->status),
			'account' => $this->session->account
		];

		$referlink['base_url_plugins'] = base_url()."templates";
    	$referlink['base_url_assets'] =  base_url()."templates/example/assets/";
    	$referlink['title_head'] = "GH - Sinvahome";
    	$footer = [
    		'vendors' => load_vendors(array(
    						'jquery-bottom',
    						'form-bottom',
    						'data-table-bottom',
    						'Xeditable-bottom',
    						'core-bottom'
    						))
    	];

		$this->load->view('components/header',$referlink);
		$this->load->view('components/header-content', $menu);
		$this->load->view('main-content-page', $data);
		$this->load->view('components/footer', $footer);
		$this->load->view('ajax-scripts/user-change-password');
		$this->load->view('ajax-scripts/onload'); // yummy
	}
	public function changePass()
	{
		$user_id = $this->input->post('user_id');
		$new_pass = $this->input->post('new_pass');
		set_cookie('password', $this->input->post('new_pass'), 2592000);

		$this->user_model->changePass($user_id, $new_pass);
	}

	public function Update()
	{
		$data = [
			$this->input->post('name') => $this->input->post('value'),
			'leader' => $this->session->account,
			'account' => $this->input->post('pk'),
			'datein' => date('m-Y')
		];
		$this->user_model->update($data);
	}

	public function ShowMembers()
	{
		$menu = array();
		$data = array();

		$data = [
			'list_u' => $this->user_model->show_members(),
			'template' => 'body-contents/user-list',
			'leader_account' => $this->session->account,
			'newaccount' => $this->user_model->get_newest_account()
		];
		
		$menu = [
			'list_menu' => get_menubar($this->session->status),
			'account' => $this->session->account
		];
		$footer = [
    		'vendors' => load_vendors(array(
    						'jquery-bottom',
    						'data-table-bottom',
    						'Xeditable-bottom',
    						'core-bottom'
    						))
    	];

	    $referlink['base_url_plugins'] = base_url()."templates";
    	$referlink['base_url_assets'] =  base_url()."templates/example/assets/";
    	$referlink['title_head'] = "sinva - Thành Viên";
    	$menu['account'] = $this->session->account; 

		$this->load->view('components/header',$referlink);
		$this->load->view('components/header-content', $menu);
		$this->load->view('main-content-page', $data);
		$this->load->view('components/footer', $footer);
		$this->load->view('ajax-scripts/user-editable');
		$this->load->view('ajax-scripts/user-crud');
		$this->load->view('ajax-scripts/onload'); // yummy
	}

	public function add()
	{

		$data = [
			'fullname' =>  $this->input->post('uname'),
			'account' => $this->input->post('newaccount'),
			'password' => $this->input->post('newaccount'),
			'status' => 2,
			'datein' => date('m-Y'),
			'leader' => $this->session->account
		];
		$this->user_model->add($data);

		return redirect('User/ShowMembers','refresh');
	}


	

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */