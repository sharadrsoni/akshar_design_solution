<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class batch_timing_model extends CI_Model {

	public function getWeekDays($batchId) {
		if (isset($batchId)) {
			$data = $this -> db -> where("batchId", $batchId) -> get("batch_timing") -> result();
			$count = 1;
			$weekdays = "";
			foreach ($data as $key) {
				$day;
				switch ($key->batchTimingWeekday) {
					case 1 :
						$day = "Monday";
						break;
					case 2 :
						$day = "Tuesday";
						break;
					case 3 :
						$day = "Wednesday";
						break;
					case 4 :
						$day = "Thursday";
						break;
					case 5 :
						$day = "Friday";
						break;
					case 6 :
						$day = "Saturday";
						break;
					case 7 :
						$day = "Sunday";
						break;
				}
				if ($count == 1) {
					$weekdays .= $day;
				} else {
					$weekdays .= ", " . $day;
				}
				$count++;
			}
			return $weekdays;
		} else {
			return null;
		}
	}
	
	public function getBatchTiming($batchId) {
		if (isset($batchId)) {
			return $this -> db -> where("batchId", $batchId) -> get("batch_timing") -> result();
		} else {
			return null;
		}
	}

	public function addBatchTime($data) {
		if (isset($data)) {
			if ($data['batchTimingWeekday'] >= 1 && $data['batchTimingWeekday'] <= 7) {
				$this -> db -> insert('batch_timing', $data);
				return true;
			} else {
				return false;
			}
		}
	}

	public function updateBatchTime($data) {
		if (isset($data)) {
			if ($data['batchTimingWeekday'] >= 1 && $data['batchTimingWeekday'] <= 7) {
				$this -> db -> where("batchId", $data['batchId']);
				$this -> db -> update('batch_timing', $data);
				return true;
			} else {
				return false;
			}
		}
	}

	public function deleteDetailsByBatch($batchId) {
		$this->where("batchId", $batchId);
		$this->db->delete("batch_timing");
	}

}
?>