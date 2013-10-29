<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class inquiry_model extends CI_Model {

	public function getDetailsByinquiry($branchId) {

		$this -> db -> where("inquiry.inquirybranchId", $branchId);
		$this -> db -> from('inquiry');
		
		return $this -> db -> get() -> result();

	}
public function addinquiry($data) {
		if(isset($data)) {
			return $this->db->insert('inquiry', $data);
		} else {
			return false;
		}
	}
}
?>