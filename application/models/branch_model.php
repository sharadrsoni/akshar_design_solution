<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * 
 */
class branch_model extends CI_Model {
	
	public function getAllDetails()
	{
		return $this->db->get("branch")->result();
	}
}