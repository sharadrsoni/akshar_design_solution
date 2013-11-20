<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class course_model extends CI_Model {

	public function getDetailsOfCourse() {

		$this -> db -> join('course_category', 'course.courseCategoryId = course_category.courseCategoryId');
		return $this -> db -> get('course') -> result();
	}

	public function getDetailsByCourse($courseCode) {
		$this -> db -> where('course.courseCode', $courseCode);
		$this -> db -> join('course_category', 'course_category.courseCategoryId = course.courseCategoryId');
		return $this -> db -> get('course') -> result();
	}

	public function getDetailsByCategory($courseCategoryId,$studentId) {
		return $this -> db -> query("select course.* from course where courseCategoryId = " . $courseCategoryId . " and courseCode Not In(Select courseCode from student_batch s,batch b where s.batchId = b.batchId and s.studentId = '" . $studentId . "')")->result();
	}

	public function getDetailsCourseCategory($courseCategoryId) {
		$this -> db -> where('course.courseCategoryId', $courseCategoryId);
		return $this -> db -> get('course') -> result();
	}


	public function getCourseCategory() {
		return $this -> db -> get('course_category') -> result();
	}

	public function getCountByCourse($courseCode) {
		$this -> db -> where("courseCode", $courseCode);
		$this -> db -> from('course');
		return $this -> db -> count_all_results();
	}

	public function getDetailsNotCourse($courseCode) {
		$this -> db -> query("Select * from course where courseCode Not In(" . $courseCode . ")");
		return $this -> db -> get('course') -> result();
		$this -> db -> query('YOUR QUERY HERE');
	}

	public function addCourse($data) {
		if (isset($data)) {
			return $this -> db -> insert('course', $data);
		}
		return false;
	}

	public function updateCourse($data, $courseCode) {
		if (isset($data)) {
			$this -> db -> where('courseCode', $courseCode);
			return $this -> db -> update('course', $data);
		}
		return false;
	}

	public function deleteCourse($courseCode) {
		if (isset($courseCode)) {
			$this -> db -> where('courseCode', $courseCode);
			return $this -> db -> delete('course');
		}
		return false;
	}

	public function checkBooks($courseCode) {
		$this -> db -> where("course.courseCode", $courseCode);
		$this -> db -> where("(select SUM(inventoryInwardQuantity) from inventory_inward i where i.courseCode = course.courseCode) > (select count(*) from batch b,student_batch sb where b.courseCode = course.courseCode and StudentBatchHasReceivedSet = 1)");

		return $this -> db -> select('courseCode') -> get('course') -> row_array();
	}

}
?>
