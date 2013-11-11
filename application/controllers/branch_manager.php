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

	//Batch
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
				$this -> form_validation -> set_rules('duration', 'Duration', 'required|trim');
				$this -> form_validation -> set_rules('strength', 'Strength', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this->data['validate'] = true;
				} else {
					$this -> load -> model('batch_model');
					$branchData = array('batchStrength' => $_POST['strength'], 'batchDuration' => $_POST['duration'], 'branchId' => $this->branchId, 'facultyId' => $_POST['faculty_id'], 'courseCode' => $_POST['course_id'], 'batchStartDate' => date("Y-m-d", strtotime($_POST['start_date'])));
					$update = false;
					$time_update = false;
					$this -> load -> model('batch_timing_model');
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
						if ($_POST['flag_batchtiming_update'] != "") {
							$this->batch_timining_model->deleteDetailsByBatch($batchId);
							$time_update = true;
						}
						$update = true;
					}
					$batch_timings = array();
					$size = sizeof($_POST["batch_timing"]);
					if ($update ? $this -> batch_model -> updateBatch($branchData) : $this -> batch_model -> addBatch($branchData)) {
						for ($i = 0; $i < $size; ) {
							$dummy = array("batchTimingWeekday" => $_POST["batch_timing"][$i], "batchTimingStartTime" => $_POST["batch_timing"][++$i], "batchTimingEndTime" => $_POST["batch_timing"][++$i], "batchId" => $batchId);
							if ($time_update ? !$this -> batch_timing_model -> updateBatchTime($dummy) : !$this -> batch_timing_model -> addBatchTime($dummy)) {
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
		if (count($test_date) == 3 && is_numeric($test_date[0]) && is_numeric($test_date[1]) && is_numeric($test_date[2]) && $test_date[0] <= 23 && $test_date[0] >= 00 && $test_date[1] <= 59 && $test_date[2] >= 00 && $test_date[2] <= 59 && $test_date[2] >= 00) {
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
			$this -> form_validation -> set_rules('course_categoryId', 'Course Category', 'required|trim');
			$this -> form_validation -> set_rules('course_name', 'Course Name', 'required|trim');
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

	public function delete_course($courseCode) {
		$this -> load -> model('course_model');
		$this -> course_model -> deleteCourse($courseCode);
		redirect(base_url() . "branch_manager/course");
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
		$this->data['title'] = "ADS | Profile";
		$this -> load -> view('backend/master_page/top', $this->data);
		$this -> load -> view('backend/css/student_profile_css');
	}
	
	//target Report
	public function targetreport() {
		$data['title'] = "ADS | Target Report";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/target_report_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> model("target_report_model");
		$branchId = 1;
		$target_data = $this -> target_report_model -> getDetailsByBranch($branchId);
		$data['target_report_list'] = $target_data;
		$this -> load -> view('backend/branch_manager/target_report', $data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/target_report_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	
}
?>