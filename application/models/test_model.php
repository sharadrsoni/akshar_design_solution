<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class test_model extends CI_Model {

	public function getDetailsBytest($facultyId) {
		$this -> db -> where('facultyId', $facultyId);
		$this -> db -> join('batch', 'test.batchId = batch.batchId');
		return $this -> db -> get('test') -> result();
	}

	public function getTestStudentDetails($testId) {
		$this -> db -> join('student_batch', 'test.batchId = student_batch.batchId');
		$this -> db -> where('testId', $testId);
		return $this -> db -> get('test') -> result();
	}

	public function addtest($data) {
		if (isset($data)) {
			return $this -> db -> insert('test', $data);
		}
		return false;
	}

	//update Test details
	public function updateTest($testRemarks, $testId) {
		if (isset($testRemarks)) {
			$this -> db -> where("test.testId", $testId);
			return $this -> db -> update('test', $testRemarks);
		}
		return false;
	}

}
?>