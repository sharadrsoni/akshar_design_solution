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
				if ($count == 1) {
					$weekdays .= $key -> batchTimingWeekday;
				} else {
					$weekdays .= ", " . $key -> batchTimingWeekday;
				}
				$count++;
			}
			return $weekdays;
		} else {
			return null;
		}
	}

}
?>