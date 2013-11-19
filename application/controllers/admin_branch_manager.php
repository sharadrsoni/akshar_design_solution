<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Admin_branch_manager extends CI_Controller {

	function __construct() {
		parent::__construct();
		$users = array(1, 2);
		parent::authenticate($users);
	}

	//Event Type
	public function event_type($eventtypeId = '') {
		$this -> load -> model("event_type_model");
		if ($eventtypeId != '') {
			$this -> data['eventtype'] = $this -> event_type_model -> getDetailsByEventType($eventtypeId);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Event Type";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/eventtype_css');
			$this -> load -> view('backend/master_page/header');
			$this->data['eventtype'] = $this -> event_type_model -> getDetailsOfEventType();
			if (isset($_POST['submitEventType'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('eventtype_name', 'Event Type Name', 'required|trim|alpha|max_length[50]');
				if ($this -> form_validation -> run() == FALSE) {
					$this->data['validate'] = true;
				} else {
					$eventtypeData = array('eventTypeName' => $_POST['eventtype_name']);
					if ($_POST['eventtypeId'] != "" ? $this -> event_type_model -> updateeventtype($eventtypeData, $_POST['eventtypeId']) : $this -> event_type_model -> addeventtype($eventtypeData)) {
						redirect(base_url() . "admin_branch_manager/event_type");
					} else {
						$this->data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/admin_branch_manager/event_type', $this->data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/eventtype_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_event_type($eventtypeId) {
		$this -> load -> model('event_type_model');
		$this -> event_type_model -> deleteEventtype($eventtypeId);
		redirect(base_url() . "admin_branch_manager/event_type");
	}

}
