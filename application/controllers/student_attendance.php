<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Branch_Manager extends CI_Controller {

	public function index() {
		$this -> load -> view('backend/master_page/top');
		$this -> load -> view('backend/css/student_attendance_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/student_attendance');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_attendance_js');
		$this -> load -> view('backend/master_page/bottom');
	}
}
?>