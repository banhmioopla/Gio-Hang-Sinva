<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartment_model extends CI_Model {

	public function __construct()
    {
    	parent::__construct();
    }
    
    public function Show()
    {
    	$this->db->order_by("order_item ASC", "id DESC");
    	$this->db->where(["active" =>"true"]);
    	$query = $this->db->get('apartment');
    	return $query->result_array();
    }

    public function ShowDisabled()
    {
    	$this->db->order_by("id DESC");
    	$this->db->where(["active" =>"false"]);
    	$query = $this->db->get('apartment');
    	return $query->result_array();
    }

    public function Add($data)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$data['datein'] = date('H:i, d-m-Y');
	    $this->db->insert('apartment', $data);
	}

	public function Update($apm_id, $apm_field_name, $apm_info_value)
	{
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$dateup = date('H:i, d-m-Y');
		if($apm_field_name == 'active')
		{
			$data = array($apm_field_name => $apm_info_value);
		}
		else
		{
			$data = array($apm_field_name => $apm_info_value, 'dateup' => $dateup);
		}
		

		$this->db->where("id", $apm_id);
		$this->db->update('apartment', $data);
	}

	public function Delete($apm_id)
	{
		$this->deleteRoomByApm($apm_id);
		$this->db->where("id", $apm_id);
		$this->db->delete('apartment');
	}

	public function deleteRoomByApm($apm_id)
	{
		$this->db->where("id_apartment", $apm_id);
		$this->db->delete('roomkit');
	}

	public function getListRoomById($id='')
	{
		$query = $this->db->query('SELECT * FROM roomkit WHERE roomkit.id_apartment = '.$id);
		return $query->result_array();
	}
	public function updateOneField($id, $field_name, $value)
	{
		$data[$field_name] = $value;
		$this->db->where("id", $id);
		$this->db->update('apartment', [$field_name => $value]);
	}

	public function OrderItem($apm_id, $district_order, $order_number)
	{
		$this->db->where(array("id" => $apm_id, "id_district" => $district_order));
		$this->db->update('apartment', array('order_item'=>$order_number));
	}
	
	public function get($table = null)
	{
		$this->db->order_by("id DESC");
    	$query = $this->db->get($table);
    	return $query->result_array();
	}

}

/* End of file apartment.php */
/* Location: ./application/models/apartment.php */