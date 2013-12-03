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
		$laterPert = $this->db->query("select sum(feesAmount) as fees from fees where studentId like '" . $studentId . "'")->row();
		if($laterPert->fees == null) {
			$laterPert->fees = 0;
		}
		return $this -> db -> query("Select distinct(studentId),(sum(studentBatchFeeAmount) -" . $laterPert->fees .") as feeLeft from student_batch where studentId like '" . $studentId . "'") -> result();
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
			return $this -> db -> query("SELECT sum(`feesAmount`)as amount,Day(feesDate) as day FROM `fees` WHERE `feesDate`<now()-30 group by `feesDate` order by Day") -> result();
		} else {
			return $this -> db -> query("SELECT sum(`feesAmount`)as amount,Day(feesDate) as day FROM `fees` f, `user` u WHERE `feesDate`<now()-30 and u.userId=f.studentId and branchCode='" . $branchcode . "' group by `feesDate` order by Day") -> result();
		}
	}

}
?>