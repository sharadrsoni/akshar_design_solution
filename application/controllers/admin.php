<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		parent::authenticate(1);
	}

	//Dashboard
	public function index() {
		$this -> data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/dashboard_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/dashboard');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Branch
	public function branch($branchId = '') {
		$this -> load -> model("branch_model");
		if ($branchId != '') {
			$this -> data['branch'] = $this -> branch_model -> getDetailsByBranch($branchId);
			echo json_encode($this->data);
		} else {
			//Logic of getting Branch Id. Here I am assuming id = 1.
			//$branchId = 01;
			$this -> data['title'] = "ADS | Branch";
			$branch = $this -> branch_model -> getDetailsOfBranch();
			$this -> data['branch'] = $branch;
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/batch_css');
			$this -> load -> view('backend/master_page/header');
			if (isset($_POST['add_branch'])) {
				//die("yes");
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('branch_name', 'Branch Name', 'required|trim');
				$this -> form_validation -> set_rules('conatct_no', 'Contact Number', 'required|trim');
				$this -> form_validation -> set_rules('street_1', 'Street Address', 'required|trim');
				$this -> form_validation -> set_rules('city', 'City', 'required|trim');
				$this -> form_validation -> set_rules('state', 'State', 'required|trim');
				$this -> form_validation -> set_rules('pin_code', 'Pincode', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					//die ("yes");
					$this -> data['validate'] = true;
				} else {
					$this -> load -> model('branch_model');
					$branchValue = array('companyId' => 101010, 'branchName' => $_POST['branch_name'], 'branchStreet1' => $_POST['street_1'], 'branchStreet2' => $_POST['street_2'], 'branchCity' => $_POST['city'], 'branchState' => $_POST['state'], 'branchPincode' => $_POST['pin_code']);
					if ($this -> branch_model -> addBranch($branchValue)) {
						redirect(base_url() . "branch_manager/branch");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}

			}
			$this -> load -> view('backend/branch_manager/branch');
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/branch_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	//Course Category
	public function coursecategory() {
		$this -> data['title'] = "ADS | Course Category";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/coursecategory_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/coursecategory');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/coursecategory_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Course
	public function course() {
		$this -> data['title'] = "ADS | Course";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/course_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/course');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/course_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//State
	public function state() {
		$this -> data['title'] = "ADS | State";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/state_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("state_model");
		//Logic of getting State data
		$state_data = $this -> state_model -> getDetailsBystate();
		$this -> data['state_list'] = $state_data;
		if (isset($_POST['register'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('state_name', 'State Name', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$this -> load -> model('state_model');
				$stateData = array('stateName' => $_POST['state_name']);
			}
			if ($this -> state_model -> addstate($stateData)) {
				redirect(base_url() . "branch_manager/state");
			} else {
				$this -> data['error'] = "An Error Occured.";
			}
		}
		$this -> load -> view('backend/branch_manager/state', $this -> data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/state_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function delete_state($stateId) {
		$this -> load -> model('state_model');
		$this -> state_model -> deleteState($stateId);
		redirect(base_url() . "branch_manager/state");
	}

	//City
	public function city() {
		$this -> load -> model("state_model");
		$stateName = $this -> state_model -> getAllDetails();
		$this -> data['state'] = $stateName;
		$this -> data['title'] = "ADS | City";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/city_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model('city_model');
		$city_data = $this -> city_model -> getDetailsBycity();
		$this -> data['city_list'] = $city_data;
		if (isset($_POST['register'])) {
			//die("yes");
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('state_id', 'State Name', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$this -> load -> model('city_model');
				$cityData = array('cityName' => $_POST['city_name'], 'stateId' => $_POST['state_id']);

			}
			if ($this -> city_model -> addcity($cityData)) {
				redirect(base_url() . "branch_manager/city");
			} else {
				$this -> data['error'] = "An Error Occured.";
			}
		}
		$this -> load -> view('backend/branch_manager/city', $this -> data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/city_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function delete_city($cityId) {
		$this -> load -> model('city_model');
		$this -> city_model -> deleteCity($cityId);
		redirect(base_url() . "branch_manager/city");
	}

	//Target Type
	public function targettype() {
		$this -> data['title'] = "ADS | Target Type";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/targettype_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/targettype');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/targettype_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Target
	public function target() {
		$this -> data['title'] = "ADS | Target";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/target_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("target_type_model");
		$target_type = $this -> target_type_model -> getAllDetails();
		$this -> load -> model('branch_model');
		$branch = $this -> branch_model -> getAllDetails();
		$this -> data['branch'] = $branch;
		$this -> data['target_type'] = $target_type;
		$this -> load -> model('target_model');
		if (isset($_POST['create'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('target_type', 'Target Type', 'required|trim');
			$this -> form_validation -> set_rules('branch', 'Branch', 'required|trim');
			$this -> form_validation -> set_rules('start_date', 'Start Date', 'required|trim');
			$this -> form_validation -> set_rules('end_date', 'End Date', 'required|trim');
			$this -> form_validation -> set_rules('target_name', 'Target Name', 'required|trim');
			$this -> form_validation -> set_rules('description', 'Description', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$targetData = array('targetSubject' => $_POST['target_name'], 'targetDescription' => $_POST['description'], 'targetIsAchieved' => 0, 'branchId' => $_POST['branch'], 'targetTypeId' => $_POST['target_type'], 'targetStartDate' => date("Y-m-d", strtotime($_POST['start_date'])), 'targetEndDate' => date("Y-m-d", strtotime($_POST['end_date'])));
				if ($this -> target_model -> addTarget($targetData)) {
					redirect(base_url() . "branch_manager/target");
				} else {
					$this -> data['error'] = "An Error Occured.";
				}
			}
		}
		$branchId = 1;
		$target_data = $this -> target_model -> getDetailsByBranch($branchId);
		$this -> data['target_list'] = $target_data;
		$this -> load -> view('backend/branch_manager/target', $this -> data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/target_js');
		$this -> load -> view('backend/master_page/bottom');

	}

	public function delete_target($targetId) {
		$this -> load -> model('target_model');
		$this -> target_model -> deleteTarget($targetId);
		redirect(base_url() . "branch_manager/target");
	}

}
