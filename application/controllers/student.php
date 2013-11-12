<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Student extends CI_Controller {

	function __construct() {
		parent::__construct();
		$users = array(5);
		parent::authenticate($users);
	}

	//Dashboard
	public function index() {
		$this->data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/dashboard_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/dashboard');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Show marks
	public function showmarks() {
		$this->data['title'] = "ADS | Target Type";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/test_result_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/test_result');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/test_result_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Show Attendance
	public function showattendance() {
		$this->data['title'] = "ADS | Time Table";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/show_attendance_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/show_attendance');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/show_attendance_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Profile
	public function profile() {
		$this->data['title'] = "ADS | Profile";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/student_profile_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/student_profile');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_profile_js');
		$this -> load -> view('backend/master_page/bottom');
	}

}
