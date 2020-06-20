<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		
	}

	public function get_columns($table = null)
	{
		if ($table == null) {
			return;
		}
		$query = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS
				WHERE TABLE_NAME = N'".$table."'";
		$r = $this->db->query($query);
		return $r->result_array();
	}

	public function get($table = null)
	{
		$this->db->order_by("id DESC");
    	$query = $this->db->get($table);
    	return $query->result_array();
	}
	public function add($table, $data)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		date('H:i, d-m-Y');
	    $this->db->insert($table, $data);
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */