<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketplace_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_store_pass()
	{
		$q = "SELECT public_pass FROM wp_users WHERE ID = 2";
		$q = $this->db->query($q);
		return $q->result_array();

	}
	

}

/* End of file Marketplace_model.php */
/* Location: ./application/models/Marketplace_model.php */