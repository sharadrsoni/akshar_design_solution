<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class batch_model extends CI_Model {

	public function getMaxId() {
		return $this -> db -> select_max('batchId') -> get('batch') -> row_array();
	}

	public function getDetailsByBranch($branchId) {
		$this -> db -> where("batch.branchId", $branchId);
		$this -> db -> join('course', 'course.courseCode = batch.courseCode');
		$this -> db -> join('user', 'user.userId = batch.facultyId');
		return $this -> db -> get('batch') -> result();
	}

	public function getDetailsByBranchAndBatch($branchId, $batchId) {
		$this -> db -> where("batch.branchId", $branchId);
		$this -> db -> where("batch.batchId", $batchId);
		return $this -> db -> get('batch') -> result();

	}

	public function getDetailsByBranchAndFaculty($branchId, $facultyId) {
		$this -> db -> where("batch.branchId", $branchId);
		$this -> db -> where("batch.facultyId", $facultyId);
		return $this -> db -> get('batch') -> result();
	}

	public function getDetailsByBranchAndCourse($branchId, $courseCode) {
		$this -> db -> where("batch.branchId", $branchId);
		$this -> db -> where("batch.courseCode", $courseCode);
		return $this -> db -> get('batch') -> result();

	}

	public function getCourseId($batchId) {
		$this -> db -> where("batch.batchId", $batchId);
		$this -> db -> from('batch');
		return $this -> db -> get() -> result();
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

}
?>