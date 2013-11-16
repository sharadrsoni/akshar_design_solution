<?php
if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class staff_model extends CI_Model {
        
        public function getDetailsByRole($roleId) {
                $this->db->where("user.roleId", $roleId);
                $this -> db -> from('user');
				
                return $this->db->get()->result();
        }
		
	public function getDetailsById($id)
	{
		$this->db->where("user.userId",$id);
		$this->db->from('user');
		$this->db->join('branch','branch.branchId=user.branchId');
		return $this->db->get()->result();
	}
	
	public function updateProfile($staffData,$id)
	{
		if(isset($staffData))
		{
			$this->db->where("user.userId",$id);
			$this->db->update('user',$staffData);
		}
		else
			{
				return false;
			}
	}
	
	public function getCurrentPassword($id)
	{
		if(isset($id))
		{
			
			$query=$this->db->query('SELECT userPassword from user where userId='.$id);
			$row=$query->row();
			return $row->userPassword;
		}
		else {
			return false;
		}
	}
	
	
	
}