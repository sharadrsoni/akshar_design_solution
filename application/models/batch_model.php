<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class batch_model extends CI_Model {

	public function getMaxId() {
		//die("yes");
		$dataResponse = $this -> db -> like('batchId', $year . $branchCode, "after") -> get('batch') -> result();
		//die(print_r($dataResponse));
		$minimum = 0;
		foreach ($dataResponse as $key) {
			$threeDigit = substr($key -> batchId, 7, 9);
			if ($minimum < intval($threeDigit)) {
				$minimum = intval($threeDigit);
			}
		}
		$minimum += 1;
		if ($minimum > 999) {
			return 0;
		}
		if ($minimum < 10) {
			$minimum = "00" . $minimum;
		} else if ($minimum < 100 && $minimum > 9) {
			$minimum = "0" . $minimum;
		}
		return $minimum;
	}

	public function getDetailsByBranch($branchCode) {
		$this -> db -> where("batch.branchCode", $branchCode);
		$this -> db -> join('course', 'course.courseCode = batch.courseCode');
		$this -> db -> join('user', 'user.userId = batch.facultyId');
		return $this -> db -> get('batch') -> result();
	}

	public function getDetailsBranch($branchCode) {

		$this -> db -> where("branchCode", $branchCode);
		$this -> db -> from('batch');
		return $this -> db -> get() -> result();

	}

	public function getDetailsByBranchAndBatch($branchCode, $batchId) {
		$this -> db -> where("batch.branchCode", $branchCode);
		$this -> db -> where("batch.batchId", $batchId);
		return $this -> db -> get('batch') -> result();
	}

	public function getDetailsByBranchAndFaculty($branchCode, $facultyId) {
		$this -> db -> where("batch.branchCode", $branchCode);
		$this -> db -> where("batch.facultyId", $facultyId);
		return $this -> db -> get('batch') -> result();
	}

	public function getDetailsByBranchAndCourse($branchCode, $courseCode) {

		$this -> db -> where("batchStrength - (select count(*) from student_batch where batch.batchId)", NULL, FALSE);
		$this -> db -> where("batch.branchCode", $branchCode);
		$this -> db -> where("batch.courseCode", $courseCode);
		return $this -> db -> get('batch') -> result();
	}

	public function addBatch($data) {
		if (isset($data)) {
			return $this -> db -> insert('batch', $data);
		}
		return false;
	}

	public function updateBatch($data) {
		if (isset($data)) {
			$this -> db -> where('batchId', $data['batchId']);
			return $this -> db -> update('batch', $data);
		}
		return false;
	}

	public function deleteBatch($batchId) {
		if (isset($batchId)) {
			$this -> db -> where('batchId', $batchId);
			$this -> db -> delete('batch');
			return true;
		}
		return false;
	}

	public function getBatchLimit($batchId) {
		$this -> db -> where("batchId", $batchId);
		return $this -> db -> select('batchStrength') -> get('batch') -> row_array();
	}

	public function getCourseId($batchId) {
		$this -> db -> where("batch.batchId", $batchId);
		$this -> db -> from('batch');
		return $this -> db -> get() -> result();
	}

}
?>
