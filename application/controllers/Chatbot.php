<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

use juno_okyo\Chatfuel;

class Chatbot extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('format');
		$this->load->model('chatbot_model');
	}


	public function sendme_get()
	{
		
		return $this->response(["messages" => [["text" => "hello binh how old r u"]]], REST_Controller::HTTP_OK);

	}
	public function check_id($id)
	{
		$root = [2990851917663394, 2990851917663395];
		if(in_array($id, $root))
		{
			return true;
		}
		return false;
	}

	public function district_post()
	{
		$list_address = $this->chatbot_model->get_apm(7);
		$res = [];
		$i = 1;
		$check_id = 'Bạn ko phải thành viên Sinva, nên ko được quyền truy cập GioHang '."\n\n";
		if(check_id($this->post()["Sinva_ID_FB"]))
		{
			$check_id_text = "Xác thực đúng, bạn là thành viên cua Sinva"."\n\n";
			foreach ($list_address as $row) {
			array_push($res, '('.$i.') ‣ '.$row['address']);
			$i++;
		}
		switch ($this->post()["msg"]) {
			case '':
				# code...
				break;
			
			default:
				# code...
				break;
		}
			$this->response(
			["messages" => 
				[
					["text" => $check_id. "bạn rep là" .$this->post()["msg"]],
					["text" => implode("\n\n",$res)]
				]
			], REST_Controller::HTTP_OK);
		}
		
		

	}




}

/* End of file Chatbot.php */
/* Location: ./application/controllers/Chatbot.php */