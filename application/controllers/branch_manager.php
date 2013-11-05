<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Branch_manager extends CI_Controller {

	private $userId;
	private $roleId;
	private $branchId;
	private $data = array();

	function __construct() {
		parent::__construct();
		if ($this -> session -> userdata("roleId") != 2) {
			redirect(base_url() . "login");
		} else {
			$this -> userId = $this -> session -> userdata("userId");
			$this -> roleId = $this -> session -> userdata("roleId");
			$this -> load -> model("user_model");
			$userDetail = $this -> user_model -> getDetailsbyUser($this -> userId);
			$this->branchId = $userDetail -> branchId;
			$this -> data['username'] = $userDetail -> userFirstName . " " . $userDetail -> userMiddleName . " " . $userDetail -> userLastName;
			$this -> load -> model("role_model");
			$this -> data['role'] = $this -> role_model -> getDetailsByRole($this -> roleId) -> roleName;
			$this->data['roleId'] = $this->roleId;
		}
	}

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

	public function feesreceipt() {
		$this->data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/feesreceipt_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/feesreceipt');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/feesreceipt_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function studentregistation() {
		$this->data['title'] = "ADS | Student Registration";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/student_register_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/student_register');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_register_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function feespayment() {
		$this->data['title'] = "ADS | Fess Payment";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/fees_payment_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/fees_payment');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/fees_payment_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function event() {
		$this->data['title'] = "ADS | Event";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/event_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("event_type_model");
		$event_type = $this -> event_type_model -> getAllDetails();
		$this -> load -> model('user_model');
		$facultyName = $this -> user_model -> getDetailsByBranchAndRole($this->branchId, $this->roleId);
		$this->data['event_type'] = $event_type;
		$this->data['faculty'] = $facultyName;
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
				$this->data['validate'] = true;
			} else {
				$eventData = array('eventName' => $_POST['event_name'], 'eventDescription' => $_POST['description'], 'eventStreet1' => $_POST['street_1'], 'eventStreet2' => $_POST['street_2'], 'eventCity' => $_POST['city'], 'eventState' => $_POST['state'], 'eventPinCode' => $_POST['pin_code'], 'eventOrganizerName' => $_POST['organize_by'], 'branchId' => $this->branchId, 'facultyId' => $_POST['faculty_id'], 'eventTypeId' => $_POST['event_type_id'], 'eventStartDate' => date("Y-m-d", strtotime($_POST['start_date'])), 'eventEndDate' => date("Y-m-d", strtotime($_POST['end_date'])));
				if ($this -> event_model -> addEvent($eventData)) {
					redirect(base_url() . "branch_manager/event");
				} else {
					$this->data['error'] = "An Error Occured.";
				}
			}
		}
		$event_data = $this -> event_model -> getDetailsByBranch($this->branchId);
		$this->data['event_list'] = $event_data;
		$this -> load -> view('backend/branch_manager/event', $this->data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/event_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function search() {
		$this->data['title'] = "ADS | Search";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/search_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/search');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/search_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function staff() {
		$this->data['title'] = "ADS | Staff";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/staff_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("staff_model");
		$staffData = $this -> staff_model -> getDetailsByRole($this->roleId);
		$this->data['staff_list'] = $staffData;
		$this -> load -> view('backend/branch_manager/staff', $this->data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/staff_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function inquiry() {
		$this->data['title'] = "ADS | Inquiry";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/inquiry_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("inquiry_model");
		//Logic of getting Branch Id. Here I am assuming id = 1
		$inquiry_data = $this -> inquiry_model -> getDetailsByinquiry($this->branchId);
		$this->data['inquiry_list'] = $inquiry_data;
		//die(print_r($weekdays));
		//$this->data['weekdays'] = $weekdays;
		if (isset($_POST['register'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('user_name', 'User Name', 'required|trim');
			$this -> form_validation -> set_rules('date_of_birth', 'Date Of Birth', 'required|trim');
			$this -> form_validation -> set_rules('mobile_no', 'Mobile No', 'required|trim');
			$this -> form_validation -> set_rules('email', 'email', 'required|trim');
			$this -> form_validation -> set_rules('qualification', 'qualification', 'required|trim');
			$this -> form_validation -> set_rules('email', 'email', 'required|trim');
			$this -> form_validation -> set_rules('street_1', 'Street', 'required|trim');
			$this -> form_validation -> set_rules('street_2', 'Street', 'required|trim');
			$this -> form_validation -> set_rules('city', 'City', 'required|trim');
			$this -> form_validation -> set_rules('state', 'State', 'required|trim');
			$this -> form_validation -> set_rules('name_of_institute', 'Institute Name', 'required|trim');
			$this -> form_validation -> set_rules('occupation_of_guardian', 'Ocuupation of Gurdian', 'required|trim');
			$this -> form_validation -> set_rules('reference', 'Reference', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this->data['validate'] = true;
			} else {
				$this -> load -> model('inquiry_model');
				$inquiryData = array('inquiryStudentFirstName' => $_POST['user_name'], 'inquiryDOB' => date("Y-m-d", strtotime($_POST['date_of_birth'])), 'inquiryContactNumber' => $_POST['mobile_no'], 'inquiryQualification' => $_POST['qualification'], 'inquiryEmailAddress' => $_POST['email'], 'inquiryStreet1' => $_POST['street_1'], 'inquiryStreet2' => $_POST['street_2'], 'inquiryCity' => $_POST['city'], 'inquiryState' => $_POST['state'], 'inquiryPostalCode' => $_POST['pin_code'], 'inquiryInstituteName' => $_POST['name_of_institute'], 'inquiryGuardianOccupation' => $_POST['occupation_of_guardian'], 'inquiryReferenceName' => $_POST['reference'], 'inquirybranchId' => $this->branchId);
			}
			if ($this -> inquiry_model -> addinquiry($inquiryData)) {
				redirect(base_url() . "branch_manager/inquiry");
			} else {
				$this->data['error'] = "An Error Occured.";
			}
		}
		$this -> load -> view('backend/branch_manager/inquiry', $this->data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/inquiry_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function targetreport() {
		$this->data['title'] = "ADS | Target Report";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/target_report_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("target_report_model");
		$target_data = $this -> target_report_model -> getDetailsByBranch($this->branchId);
		$this->data['target_report_list'] = $target_data;
		$this -> load -> view('backend/branch_manager/target_report', $this->data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/target_report_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function batch($batchId = '') {
		$this -> load -> model('batch_model');
		$this -> load -> model("batch_timing_model");
		$weekdays = array();
		if ($batchId != '') {
			$batch_data = $this -> batch_model -> getDetailsByBranchAndBatch($this->branchId, $batchId);
			$this->data['batch_list'] = $batch_data;
			$weekdays[$batchId] = $this -> batch_timing_model -> getWeekDays($batchId);
			$this->data['weekdays'] = $weekdays;
			echo json_encode($this->data);
		} else {
			$batch_data = $this -> batch_model -> getDetailsByBranch($this->branchId);
			$this -> load -> model("course_model");
			$courses = $this -> course_model -> getAllDetails();
			$this -> load -> model('user_model');
			$facultyName = $this -> user_model -> getDetailsByBranchAndRole($this->branchId, 3);
			$this->data['course'] = $courses;
			$this->data['faculty'] = $facultyName;
			$this->data['batch_list'] = $batch_data;
			foreach ($batch_data as $key) {
				$weekdays[$key -> batchId] = $this -> batch_timing_model -> getWeekDays($key -> batchId);
			}
			$this->data['weekdays'] = $weekdays;
			if (isset($_POST['register'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('course_id', 'Course Name', 'required|trim');
				$this -> form_validation -> set_rules('faculty_id', 'Faculty Name', 'required|trim');
				$this -> form_validation -> set_rules('start_date', 'Start Date', 'required|trim|callback__checkingDate');
				$this -> form_validation -> set_rules('start_time', 'Start Time', 'required|trim|callback__checkingTime');
				$this -> form_validation -> set_rules('end_time', 'Start End', 'required|trim|callback__checkingTime');
				$this -> form_validation -> set_rules('strength', 'Strength', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this->data['validate'] = true;
				} else {
					$this -> load -> model('batch_model');
					$branchData = array('batchStrength' => $_POST['strength'], 'batchDuration' => $_POST['duration'], 'branchId' => $this->branchId, 'facultyId' => $_POST['faculty_id'], 'courseCode' => $_POST['course_id'], 'batchStartDate' => date("Y-m-d", strtotime($_POST['start_date'])));
					$update = false;
					if ($_POST['batchId'] == '') {
						$year = date('Y');
						if ($this->branchId < 10) {
							$this->branchId = "0" . $this->branchId;
						}
						$getMaximumBatchId = $this -> batch_model -> getMaxId();
						$batchId = substr($getMaximumBatchId['batchId'], 6, 8);
						$batchId = floatval($batchId);
						if ($batchId != null) {
							$batchId++;
						} else {
							$batchId = 1;
						}
						if ($batchId < 10) {
							$batchId = "00" . $batchId;
						} else if ($batchId < 100 && $batchId > 9) {
							$batchId = "0" . $batchId;
						}
						$batchId = $year . $this->branchId . $batchId;
						$branchData['batchId'] = floatval($batchId);
					} else {
						$batchId = $_POST['batchId'];
						$update = true;
					}
					$batch_timings = array();
					$size = sizeof($_POST["batch_timing"]);
					$this -> load -> model('batch_timing_model');
					if ($update ? $this -> batch_model -> updateBatch($branchData) : $this -> batch_model -> addBatch($branchData)) {
						for ($i = 0; $i < $size; ) {
							$dummy = array("batchTimingWeekday" => $_POST["batch_timing"][$i], "batchTimingStartTime" => $_POST["batch_timing"][++$i], "batchTimingEndTime" => $_POST["batch_timing"][++$i], "batchId" => $batchId);
							if ($update ? !$this -> batch_timing_model -> updateBatchTime($dummy) : !$this -> batch_timing_model -> addBatchTime($dummy)) {
								$this->data['error'] = "An Error Occured.";
								break;
							}
							$i++;
						}
						if ($this->data['error'] == null) {
							redirect(base_url() . "branch_manager/batch");
						}
					} else {
						$this->data['error'] = "An Error Occured.";
					}
				}
			}
			
			$this->data['title'] = "ADS | Batch";
			$this -> load -> view('backend/master_page/top', $this->data);
			$this -> load -> view('backend/css/batch_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> view('backend/branch_manager/batch');
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/batch_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function _checkingTime($time) {
		$test_date = explode(':', $time);
		if (count($test_date) == 3 && is_numeric($test_date[0]) && is_numeric($test_date[1]) && is_numeric($test_date[2]) && $test_date[0] <= 23 && $test_date[0] >= 01 && $test_date[1] <= 59 && $test_date[2] >= 00 && $test_date[2] <= 59 && $test_date[2] >= 00) {
			return true;
		} else {
			$this -> form_validation -> set_message('_checkingTime', 'The given date is invalid');
			return false;
		}
	}

	public function _checkingDate($date) {
		$test_date = explode('-', $date);
		if (count($test_date) == 3 && is_numeric($test_date[0]) && is_numeric($test_date[1]) && is_numeric($test_date[2]) && checkdate($test_date[1], $test_date[0], $test_date[2])) {
			return true;
		} else {
			$this -> form_validation -> set_message('_checkingDate', 'The given date is invalid');
			return false;
		}
	}

	public function delete_batch($batchId) {
		$this -> load -> model('batch_model');
		$this -> batch_model -> deleteBatch($batchId);
		redirect(base_url() . "branch_manager/batch");
	}

	public function changepassword() {
		$this->data['title'] = "ADS | Change Password";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/changepassword_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/changepassword');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/changepassword_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function sendnotification() {
		$this->data['title'] = "ADS | Target Type";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/sendnotification_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/sendnotification');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/sendnotification_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function profile() {
		$this->data['title'] = "ADS | Profile";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/student_profile_css');
		$this -> load -> view('backend/master_page/header');
		if (1 == 1) {
			$this -> load -> view('backend/branch_manager/staff_profile');
		} else {
			$this -> load -> view('backend/branch_manager/student_profile');
		}
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_profile_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function delete_inquiry($inquiryId) {
		$this -> load -> model('inquiry_model');
		$this -> inquiry_model -> deleteInquiry($inquiryId);
		redirect(base_url() . "branch_manager/inquiry");
	}

}
?>