<?php
if (!defined('BASEPATH'))
        exit('No direct script access allowed');
class student_model extends CI_Model
{
	 public function getDetailsById($id)
	{
		$this->db->where("user.userId",$id);
		$this->db->from('user');
		$this->db->join('student_profile',$id);
		$this->db->join('branch','branch.branchId=user.branchId');
		return $this->db->get()->result();
	}
	
	
	public function updateStudentProfile($otherData,$id)
	{
		if(isset($otherData))
		{
			$this->db->where("student_profile.studentUserId",$id);
			$this->db->update('student_profile',$otherData);
		}
		else
			{
				return false;
			}
	}
}
?>