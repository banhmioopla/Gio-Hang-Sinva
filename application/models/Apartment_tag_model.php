<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apartment_Tag_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_tag($apm_id, $table =null)
	{
		$q = "SELECT tag_id FROM apartment WHERE apartment.id = $apm_id LIMIT 1"; 
		$q = $this->db->query($q);
		if($q->result_array()[0]['tag_id'] == null)
		{
			return [];
		}
		$arr_tags = (json_decode($q->result_array()[0]['tag_id']));
		$result = [];
		foreach ($arr_tags as $tag) {
			$q_tag = "SELECT slug, name FROM apartment_tag WHERE apartment_tag.slug = '$tag'";
			$q_tag = $this->db->query($q_tag);
			$result[$q_tag->result_array()[0]['slug']] = $q_tag->result_array()[0]['name'];
		}
		return $result;

	}

	public function get($value='')
	{
		$q = $this->db->get('apartment_tag');
		return $q->result_array();
	}
	public function add_tag($apm_id, $tag_slug)
	{
		$query = "UPDATE apartment
					SET tag_id = CASE WHEN tag_id IS NULL THEN '[".$tag_slug."]'
					                ELSE  JSON_ARRAY_APPEND (tag_id, '$', '".$tag_slug."')
					                END
					WHERE id =".$apm_id;
		echo $query;
		$query = $this->db->query($query);

	}
	public function delete_tag($apm_id, $tag_slug)
	{
		$query = "UPDATE apartment 
			SET tag_id = JSON_REMOVE(tag_id, JSON_UNQUOTE(JSON_SEARCH(tag_id, 'one', '".$tag_slug."')))
			WHERE JSON_SEARCH(tag_id, 'one', '".$tag_slug."') IS NOT NULL AND apartment.id = ".$apm_id;
		echo $query;
		$query = $this->db->query($query);
	}
	

}

/* End of file Apartment_Tag_model.php */
/* Location: ./application/models/Apartment_Tag_model.php */