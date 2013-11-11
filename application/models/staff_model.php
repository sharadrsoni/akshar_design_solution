<?php
if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class staff_model extends CI_Model {
        
        public function getDetailsByRole($roleId) {
                $this->db->where("user.roleId", $roleId);
                $this -> db -> from('user');
                return $this->db->get()->result();
        }
}