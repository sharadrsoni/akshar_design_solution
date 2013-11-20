<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class test_result_model extends CI_Model {

	public function studentlistMarks($testId) {
		$this -> db -> where("test.testId", $testId);
		$this -> db -> join('student_batch', 'test.batchId = student_batch.batchId');
		$this -> db -> join('user', 'user.userId = student_batch.studentId');
		$this -> db -> join('test_result', 'student_batch.studentBatchId = test_result.studentBatchId', 'left outer');
		$this -> db -> select('student_batch.studentbatchId, test.testRemarks , test.testId, userFirstName , userMiddleName , userLastName , studentId , testResultObtainedMarks');
		return $this -> db -> get('test') -> result();
	}

	public function listMarksByStudent($studentId) {
		return $this -> db -> query("select t.testId, testName,testDate, studentId , testResultObtainedMarks,t.testMaximumMarks, Max(testResultObtainedMarks) as testMax from test t,test_result rt,student_batch sb where studentId = '" . $studentId . "' and t.batchId = sb.batchId and sb.studentBatchId = rt.studentBatchId group by t.testId") -> result();
	}


	public function getCountByTestStudent($testId, $studentBatchId) {
		$this -> db -> select('attendanceId');
		$this -> db -> from('test_result');
		$this -> db -> where("testId", $testId);
		$this -> db -> where("studentBatchId", $studentBatchId);
		$count = $this -> db -> count_all_results();
		if ($count > 0) {
			return $count;
		}
		return NULL;
	}

	public function addResult($data) {
		if (isset($data)) {
			return $this -> db -> insert('test_result', $data);
		}
		return false;
	}

	public function updateResult($data) {
		if (isset($data)) {
			$this -> db -> where('testId', $data['testId']);
			$this -> db -> where('studentBatchId', $data['studentBatchId']);
			$this -> db -> set('testResultObtainedMarks	', $data['testResultObtainedMarks']);
			return $this -> db -> update('test_result', $data);
		}
		return false;
	}

	public function deleteResult($studentBatchId, $testId) {
		if (isset($studentId)) {
			$this -> db -> where('studentBatchId', $studentBatchId);
			$this -> db -> where('testId', $testId);
			$this -> db -> delete('test_result');
			return true;
		}
		return false;
	}

}
?>