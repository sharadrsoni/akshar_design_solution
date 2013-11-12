<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Counsellor extends CI_Controller {
		
		
		function __construct() {
		parent::__construct();
		$users = array(4);
		parent::authenticate($users);
	}
		
		
	//Dashboard
	public function index() {
		$this->data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/dashboard_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/dashboard');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	

}
