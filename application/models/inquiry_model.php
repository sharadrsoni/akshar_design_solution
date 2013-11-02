<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class inquiry_model extends CI_Model {

	public function getDetailsByinquiry($branchId) {

		$this -> db -> where("inquiry.inquirybranchId", $branchId);
		$this -> db -> from('inquiry');
		
		return $this -> db -> get() -> result();

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


 
 public function getMaxId()
	{
		return $this->db->select_max('inquiryId')->get('inquiry')->row_array();
	}
 

		}
	

?>