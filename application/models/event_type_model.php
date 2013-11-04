<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class event_type_model extends CI_Model {

	public function getDetailsByeventtype() {

		//$this -> db -> where("inquiry.inquirybranchId", $branchId);
		$this -> db -> from('event_type');
		
		return $this -> db -> get() -> result();

	}
	public function deleteEventtype($eventtypeId) {
		if (isset($eventtypeId)) {
			$this -> db -> where('eventTypeId', $eventtypeId);
			$this -> db -> delete('event_type');
			return false;
		} else {
			return true;
		}
	}
	
	public function addeventtype($data) {
		if(isset($data)) {
			return $this->db->insert('event_type', $data);
		} else {
			return false;
		}
	}
}
?>