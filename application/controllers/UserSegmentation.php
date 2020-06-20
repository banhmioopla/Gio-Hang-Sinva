<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSegmentation extends CI_Controller {

	public function index()
	{
		echo $this->session->username;
		echo" hello";
	}

}

/* End of file UserSegmentation.php */
/* Location: ./application/controllers/UserSegmentation.php */