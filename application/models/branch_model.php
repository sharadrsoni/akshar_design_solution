<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class branch_model extends CI_Model {

	public function getDetailsOfBranch() {
		return $this->db->get("branch")->result();
	}
	
	public function getDetailsByBranch($branchCode) {
		$this -> db -> where("branchCode", $branchCode);
		$this -> db -> from('branch');
		return $this -> db -> get() -> result();
	}

	public function addBranch($data) {
		if (isset($data)) {
			//die (print_r($data));
			return $this -> db -> insert('branch', $data);
		} else {
			return false;
		}
	}
	
	public function deleteBranch($branchCode) {
		if (isset($branchCode)) {
			$this -> db -> where('branchCode', $branchCode);
			$this -> db -> delete('branch');
			}
	}

	public function updateBranch($data,$branchCode) {
		if (isset($data) && isset($branchCode)) {
			$this -> db -> where('branchCode',$branchCode);
			return $this -> db -> update('branch', $data);
		} else {
			return false;
		}
	}
}
?>