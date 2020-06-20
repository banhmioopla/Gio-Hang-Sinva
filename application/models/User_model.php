<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function add($data)
	{
		$this->db->insert('user', $data);
	}

	public function changePass($user_id, $pass)
	{
		$data['password'] = $pass;
		$this->db->where('account', $user_id);
		$this->db->update('user', $data);

	}
	public function show_members()
	{
		$this->db->where('account > ',171020000);
		$this->db->where('status > ',0);
		$this->db->order_by('account', 'DESC');
		$query = $this->db->get('user');

		return $query->result_array();

	}

	public function get_newest_account()
	{
		$this->db->select_max('account');
		$query  = $this->db->get('user');
		return $query->row_array();
	}

	public function update($data)
	{
		$this->db->where("account", $data['account']);
		$this->db->update('user', $data);
	}

	public function get_email()
	{
		$q = "select email, fullname from user where status = 2 or status = 5";
		$q = $this->db->query($q);
		return $q->result_array();
	}

	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */