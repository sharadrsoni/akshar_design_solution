<?php
date_default_timezone_set('UTC');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Ajax_manager extends CI_Controller {
	
	
		function __construct() {
		parent::__construct();
		$users = array(1,2,3,4,5);
		parent::authenticate($users);
	}
		
	//Batch
	public function batch($courseCode) {
		$this -> load -> model('batch_model');
		$this -> load -> model('batch_timing_model');
			$batch_data = $this -> batch_model -> getDetailsByBranchAndCourse($this->branchId, $courseCode);
			$this -> data['batch_list'] = $batch_data;
			$weekdays = Array();
			foreach ($batch_data as $key) {
				$weekdays[$key -> batchId] = $this -> batch_timing_model -> getWeekDays($key -> batchId);
				$timmings[$key -> batchId] = $this -> batch_timing_model -> getBatchTiming($key -> batchId);
			}
			$this -> data['weekdays'] = $weekdays;
			$this -> data['timmings'] = $timmings;
			echo json_encode($this -> data);
	}

	//Student Batch
	public function studentBatch($studentId) {
		$this -> load -> model('student_batch_model');
		$this -> load -> model('batch_model');
		$this -> load -> model('course_model');
			$batch_data = $this -> student_batch_model -> getDetailsByStudent($studentId);
			$this -> data['batch_list'] = $batch_data;
			echo json_encode($this -> data);
	}

	//StudentList
	public function studentlist($batchId) {
		$this -> load -> model('user_model');
			$student_data = $this -> user_model -> getDetailsByBatch($batchId,5,$this -> branchId);
			$this -> data['student_list'] = $student_data;
			echo json_encode($this -> data);
	}

	//StudentList Event
	public function studentlistEvent($batchId) {
		$this -> load -> model('event_attendance_model');
			$student_data = $this -> event_attendance_model -> getDetailsByBatch($batchId,$this -> branchId);
			$this -> data['student_list'] = $student_data;
			echo json_encode($this -> data);
	}


	public function attendancelistbydate($batchId,$date) {
		$this -> load -> model('attendance_model');
			$student_data = $this -> attendance_model -> getDetailsByBatchByDate($batchId,5,$this -> branchId,date("Y-m-d", strtotime($date)));
			$this -> data['student_list'] = $student_data;
			echo json_encode($this -> data);
	}

//Student List For test Marks 
	public function studentlistMarks($testId) {
		$this -> load -> model('test_result_model');
			$student_data = $this -> test_result_model -> studentlistMarks($testId);
			$this -> data['student_list'] = $student_data;
			echo json_encode($this -> data);
	}

		
}
?>	

