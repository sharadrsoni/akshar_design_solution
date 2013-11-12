<?php
   if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class book_inventory_model extends CI_Model {

		
	public function getDetailsByBook($branchId) {
		$this -> db -> where('branchId', $branchId);
		return $this -> db -> get('inventory_inward') -> result();
	}
	
	public function deleteInventory($inventoryInwardId) {
		if (isset($inventoryInwardId)) {
			$this -> db -> where('inventoryInwardId', $inventoryInwardId);
			$this -> db -> delete('inventory_inward');
			return false;
		} else {
			return true;
		}
	}
	
	public function addinventory($data) {
		if(isset($data)) {
			return $this->db->insert('inventory_inward', $data);
		} else {
			return false;
		}
	}
	
}
?>