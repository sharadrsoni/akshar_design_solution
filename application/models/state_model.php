<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class state_model extends CI_Model {

	public function getDetailsOfState() {
		return $this -> db -> get('state') -> result();
	}

	public function getDetailsByState($stateId) {
		$this -> db -> where('stateId', $stateId);
		return $this -> db -> get('state') -> result();
	}

	public function addstate($data) {
		if (isset($data)) {
			return $this -> db -> insert('state', $data);
		}
		return false;
	}

	public function updatestate($data, $stateId) {
		if (isset($data) && isset($stateId)) {
			$this -> db -> where('stateId', $stateId);
			return $this -> db -> update('state', $data);
		}
		return false;
	}

	public function deleteState($stateId) {
		if (isset($stateId)) {
			$this -> db -> where('stateId', $stateId);
			$this -> db -> delete('state');
			return false;
		}
		return true;
	}

}
?>