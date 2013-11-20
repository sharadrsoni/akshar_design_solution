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
	

}
