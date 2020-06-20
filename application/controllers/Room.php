<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('account') == "")
		{
			$this->session->sess_destroy();
			return redirect('Login');
		}
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->model('room_model');
		$this->load->model('apartment_model');
		$this->load->helper('giohang/main'); // helper
		$this->load->helper('giohang/vendors'); // helper
	}

	public function index()
	{
		return redirect('Login');
	}

	public function Add()
	{
		$data['id_apartment'] = $this->input->post('apm_id');
		$room_new_id = $this->room_model->Add($data);

		// send respone id to ajax :>
		echo json_encode(['room_new_id' => $room_new_id]);
	}

	public function Update()
	{	
		$room_id = $this->input->post('id');
		$apm_id = $this->input->post('apm_id');
		
		$dateup = date('H:i, d-m-Y');
		$this->apartment_model->Update($apm_id, 'dateup', $dateup);
		$data_room = [
			$this->input->post('fieldName') => trim($this->input->post('content'))
		];
		
		$this->room_model->Update($room_id, $data_room);
	}

	public function Delete()
	{
		$room_id = $this->input->post('room_id');
		$this->load->model('room_model');
		$this->room_model->Delete($room_id);
	}

}

/* End of file Room.php */
/* Location: ./application/controllers/Room.php */