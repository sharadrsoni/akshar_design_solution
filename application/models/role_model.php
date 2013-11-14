<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 *
 */
class role_model extends CI_Model {

	public function getDetailsByRole($roleId) {
		$this -> db -> where("roleId", $roleId);
		$this -> db -> from('role');
		return $this -> db -> get() -> row();
	}
	
	public function getDetailsOfRole() {
		$this -> db -> where("roleId", 2);
		$this -> db -> or_where("roleId", 3);
		$this -> db -> or_where("roleId", 4);
		return $this->db->get("role")->result();
	}

}
