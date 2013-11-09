<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Admin_branch_manager extends CI_Controller {

	function __construct() {
		parent::__construct();
		parent::authenticate(1);
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
		$data['staff_list'] = $staffData;
		$this -> load -> view('backend/branch_manager/staff', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/staff_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Event Type
	public function eventtype($eventtypeId = '') {
		$this -> load -> model("event_type_model");
		if ($eventtypeId != '') {
			$this -> data['eventtype'] = $this -> event_type_model -> getDetailsByEventType($eventtypeId);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Event Type";
			$this -> load -> view('backend/master_page/top',$this -> data);
			$this -> load -> view('backend/css/eventtype_css');
			$this -> load -> view('backend/master_page/header');
			$data['eventtype'] = $this -> event_type_model -> getDetailsOfEventType();
			if (isset($_POST['submitEventType'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('eventtype_name', 'Event Type Name', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$data['validate'] = true;
				} else {
					$eventtypeData = array('eventTypeName' => $_POST['eventtype_name']);
					if ($_POST['eventtypeId'] != "" ? $this -> event_type_model -> updateeventtype($eventtypeData, $_POST['eventtypeId']) : $this -> event_type_model -> addeventtype($eventtypeData)) {
						redirect(base_url() . "admin_branch_manager/eventtype");
					} else {
						$data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager/eventtype', $data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/eventtype_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_eventtype($eventtypeId) {
		$this -> load -> model('event_type_model');
		$this -> event_type_model -> deleteEventtype($eventtypeId);
		redirect(base_url() . "admin_branch_manager/eventtype");
	}

}
