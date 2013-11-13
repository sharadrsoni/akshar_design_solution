<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class staff_model extends CI_Model {
	
	public function getDetailsByRole($roleId) {
		$this->db->where("user.roleId", $roleId);
		$this -> db -> from('user');
		return $this->db->get()->result();
	}

	public function deleteStaff($userId) {
		if (isset($userId)) {
			$this -> db -> where('userId', $userId);
			$this -> db -> delete('user');
			return false;
		} else {
			return true;
		}
	}

	public function updateStaff($userId) {
		if (isset($data)) {
			$this -> db -> where('$userId', $data['userId']);
			return $this -> db -> update('user', $data);
		} else {
			return false;
		}
	}

	public function addStaff($data) {
		if (isset($data)) {
			return $this -> db -> insert('staff', $data);
		} else {
			return false;
		}
	}

}
