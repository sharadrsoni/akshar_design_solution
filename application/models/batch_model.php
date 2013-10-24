<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class batch_model extends CI_Model {

	public function getDetailsByBranch($branchId) {
		//$this -> db -> select('batch.batchId', 'course.courseName', 'user.wusername');
		$this -> db -> where("batch.branchId", $branchId);
		$this -> db -> from('batch');
		$this -> db -> join('course', 'course.courseId = batch.courseId');
		$this -> db -> join('user', 'user.userId = batch.facultyId');
		return $this -> db -> get() -> result();

	}

}
