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
		$data['title'] = "ADS | Dashboard";
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
		$data['title'] = "ADS | Student Attendance";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/student_attendance_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/student_attendance');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_attendance_js');
		$this -> load -> view('backend/master_page/bottom');
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
				$test_data = array('testDate' => $_POST['test_date'], 'testMaximumMarks' => $_POST['test_marks'], 'batchId' => $_POST['batch_id'],'testName' => $_POST['test_name']);
				//$batchId=$_POST['batch_id'];
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
			$test_data = $this -> test_model -> getDetailsBytest();
			$test_data1=$this ->batch_model ->getDetailsByBranchAndFaculty($this->branchId, $this ->userId);
			$this -> data['test_list'] = $test_data;
			$this -> data['test_list1'] = $test_data1;
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/test_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> view('backend/branch_manager/test');
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/test_js');
		}
	}

}
