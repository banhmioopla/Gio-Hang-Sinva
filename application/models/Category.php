<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get($id = null)
	{
		if ($id == null) 
		{
			$this->db->select('*');
			$query = $this->db->get('category');
			return $query->result_array();
		}
		else
		{
			$this->db->where(['id' => $id]);
			$query = $this->db->get('category');
			return $query->result_array();
		}

	}

	public function add($data)
	{
		return $this->db->insert('category', $data);
	}

}

/* End of file Category.php */
/* Location: ./application/models/Category.php */