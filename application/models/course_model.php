<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class course_model extends CI_Model {

	public function getDetailsOfCourse() {

		$this -> db -> from('course');
		return $this -> db -> get() -> result();

	}

	public function getAllDetails() {
		return $this -> db -> get("course") -> result();
	}

	public function addCourse($data) {
		if (isset($data)) {
			die(print_r($data));
			return $this -> db -> insert('course', $data);
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

}
?>
