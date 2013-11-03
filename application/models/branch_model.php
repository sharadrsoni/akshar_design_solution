<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class branch_model extends CI_Model {

	public function getDetailsOfBranch() {

		$this -> db -> from('branch');
		return $this -> db -> get() -> result();

	}

	public function getAllDetails() {
		return $this -> db -> get("branch") -> result();
	}

	public function addBranch($data) {
		if (isset($data)) {
			//die (print_r($data));
			return $this -> db -> insert('branch', $data);
		} else {
			return false;
		}
	}
	
	public function deleteBranch($branchId) {
		if (isset($branchId)) {
			$this -> db -> where('branchId', $branchId);
			$this -> db -> delete('branch');
			}
	}

}
?>