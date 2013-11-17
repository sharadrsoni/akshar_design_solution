<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class fee_model extends CI_Model {

	public function getLastId($data) {
		$this -> db -> where('feesAmount', $data['feesAmount']);
		$this -> db -> where('feesDate', $data['feesDate']);
		$this -> db -> where('feesMode', $data['feesMode']);
		$this -> db -> where('studentId', $data['studentId']);
		return $this -> db -> get('fees') -> row_array();
	}

	public function addFee($data) {
		if (isset($data)) {
			return $this -> db -> insert('fees', $data);
		}
		return false;
	}

	public function getFeeDetailsByBranch($branchId) {
		$this -> db -> from('fees');
		$this -> db -> join('user', 'fees.studentId = user.userId');
		$this -> db -> where('branchId', $branchId);
		return $this -> db -> get() -> result();

	}

	public function deleteFees($feesId) {
		if (isset($feesId)) {
			$this -> db -> where('feesId', $feesId);
			$this -> db -> delete('fees');
			return false;
		}
		return true;
	}

}
?>