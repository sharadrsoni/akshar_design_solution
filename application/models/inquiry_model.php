<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class inquiry_model extends CI_Model {

	public function getDetailsByinquiry($branchId) {

		$this -> db -> where("inquiry.inquirybranchId", $branchId);
		$this -> db -> from('inquiry');
		
		return $this -> db -> get() -> result();

	}
public function addinquiry($data) {
		if(isset($data)) {
			return $this->db->insert('inquiry', $data);
		} else {
			return false;
<<<<<<< HEAD
		}
	}


 public function deleteinquiry($branchId) {
		if (isset($branchId)) {
			$this -> db -> where('inquirybranchId', $branchId);
			$this -> db -> delete('inquiry');
		}

	}
 
 public function getMaxId()
	{
		return $this->db->select_max('inquiryId')->get('inquiry')->row_array();
	}
 
=======
		}
	}
>>>>>>> bd7dc1ff5d45dc61aa2907e6506cb2d8031d3c2a
}
?>