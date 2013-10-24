<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Branch_Manager extends CI_Controller {

	public function index() {
		$this -> load -> view('backend/master_page/top');
		$this -> load -> view('backend/css/dashboard_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/dashboard');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	
	public function event() {
		$this -> load -> view('backend/master_page/top');
		$this -> load -> view('backend/css/event_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/event');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/event_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	
	
	public function search() {
		$this -> load -> view('backend/master_page/top');
		$this -> load -> view('backend/css/search_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/search');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/search_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	
	public function staff() {
		$this -> load -> view('backend/master_page/top');
		$this -> load -> view('backend/css/staff_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/staff');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/staff_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	
	public function inquiry() {
		$this -> load -> view('backend/master_page/top');
		$this -> load -> view('backend/css/inquiry_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/inquiry');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/inquiry_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	
	public function branch() {
		$this -> load -> view('backend/master_page/top');
		$this -> load -> view('backend/css/branch_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/branch');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/branch_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	
	public function batch() {
		$this -> load -> view('backend/master_page/top');
		$this -> load -> view('backend/css/batch_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/batch');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/batch_js');
		$this -> load -> view('backend/master_page/bottom');
	}
}
?>