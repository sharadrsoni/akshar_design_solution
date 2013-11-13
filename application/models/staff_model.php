<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class staff_model extends CI_Model {

	public function getDetailsByRole($roleId) {
		$this -> db -> where("user.roleId", $roleId);
		$this -> db -> from('user');
		return $this -> db -> get() -> result();
	}

	public function getDetailsById($id) {
		$this -> db -> where("user.userId", $id);
		$this -> db -> from('user');
		return $this -> db -> get() -> result();
	}

	public function updateProfile($staffData, $id) {
		if (isset($staffData)) {
			$this -> db -> where("user.userId", $id);
			$this -> db -> update('user', $staffData);
		} else {
			return false;
		}
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

>>>>>>> f623b4858c618cb5e0612101cb0f7eb37c75ed53
