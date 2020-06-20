<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatbot_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_apm($district = null)
	{
		$q = "SELECT address FROM apartment WHERE id_district = '$district'";
		$q = $this->db->query($q);
		return $q->result_array();

	}
	

}

/* End of file Chatbot.php */
/* Location: ./application/models/Chatbot.php */