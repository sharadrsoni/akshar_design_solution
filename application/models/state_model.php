<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class state_model extends CI_Model {

	public function getDetailsBystate() {

		//$this -> db -> where("inquiry.inquirybranchId", $branchId);
		$this -> db -> from('state');
		
		return $this -> db -> get() -> result();

	}
	public function deleteState($stateId) {
		if (isset($stateId)) {
			$this -> db -> where('stateId', $stateId);
			$this -> db -> delete('state');
			return false;
		} else {
			return true;
		}
	}
	
	public function addstate($data) {
		if(isset($data)) {
			return $this->db->insert('state', $data);
		} else {
			return false;
		}
	}
}
?>