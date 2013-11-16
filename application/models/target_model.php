<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class target_model extends CI_Model {

	public function getDetailsOfTarget() {
		$this -> db -> from('target');
		$this -> db -> join('target_type', 'target.targetTypeId = target_type.targetTypeId');
		return $this -> db -> get() -> result();
	}

	public function getDetailsByTarget($targetId) {
		$this -> db -> where('targetId', $targetId);
		$this -> db -> from('target');
		return $this -> db -> get() -> result();
	}

	public function deleteTarget($targetId) {
		if (isset($targetId)) {
			$this -> db -> where('targetId', $targetId);
			$this -> db -> delete('target');
		}
	}

	public function addTarget($data) {
		if (isset($data)) {
			return $this -> db -> insert('target', $data);
		} else {
			return false;
		}
	}

	public function updateTarget($data, $targetId) {
		if (isset($data) && isset($targetId)) {
			$this -> db -> where('targetId', $targetId);
			return $this -> db -> update('target', $data);
		} else {
			return false;
		}
	}

	public function getPendingCount() {
		$this -> db -> where('targetIsAchieved', 1);
		$this -> db -> from('target');
		$count = $this -> db -> count_all_results();
		return $count;
	}

}
