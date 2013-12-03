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

	public function getFeeDetailsByBranch($branchCode) {
		$this -> db -> from('fees');
		$this -> db -> join('user', 'fees.studentId = user.userId');
		$this -> db -> where('branchCode', $branchCode);
		return $this -> db -> get() -> result();
	}
	
	public function getRemainingFee($studentId) {
		return $this -> db -> query("SELECT distinct(studentId),((select sum(studentBatchFeeAmount) from student_batch where studentId like '".$studentId."') - (select sum(feesAmount) from fees where studentId like '".$studentId."')) as feeLeft FROM `fees` where studentId like '".$studentId."'") -> result();
	}	

	public function addFee($data) {
		if (isset($data)) {
			return $this -> db -> insert('fees', $data);
		}
		return false;
	}

	public function deleteFees($feesId) {
		if (isset($feesId)) {
			$this -> db -> where('feesId', $feesId);
			$this -> db -> delete('fees');
			return false;
		}
		return true;
	}

	//dashboard
	public function getpaymentOfMonth($branchcode = '') {
		if ($branchcode == '') {
			return $this -> db -> query("SELECT sum(`feesAmount`)as amount,Day(feesDate) as day FROM `fees` WHERE `feesDate`<now()-30 group by `feesDate` order by feesDate") -> result();
		} else {
			return $this -> db -> query("SELECT sum(`feesAmount`)as amount,Day(feesDate) as day FROM `fees` f, `user` u WHERE `feesDate`<now()-30 and u.userId=f.studentId and branchCode='".$branchcode."' group by `feesDate` order by feesDate") -> result();
		}
	}

}
?>