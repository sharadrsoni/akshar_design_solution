<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class user_model extends CI_Model {

	public function getDetailsByBranch($branchId, $roleId) {
		$this->db->where("branchId", $branchId);
		$this->db->where("roleId", $roleId);
		return $this->db->get('user')->result();
	}

}
