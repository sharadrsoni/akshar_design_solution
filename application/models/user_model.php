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

	public function getBatchStudents($batchCode) {
		$this -> db -> where_in("student_batch.batchId", $batchCode, null);
		$this -> db -> join('student_batch', 'user.userId = student_batch.studentId');
		return $this -> db -> get('user') -> result();
	}

	// Batch list getting the student id
	public function getStudentBatchs($studentId) {
		$this -> db -> where("studentId", $studentId);
		return $this -> db -> get('student_batch') -> result();
	}

	public function getBranchStaff($branchCode) {
		$this -> db -> where("branchCode", $branchCode);
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
	public function getUserDetails($userId) {
		$this -> db -> where("userId", $userId);
		return $this -> db -> get('user') -> row();
	}

	public function getUserDetailsbyEmail($emailId) {
		$this -> db -> where("userEmailAddress", $emailId);
		return $queryData = $this -> db -> get('user') -> row();
	}

	public function forgot_password($data, $emailId) {
		$this -> db -> where("userEmailAddress", $emailId);
		return $this -> db -> update("user", $data);
	}

	//get user data by user id
	public function getDetailsbyUser($userId, $fieldlist = '') {
		$this -> db -> where("userId", $userId);
		$this -> db -> join('branch', 'user.branchCode = branch.branchCode');
		$this -> db -> join('city', 'city.cityId = user.cityId');
		$this -> db -> join('state', 'state.stateId = user.stateId');
		return $this -> db -> get('user') -> row();
	}

	//get details of Student with other data
	public function getDetailsByStudent($studentId) {
		$this -> db -> where("user.userId", $studentId);
		$this -> db -> join('student_profile', 'student_profile.studentUserId=user.userId', 'left');
		$this -> db -> join('branch', 'branch.branchCode=user.branchCode');
		$this -> db -> join('city', 'city.cityId = user.cityId', 'left');
		$this -> db -> join('state', 'state.stateId = user.stateId', 'left');
		return $this -> db -> get('user') -> row();
	}

	//getDetilsByStudentId
	/*public function getStudentDetailsByStudentId($id) {
	 $this -> db -> where("student_profile.studentUserId", $id);
	 $this -> db -> from('student_profile');
	 return $this -> db -> get() -> result();
	 }*/

	public function checkMailId($emailId) {
		return $this -> db -> query("select count(*) as available from user where userEmailAddress like'".$emailId."'")->result();
//		return $this -> db -> query("select course.* from course where courseCategoryId = " . $courseCategoryId . " and courseCode Not In(Select courseCode from student_batch s,batch b where s.batchId = b.batchId and s.studentId = '" . $studentId . "')")->result();

//		return $this -> db -> select('userId') -> get('user') -> row_array();
//		$this -> db -> select('userEmailAddress');
//		$this -> db -> from('user');
//		$this -> db -> where("userEmailAddress", $emailId);
//		$count = $this -> db -> count_all_results();
//		if ($count > 0) {
//			return $count;
//		}
//		return NULL;
	}
	 
	 
	public function getDetailsByBatch($batchCode, $roleId, $branchCode) {
		$this -> db -> where("branchCode", $branchCode);
		$this -> db -> where("roleId", $roleId);
		$this -> db -> where("batchId", $batchCode);
		$this -> db -> join('student_batch', 'user.userId = student_batch.studentId');
		return $this -> db -> get('user') -> result();
	}

	//Method for dashbord Student Registred and faculty Count
	public function getUserCount($roleId, $branchcode = '') {
		$this -> db -> where('roleId', $roleId);
		$this -> db -> from('user');
		if ($branchcode != '') {
			$this -> db -> where('branchCode', $branchcode);
		}
		return $this -> db -> count_all_results();
	}

	public function getstudentRegisterCountOfMonth($branchcode = '') {
		if ($branchcode == '') {
			return $this -> db -> query("SELECT Count(`userId`)as count,Day(userJoiningDate) as day FROM `user` WHERE `userJoiningDate`<now()-30 and roleId=5 group by `userJoiningDate` order by userJoiningDate") -> result();
		} else {
			return $this -> db -> query("SELECT Count(`userId`)as count,Day(userJoiningDate) as day FROM `user` WHERE `userJoiningDate`<now()-30 and roleId=5 and branchcode='" . $branchcode . "' group by `userJoiningDate` order by userJoiningDate") -> result();
		}
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
	//update user details
	public function updateStudetDetails($userData, $userId) {
		if (isset($userData)) {
			$this -> db -> where("studentUserId", $userId);
			return $this -> db -> update('student_profile', $userData);
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

	public function getSearchUserList($value, $branchCode, $roleId) {

		$query = "SELECT distinct U.* FROM `user` U left join (select SB.*, C.* from student_batch as SB,batch B ,course as C where B.batchId=SB.batchId and B.coursecode=C.courseCode) as SBC on U.userId = SBC.studentId where (courseName like '%" . $value . "%' or userId like '%" . $value . "%' or userFirstName like '%" . $value . "%' or userMiddleName like '%" . $value . "%' or userLastName like '%" . $value . "%' or batchId like '%" . $value . "%' or userJoiningDate like '%" . $value . "%')";
		if ($roleId != 1) {
			$query .= "and U.branchcode='" . $branchCode . "'";
		}
		$data = array();
		$queryData = $this -> db -> query($query) -> result();
		$k = 0;
		foreach ($queryData as $key) {
			$this -> load -> model("student_batch_model");
			$courseData = $this -> student_batch_model -> getDetailsByStudent($key -> userId);
			$batchName = "";
			$courseName = "";
			$i = 1;
			$j = 1;
			foreach ($courseData as $key2) {
				if ($i == 1) {
					$batchName .= $key2 -> batchId;
				} else {
					$batchName .= "," . $key2 -> batchId;
				}
				$i++;
				if ($j == 1) {
					$courseName .= $key2 -> courseName;
				} else {
					$courseName .= "," . $key2 -> courseName;
				}
				$j++;
			}
			$data[$k++] = array("Name" => $key -> userFirstName . " " . $key -> userMiddleName . " " . $key -> userLastName, "Username" => $key -> userId, "Joined" => $key -> userJoiningDate, "Courses" => $courseName, "Batch" => $batchName);
		}
		return $data;
	}

}
