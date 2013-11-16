<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class event_type_model extends CI_Model {

	public function getDetailsOfEventType() {
		return $this -> db -> get('event_type') -> result();
	}

	public function getDetailsByEventType($eventtypeId) {
		$this -> db -> where('eventTypeId', $eventtypeId);
		return $this -> db -> get('event_type') -> result();
	}

	public function addeventtype($data) {
		if (isset($data)) {
			return $this -> db -> insert('event_type', $data);
		}
		return false;
	}

	public function updateeventtype($data, $eventtypeId) {
		if (isset($data) && isset($eventtypeId)) {
			$this -> db -> where('eventTypeId', $eventtypeId);
			return $this -> db -> update('event_type', $data);
		}
		return false;
	}

	public function deleteEventtype($eventtypeId) {
		if (isset($eventtypeId)) {
			$this -> db -> where('eventTypeId', $eventtypeId);
			$this -> db -> delete('event_type');
			return true;
		}
		return false;
	}

}
?>