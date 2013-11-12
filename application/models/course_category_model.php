<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class course_category_model extends CI_Model {

	public function getDetailsBycoursecategory() {

		//$this -> db -> where("inquiry.inquirybranchId", $branchId);
		$this -> db -> from('course_category');
		
		return $this -> db -> get() -> result();

	}
	public function deleteCoursecategory($coursecategoryId) {
		if (isset($coursecategoryId)) {
			$this -> db -> where('courseCategoryId', $coursecategoryId);
			$this -> db -> delete('course_category');
			return false;
		} else {
			return true;
		}
	}
	
	public function addcoursecategory($data) {
		if(isset($data)) {
			return $this->db->insert('course_category', $data);
		} else {
			return false;
		}
	}
}
?>