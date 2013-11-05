<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Branch_Manager extends CI_Controller {

	//Dashboard
	public function index() {
		$data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/dashboard_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/dashboard');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Event
	public function event() {
		$data['title'] = "ADS | Event";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/event_css');
		$this -> load -> view('backend/master_page/header');
		$branchId = 01;
		$roleId = 1;
		$this -> load -> model("event_type_model");
		$event_type = $this -> event_type_model -> getAllDetails();
		$this -> load -> model('user_model');
		$facultyName = $this -> user_model -> getDetailsByBranch($branchId, $roleId);
		$data['event_type'] = $event_type;
		$data['faculty'] = $facultyName;
		$this -> load -> model('event_model');
		if (isset($_POST['create'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('event_type_id', 'Event Type', 'required|trim');
			$this -> form_validation -> set_rules('faculty_id', 'Faculty Name', 'required|trim');
			$this -> form_validation -> set_rules('start_date', 'Start Date', 'required|trim');
			$this -> form_validation -> set_rules('end_date', 'End Date', 'required|trim');
			$this -> form_validation -> set_rules('event_name', 'Event Name', 'required|trim');
			$this -> form_validation -> set_rules('description', 'Description', 'required|trim');
			$this -> form_validation -> set_rules('street_1', 'Address 1', 'required|trim');
			$this -> form_validation -> set_rules('street_2', 'Address 2', 'required|trim');
			$this -> form_validation -> set_rules('organize_by', 'Organize By', 'required|trim');
			$this -> form_validation -> set_rules('state', 'State', 'required|trim');
			$this -> form_validation -> set_rules('city', 'City', 'required|trim');
			$this -> form_validation -> set_rules('pin_code', 'Pin Code', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$data['validate'] = true;
			} else {
				$eventData = array('eventName' => $_POST['event_name'], 'eventDescription' => $_POST['description'], 'eventStreet1' => $_POST['street_1'], 'eventStreet2' => $_POST['street_2'], 'eventCity' => $_POST['city'], 'eventState' => $_POST['state'], 'eventPinCode' => $_POST['pin_code'], 'eventOrganizerName' => $_POST['organize_by'], 'branchId' => $branchId, 'facultyId' => $_POST['faculty_id'], 'eventTypeId' => $_POST['event_type_id'], 'eventStartDate' => date("Y-m-d", strtotime($_POST['start_date'])), 'eventEndDate' => date("Y-m-d", strtotime($_POST['end_date'])));
				if ($this -> event_model -> addEvent($eventData)) {
					redirect(base_url() . "branch_manager/event");
				} else {
					$data['error'] = "An Error Occured.";
				}
			}
		}
		$event_data = $this -> event_model -> getDetailsByBranch($branchId);
		$data['event_list'] = $event_data;
		$this -> load -> view('backend/branch_manager/event', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/event_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function delete_event($eventId) {
		$this -> load -> model('event_model');
		$this -> event_model -> deleteEvent($eventId);
		redirect(base_url() . "branch_manager/event");
	}

	//Search
	public function search() {
		$data['title'] = "ADS | Search";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/search_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/search');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/search_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Staff
	public function staff() {

		$data['title'] = "ADS | Staff";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/staff_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("staff_model");

		$roleId = 1;
		$staffData = $this -> staff_model -> getDetailsByRole($roleId);
		$data['staff_list'] = $staffData;

		$this -> load -> view('backend/branch_manager/staff', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/staff_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//target Report
	public function targetreport() {
		$data['title'] = "ADS | Target Report";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/target_report_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("target_report_model");
		$branchId = 1;
		$target_data = $this -> target_report_model -> getDetailsByBranch($branchId);
		$data['target_report_list'] = $target_data;
		$this -> load -> view('backend/branch_manager/target_report', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/target_report_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Batch
	public function batch($batchId = '') {
		//Logic of getting Branch Id. Here I am assuming id = 1.
		$branchId = 01;
		//Assuming the role ID of Faculty is 3.
		$roleId = 1;
		$this -> load -> model("course_model");
		$courses = $this -> course_model -> getAllDetails();
		$this -> load -> model('user_model');
		$facultyName = $this -> user_model -> getDetailsByBranch($branchId, $roleId);
		$this -> load -> model('batch_model');
		$batch_data = $this -> batch_model -> getDetailsByBranch($branchId);
		$this -> load -> model("batch_timing_model");
		$weekdays = array();
		foreach ($batch_data as $key) {
			$weekdays[$key -> batchId] = $this -> batch_timing_model -> getWeekDays($key -> batchId);
		}
		$data['batch_list'] = $batch_data;
		$data['weekdays'] = $weekdays;
		$data['course'] = $courses;
		$data['faculty'] = $facultyName;
		if ($batchId != '') {
			echo json_encode($data);
		} else {
			$data['title'] = "ADS | Batch";
			$this -> load -> view('backend/master_page/top', $data);
			$this -> load -> view('backend/css/batch_css');
			$this -> load -> view('backend/master_page/header');
			if (isset($_POST['register'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('course_id', 'Course Name', 'required|trim');
				$this -> form_validation -> set_rules('faculty_id', 'Faculty Name', 'required|trim');
				$this -> form_validation -> set_rules('start_date', 'Start Date', 'required|trim|callback__checkingDate');
				$this -> form_validation -> set_rules('start_time', 'Start Time', 'required|trim|callback__checkingTime');
				$this -> form_validation -> set_rules('end_time', 'Start End', 'required|trim|callback__checkingTime');
				$this -> form_validation -> set_rules('strength', 'Strength', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$data['validate'] = true;
				} else {
					$this -> load -> model('batch_model');
					$branchData = array('batchStrength' => $_POST['strength'], 'batchDuration' => $_POST['duration'], 'branchId' => $branchId, 'facultyId' => $_POST['faculty_id'], 'courseCode' => $_POST['course_id'], 'batchStartDate' => date("Y-m-d", strtotime($_POST['start_date'])));
					$update = false;
					if ($_POST['batchId'] = '') {
						$year = date('Y');
						if ($branchId < 10) {
							$branchId = "0" . $branchId;
						}
						$getMaximumBatchId = $this -> batch_model -> getMaxId();
						$batchId = substr($getMaximumBatchId['batchId'], 6, 8);
						$batchId = floatval($batchId);
						if ($batchId != null) {
							$batchId++;
						} else {
							$batchId = 1;
						}
						if ($batchId < 10) {
							$batchId = "00" . $batchId;
						} else if ($batchId < 100 && $batchId > 9) {
							$batchId = "0" . $batchId;
						}
						$batchId = $year . $branchId . $batchId;
						$branchData['batchId'] = floatval($batchId);
					} else {
						$batchId = $_POST['batchId'];
						$update = true;
					}
					$batch_timings = array();
					$size = sizeof($_POST["batch_timing"]);
					$this -> load -> model('batch_timing_model');
					if ($update ? $this -> batch_model -> updateBatch($branchData) : $this -> batch_model -> addBatch($branchData)) {
						for ($i = 0; $i < $size; ) {
							$dummy = array("batchTimingWeekday" => $_POST["batch_timing"][$i], "batchTimingStartTime" => $_POST["batch_timing"][++$i], "batchTimingEndTime" => $_POST["batch_timing"][++$i], "batchId" => $batchId);
							if ($update ? !$this -> batch_timing_model -> updateBatchTime($dummy) : !$this -> batch_timing_model -> addBatchTime($dummy)) {
								$data['error'] = "An Error Occured.";
								break;
							}
							$i++;
						}
						if ($data['error'] == null) {
							redirect(base_url() . "branch_manager/batch");
						}
					} else {
						$data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager/batch', $data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/batch_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function _checkingTime($time) {
		$test_date = explode(':', $time);
		if (count($test_date) == 3 && is_numeric($test_date[0]) && is_numeric($test_date[1]) && is_numeric($test_date[2]) && $test_date[0] <= 23 && $test_date[0] >= 01 && $test_date[1] <= 59 && $test_date[2] >= 00 && $test_date[2] <= 59 && $test_date[2] >= 00) {
			return true;
		} else {
			$this -> form_validation -> set_message('_checkingTime', 'The given date is invalid');
			return false;
		}
	}

	public function _checkingDate($date) {
		$test_date = explode('-', $date);
		if (count($test_date) == 3 && is_numeric($test_date[0]) && is_numeric($test_date[1]) && is_numeric($test_date[2]) && checkdate($test_date[1], $test_date[0], $test_date[2])) {
			return true;
		} else {
			$this -> form_validation -> set_message('_checkingDate', 'The given date is invalid');
			return false;
		}
	}

	public function delete_batch($batchId) {
		$this -> load -> model('batch_model');
		$this -> batch_model -> deleteBatch($batchId);
		redirect(base_url() . "branch_manager/batch");
	}
}
?>