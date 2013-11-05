<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Faculty extends CI_Controller {
	public function test() {
		$data['title'] = "ADS | Test";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/test_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/test');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/test_js');
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

	public function studentmarks() {
		$data['title'] = "ADS | Target Type";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/test_result_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/test_result');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/test_result_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function showattendance() {
		$data['title'] = "ADS | Time Table";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/show_attendance_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/show_attendance');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/show_attendance_js');
		$this -> load -> view('backend/master_page/bottom');
	}

}
