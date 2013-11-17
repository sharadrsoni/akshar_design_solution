<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class notification_receiver_model extends CI_Model {

	public function addReceiver($data) {
		if (isset($data)) {
			return $this -> db -> insert('notification_receiver', $data);
		}
		return false;
	}

	public function deleteReceiver($notificationReceiverId) {
		if (isset($notificationReceiverId)) {
			$this -> db -> where('notificationReceiverId', $notificationReceiverId);
			$this -> db -> delete('notification_receiver');
			return true;
		}
		return false;
	}

}
?>