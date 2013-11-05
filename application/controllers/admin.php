<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Admin extends CI_Controllern {
	public function branch() {
		//Logic of getting Branch Id. Here I am assuming id = 1.
		//$branchId = 01;
		$data['title'] = "ADS | Branch";
		$this -> load -> model("branch_model");
		$branch = $this -> branch_model -> getDetailsOfBranch();
		$data['branch'] = $branch;
		$this -> load -> view('backend/master_page/top', $data);
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
				$data['validate'] = true;
			} else {
				$this -> load -> model('branch_model');
				$branchValue = array('companyId' => 101010, 'branchName' => $_POST['branch_name'], 'branchStreet1' => $_POST['street_1'], 'branchStreet2' => $_POST['street_2'], 'branchCity' => $_POST['city'], 'branchState' => $_POST['state'], 'branchPincode' => $_POST['pin_code']);
				if ($this -> branch_model -> addBranch($branchValue)) {
					redirect(base_url() . "branch_manager/branch");
				} else {
					$data['error'] = "An Error Occured.";
				}
			}

		}
		$this -> load -> view('backend/branch_manager/branch');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/branch_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function coursecategory() {
		$data['title'] = "ADS | Course Category";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/coursecategory_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/coursecategory');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/coursecategory_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function course() {
		$data['title'] = "ADS | Course";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/course_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/course');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/course_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function state() {
		$data['title'] = "ADS | State";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/state_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("state_model");
		//Logic of getting State data
		$state_data = $this -> state_model -> getDetailsBystate();
		$data['state_list'] = $state_data;
		if (isset($_POST['register'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('state_name', 'State Name', 'required|trim');

			if ($this -> form_validation -> run() == FALSE) {
				$data['validate'] = true;
			} else {
				$this -> load -> model('state_model');
				$stateData = array('stateName' => $_POST['state_name']);

			}
			if ($this -> state_model -> addstate($stateData)) {
				redirect(base_url() . "branch_manager/state");
			} else {
				$data['error'] = "An Error Occured.";
			}
		}

		$this -> load -> view('backend/branch_manager/state', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/state_js');
		$this -> load -> view('backend/master_page/bottom');

	}

	public function city() {
		$data['title'] = "ADS | City";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/city_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/city');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/city_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function targettype() {
		$data['title'] = "ADS | Target Type";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/targettype_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/targettype');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/targettype_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function delete_target($targetId) {
		$this -> load -> model('target_model');
		$this -> target_model -> deleteTarget($targetId);
		redirect(base_url() . "branch_manager/target");
	}

	public function delete_state($stateId) {
		$this -> load -> model('state_model');
		$this -> state_model -> deleteState($stateId);
		redirect(base_url() . "branch_manager/state");
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

}
