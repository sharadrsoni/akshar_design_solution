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
	
	public function getAllDetails()
	{
		return $this->db->get("course")->result();
	}
}
?>