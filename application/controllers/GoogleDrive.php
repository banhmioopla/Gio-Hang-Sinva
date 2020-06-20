<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GoogleDrive extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('account'))
		{
			$this->session->sess_destroy();
			return redirect('Login');
		}
		$this->load->helper('giohang/main');
		$this->load->helper('giohang/vendors'); // helper
		$this->load->helper('giohang/jsonfun');

	}

	public function index()
	{
		$this->Show();
	}

	public function Show()
	{
		
    	$data['template'] = 'body-contents/ggdrive-list';
    	$data = [
    		'template' => 'body-contents/ggdrive-list',
    		'list_linkdrive' => json_to_arr(file_get_contents("application/config/resources/google-drive.json"))
    	];

		$menu = [
			'list_menu' => get_menubar($this->session->status),
			'account' => $this->session->account
		];
		$footer = [
    		'vendors' => 
    			load_vendors(
    				array(
						'jquery-bottom',
						'core-bottom'
					)
    			)
    	];

		$referlink['base_url_plugins'] = base_url()."templates";
    	$referlink['base_url_assets'] =  base_url()."templates/example/assets/";
    	$referlink['title_head'] = "GH - Sinvahome";

		$this->load->view('components/header',$referlink);
		$this->load->view('components/header-content', $menu);
		$this->load->view('main-content-page', $data);
		$this->load->view('components/footer', $footer);
		$this->load->view('ajax-scripts/onload'); // yummy

	}

}

/* End of file GoogleDrive.php */
/* Location: ./application/controllers/GoogleDrive.php */