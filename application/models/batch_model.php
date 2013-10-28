<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class batch_model extends CI_Model {

	public function getDetailsByBranch($branchId) {

		$this -> db -> where("batch.branchId", $branchId);
		$this -> db -> from('batch');
		$this -> db -> join('course', 'course.courseCode = batch.courseCode');
		$this -> db -> join('user', 'user.userId = batch.facultyId');
		return $this -> db -> get() -> result();

	}

	public function deleteBatch($batchId) {
		if (isset($batchId)) {
			$this -> db -> where('batchId', $batchId);
			$this -> db -> delete('batch');
		}

	}

	public function addBatch($data) {
		if(isset($data)) {
			return $this->db->insert('batch', $data);
		} else {
			return false;
		}
	}
	
	public function getMaxId()
	{
		return $this->db->select_max('batchId')->get('batch')->row_array();
	}

}
