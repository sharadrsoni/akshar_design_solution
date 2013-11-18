<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class test_model extends CI_Model {

	public function getDetailsBytest() {
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

}
?>