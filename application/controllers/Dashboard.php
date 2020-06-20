<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->Show();
	}

	public function Show()
	{
		$data = [
			'apm_list' => $this->apartment_model->Show(),
		];
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */