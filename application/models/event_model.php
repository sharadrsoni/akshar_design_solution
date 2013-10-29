<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class event_model extends CI_Model {

	public function getDetailsByBranch($branchId) {

		$this -> db -> where("event.branchId", $branchId);
		$this -> db -> from('event');
		$this -> db -> join('event_type', 'event.eventTypeId = event_type.eventTypeId');
		return $this -> db -> get() -> result();

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
	
}
