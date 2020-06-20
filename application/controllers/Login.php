<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('cookie');
		$this->load->helper('gh_config');
		$this->load->helper('giohang/main');
	}

	public function index()
	{

		if(get_cookie('username') != "" AND get_cookie('password') != ""){
			echo "yes";
			$this->loginCookie();
		}
		else{
			echo "Noo";
			$this->Show();
		}
		
		
	}

	public function setLiveSession($data)
	{
		$data[0]['status'] = get_user_role($data[0]['status']); // main helper
		$data[0]['district_active'] = '7';

		$this->session->set_userdata($data[0]);
	}

	public function loginCookie()
	{
		$data['username'] = get_cookie('username');
		$data['password'] = get_cookie('password');
		$checkLogin = $this->login_model->verifyAccount($data);
		if($checkLogin != false){
			$this->setLiveSession($checkLogin);
			return redirect('Apartment');
		} else {
			return redirect('Login/Show','refresh');
		}		
		
	}

	public function verifyAccount()
	{
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		
		set_cookie('username', $this->input->post('username'),2592000);
		set_cookie('password', $this->input->post('password'), 2592000);

		$checkLogin = $this->login_model->verifyAccount($data);
		// print_r($checkLogin); die;

		if( $checkLogin != false)
		{
			$this->setLiveSession($checkLogin);
			return redirect('Apartment');
		}
		else
		{
			$this->session->sess_destroy();
			return redirect('Login/Show','refresh');
		}
		
		
	}

	public function Show()
	{
		$preferlink['base_url_plugins'] = base_url()."templates";
    	$preferlink['base_url_assets'] =  base_url()."templates/example/assets/";
    	$preferlink['title_head'] = "Giỏ hàng sinvahome";
    	$preferlink['title_foot'] = date('Y')." © gh-devby: quocbinh </>";
    	$preferlink['slogan'] = "Chào Tháng ".date('m');

		$this->load->view('login-page', $preferlink);
	}
	public function destroyCookie()
	{
		delete_cookie('username');
		delete_cookie('password');
	}


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */