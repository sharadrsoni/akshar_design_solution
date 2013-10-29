<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Branch_Manager extends CI_Controller {

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
	
	public function marks() {
		$data['title'] = "ADS | Student Registration";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/marks_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/marks');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/marks_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function studentregistation() {
		$data['title'] = "ADS | Student Registration";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/student_register_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/student_register');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_register_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function feespayment() {
		$data['title'] = "ADS | Fess Payment";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/fees_payment_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/fees_payment');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/fees_payment_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function studentattendance() {
		$data['title'] = "ADS | Student Attendance";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/student_attendance_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/student_attendance');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_attendance_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function event() {
		$data['title'] = "ADS | Event";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/event_css');
		$this -> load -> view('backend/master_page/header');
		
		$this -> load -> model("event_model");
		//Logic of getting Branch Id. Here I am assuming id = 1
		$branchId = 1010101;
		$event_data = $this -> event_model -> getDetailsByBranch($branchId);
		//die(print_r($event_data));

		$data['event_list'] = $event_data;
		
		$this -> load -> view('backend/branch_manager/event', $data);

		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/event_js');
		$this -> load -> view('backend/master_page/bottom');
	}

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

	public function staff() {
		$data['title'] = "ADS | Staff";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/staff_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/staff');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/staff_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function inquiry() {
		$data['title'] = "ADS | Inquiry";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/inquiry_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/inquiry');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/inquiry_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function branch() {
		$data['title'] = "ADS | Branch";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/branch_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/branch');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/branch_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function target() {
		$data['title'] = "ADS | Target";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/target_css');
		$this -> load -> view('backend/master_page/header');

		$this -> load -> model("target_model");
		//Logic of getting Branch Id. Here I am assuming id = 1
		$branchId = 1010101;
		$target_data = $this -> target_model -> getDetailsByBranch($branchId);

		$data['target_list'] = $target_data;
		
		$this -> load -> view('backend/branch_manager/target', $data);

		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/target_js');
		$this -> load -> view('backend/master_page/bottom');

	}

	public function targetreport() {

		$data['title'] = "ADS | Target Report";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/target_report_css');
		$this -> load -> view('backend/master_page/header');

//		$this -> load -> model("targetReport_model");
		//Logic of getting Branch Id. Here I am assuming id = 1
//		$targetId = 1;
//		$target_data = $this -> targetReport_model -> getDetailsByBranch($targetId);

//		$data['targetReport_list'] = $targetReport_data;
		
		$this -> load -> view('backend/branch_manager/target_report', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/target_report_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function time_table() {

		$data['title'] = "ADS | Time Table";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/time_table_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/time_table');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/time_table_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function batch() {
		//Logic of getting Branch Id. Here I am assuming id = 1.
		$branchId = 1;
		//Assuming the role ID of Faculty is 3.
		$roleId = 3;

		$data['title'] = "ADS | Batch";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/batch_css');
		$this -> load -> view('backend/master_page/header');
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

		if (isset($_POST['register'])) {
			//die("yes");
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('course_id', 'Course Name', 'required|trim');
			$this -> form_validation -> set_rules('faculty_id', 'Faculty Name', 'required|trim');
			$this -> form_validation -> set_rules('start_date', 'Start Date', 'required|trim');
			$this -> form_validation -> set_rules('strength', 'Strength', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$data['validate'] = true;
			} else {
				$this -> load -> model('batch_model');
				$branchData = array('batchStrength' => $_POST['strength'], 'batchDuration' => $_POST['duration'], 'branchId' => $branchId, 'facultyId' => $_POST['faculty_id'], 'courseCode' => $_POST['course_id'], 'batchStartDate' => $_POST['start_date']);
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
				if ($batchId < 100) {
					$batchId = "00" . $batchId;
				} else if ($batchId < 10) {
					$batchId = "0" . $batchId;
				}
				$batchId = $year . $branchId . $batchId;
				$branchData['batchId'] = floatval($batchId);
				if ($this -> batch_model -> addBatch($branchData)) {
					redirect(base_url() . "branch_manager/batch");
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

	public function delete_batch($batchId) {
		$this -> load -> model('batch_model');
		$this -> batch_model -> deleteBatch($batchId);
		redirect(base_url() . "branch_manager/batch");
	}
	
	public function coursecategory() {
		$data['title'] = "ADS | Course Category";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/coursecategory_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/coursecategory');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/coursecategory_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function course() {
		$data['title'] = "ADS | Course";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/course_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/course');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/course_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	
	public function changepassword() {
		$data['title'] = "ADS | Change Password";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/changepassword_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/changepassword');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/changepassword_js');
		$this -> load -> view('backend/master_page/bottom');
	}


	public function delete_event($eventId) {
		$this->load->model('event_model');
		$this->event_model->deleteEvent($eventId);
		redirect(base_url() . "branch_manager/event");
	}

	public function delete_target($targetId) {
		$this->load->model('target_model');
		$this->target_model->deleteEvent($targetId);
		redirect(base_url() . "branch_manager/target");
	}
}
?>