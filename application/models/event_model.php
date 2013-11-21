<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class event_model extends CI_Model {

	public function getDetailsByBranch($branchCode) {
		$this -> db -> where("event.branchCode", $branchCode);
		$this -> db -> join('city', 'city.cityId = event.cityId');
		$this -> db -> join('state', 'state.stateId = event.stateId');
		return $this -> db -> get('event') -> result();
	}
	
	public function getDetailsByEventBranch($branchCode,$eventId) {
		$this -> db -> where("event.branchCode", $branchCode);
		$this -> db -> where('eventId', $eventId);
		$this -> db -> join('event_type', 'event.eventTypeId = event_type.eventTypeId');
		$this -> db -> join('user', 'user.userId = event.facultyId');
		return $this -> db -> get('event') -> result();
	}
	
	//Calender
	public function geteventForCalender($branchcode = '') {
		if ($branchcode == '') {
		return $this-> db -> query("SELECT eventName,year(eventStartDate)-year(now()) SY,month(eventStartDate)-month(now()) SM, day(eventStartDate)-day(now()) SD,year(eventEndDate)-year(now()) EY, month(eventEndDate)-month(now()) EM, day(eventEndDate)-day(now()) ED  FROM `event` where eventStartDate>now()")->result();
		} else {
			return $this-> db -> query("SELECT eventName,year(eventStartDate)-year(now()) SY,month(eventStartDate)-month(now()) SM, day(eventStartDate)-day(now()) SD,year(eventEndDate)-year(now()) EY, month(eventEndDate)-month(now()) EM, day(eventEndDate)-day(now()) ED  FROM `event` where eventStartDate>now() and branchCode='".$branchcode."'")->result();
		}
	}

	public function addEvent($data) {
		if (isset($data)) {
			return $this -> db -> insert('event', $data);
		}
		return false;
	}

	public function updateEvent($data, $eventId) {
		if (isset($data)) {
			$this -> db -> where('eventId', $eventId);
			return $this -> db -> update('event', $data);
		}
		return false;
	}

	public function deleteEvent($eventId) {
		if (isset($eventId)) {
			$this -> db -> where('eventId', $eventId);
			$this -> db -> delete('event');
			return true;
		}
		return false;
	}

}
?>
