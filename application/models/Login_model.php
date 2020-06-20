<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}

	public function verifyAccount($account)
	{
		// print_r($account);
		$u = $account['username'];
		$p = $account['password'];
		// Query
		$query = $this->db->query('SELECT * 
			FROM user 
			WHERE (account = '.$u.' AND password = "'.$p.'") AND (status > 0)');
		if($query->num_rows())
			return $query->result_array();
		else
			return false;
	}

	

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */