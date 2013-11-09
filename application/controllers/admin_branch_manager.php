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

	//Event
	public function event() {
		$data['title'] = "ADS | Event";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/event_css');
		$this -> load -> view('backend/master_page/header');
		$branchId = 01;
		$this -> load -> model("event_type_model");
		$event_type = $this -> event_type_model -> getAllDetails();
		$this -> load -> model('user_model');
		$facultyName = $this -> user_model -> getDetailsByBranch($branchId, $roleId);
		$data['event_type'] = $event_type;
		$data['faculty'] = $facultyName;
		$this -> load -> model('event_model');
		if (isset($_POST['create'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('event_type_id', 'Event Type', 'required|trim');
			$this -> form_validation -> set_rules('faculty_id', 'Faculty Name', 'required|trim');
			$this -> form_validation -> set_rules('start_date', 'Start Date', 'required|trim');
			$this -> form_validation -> set_rules('end_date', 'End Date', 'required|trim');
			$this -> form_validation -> set_rules('event_name', 'Event Name', 'required|trim');
			$this -> form_validation -> set_rules('description', 'Description', 'required|trim');
			$this -> form_validation -> set_rules('street_1', 'Address 1', 'required|trim');
			$this -> form_validation -> set_rules('street_2', 'Address 2', 'required|trim');
			$this -> form_validation -> set_rules('organize_by', 'Organize By', 'required|trim');
			$this -> form_validation -> set_rules('state', 'State', 'required|trim');
			$this -> form_validation -> set_rules('city', 'City', 'required|trim');
			$this -> form_validation -> set_rules('pin_code', 'Pin Code', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$data['validate'] = true;
			} else {
				$eventData = array('eventName' => $_POST['event_name'], 'eventDescription' => $_POST['description'], 'eventStreet1' => $_POST['street_1'], 'eventStreet2' => $_POST['street_2'], 'eventCity' => $_POST['city'], 'eventState' => $_POST['state'], 'eventPinCode' => $_POST['pin_code'], 'eventOrganizerName' => $_POST['organize_by'], 'branchId' => $branchId, 'facultyId' => $_POST['faculty_id'], 'eventTypeId' => $_POST['event_type_id'], 'eventStartDate' => date("Y-m-d", strtotime($_POST['start_date'])), 'eventEndDate' => date("Y-m-d", strtotime($_POST['end_date'])));
				if ($this -> event_model -> addEvent($eventData)) {
					redirect(base_url() . "branch_manager/event");
				} else {
					$data['error'] = "An Error Occured.";
				}
			}
		}
		$event_data = $this -> event_model -> getDetailsByBranch($branchId);
		$data['event_list'] = $event_data;
		$this -> load -> view('backend/branch_manager/event', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/event_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function delete_event($eventId) {
		$this -> load -> model('event_model');
		$this -> event_model -> deleteEvent($eventId);
		redirect(base_url() . "branch_manager/event");
	}

}
