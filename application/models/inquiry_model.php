<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class inquiry_model extends CI_Model {

	public function getDetailsOfInquiry($branchCode) {
		$this -> db -> where("inquiry.inquirybranchCode", $branchCode);
		return $this -> db -> get('inquiry') -> result();
	}
	
	public function getDetailsByInquiry($branchCode,$inquiryId) {
		$this -> db -> where('inquiryId', $inquiryId);
		$this -> db -> where("inquiry.inquirybranchCode", $branchCode);
		return $this -> db -> get('inquiry') -> result();
	}
	
	public function deleteInquiry($inquiryId) {
		if (isset($inquiryId)) {
			$this -> db -> where('inquiryId', $inquiryId);
			$this -> db -> delete('inquiry');
			return false;
		} else {
			return true;
		}
	}
	
	public function addinquiry($data) {
		if(isset($data)) {
			return $this->db->insert('inquiry', $data);
		} else {
			return false;
		}
	}
	
	public function updateinquiry($data,$inquiryId) {
		if(isset($data)) {
			$this -> db -> where('inquiryId', $inquiryId);
			return $this->db->update('inquiry', $data);
		} else {
			return false;
		}
	}
}
?>