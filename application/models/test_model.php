<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class test_model extends CI_Model {

	public function getDetailsBytest() {
	    $this -> db -> from('test');
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