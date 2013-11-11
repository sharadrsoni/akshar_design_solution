<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$users = array(1);
		parent::authenticate($users);
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
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Branch";
			$this -> data['branch'] = $this -> branch_model -> getDetailsOfBranch();
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/batch_css');
			$this -> load -> view('backend/master_page/header');
			if (isset($_POST['submitBranch'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('branch_name', 'Branch Name', 'required|trim');
				$this -> form_validation -> set_rules('conatct_no', 'Contact Number', 'required|trim');
				$this -> form_validation -> set_rules('street_1', 'Street Address', 'required|trim');
				$this -> form_validation -> set_rules('city', 'City', 'required|trim');
				$this -> form_validation -> set_rules('state', 'State', 'required|trim');
				$this -> form_validation -> set_rules('pin_code', 'Pincode', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$branchValue = array('companyId' => 101010, 'branchName' => $_POST['branch_name'], 'branchContactNumber' => $_POST['conatct_no'], 'branchStreet1' => $_POST['street_1'], 'branchStreet2' => $_POST['street_2'], 'branchCity' => $_POST['city'], 'branchState' => $_POST['state'], 'branchPincode' => $_POST['pin_code'], 'branchlongitude' => $_POST['longitude'], 'branchlatitude' => $_POST['latitude']);
					if ($_POST['branchId'] != "" ? $this -> branch_model -> updateBranch($branchValue, $_POST['branchId']) : $this -> branch_model -> addBranch($branchValue)) {
						redirect(base_url() . "admin/branch");
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
	public function coursecategory($coursecategoryId = '') {
		$this -> load -> model("course_category_model");
		if ($coursecategoryId != '') {
			$this -> data['coursecategory'] = $this -> course_category_model -> getDetailsByCourseCategory($coursecategoryId);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Course Category";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/coursecategory_css');
			$this -> load -> view('backend/master_page/header');
			$this -> data['coursecategory'] = $this -> course_category_model -> getDetailsOfCourseCategory();
			if (isset($_POST['submitCourseCategory'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('coursecategory_name', 'Course Category Name', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$coursecategoryData = array('courseCategoryName' => $_POST['coursecategory_name']);
					if ($_POST['coursecategoryId'] != "" ? $this -> course_category_model -> updatecoursecategory($coursecategoryData,$_POST['coursecategoryId']) : $this -> course_category_model -> addcoursecategory($coursecategoryData)) {
						redirect(base_url() . "admin/coursecategory");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager/coursecategory',$this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/coursecategory_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_coursecategory($coursecategoryId) {
		$this -> load -> model('course_category_model');
		$this -> course_category_model -> deleteCoursecategory($coursecategoryId);
		redirect(base_url() . "admin/coursecategory");
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
	public function state($stateId = '') {
		$this -> load -> model("state_model");
		if ($stateId != '') {
			$this -> data['state'] = $this -> state_model -> getDetailsByState($stateId);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | State";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/state_css');
			$this -> load -> view('backend/master_page/header');
			$this -> data['state'] = $this -> state_model -> getDetailsOfState();
			if (isset($_POST['submitState'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('state_name', 'State Name', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$stateData = array('stateName' => $_POST['state_name']);
					if ($_POST['stateId'] != "" ? $this -> state_model -> updatestate($stateData, $_POST['stateId']) : $this -> state_model -> addstate($stateData)) {
						redirect(base_url() . "admin/state");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager/state', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/state_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_state($stateId) {
		$this -> load -> model('state_model');
		$this -> state_model -> deleteState($stateId);
		redirect(base_url() . "admin/state");
	}

	//City
	public function city($cityId = '') {
		$this -> load -> model('city_model');
		if ($cityId != '') {
			$this -> data['city'] = $this -> city_model -> getDetailsByCity($cityId);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | City";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/city_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> model("state_model");
			$this -> data['state'] = $this -> state_model -> getDetailsOfState();
			$this -> data['city'] = $this -> city_model -> getDetailsOfCity();
			if (isset($_POST['submitCity'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('state_id', 'State Name', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$cityData = array('cityName' => $_POST['city_name'], 'stateId' => $_POST['state_id']);
					if ($_POST['cityId'] != "" ? $this -> city_model -> updatecity($cityData, $_POST['cityId']) : $this -> city_model -> addcity($cityData)) {
						redirect(base_url() . "admin/city");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager/city', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/city_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_city($cityId) {
		$this -> load -> model('city_model');
		$this -> city_model -> deleteCity($cityId);
		redirect(base_url() . "admin/city");
	}

	//Target Type
	public function targettype($trgettypeId = '') {
		$this -> load -> model("target_type_model");
		if ($trgettypeId != '') {
			$this -> data['targettype'] = $this -> target_type_model -> getDetailsByTargetType($trgettypeId);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Target Type";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/targettype_css');
			$this -> load -> view('backend/master_page/header');
			$this -> data['targettype'] = $this -> target_type_model -> getDetailsOfTargetType();
			if (isset($_POST['submitTargetType'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('targettype_name', 'Target Type Name', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$targettypeData = array('targetTypeName' => $_POST['targettype_name']);
					if ($_POST['trgettypeId'] != "" ? $this -> target_type_model -> updatetargettype($targettypeData, $_POST['trgettypeId']) : $this -> target_type_model -> addtargettype($targettypeData)) {
						redirect(base_url() . "admin/targettype");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager/targettype', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/targettype_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_targettype($targettypeId) {
		$this -> load -> model('target_type_model');
		$this -> target_type_model -> deleteTargettype($targettypeId);
		redirect(base_url() . "admin/targettype");
	}

	//Target
	public function target($targetId = '') {
		$this -> load -> model('target_model');
		if ($targetId != '') {
			$this -> data['target'] = $this -> target_model -> getDetailsByTarget($targetId);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Target";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/target_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> model("target_type_model");
			$this -> load -> model('branch_model');
			$this -> data['branch'] = $this -> branch_model -> getDetailsOfBranch();
			$this -> data['target_type'] = $this -> target_type_model -> getDetailsOfTargetType();
			$this -> data['target'] = $this -> target_model -> getDetailsOfTarget();
			if (isset($_POST['submitTarget'])) {
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
					if ($_POST['targetId'] != "" ? $this -> target_model -> updateTarget($targetData, $_POST['targetId']) : $this -> target_model -> addTarget($targetData)) {
						redirect(base_url() . "admin/target");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager/target', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/target_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_target($targetId) {
		$this -> load -> model('target_model');
		$this -> target_model -> deleteTarget($targetId);
		redirect(base_url() . "admin/target");
	}

	//Staff
	public function staff() {
		$this -> data['title'] = "ADS | Staff";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/staff_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("staff_model");
		$roleId = 1;
		$staffData = $this -> staff_model -> getDetailsByRole($roleId);
		$this -> data['staff_list'] = $staffData;
		$this -> load -> view('backend/branch_manager/staff', $this -> data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/staff_js');
		$this -> load -> view('backend/master_page/bottom');
	}

}
