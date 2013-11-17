<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class user_model extends CI_Model {

	public function getDetailsByBranch($branchId) {
		$this -> db -> where("branchId", $branchId);
		$this -> db -> where("roleId !=", 5);
		return $this -> db -> get('user') -> result();
	}

	public function getDetailsByBatch($batchId, $roleId, $branchId) {
		$this -> db -> where("branchId", $branchId);
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
			}
			return false;
		}
	}

	//get max id for next id
	public function getMaxId() {
		return $this -> db -> select_max('userId') -> get('user') -> row_array();
	}

	//get details of user by role id
	public function getDetailsByRole($roleId) {
		$this -> db -> where_in("user.roleId", $roleId);
		$this -> db -> join('branch', 'user.branchCode = branch.branchCode');
		return $this -> db -> get('user') -> result();
	}

	//get user data by user id
	public function getDetailsbyUser($userId, $fieldlist = '') {
		$this -> db -> where("userId", $userId);
		$this -> db -> join('branch', 'user.branchCode = branch.branchCode');
		return $this -> db -> get('user') -> row();
	}

	//get details of Student with other data
	public function getDetailsByStudent($studentId) {
		$this -> db -> where("user.userId", $studentId);
		$this -> db -> join('student_profile', $studentId);
		$this -> db -> join('branch', 'branch.branchCode=user.branchCode');
		return $this -> db -> get('user') -> result();
	}

	//getDetilsByStudentId
	/*public function getStudentDetailsByStudentId($id) {
	 $this -> db -> where("student_profile.studentUserId", $id);
	 $this -> db -> from('student_profile');
	 return $this -> db -> get() -> result();
	 }*/

	public function getDetailsByBranchAndRole($branchCode, $roleId) {
		$this -> db -> where("branchCode", $branchCode);

		$this -> db -> where("roleId", $roleId);
		return $this -> db -> get('user') -> result();
	}

	//Method for dashbord Student Registred and faculty Count
	public function getUserCount($roleId) {
		$this -> db -> where('roleId', $roleId);
		$this -> db -> from('user');
		return $this -> db -> count_all_results();
	}

	//update Add user
	public function addUser($data) {
		if (isset($data)) {
			return $this -> db -> insert('user', $data);
			return true;
		}
		return false;
	}

	//update user details
	public function updateUser($userData, $userId) {
		if (isset($studentData)) {
			$this -> db -> where("user.userId", $userId);
			$this -> db -> update('user', $userData);
			return true;
		}
		return false;
	}

	//Update student others details
	public function updateStudetDetails($StudentData, $studentId) {
		if (isset($studentData)) {
			$this -> db -> where("student_profile.studentUserId", $studentId);
			$this -> db -> update('student_profile', $StudentData);
			return true;
		}
		return false;
	}

	public function deleteUser($userId) {
		if (isset($userId)) {
			$this -> db -> where('userId', $userId);
			$this -> db -> delete('user');
			return true;
		}
		return false;
	}

}
