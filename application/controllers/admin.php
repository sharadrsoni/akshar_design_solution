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
		$this -> load -> model("target_model");
		$this -> data['TargetPendingCount'] = $this -> target_model -> getPendingCount();
		$this -> load -> model("inquiry_model");
		$this -> data['NewInquiryCount'] = $this -> inquiry_model -> getNewInquiryCount();
		$this -> load -> model("user_model");
		$this -> data['StudentResigsterCount'] = $this -> user_model -> getUserCount(5);
		$this -> data['FacultyCount'] = $this -> user_model -> getUserCount(3);
		$this -> load -> view('backend/admin/dashboard', $this -> data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Role
	public function role($roleId = '') {
		$this -> load -> model("role_model");
		if ($roleId != '') {
			$this -> data['role'] = $this -> role_model -> getDetailsByRole1($roleId);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Role";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/role_css');
			$this -> load -> view('backend/master_page/header');
			$this -> data['role'] = $this -> role_model -> getAllDetailsOfRole();
			if (isset($_POST['submitRole'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('role_name', 'Role Name', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$roleData = array('roleName' => $_POST['role_name']);
					if ($_POST['roleId'] != "" ? $this -> role_model -> updaterole($roleData, $_POST['roleId']) : $this -> role_model -> addrole($roleData)) {
						redirect(base_url() . "admin/role");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager/role', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/role_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_role($roleId) {
		$this -> load -> model('role_model');
		$this -> role_model -> deleteRole($roleId);
		redirect(base_url() . "admin/role");
	}

	//Branch
	public function branch($branchCode = '') {
		$this -> load -> model("branch_model");
		if ($branchCode != '') {
			$this -> data['branch'] = $this -> branch_model -> getDetailsByBranch($branchCode);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Branch";
			$this -> data['branch'] = $this -> branch_model -> getDetailsOfBranch();
			$this -> load -> model("state_model");
			$this -> data['State'] = $this -> state_model -> getDetailsOfState();
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/batch_css');
			$this -> load -> view('backend/master_page/header');
		    if (isset($_POST['submitBranch'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('branchCode', 'Branch Code', 'required|trim');
				$this -> form_validation -> set_rules('branch_name', 'Branch Name', 'required|trim');
				$this -> form_validation -> set_rules('conatct_no', 'Contact Number', 'required|trim');
				$this -> form_validation -> set_rules('street_1', 'Street Address', 'required|trim');
				$this -> form_validation -> set_rules('cityid', 'City', 'required|trim');
				$this -> form_validation -> set_rules('stateid', 'State', 'required|trim');
				$this -> form_validation -> set_rules('pin_code', 'Pincode', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					// Company ID 1
					$branchValue = array('companyId' => 1, 'branchCode' => $_POST['branchCode'], 'branchName' => $_POST['branch_name'], 'branchContactNumber' => $_POST['conatct_no'], 'branchStreet1' => $_POST['street_1'], 'branchStreet2' => $_POST['street_2'], 'cityId' => $_POST['cityid'], 'stateId' => $_POST['stateid'], 'branchPincode' => $_POST['pin_code'], 'branchLongitude' => $_POST['longitude'], 'branchLatitude' => $_POST['latitude']);
					$branchValueupdate = array('branchName' => $_POST['branch_name'], 'branchContactNumber' => $_POST['conatct_no'], 'branchStreet1' => $_POST['street_1'], 'branchStreet2' => $_POST['street_2'], 'cityId' => $_POST['cityid'], 'stateId' => $_POST['stateid'], 'branchPincode' => $_POST['pin_code'], 'branchLongitude' => $_POST['longitude'], 'branchLatitude' => $_POST['latitude']);
					if ($this -> branch_model -> getCountByBranch($_POST['branchCode']) > 0 ? $this -> branch_model -> updateBranch($branchValueupdate, $_POST['branchCode']) : $this -> branch_model -> addBranch($branchValue)) {
						redirect(base_url() . "admin/branch");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/admin/branch');
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/branch_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	//Course Category
	public function course_category($coursecategoryId = '') {
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
					if ($_POST['coursecategoryId'] != "" ? $this -> course_category_model -> updatecoursecategory($coursecategoryData, $_POST['coursecategoryId']) : $this -> course_category_model -> addcoursecategory($coursecategoryData)) {
						redirect(base_url() . "admin/course_category");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/admin/course_category', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/coursecategory_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_course_category($coursecategoryId) {
		$this -> load -> model('course_category_model');
		$this -> course_category_model -> deleteCoursecategory($coursecategoryId);
		redirect(base_url() . "admin/course_category");
	}

	//Course
	public function course($courseId = '') {
		$this -> load -> model('course_model');
		if ($courseId != '') {
			$this -> data['course'] = $this -> course_model -> getDetailsByCourse($courseId);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Course";
			$this -> load -> model('course_category_model');
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/course_css');
			$this -> load -> view('backend/master_page/header');
			$this -> data["course_category"] = $this -> course_category_model -> getDetailsOfCourseCategory();
			$this -> data['course'] = $this -> course_model -> getDetailsOfCourse();
			if (isset($_POST['submitCourse'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('course_name', 'Course Name', 'required|trim');
				$this -> form_validation -> set_rules('courseCategory_id', 'Course Category', 'required|trim');
				//$this -> form_validation -> set_rules('courseCode', 'Course Code', 'required|trim|is_unique[course.courseCode]');
				$this -> form_validation -> set_rules('course_duration', 'Course Duration', 'required|trim');
				$this -> form_validation -> set_rules('total_books', 'Total Books', 'required|trim');
				$this -> form_validation -> set_rules('description', 'Course description', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$this -> load -> model('book_inventory_model');
					$courseValue = array('courseCategoryId' => $_POST['courseCategory_id'], 'courseName' => $_POST['course_name'], 'courseDuration' => $_POST['course_duration'], 'courseMaterialTotalBooks' => $_POST['total_books'], 'courseDescription' => $_POST['description']);
					if ($this -> course_model ->getCountByCourse($_POST['courseCode'])<=0) {
						$courseValue['courseCode'] = $_POST['courseCode'];
					}
					if ($this -> course_model ->getCountByCourse($_POST['courseCode'])>0 ? $this -> course_model -> updateCourse($courseValue, $_POST['courseCode']): $this -> course_model -> addCourse($courseValue)) {
						redirect(base_url() . "admin/course");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/admin/course', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/course_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_course($courseCode) {
		$this -> load -> model('course_model');
		$this -> course_model -> deleteCourse($courseCode);
		redirect(base_url() . "admin/course");
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
			$this -> load -> view('backend/admin/city', $this -> data);
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
	public function target_type($trgettypeId = '') {
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
						redirect(base_url() . "admin/target_type");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/admin/target_type', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/targettype_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_target_type($targettypeId) {
		$this -> load -> model('target_type_model');
		$this -> target_type_model -> deleteTargettype($targettypeId);
		redirect(base_url() . "admin/target_type");
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
					$targetData = array('targetSubject' => $_POST['target_name'], 'targetDescription' => $_POST['description'], 'targetIsAchieved' => 0, 'branchCode' => $_POST['branch'], 'targetTypeId' => $_POST['target_type'], 'targetStartDate' => date("Y-m-d", strtotime($_POST['start_date'])), 'targetEndDate' => date("Y-m-d", strtotime($_POST['end_date'])));
					if ($_POST['targetId'] != "" ? $this -> target_model -> updateTarget($targetData, $_POST['targetId']) : $this -> target_model -> addTarget($targetData)) {
						redirect(base_url() . "admin/target");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/admin/target', $this -> data);
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
	public function staff($staffID = '') {
		$this -> load -> model("user_model");
		if ($staffID != '') {
			$this -> data['staff'] = $this -> user_model -> getDetailsbyUser($staffID);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Staff";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/staff_css');
			$this -> load -> view('backend/master_page/header');
			$this -> data['staff'] = $this -> user_model -> getDetailsByRole(array('2', '3', '4'));
			$this -> load -> model("branch_model");
			$this -> data['branch_list'] = $this -> branch_model -> getDetailsOfBranch();
			$this -> load -> model("role_model");
			$this -> data['userrole_list'] = $this -> role_model -> getDetailsOfRole();
			$this -> load -> model("state_model");
			$this -> data['State'] = $this -> state_model -> getDetailsOfState();
			$this -> load -> model('user_model');
		    $data['profile'] = $this -> user_model -> getDetailsbyUser($this -> userId);
			if (isset($_POST['submitStaff'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('branchCode', 'Branch', 'required|trim');
				$this -> form_validation -> set_rules('userroleId', 'User Role', 'required|trim');
				$this -> form_validation -> set_rules('first_name', 'First Name', 'required|trim');
				$this -> form_validation -> set_rules('middle_name', 'Middle Name', 'required|trim');
				$this -> form_validation -> set_rules('last_name', 'Last Name', 'required|trim');
				$this -> form_validation -> set_rules('contact_number', 'Contact Number', 'required|trim');
				$this -> form_validation -> set_rules('email', 'Email', 'required|trim');
				$this -> form_validation -> set_rules('date_of_birth', 'Date Of Birth', 'required|trim');
				$this -> form_validation -> set_rules('qualification', 'Qualification', 'required|trim');
				$this -> form_validation -> set_rules('street_1', 'Street1', 'required|trim');
				$this -> form_validation -> set_rules('street_2', 'Street2', 'required|trim');
				$this -> form_validation -> set_rules('cityid', 'City', 'required|trim');
				$this -> form_validation -> set_rules('stateid', 'State', 'required|trim');
				$this -> form_validation -> set_rules('pin_code', 'Postal Code', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$staffData = array('userFirstName' => $_POST['first_name'], 'userMiddleName' => $_POST['middle_name'], 'userLastName' => $_POST['last_name'], 'userContactNumber' => $_POST['contact_number'], 'userEmailAddress' => $_POST['email'], 'userDOB' => date("Y-m-d", strtotime($_POST['date_of_birth'])), 'userQualification' => $_POST['qualification'], 'userStreet1' => $_POST['street_1'], 'userStreet2' => $_POST['street_2'], 'userPostalCode' => $_POST['pin_code'], 'stateId' => $_POST['stateid'], 'cityId' => $_POST['cityid'], 'branchCode' => $_POST['branchCode'], 'roleId' => $_POST['userroleId']);
					if ($_POST['staffId'] == "") {
						$staffData['userId'] = $this -> user_model -> getMaxId(date('Y'), $_POST['branchCode'], $_POST['userroleId']);
						$staffData['userPassword'] = $this -> user_model -> randomPassword();
						$staffData['userPhotograph'] = "profile.png";
						$staffData['userJoiningDate'] = date("Y-m-d");
					}
					if ($_POST['staffId'] != "" ? $this -> user_model -> updateUser($staffData, $_POST['staffId']) : $this -> user_model -> addUser($staffData)) {
						redirect(base_url() . "admin/staff");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/admin/staff', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/staff_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_staff($userId) {
		$this -> load -> model('user_model');
		$this -> user_model -> deleteUser($userId);
		redirect(base_url() . "admin/staff");
	}

}
?>
