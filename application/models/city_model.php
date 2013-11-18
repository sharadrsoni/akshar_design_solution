<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class city_model extends CI_Model {

	public function getDetailsOfCity() {
		$this -> db -> join('state', 'state.stateId = city.stateId');
		return $this -> db -> get('city') -> result();
	}

	public function getDetailsByCity($cityId) {
		$this -> db -> where('cityId', $cityId);
		return $this -> db -> get('city') -> result();
	}
	
	public function getDetailsByState($stateId) {
		$this -> db -> where('stateId', $stateId);
		return $this -> db -> get('city') -> result();
	}

	public function addcity($data) {
		if (isset($data)) {
			return $this -> db -> insert('city', $data);
		}
		return false;
	}

	public function updatecity($data, $cityId) {
		if (isset($data) && isset($cityId)) {
			$this -> db -> where('cityId', $cityId);
			return $this -> db -> update('city', $data);
		}
		return false;
	}

	public function deleteCity($cityId) {
		if (isset($cityId)) {
			$this -> db -> where('cityId', $cityId);
			$this -> db -> delete('city');
			return false;
		}
		return true;
	}

}
?>