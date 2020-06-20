<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	
	public function __construct()
    {
            parent::__construct();
    }

	public function index()
	{
		$this->run();
	}

	public function run()
	{
		define("RESOURCES_PATH", "application/views/resources/");
		$districts = file_get_contents(RESOURCES_PATH."districts.json");
		print_r(json_decode($districts, true));

	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */