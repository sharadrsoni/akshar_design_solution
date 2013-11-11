<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class target_type_model extends CI_Model {

	public function getDetailsBytargettype() {

		//$this -> db -> where("inquiry.inquirybranchId", $branchId);
		$this -> db -> from('target_type');
		
		return $this -> db -> get() -> result();

	}
	public function deleteTargettype($targettypeId) {
		if (isset($targettypeId)) {
			$this -> db -> where('targetTypeId', $targettypeId);
			$this -> db -> delete('target_type');
			return false;
		} else {
			return true;
		}
	}
	
	public function addtargettype($data) {
		if(isset($data)) {
			return $this->db->insert('target_type', $data);
		} else {
			return false;
		}
	}
}
?>