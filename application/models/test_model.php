<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class test_model extends CI_Model {

	public function getDetailsBytest() {

		//$this->db>where("branchId", $batchId);
		
		
		//$this -> db -> where("branch.batchId", $batchId);
	    $this -> db -> from('test');
		
		//$this -> db -> join('batch','batch.branchId = branch.branchId');
		//$this -> db -> join('test', 'test.batchId = batch.batchId');
		return $this -> db -> get() -> result();

	}
	
	
	public function addtest($data) {
		if(isset($data)) {
			return $this->db->insert('test', $data);
		} else {
			return false;

		}
	}


 
 

		}
	

?>