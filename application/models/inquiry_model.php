<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class inquiry_model extends CI_Model {

	public function getDetailsByinquiry($branchId) {

		$this -> db -> where("inquiry.inquirybranchId", $branchId);
		$this -> db -> from('inquiry');
		//$this -> db -> join('course', 'course.courseId = batch.courseId');
		//$this -> db -> join('user', 'user.userId = batch.facultyId');
		return $this -> db -> get() -> result();

	}

	/*public function deleteBatch($batchId) {
		if (isset($batchId)) {
			$this -> db -> where('batchId', $batchId);
			$this -> db -> delete('batch');
		}

	}*/
}
?>