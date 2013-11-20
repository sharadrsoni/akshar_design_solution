<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class student_profile_model extends CI_Model {

	public function getDetailsOfState() {
		return $this -> db -> get('state') -> result();
	}

	public function getDetailsByState($stateId) {
		$this -> db -> where('stateId', $stateId);
		return $this -> db -> get('state') -> result();
	}

	public function addUserProfile($data) {
		if (isset($data)) {
			return $this -> db -> insert('student_profile', $data);
		}
		return false;
	}

	public function updateStudentDetails($data, $userId) {
		if (isset($data) && isset($userId)) {
			$this -> db -> where('studentUserId', $userId);
			return $this -> db -> update('student_profile', $data);
		}
		return false;
	}

	public function deleteUserProfile($userId) {
		if (isset($userId)) {
			$this -> db -> where('userId', $userId);
			$this -> db -> delete('student_profile');
			return false;
		}
		return true;
	}

}
?>