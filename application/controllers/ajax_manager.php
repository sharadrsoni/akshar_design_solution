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

		
}
?>	

