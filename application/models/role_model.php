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
	
	public function getAllDetailsOfRole() {
		return $this -> db -> get('role') -> result();
	}
	
	public function getDetailsByRole1($roleId) {
		$this -> db -> where('roleId', $roleId);
		return $this -> db -> get('role') -> result();
	}
	
	public function deleteRole($roleId) {
		if (isset($roleId)) {
			$this -> db -> where('roleId', $roleId);
			$this -> db -> delete('role');
			return false;
		} else {
			return true;
		}
	}
	
	public function addrole($data) {
		if(isset($data)) {
			return $this->db->insert('role', $data);
		} else {
			return false;
		}
	}
	
	public function updaterole($data,$roleId) {
		if(isset($data) && isset($roleId)) {
			$this -> db -> where('roleId', $roleId);
			return $this->db->update('role', $data);
		} else {
			return false;
		}
	}

}
