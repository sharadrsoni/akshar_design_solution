<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class student_batch_model extends CI_Model {
	
	public function getAllDetails() {
		return $this->db->get("student_batch")->result();
	}
	
	public function getDetailsByStudent($studentId) {
		$this -> db -> where("studentId", $studentId);
		$this -> db -> from('student_batch');
		return $this -> db -> get() -> result();
	}
	
	public function addStudentbatch($data) {
		if(isset($data)) {
			return $this->db->insert('student_batch', $data);
		} else {
			return false;
		}
	}
}
?>