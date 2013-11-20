<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class target_report_model extends CI_Model {
	public function getDetailsByBranch($branchCode) {
		$this -> db -> where("target.branchCode", $branchCode);
		$this -> db -> from('target');
		$this -> db -> join('target_type', 'target.targetTypeId = target_type.targetTypeId');
		return $this -> db -> get() -> result();
	}

	
	public function addReport($data) {
		if (isset($data)) {
			$this -> db -> insert('target_report', $data);
		}
		return false;
	}
	
	public function getTargetReports($targetId)
	{
		$this -> db -> where('target_report.targetId',$targetId);
		return $this -> db -> get('target_report') -> result();
	}
}
?>