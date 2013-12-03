<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class inquiry_model extends CI_Model {

	public function getDetailsOfInquiry($branchCode) {
		$this -> db -> where("inquiry.inquirybranchCode", $branchCode);
		return $this -> db -> get('inquiry') -> result();
	}

	public function getDetailsByInquiry($branchCode, $inquiryId) {
		$this -> db -> where('inquiryId', $inquiryId);
		$this -> db -> where("inquiry.inquirybranchCode", $branchCode);
		$this -> db -> join('course', 'course.courseCode = inquiry.courseCode');
		$this -> db -> join('city', 'city.cityId = inquiry.cityId');
		$this -> db -> join('state', 'state.stateId = inquiry.stateId');
		return $this -> db -> get('inquiry') -> result();
	}

	public function getNewInquiryCount($branchcode = '') {
		//$this -> db -> where('targetIsAchieved',);
		$this -> db -> from('inquiry');
		if ($branchcode != '') {
			$this -> db -> where('inquirybranchCode', $branchcode);
		}
		$count = $this -> db -> count_all_results();
		return $count;
	}

	//dashboard
	public function getstudentinquiryCountOfMonth($branchcode = '') {
		if ($branchcode == '') {
			return $this -> db -> query("SELECT Count(`inquiryId`)as count,Day(inquiryDate) as day FROM `inquiry` WHERE `inquiryDate`<now()-30 group by `inquiryDate` order by inquiryDate") -> result();
		} else {
			return $this -> db -> query("SELECT Count(`inquiryId`)as count,Day(inquiryDate) as day FROM `inquiry` WHERE `inquiryDate`<now()-30 and inquirybranchCode='" . $branchcode . "' group by `inquiryDate` order by inquiryDate") -> result();
		}
	}

	public function addinquiry($data) {
		if (isset($data)) {
			return $this -> db -> insert('inquiry', $data);
		} else {
			return false;
		}
	}

	public function updateinquiry($data, $inquiryId) {
		if (isset($data)) {
			$this -> db -> where('inquiryId', $inquiryId);
			return $this -> db -> update('inquiry', $data);
		}
		return false;
	}

	public function deleteInquiry($inquiryId) {
		if (isset($inquiryId)) {
			$this -> db -> where('inquiryId', $inquiryId);
			$this -> db -> delete('inquiry');
			return false;
		}
		return true;
	}

}
?>