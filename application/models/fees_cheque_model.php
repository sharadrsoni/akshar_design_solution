<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class fees_cheque_model extends CI_Model {

	public function deleteFeeCheque($feeId) {
		if (isset($eventtypeId)) {
			$this -> db -> where('feesId', $feeId);
			$this -> db -> delete('fees_cheque');
			return false;
		} else {
			return true;
		}
	}
	
	public function addFeeCheque($data) {
		if(isset($data)) {
			return $this->db->insert('fees_cheque', $data);
		} else {
			return false;
		}
	}
	
}
?>