<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class notification_model extends CI_Model {

	public function getId($data) {
		$this -> db -> where("notificationDescription", $data['notificationDescription']);
		$this -> db -> where("notificationSendDate", $data['notificationSendDate']);
		$this -> db -> where("userId", $data['userId']);
		return $this -> db -> select('notificationId') -> get('notification') -> row_array();
	}

	public function addNotification($data) {
		if (isset($data)) {
			return $this -> db -> insert('notification', $data);
		}
		return false;
	}

	public function deleteNotification($notificationId) {
		if (isset($notificationId)) {
			$this -> db -> where('notificationId', $notificationId);
			$this -> db -> delete('notification');
			return true;
		}
		return false;
	}

}
?>