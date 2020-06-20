<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {
	public function __construct()
    {
            $this->load->database();
    }

	public function set_news()
	{
	    $this->load->helper('url');

	    //$slug = url_title($this->input->post('title'), 'dash', TRUE);

	    $data = array(
	    	'id' => 1,
	        'title' => $this->input->post('title'),
	        'text' => $this->input->post('text'),
	        'status' => 'x'
	    );

	    return $this->db->insert('test', $data);
	}

}

/* End of file test.php */
/* Location: ./application/models/test.php */