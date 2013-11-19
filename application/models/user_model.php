<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class user_model extends CI_Model {

	//Random Password Genterator Function
	function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789`~!@#$%^&*";
		$pass = array();
		//remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1;
		//put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);
		//turn the array into a string
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

	public function getDetailsByBranchAndRole($branchCode, $roleId) {
		$this -> db -> where("branchCode", $branchCode);
		$this -> db -> where("roleId", $roleId);
		return $this -> db -> get('user') -> result();
	}

	public function getDetailsByBranch($branchCode) {
		$this -> db -> where_in("branchCode", $branchCode, null);
		$this -> db -> where("roleId !=", 5);
		return $this -> db -> get('user') -> result();
	}

	//get max id for next id
	public function getMaxId($year, $branch, $role) {
		$userId = $this -> db -> query("select max(RIGHT(userId,3))+1 as userid from user where userId like '" . $year . $branch . $role . "%'") -> row();
		$userId = $userId -> userid;
		if ($userId) {
			if ($userId < 10) {
				return $year . $branch . $role . "000" . $userId;
			} elseif ($userId < 100) {
				return $year . $branch . $role . "00" . $userId;
			} elseif ($userId < 1000) {
				return $year . $branch . $role . "0" . $userId;
			}
			return $year . $branch . $role . $userId;
		} else {
			return $year . $branch . $role . "0001";
		}
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
		$this -> db -> join('city', 'city.cityId = user.cityId');
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

	public function getDetailsByBatch($batchCode, $roleId, $branchCode) {
		$this -> db -> where("branchCode", $branchCode);
		$this -> db -> where("roleId", $roleId);
		$this -> db -> where("batchId", $batchCode);
		$this -> db -> join('student_batch', 'user.userId = student_batch.studentId');
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
		if (isset($userData)) {
			$this -> db -> where("user.userId", $userId);
			return $this -> db -> update('user', $userData);
		}
		return false;
	}

	//Update student others details
	public function updateStudetDetails($StudentData, $studentId) {
		if (isset($studentData)) {
			$this -> db -> where("student_profile.studentUserId", $studentId);
			die($this -> db -> update('student_profile', $StudentData));
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

	public function getSearchUserList($value) {
		$this->db->distinct("U.*");
		$this->db->from('user as U');
		$this->db->join("(select SB.*, C.* from student_batch as SB,batch B ,course as C where B.batchId=SB.batchId and B.coursecode=C.courseCode) as SBC", 'U.userId = SBC.studentId', 'left'); 
		$this->db->like('courseName', $value)->or_like('userId', $value)->or_like('userFirstName', $value)->or_like('userMiddleName', $value)->or_like('userLastName', $value)->or_like('batchId', $value);
		$queryData = $this->db->get()->result();
		foreach ($queryData as $key) {
			$this->load->model("student_batch_model");
			$courseData = $this->student_batch_model->getDetailsByStudent($key->userId);
			die(print_r($courseData));
		}
	}

}
