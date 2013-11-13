<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Faculty extends CI_Controller {

	function __construct() {
		parent::__construct();
		$users = array(3);
		parent::authenticate($users);
	}

	//Dashboard
	public function index() {
		$this -> data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/dashboard_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/dashboard');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Student attendance
	public function studentattendance() {
		if (isset($_POST['saveAttendance'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('Attendance_date', 'Attendence Date', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} 
			else {

				$this -> load -> model('user_model');
				$this -> load -> model('attendance_model');
				$student_data = $this -> user_model -> getDetailsByBatch($_POST["batch_id"], 5, $this -> branchId);
				$date = date("Y-m-d", strtotime($_POST['Attendance_date']));
				foreach ($student_data as $key) {
					$dummy = array('studentBatchId' => $key -> studentBatchId, 'attendanceIsPresent' => 0, 'attendanceDate' => $date);
					$this -> attendance_model -> addAttendance($dummy);
				}

				$size = sizeof($_POST["student_ids"]);
				for ($i = 0; $i < $size;$i++ ) {
					$dummy1 = array('studentBatchId' => $_POST["student_ids"][$i], 'attendanceDate' => $date, 'attendanceIsPresent' => 1);
					$this -> attendance_model -> updateAttendance($dummy1);
				}
				redirect(base_url() . "faculty/studentattendance");
			}
		} 
		else {

			$this -> data['title'] = "ADS | Student Attendance";
			$this -> load -> model("test_model");
			$this -> load -> model("batch_model");
			$this -> data['test_list'] = $this -> test_model -> getDetailsBytest();
			$batch_data = $this -> batch_model -> getDetailsByBranch($this -> branchId);
			$this -> data['batch_list'] = $this -> batch_model -> getDetailsByBranchAndFaculty($this -> branchId, $this -> userId);

			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/student_attendance_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> view('backend/branch_manager/student_attendance', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/student_attendance_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	//Test & Marks
	public function test() {

		if (isset($_POST['add_register'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('test_date', 'Test Date', 'required|trim');
			$this -> form_validation -> set_rules('test_marks', 'Test Marks', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$this -> load -> model('test_model');
				$test_data = array('testDate' => $_POST['test_date'], 'testMaximumMarks' => $_POST['test_marks'], 'batchId' => 201301001, 'testName' => $_POST['test_name']);
				if ($this -> test_model -> addtest($test_data)) {
					redirect(base_url() . "faculty/test");
				} else {
					$this -> data['error'] = "An Error Occured.";
				}
			}
		} else {

			$this -> data['title'] = "ADS | Test";
			$this -> load -> model("test_model");
			$this -> load -> model("batch_model");
			$batch_data = $this -> batch_model -> getDetailsByBranch($this -> branchId);
			$this -> data['batch_list'] = $this -> batch_model -> getDetailsByBranchAndFaculty($this -> branchId, $this -> userId);

			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/test_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> view('backend/branch_manager/test', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/test_js');
		}
	}

}
