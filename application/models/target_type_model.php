<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * 
 */
class target_type_model extends CI_Model {
	
	public function getDetailsOfTargetType()
	{
		return $this->db->get("target_type")->result();
	}
}