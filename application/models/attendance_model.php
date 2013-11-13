<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class attendance_model extends CI_Model {

	public function addAttendance($data) {
		if (isset($data)) {
			return $this -> db -> insert('attendance', $data);
		} else {
			return false;
		}
	}

	public function updateAttendance($data) {
		if (isset($data)) {
			$this -> db -> where('attendanceDate', $data['attendanceDate']);
			$this -> db -> where('studentBatchId', $data['studentBatchId']);
			$this -> db -> set('attendanceIsPresent	', 1);
			return $this -> db -> update('attendance', $data);
		} else {
			return false;
		}
	}

}
