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

	public function getDetails($studentId, $batchId) {
		$this -> db -> where("batchId", $batchId);
		$this -> db -> where("student_batch.studentId", $studentId);
		$this -> db -> join('student_batch', 'attendance.studentBatchId = student_batch.studentBatchId');
		return $this -> db -> get('attendance') -> result();
	}

	public function studentAttendanceList($studentId) {
		return $this -> db -> query("select c.courseCode, c.courseName, count(*) as attendanceCount,100 * count(*)/(select count(*) from attendance a1,batch b1,student_batch sb1 where sb1.studentId = '" . $studentId . "' and b1.batchId = sb1.batchId and b1.courseCode = c.courseCode and sb1.studentBatchId = a1.studentBatchId) as attendancePercent from attendance a,batch b,course c,student_batch sb where attendanceIsPresent = 1 and studentId = '" . $studentId . "' and b.batchId = sb.batchId and b.courseCode = c.courseCode and sb.studentBatchId = a.studentBatchId group by c.courseCode") -> result();
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
