<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class send_notification_model extends CI_Model {

	public function addnotification($data) {
		if (isset($data)) {
			return $this -> db -> insert('notification', $data);
		}
		return false;

	}

}
?>