<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * 
 */
class event_type_model extends CI_Model {
	
	public function getAllDetails()
	{
		return $this->db->get("event_type")->result();
	}
}
