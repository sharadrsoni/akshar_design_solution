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
		$this->data['menu'] = "dashboard";
		$this -> data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/dashboard_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("target_model");
		$this -> data['TargetPendingCount'] = $this -> target_model -> getPendingCount($this->branchCode);
		$this -> load -> model("inquiry_model");
		$this -> data['NewInquiryCount'] = $this -> inquiry_model -> getNewInquiryCount($this->branchCode);
		$this -> load -> model("user_model");
		$this -> data['StudentResigsterCount'] = $this -> user_model -> getUserCount(5,$this->branchCode);
		$this -> data['FacultyCount'] = $this -> user_model -> getUserCount(3,$this->branchCode);
		$this->data['chart1']=$this -> user_model -> getstudentRegisterCountOfMonth($this->branchCode);
		$this -> data['chart2'] = $this -> inquiry_model -> getstudentinquiryCountOfMonth($this->branchCode);
		$this -> load -> model("fee_model");
		$this -> data['chart3'] = $this -> fee_model -> getpaymentOfMonth($this->branchCode);
		$this -> load -> model("event_model");
		$this -> data['events'] = $this -> event_model -> geteventForCalender($this->branchCode);
		$this -> load -> view('backend/admin/dashboard', $this -> data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Student attendance
	public function student_attendance() {
		$this->data['menu'] = "student attendance";
		if (isset($_POST['saveAttendance'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('Attendance_date', 'Attendence Date', 'required|trim|callback__checkingDate');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {

				$this -> load -> model('user_model');
				$this -> load -> model('attendance_model');
				$student_data = $this -> user_model -> getDetailsByBatch($_POST["batch_id"], 5, $this -> branchCode);
				$date = date("Y-m-d", strtotime($_POST['Attendance_date']));
				$count_data = $this -> attendance_model -> getCountByDate($_POST["batch_id"], $date);
				if ($count_data == null)
					foreach ($student_data as $key) {
						$dummy = array('studentBatchId' => $key -> studentBatchId, 'attendanceIsPresent' => 0, 'attendanceDate' => $date);
						$this -> attendance_model -> addAttendance($dummy);
					}
				else {
					foreach ($student_data as $key) {
						$dummy2 = array('studentBatchId' => $key -> studentBatchId, 'attendanceIsPresent' => 0, 'attendanceDate' => $date);
						$this -> attendance_model -> updateAttendance($dummy2);
					}
				}

				$size = sizeof($_POST["student_ids"]);
				for ($i = 0; $i < $size; $i++) {
					$dummy1 = array('studentBatchId' => $_POST["student_ids"][$i], 'attendanceDate' => $date, 'attendanceIsPresent' => 1);
					$this -> attendance_model -> updateAttendance($dummy1);
				}
				redirect(base_url() . "faculty/student_attendance");
			}
		} else {

			$this -> data['title'] = "ADS | Student Attendance";
			$this -> load -> model("test_model");
			$this -> load -> model("batch_model");
			$this -> data['test_list'] = $this -> test_model -> getDetailsBytest($this -> userId);
			$batch_data = $this -> batch_model -> getDetailsByBranch($this -> branchCode);
			$this -> data['batch_list'] = $this -> batch_model -> getDetailsByBranchAndFaculty($this -> branchCode, $this -> userId);

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
$this->data['menu'] = "test";
		if (isset($_POST['submitTest'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('test_date', 'Test Date', 'required|trim|callback__checkingDate');
			$this -> form_validation -> set_rules('test_marks', 'Test Marks', 'required|trim|numeric');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$this -> load -> model('test_model');
				$test_data = array('testDate' => date("Y-m-d", strtotime($_POST['test_date'])), 'testMaximumMarks' => $_POST['test_marks'], 'batchId' => $_POST['batch_id'], 'testName' => $_POST['test_name']);
				if ($this -> test_model -> addtest($test_data)) {
					redirect(base_url() . "faculty/test");
				} else {
					$this -> data['error'] = "An Error Occured.";
				}
			}
		} else if (isset($_POST['submitTestMarks'])) {
			
				$this -> load -> model('test_model');
				$this -> load -> model('test_result_model');
				$student_data = $this -> test_model -> getTestStudentDetails($_POST["testId"]);
				foreach ($student_data as $key) {
					$this -> test_result_model -> deleteResult($key -> studentBatchId,$_POST["testId"]);
				}

				$size = sizeof($_POST["student_ids"]);
				for ($i = 0; $i < $size; $i++) {
				$count_data = $this -> test_result_model -> getCountByTestStudent($_POST["testId"],$_POST["student_ids"][$i]);
				$dummy = array('studentBatchId' => $_POST["student_ids"][$i],'testResultObtainedMarks' => $_POST["obtained_marks"][$i], 'testId' => $_POST["testId"]);
				$testRemark = array('testRemarks' => $_POST["test_remarks"]);
				$this -> test_model -> updateTest($testRemark,$_POST["testId"]);					
				if ($count_data == null)
					$this -> test_result_model -> addResult($dummy);
				else 
					$this -> test_result_model -> updateResult($dummy);					
				}
				redirect(base_url() . "faculty/test");

		} else {
			
			$this -> data['title'] = "ADS | Test";
			$this -> load -> model("test_model");
			$this -> load -> model("batch_model");
			$this -> data['test_list'] = $this -> test_model -> getDetailsBytest($this -> userId);
			$batch_data = $this -> batch_model -> getDetailsByBranch($this -> branchCode);
			$this -> data['batch_list'] = $this -> batch_model -> getDetailsByBranchAndFaculty($this -> branchCode, $this -> userId);

			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/test_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> view('backend/branch_manager/test', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/test_js');
		}
	}

	public function addMarks($testId) {
		$this -> load -> model('batch_model');
		$this -> batch_model -> deleteBatch($batchId);
		redirect(base_url() . "branch_manager/batch");
	}

}
