<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class target_type_model extends CI_Model {

	public function getDetailsOfTargetType() {
		return $this -> db -> get("target_type") -> result();
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
		if (isset($data)) {
			return $this -> db -> insert('target_type', $data);
		} else {
			return false;
		}
	}
}
?>
