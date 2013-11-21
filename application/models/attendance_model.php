<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class attendance_model extends CI_Model {

	public function getDetailsByBatchByDate($batchId, $roleId, $branchCode, $date) {
		$this -> db -> where("branchCode", $branchCode);
		$this -> db -> where("roleId", $roleId);
		$this -> db -> where("batchId", $batchId);
		$this -> db -> where("attendanceDate", $date);
		$this -> db -> join('student_batch', 'attendance.studentBatchId = student_batch.studentBatchId');
		$this -> db -> join('user', 'user.userId = student_batch.studentId');
		return $this -> db -> get('attendance') -> result();
	}

	public function getDetails($studentId,$batchId) {
		$this -> db -> where("batchId", $batchId);
		$this -> db -> where("student_batch.studentId", $studentId);
		$this -> db -> join('student_batch', 'attendance.studentBatchId = student_batch.studentBatchId');
		return $this -> db -> get('attendance') -> result();
	}


	public function getCountByDate($batchId, $date) {
		$this -> db -> select('attendanceId');
		$this -> db -> from('attendance');
		$this -> db -> join('student_batch', 'attendance.studentBatchId = student_batch.studentBatchId');
		$this -> db -> where("batchId", $batchId);
		$this -> db -> where("attendanceDate", $date);
		$count = $this -> db -> count_all_results();
		if ($count > 0) {
			return $count;
		}
		return NULL;
	}
	
	
	public function getAttendanceCount($studentId) {
		$this -> db -> select('attendanceId');
		$this -> db -> from('attendance');
		$this -> db -> join('student_batch', 'attendance.studentBatchId = student_batch.studentBatchId');
		$this -> db -> where("batchId", $batchId);
		$this -> db -> where("attendanceDate", $date);
		$count = $this -> db -> count_all_results();
		if ($count > 0) {
			return $count;
		}
		return NULL;
	}

	public function addAttendance($data) {
		if (isset($data)) {
			return $this -> db -> insert('attendance', $data);
		}
		return false;
	}

	public function updateAttendance($data) {
		if (isset($data)) {
			$this -> db -> where('attendanceDate', $data['attendanceDate']);
			$this -> db -> where('studentBatchId', $data['studentBatchId']);
			$this -> db -> set('attendanceIsPresent	', $data['attendanceIsPresent']);
			return $this -> db -> update('attendance', $data);
		}
		return false;
	}

}
?>
