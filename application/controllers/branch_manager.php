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
	
	public function event() {
		$data['title'] = "ADS | Event";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/event_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/event');
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
	
	public function batch() {
		$data['title'] = "ADS | Batch";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/batch_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/batch');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/batch_js');
		$this -> load -> view('backend/master_page/bottom');
	}
}
?>