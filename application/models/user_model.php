<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class user_model extends CI_Model {

	public function getDetailsByBranchAndRole($branchCode, $roleId) {
		$this -> db -> where("branchCode", $branchCode);
		$this -> db -> where("roleId", $roleId);
		return $this -> db -> get('user') -> result();
	}

	public function getDetailsByBatch($batchId, $roleId, $branchCode) {
		$this -> db -> where("branchCode", $branchCode);
		$this -> db -> where("roleId", $roleId);
		$this -> db -> where("batchId", $batchId);
		$this -> db -> join('student_batch', 'user.userId = student_batch.studentId');
		return $this -> db -> get('user') -> result();
	}


	public function authenticate($data) {
		if (isset($data)) {
			$this -> db -> where("userId", $data['userId']);
			$this -> db -> where("userpassword", $data['userPassword']);
			$getResult = $this -> db -> get("user");
			if ($getResult -> num_rows() == 1) {
				return $getResult -> row() -> roleId;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function getDetailsByRole($roleId) {
		$this -> db -> where("user.roleId", $roleId);
		$this -> db -> from('user');
		return $this -> db -> get() -> result();
	}
	
	public function getDetailsbyUser($userId) {
		$this -> db -> where("userId", $userId);
		$this -> db -> from('user');
		return $this -> db -> get() -> row();
	}

	public function addUser($data) {
		if(isset($data)) {
			return $this->db->insert('user', $data);
		} else {
			return false;
		}
	}
	public function getMaxId() {
		return $this -> db -> select_max('userId') -> get('user') -> row_array();
	}
	
}
