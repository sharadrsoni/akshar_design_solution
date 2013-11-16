<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class student_model extends CI_Model {
	public function getDetailsById($id) {
		$this -> db -> where("user.userId", $id);
		$this -> db -> from('user');
		return $this -> db -> get() -> result();
	}

	public function getDetilsByStudentId($id) {
		$this -> db -> where("student_profile.studentUserId", $id);
		$this -> db -> from('student_profile');
		return $this -> db -> get() -> result();
	}

	public function updateProfile($studentData, $otherData, $id) {
		if (isset($studentData)) {
			$this -> db -> where("user.userId", $id);
			$this -> db -> update('user', $studentData);
			$this -> db -> where("student_profile.studentUserId", $id);
			$this -> db -> update('student_profile', $otherData);
		} else {
			return false;
		}
	}

	public function getStudentRegisterCount() {
		$this -> db -> where('roleId', 5);
		$this -> db -> from('user');
		$count = $this -> db -> count_all_results();
		return $count;
	}

}
?>