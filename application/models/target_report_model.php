<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class target_report_model extends CI_Model {
	public function getDetailsByBranch($branchId) {

		$this -> db -> where("target.branchId", $branchId);
		$this -> db -> from('target');
		$this -> db -> join('target_type', 'target.targetTypeId = target_type.targetTypeId');
		return $this -> db -> get() -> result();

	}

	public function addReport($data) {

	if(isset($data))
	{
		$this -> db -> insert('target_report', $data);
	}
	else {
		return false;
	}
	}
	

}
?>