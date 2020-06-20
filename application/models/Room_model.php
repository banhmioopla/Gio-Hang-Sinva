<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

    public function Add($data)
	{
	    $this->db->insert('roomkit', $data);
	    return $this->db->insert_id();
	}
	
	public function Update($room_id = null, $data_room)
	{
		
		$this->db->where('id', $room_id);
		$this->db->update('roomkit', $data_room);
	}
	public function Delete($id)
	{
		$this->db->where("id", $id);
		$this->db->delete('roomkit');
	}

	public function get_status($status = "", $apm_id)
	{
		if($status == 'saptrong')
		{
			$q = "SELECT COUNT(ID) as counter FROM roomkit WHERE (id_apartment = $apm_id) and (saptrong <> '')";
			$counter = $this->db->query($q);
			return $counter->result_array()[0]["counter"];
		}
		
		$q = "SELECT COUNT(ID) as counter FROM roomkit WHERE (id_apartment = $apm_id) and (id_status = '$status')";
		$counter = $this->db->query($q);
		return $counter->result_array()[0]["counter"];
	}

	

}

/* End of file room_model.php */
/* Location: ./application/models/room_model.php */