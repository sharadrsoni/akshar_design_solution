<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class course_category_model extends CI_Model {

	public function getDetailsOfCourseCategory() {
		return $this -> db -> get('course_category') -> result();
	}
	
	public function getDetailsByCourseCategory($coursecategoryId) {
		$this -> db -> where('courseCategoryId', $coursecategoryId);
		return $this -> db -> get('course_category') -> result();
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
	
	public function updatecoursecategory($data,$coursecategoryId) {
		if(isset($data)) {
			$this -> db -> where('courseCategoryId', $coursecategoryId);
			return $this->db->update('course_category', $data);
		} else {
			return false;
		}
	}
}
?>