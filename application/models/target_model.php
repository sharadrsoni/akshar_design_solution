<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class target_model extends CI_Model {

	public function getDetailsByBranch($branchId) {

		$this -> db -> where("target.branchId", $branchId);
		$this -> db -> from('target');
		$this -> db -> join('target_type', 'target.targetTypeId = target_type.targetTypeId');
		return $this -> db -> get() -> result();

	}

	public function deleteTarget($targetId) {
		if (isset($targetId)) {
			$this -> db -> where('targetId', $targetId);
			$this -> db -> delete('target');
		}

	}
	
	public function addTarget($data) {
		if(isset($data)) {
			return $this->db->insert('target', $data);
		} else {
			return false;
		}
	}

}
