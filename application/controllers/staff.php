<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Staff extends CI_Controller {

	function __construct() {
		parent::__construct();
		parent::authenticate(1);
	}

	//Search
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

	//Send Notification
	public function sendnotification() {
		$data['title'] = "ADS | Target Type";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/sendnotification_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/sendnotification');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/sendnotification_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Profile
	public function profile() {
		$data['title'] = "ADS | Profile";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/student_profile_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/staff_profile');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_profile_js');
		$this -> load -> view('backend/master_page/bottom');
	}

}
