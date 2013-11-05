<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class user_model extends CI_Model {

	public function getDetailsByBranch($branchId, $roleId) {
		$this -> db -> where("branchId", $branchId);
		$this -> db -> where("roleId", $roleId);
		return $this -> db -> get('user') -> result();
	}

	public function authenticate($data) {
		if (isset($data)) {
			$this -> db -> where("userId", $data['userId']);
			$this -> db -> where("userpassword", $data['userPassword']);
			$getResult = $this -> db -> get("user");
			if ($getResult -> num_rows() == 1) {
				return $getResult -> row() -> roleId;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

}
