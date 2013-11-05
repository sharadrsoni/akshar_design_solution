<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 *
 */
class role_model extends CI_Model {

	public function getDetailsByRole($roleId) {
		$this -> db -> where("roleId", $roleId);
		$this -> db -> from('role');
		return $this -> db -> get() -> row();
	}

}
