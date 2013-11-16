<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class branch_model extends CI_Model {

	public function getDetailsOfBranch() {
		return $this -> db -> get("branch") -> result();
	}

	public function getDetailsByBranch($branchId) {
		$this -> db -> where("branchId", $branchId);
		return $this -> db -> get('branch') -> result();
	}

	public function addBranch($data) {
		if (isset($data)) {
			//die (print_r($data));
			return $this -> db -> insert('branch', $data);
		}
		return false;
	}

	public function updateBranch($data, $branchId) {
		if (isset($data) && isset($branchId)) {
			$this -> db -> where('branchId', $branchId);
			return $this -> db -> update('branch', $data);
		}
		return false;
	}

	public function deleteBranch($branchId) {
		if (isset($branchId)) {
			$this -> db -> where('branchId', $branchId);
			$this -> db -> delete('branch');
			return true;
		}
		return false;
	}

}
?>