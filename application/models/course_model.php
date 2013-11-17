<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class course_model extends CI_Model {

	public function getDetailsOfCourse() {
		return $this -> db -> get('course') -> result();
	}
	
	public function getDetailsByCourse($courseCode) {
		$this -> db -> where('courseCode', $courseCode);
		return $this -> db -> get('course') -> result();
	}

	public function getDetailsNotCourse($courseCode) {
		$this->db->where_not_in('courseCode', $courseCode);
		return $this -> db -> get('course') -> result();
	}

	public function addCourse($data) {
		if (isset($data)) {
			return $this -> db -> insert('course', $data);
		} else {
			return false;
		}
	}
	
	public function updateCourse($data,$courseCode) {
		if (isset($data)) {
			$this -> db -> where('courseCode', $courseCode);
			return $this -> db -> update('course', $data);
		} else {
			return false;
		}
	}

	public function deleteCourse($courseCode) {
		if (isset($courseCode)) {
			$this -> db -> where('courseCode', $courseCode);
			$this -> db -> delete('course');
		}
	}

	public function getCourseName($courseCode) {
		$this -> db -> where("course.courseCode", $courseCode);
		$this -> db -> from('course');
		return $this -> db -> get() -> result();
	}

	public function checkBooks($courseCode) {
		$this -> db -> where("course.courseCode", $courseCode);
		$this -> db -> where("(select SUM(inventoryInwardQuantity) from inventory_inward i where i.courseId = course.courseCode) > (select count(*) from batch b,student_batch sb where b.courseCode = course.courseCode and StudentBatchHasReceivedSet = 1)");
		
		return $this -> db -> select('courseCode') -> get('course') -> row_array();
	}

}
?>
