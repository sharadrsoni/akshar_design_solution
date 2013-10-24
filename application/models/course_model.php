<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 *
 */
class course_model extends CI_Model {

	public function getDetailsByCourse($courseId) {
		return $this->db -> where("courseId", $courseId) -> get("course") -> row();
	}

}
