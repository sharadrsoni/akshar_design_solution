<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class staff_model extends CI_Model {

	public function getDetailsOfStaff() {
		$this -> db -> where("roleId", 2);
		$this -> db -> or_where("roleId", 3);
		$this -> db -> or_where("roleId", 4);
		$this -> db -> join('branch', 'user.branchId = branch.branchId');
		return $this -> db -> get('user') -> result();
	}

	public function getDetailsByStaff($userId) {
		$this -> db -> where("user.userId", $userId);
		return $this -> db -> get('user') -> result();
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

	public function updateStaff($data, $userId) {
		if (isset($data)) {
			$this -> db -> where('userId', $userId);
			return $this -> db -> update('user', $data);
		} else {
			return false;
		}
	}

	public function addStaff($data) {
		if (isset($data)) {
			return $this -> db -> insert('user', $data);
		} else {
			return false;
		}
	}

	public function getFacultyCount() {
		$this -> db -> where('roleId', 3);
		$this -> db -> from('user');
		$count = $this -> db -> count_all_results();
		return $count;
	}

}
