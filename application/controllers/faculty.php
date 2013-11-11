<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Faculty extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		parent::authenticate(2);
	}
	 
	
	//Dashboard
	public function index() {
		$data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top',$this->data);
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
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/student_attendance_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/student_attendance');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_attendance_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	
	//Test & Marks 
	public function test() {
		$data['title'] = "ADS | Test";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/test_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/test');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/test_js');
	}
}
