<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Branch_Manager extends CI_Controller {

	public function login() {
		$data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/all_users/login');
	}

	public function index() {
		$data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/dashboard_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/dashboard');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	
	public function feesreceipt() {
		$data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/feesreceipt_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/feesreceipt');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/feesreceipt_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function test() {
		$data['title'] = "ADS | Test";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/test_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/test');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/test_js');
	}

	public function marks() {
		$data['title'] = "ADS | Student Registration";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/marks_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/marks');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/marks_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function studentregistation() {
		$data['title'] = "ADS | Student Registration";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/student_register_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/student_register');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_register_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function feespayment() {
		$data['title'] = "ADS | Fess Payment";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/fees_payment_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/fees_payment');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/fees_payment_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function studentattendance() {
		$data['title'] = "ADS | Student Attendance";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/student_attendance_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/student_attendance');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_attendance_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function event() {
		$data['title'] = "ADS | Event";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/event_css');
		$this -> load -> view('backend/master_page/header');
		$branchId = 01;
		$roleId = 1;
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

	public function inquiry() {
		$data['title'] = "ADS | Inquiry";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/inquiry_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("inquiry_model");
		//Logic of getting Branch Id. Here I am assuming id = 1
		$branchId = 3;
		$inquiry_data = $this -> inquiry_model -> getDetailsByinquiry($branchId);
		$data['inquiry_list'] = $inquiry_data;
		//die(print_r($weekdays));
		//$data['weekdays'] = $weekdays;
		if (isset($_POST['register'])) {
			//die("yes");
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
				$data['validate'] = true;
			} else {
				$this -> load -> model('inquiry_model');
				$inquiryData = array('inquiryStudentFirstName' => $_POST['user_name'], 'inquiryDOB' => date("Y-m-d", strtotime($_POST['date_of_birth'])), 'inquiryContactNumber' => $_POST['mobile_no'], 'inquiryQualification' => $_POST['qualification'], 'inquiryEmailAddress' => $_POST['email'], 'inquiryStreet1' => $_POST['street_1'], 'inquiryStreet2' => $_POST['street_2'], 'inquiryCity' => $_POST['city'], 'inquiryState' => $_POST['state'], 'inquiryPostalCode' => $_POST['pin_code'], 'inquiryInstituteName' => $_POST['name_of_institute'], 'inquiryGuardianOccupation' => $_POST['occupation_of_guardian'], 'inquiryReferenceName' => $_POST['reference'], 'inquirybranchId' => $branchId);

			}
			if ($this -> inquiry_model -> addinquiry($inquiryData)) {
				redirect(base_url() . "branch_manager/inquiry");
			} else {
				$data['error'] = "An Error Occured.";
			}
		}

		$this -> load -> view('backend/branch_manager/inquiry', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/inquiry_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function target() {
		$data['title'] = "ADS | Target";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/target_css');
		$this -> load -> view('backend/master_page/header');

		$this -> load -> model("target_type_model");
		$target_type = $this -> target_type_model -> getAllDetails();
		$this -> load -> model('branch_model');
		$branch = $this -> branch_model -> getAllDetails();
		$data['branch'] = $branch;
		$data['target_type'] = $target_type;
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
				$data['validate'] = true;
			} else {
				$targetData = array('targetSubject' => $_POST['target_name'], 'targetDescription' => $_POST['description'], 'targetIsAchieved' => 0, 'branchId' => $_POST['branch'], 'targetTypeId' => $_POST['target_type'], 'targetStartDate' => date("Y-m-d", strtotime($_POST['start_date'])), 'targetEndDate' => date("Y-m-d", strtotime($_POST['end_date'])));
				if ($this -> target_model -> addTarget($targetData)) {
					redirect(base_url() . "branch_manager/target");
				} else {
					$data['error'] = "An Error Occured.";
				}
			}
		}

		$branchId = 1;
		$target_data = $this -> target_model -> getDetailsByBranch($branchId);

		$data['target_list'] = $target_data;

		$this -> load -> view('backend/branch_manager/target', $data);

		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/target_js');
		$this -> load -> view('backend/master_page/bottom');

	}

	public function targetreport() {

		$data['title'] = "ADS | Target Report";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/target_report_css');
		$this -> load -> view('backend/master_page/header');

		//		$this -> load -> model("targetReport_model");
		//Logic of getting Branch Id. Here I am assuming id = 1
		//		$targetId = 1;
		//		$target_data = $this -> targetReport_model -> getDetailsByBranch($targetId);

		//		$data['targetReport_list'] = $targetReport_data;

		$this -> load -> view('backend/branch_manager/target_report', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/target_report_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function timetable() {

		$data['title'] = "ADS | Time Table";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/time_table_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/time_table');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/time_table_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function batch($batchId = '') {
		//Logic of getting Branch Id. Here I am assuming id = 1.
		$branchId = 01;
		//Assuming the role ID of Faculty is 3.
		$roleId = 1;
		$this -> load -> model("course_model");
		$courses = $this -> course_model -> getAllDetails();
		$this -> load -> model('user_model');
		$facultyName = $this -> user_model -> getDetailsByBranch($branchId, $roleId);
		$this -> load -> model('batch_model');
		$batch_data = $this -> batch_model -> getDetailsByBranch($branchId);
		$this -> load -> model("batch_timing_model");
		$weekdays = array();
		foreach ($batch_data as $key) {
			$weekdays[$key -> batchId] = $this -> batch_timing_model -> getWeekDays($key -> batchId);
		}
		$data['batch_list'] = $batch_data;
		$data['weekdays'] = $weekdays;
		$data['course'] = $courses;
		$data['faculty'] = $facultyName;
		if ($batchId != '') {
			echo json_encode($data);
		} else {
			$data['title'] = "ADS | Batch";
			$this -> load -> view('backend/master_page/top', $data);
			$this -> load -> view('backend/css/batch_css');
			$this -> load -> view('backend/master_page/header');
			if (isset($_POST['register'])) {
				//die("yes");
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('course_id', 'Course Name', 'required|trim');
				$this -> form_validation -> set_rules('faculty_id', 'Faculty Name', 'required|trim');
				$this -> form_validation -> set_rules('start_date', 'Start Date', 'required|trim|callback__checkingDate');
				$this -> form_validation -> set_rules('start_time', 'Start Time', 'required|trim|callback__checkingTime');
				$this -> form_validation -> set_rules('end_time', 'Start End', 'required|trim|callback__checkingTime');
				$this -> form_validation -> set_rules('strength', 'Strength', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$data['validate'] = true;
				} else {
					$this -> load -> model('batch_model');

					$branchData = array('batchStrength' => $_POST['strength'], 'batchDuration' => $_POST['duration'], 'branchId' => $branchId, 'facultyId' => $_POST['faculty_id'], 'courseCode' => $_POST['course_id'], 'batchStartDate' => date("Y-m-d", strtotime($_POST['start_date'])));
					$year = date('Y');
					if ($branchId < 10) {
						$branchId = "0" . $branchId;
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
					$batchId = $year . $branchId . $batchId;
					$branchData['batchId'] = floatval($batchId);
					$batch_timings = array();

					$size = sizeof($_POST["batch_timing"]);

					$this -> load -> model('batch_timing_model');

					if ($this -> batch_model -> addBatch($branchData)) {
						for ($i = 0; $i < $size; ) {
							$dummy = array("batchTimingWeekday" => $_POST["batch_timing"][$i], "batchTimingStartTime" => $_POST["batch_timing"][++$i], "batchTimingEndTime" => $_POST["batch_timing"][++$i], "batchId" => $batchId);
							if (!$this -> batch_timing_model -> addBatchTime($dummy)) {
								$data['error'] = "An Error Occured.";
								break;
							}
							$i++;
						}
						if ($data['error'] == null) {
							redirect(base_url() . "branch_manager/batch");
						}
					} else {
						$data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager/batch', $data);
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
	
	public function branch() {
		//Logic of getting Branch Id. Here I am assuming id = 1.
		//$branchId = 01;

		$data['title'] = "ADS | Branch";
		$this -> load -> model("branch_model");
		$branch = $this -> branch_model -> getDetailsOfBranch();
		$data['branch'] = $branch;
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/branch_css');
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

	public function delete_branch($branchId) {
		$this -> load -> model('branch_model');
		$this -> branch_model -> deleteBranch($branchId);
		redirect(base_url() . "branch_manager/branch");
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
		$this -> load -> model("course_model");
		$course = $this -> course_model -> getDetailsOfCourse();
		$data['course'] = $course;
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/course_css');
		$this -> load -> view('backend/master_page/header');
		
		if (isset($_POST['add_course'])) {
			
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('course_name', 'Course Name', 'required|trim');
			$this -> form_validation -> set_rules('course_categoryId', 'Course Category', 'required|trim');
			$this -> form_validation -> set_rules('course_code', 'Course Code', 'required|trim');
			$this -> form_validation -> set_rules('course_duration', 'Course Duration', 'required|trim');
			$this -> form_validation -> set_rules('course_materialId', 'Course MaterialId', 'required|trim');
			$this -> form_validation -> set_rules('total_books', 'Total Books', 'required|trim');
			$this -> form_validation -> set_rules('opening_stock', 'Material Opening Stock', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				die("yes");
				$data['validate'] = true;
			} else {
				$this -> load -> model('course_model');
				$courseValue = array('courseCategoryId' => $_POST['course_categoryId'], 'courseName' => $_POST['course_name'], 'courseCode' => $_POST['course_code'], 'courseDuration' => $_POST['course_duration'], 'courseMaterialId' => $_POST['course_materialId'], 'totalBooks' => $_POST['total_books'], 'openingStock' => $_POST['opening_stock']);

				if ($this -> course_model -> addCourse($courseValue)) {
					redirect(base_url() . "branch_manager/course");
				} else {
					$data['error'] = "An Error Occured.";
				}
			}

		}

		$this -> load -> view('backend/branch_manager/course');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/course_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function eventtype() {
		$data['title'] = "ADS | Event Type";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/eventtype_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/eventtype');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/eventtype_js');
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
	
	public function profile() {
		$data['title'] = "ADS | Profile";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/student_profile_css');
		$this -> load -> view('backend/master_page/header');
		if(1==1){
			$this -> load -> view('backend/branch_manager/staff_profile');
		}else{
			$this -> load -> view('backend/branch_manager/student_profile');	
		}
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_profile_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	public function delete_event($eventId) {
		$this -> load -> model('event_model');
		$this -> event_model -> deleteEvent($eventId);
		redirect(base_url() . "branch_manager/event");
	}

	public function delete_target($targetId) {
		$this -> load -> model('target_model');
		$this -> target_model -> deleteTarget($targetId);
		redirect(base_url() . "branch_manager/target");
	}

	public function delete_inquiry($inquiryId) {
		$this -> load -> model('inquiry_model');
		$this -> inquiry_model -> deleteInquiry($inquiryId);
		redirect(base_url() . "branch_manager/inquiry");
	}
	
	public function delete_state($stateId) {
		$this -> load -> model('state_model');
		$this -> state_model -> deleteState($stateId);
		redirect(base_url() . "branch_manager/state");
	}
	

}
?>