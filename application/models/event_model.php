<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class event_model extends CI_Model {

	public function getDetailsByBranch($branchId) {
		$this -> db -> where("event.branchId", $branchId);
		return $this -> db -> get('event') -> result();
	}
	
	public function getDetailsByEventBranch($branchId,$eventId) {
		$this -> db -> where("event.branchId", $branchId);
		$this -> db -> where('eventId', $eventId);
		return $this -> db -> get('event') -> result();
	}

	public function deleteEvent($eventId) {
		if (isset($eventId)) {
			$this -> db -> where('eventId', $eventId);
			$this -> db -> delete('event');
		}
	}
	
	public function addEvent($data) {
		if(isset($data)) {
			return $this->db->insert('event', $data);
		} else {
			return false;
		}
	}
	
	public function updateEvent($data,$eventId) {
		if(isset($data)) {
			$this -> db -> where('eventId', $eventId);
			return $this->db->update('event', $data);
		} else {
			return false;
		}
	}
	
}
