<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * 
 */
class course_model extends CI_Model {
	
	public function getAllDetails()
	{
		return $this->db->get("course")->result();
	}

	public function getCourseName($courseCode) {
		$this -> db -> where("course.courseCode", $courseCode);
		$this -> db -> from('course');
		return $this -> db -> get() -> result();
	}
		
}
