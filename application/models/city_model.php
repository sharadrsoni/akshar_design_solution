<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class city_model extends CI_Model {

	public function getDetailsBycity() {

		$this -> db -> from('city');
		$this -> db -> join('state', 'state.stateId = city.stateId');
		return $this -> db -> get() -> result();

	}
	public function deleteCity($cityId) {
		if (isset($cityId)) {
			$this -> db -> where('cityId', $cityId);
			$this -> db -> delete('city');
			return false;
		} else {
			return true;
		}
	}
	
	public function addcity($data) {
		if(isset($data)) {
			return $this->db->insert('city', $data);
		} else {
			return false;
		}
	}
}
?>