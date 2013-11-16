<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 *
 */
class role_model extends CI_Model {

	public function getDetailsOfRole() {
		$this -> db -> where_in("roleId", array("2", "3", "4"));
		return $this -> db -> get("role") -> result();
	}

	public function getDetailsByRole($roleId) {
		$this -> db -> where("roleId", $roleId);
		return $this -> db -> get('role') -> row();
	}

}
