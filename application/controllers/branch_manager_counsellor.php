<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Branch_manager_counsellor extends CI_Controller {
	function __construct() {
		parent::__construct();
		$users = array(2, 4);
		parent::authenticate($users);
	}

	//Inquiry
	public function inquiry($inquiryID = '') {
		$this->data['menu'] = "student inquiry";
		$this -> load -> model("inquiry_model");
		$this -> load -> model("course_category_model");
		$this -> load -> model("state_model");
		$this -> data['State'] = $this -> state_model -> getDetailsOfState();
		$courseCategoryName = $this -> course_category_model -> getDetailsOfCourseCategory();
		$this -> data['category'] = $courseCategoryName;
		if ($inquiryID != '') {
			$this -> data['inquiry'] = $this -> inquiry_model -> getDetailsByinquiry($this -> branchCode, $inquiryID);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Inquiry";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/inquiry_css');
			$this -> load -> view('backend/master_page/header');
			$this -> data['inquiry'] = $this -> inquiry_model -> getDetailsOfInquiry($this -> branchCode);
			if (isset($_POST['submitInquiry'])) {
				$this -> load -> library("form_validation");

				$this -> form_validation -> set_rules('first_name', 'First Name', 'required|trim|min_length[2]|max_length[50]');
				$this -> form_validation -> set_rules('last_name', 'Last Name', 'required|trim|min_length[2]|max_length[50]');
				$this -> form_validation -> set_rules('date_of_birth', 'Date Of Birth', 'required|trim|callback__checkingDate');
				$this -> form_validation -> set_rules('mobile_no', 'Mobile No', 'required|trim|numeric|min_length[10]|max_length[15]');
				$this -> form_validation -> set_rules('email', 'email', 'required|trim|valid_email');
				$this -> form_validation -> set_rules('qualification', 'qualification', 'required|trim|min_length[2]|max_length[50]');
				$this -> form_validation -> set_rules('email', 'email', 'required|trim|valid_email');
				$this -> form_validation -> set_rules('occupation_of_student', 'Ocuupation of self', 'required|trim|max_length[50]');
				$this -> form_validation -> set_rules('street_1', 'Street', 'required|trim|max_length[100]');
				$this -> form_validation -> set_rules('street_2', 'Street', 'required|trim|max_length[100]');
				$this -> form_validation -> set_rules('cityid', 'City', 'required');
				$this -> form_validation -> set_rules('stateid', 'State', 'required');
				$this -> form_validation -> set_rules('coursecategory', 'Course Category', 'required|trim|numeric|max_length[11]');
				$this -> form_validation -> set_rules('course', 'Course', 'required|trim|alpha_numeric|max_length[100]');
				$this -> form_validation -> set_rules('date_of_doj', 'Date of Joining', 'required|trim|callback__checkingDate');
				$this -> form_validation -> set_rules('name_of_institute', 'Institute Name', 'required|trim|min_length[5]');
				$this -> form_validation -> set_rules('occupation_of_guardian', 'Ocuupation of Gurdian', 'required|trim|max_length[50]');
				$this -> form_validation -> set_rules('reference', 'Reference', 'required|trim');

				if ($this -> form_validation -> run() == FALSE) {
					die(validation_errors());
					$this -> data['validate'] = true;
				} else {
					$inquiryData = array('inquiryStudentFirstName' => $_POST['first_name'], 'inquiryStudentMiddleName' => $_POST['middle_name'], 'inquiryStudentLastName' => $_POST['last_name'], 'inquiryDOB' => date("Y-m-d", strtotime($_POST['date_of_birth'])), 'inquiryContactNumber' => $_POST['mobile_no'], 'inquiryStudentOccupation' => $_POST['occupation_of_student'], 'inquiryQualification' => $_POST['qualification'], 'inquiryEmailAddress' => $_POST['email'], 'inquiryStreet1' => $_POST['street_1'], 'inquiryStreet2' => $_POST['street_2'], 'cityId' => $_POST['cityid'], 'stateId' => $_POST['stateid'], 'inquiryPostalCode' => $_POST['pin_code'], 'inquiryInstituteName' => $_POST['name_of_institute'], 'inquiryGuardianName' => $_POST['name_of_guardian'], 'inquiryGuardianOccupation' => $_POST['occupation_of_guardian'], 'inquiryReferenceName' => $_POST['reference'], 'inquirybranchCode' => $this -> branchCode, 'courseCode' => $_POST['course'], 'inquiryExpectedJoiningDate' => date("Y-m-d", strtotime($_POST['date_of_doj'])), 'inquiryDate' => date("Y-m-d"));
					if ($_POST['inquiryId'] != "" ? $this -> inquiry_model -> updateinquiry($inquiryData, $_POST['inquiryId']) : $this -> inquiry_model -> addinquiry($inquiryData)) {
						redirect(base_url() . "branch_manager/inquiry");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager_counsellor/inquiry', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/inquiry_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_inquiry($inquiryId) {
		$this -> load -> model('inquiry_model');
		$this -> inquiry_model -> deleteInquiry($inquiryId);
		redirect(base_url() . "branch_manager/inquiry");
	}

	//Student Registration
	public function studentregistration() {
		$this->data['menu'] = "student registration";
		$this -> load -> model('user_model');
		if (isset($_POST['registerStudent'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('firstname', 'First Name', 'required|trim|alpha|max_length[50]');
			$this -> form_validation -> set_rules('lastname', 'Last Name', 'required|trim|alpha|max_length[50]');
			$this -> form_validation -> set_rules('email', 'Email ID', 'required|trim|valid_email');
			$this -> form_validation -> set_rules('contact_number', 'Contact Number', 'required|trim|numeric|max_length[15]|min_length[10]');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$userData = array();
				$userData['userId'] = $this -> user_model -> getMaxId(date('Y'), $this -> branchCode, 5);
				$userData['userPassword'] = md5($this -> user_model -> randomPassword());
				$userData['userFirstName'] = $_POST['firstname'];
				$userData['branchCode'] = $this -> branchCode;
				$userData['roleId'] = 5;
				$userData['userMiddleName'] = $_POST['middlename'];
				$userData['userLastName'] = $_POST['lastname'];
				$userData['userEmailAddress'] = $_POST['email'];
				$userData['userContactNumber'] = $_POST['contact_number'];
				$userData['userJoiningDate'] = date("Y-m-d");

				$config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => 465, 'smtp_user' => 'swegroup3@gmail.com', 'smtp_pass' => '@SweGroup3@', 'mailtype' => 'html', 'charset' => 'iso-8859-1');
				$this -> load -> library('email', $config);
				$this -> email -> set_newline("\r\n");
				$this -> email -> from('swegroup3@gmail.com@gmail.com', 'Akshar Design Solution');
				$this -> email -> to($_POST['email']);
				$this -> email -> subject('Registration');

				$text = 'Hi ' . $_POST['firstname'] . ' ' . $_POST['middlename'] . ' ' . $_POST['lastname'] . ',' . "<br>" . 'This mail is from <b>Akshar Design Solution</b> to provide you confirmation that your registration has been done successfully.' . "<br><br>" . 'Your Login Credentials are:' . "<br>" . 'LoginId - ' . $userData['userId'] . "<br>" . 'LoginId - ' . $userData['userPassword'] . "<br><br><br>" . 'You are Required to login and change password <a href="localhost/akshar_design_solution/login/" target="_blank">Login Here</a>';
				$this -> email -> message($text);
				if ($this -> user_model -> addUser($userData) && $this -> email -> send())
				{
					$profile = array();
					$profile['studentUserId'] = $userData['userId'];
					$this -> load -> model('student_profile_model');
					$this -> student_profile_model -> addUserProfile($profile);
					redirect(base_url() . "counsellor/studentregistration");
				} else {
					$this -> data['error'] = "An Error Occured.";
				}
			}
		} else if (isset($_POST['registerCourse'])) {
			$this -> load -> model('student_batch_model');
			$this -> load -> model('batch_model');
			$this -> load -> model('student_batch_model');
			$presentCount = $this -> student_batch_model -> getBatchCount($_POST['batchid']);
			$maxLimit = $this -> batch_model -> getBatchLimit($_POST['batchid']);
			if ($maxLimit['batchStrength'] - $presentCount['c'] == 0 && $presentCount != null) {
				$this -> data['error'] = "Batch Full";
				redirect(base_url() . "branch_manager_counsellor/studentregistration");
			}
			if (isset($_POST['isbookissue']))
				$val = 1;
			else
				$val = 0;
			$studentBatchData = array('studentId' => $_POST['studentid'], 'StudentBatchHasReceivedSet' => $val, 'batchId' => $_POST['batchid'], 'studentBatchFeeAmount' => $_POST['course_fees'], 'studentBatchRegistrationDate' => date("Y-m-d"));
			if ($this -> student_batch_model -> addStudentbatch($studentBatchData)) {
				redirect(base_url() . "branch_manager_counsellor/studentregistration");
			} else {
				$this -> data['error'] = "An Error Occured.";
			}
		} else {

			$this -> load -> model('course_category_model');
			$this -> data['title'] = "ADS | Student Registration";
			$courseCategoryName = $this -> course_category_model -> getDetailsOfCourseCategory();
			$this -> data['category'] = $courseCategoryName;
			$this -> data['student'] = $this -> user_model -> getDetailsByBranchAndRole($this -> branchCode, 5);
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/student_register_css');
			$this -> load -> view('backend/master_page/header');

			$this -> load -> view('backend/branch_manager_counsellor/student_register');
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/student_register_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	//Book_Inventory
	public function book_inventory($bookinventoryId = '') {
		$this->data['menu'] = "book inventory";
		$this -> load -> model("book_inventory_model");
		if ($bookinventoryId != '') {
			$this -> data['inventory'] = $this -> book_inventory_model -> getDetailsByInventory($this -> branchCode, $bookinventoryId);
			echo json_encode($this -> data);
		} else {
			$this -> data['title'] = "ADS | Book Inventory";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/book_inventory_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> model("course_model");
			$this -> data['course'] = $this -> course_model -> getDetailsOfCourse();
			$this -> data['inventory'] = $this -> book_inventory_model -> getDetailsByBranch($this -> branchCode);
			if (isset($_POST['submitInventory'])) {
				$this -> load -> library("form_validation");
				$this -> form_validation -> set_rules('course_id', 'Course Name', 'required|trim|alpha_numeric');
				$this -> form_validation -> set_rules('inventory_quantity', 'Quantity', 'required|trim|numeric|max_length[10]');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$inventoryData = array('inventoryInwardQuantity' => $_POST['inventory_quantity'], 'inventoryInwardDate' => date("Y-m-d", strtotime($_POST['inward_date'])), 'courseCode' => $_POST['course_id'], 'branchCode' => $this -> branchCode);
					if ($_POST['inventoryInwardId'] != "" ? $this -> book_inventory_model -> updateinventory($inventoryData, $_POST['inventoryInwardId']) : $this -> book_inventory_model -> addinventory($inventoryData)) {
						redirect(base_url() . "branch_manager/book_inventory");
					} else {
						$this -> data['error'] = "An Error Occured.";
					}
				}
			}
			$this -> load -> view('backend/branch_manager_counsellor/book_inventory', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/book_inventory_js');
		}
	}

	public function delete_inventory($inventoryInwardId) {
		$this -> load -> model('book_inventory_model');
		$this -> book_inventory_model -> deleteInventory($inventoryInwardId);
		redirect(base_url() . "branch_manager/book_inventory");
	}

	//Fees Payment
	public function fees_payment() {
		$this->data['menu'] = "fees payment";
		if (isset($_POST['submitPayment'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('payment_date', 'Payment Date', 'required|trim|callback__checkingDate');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				if (isset($_POST['paymemt_mode']))
					$type = 1;
				else
					$type = 0;

				$this -> load -> model('fee_model');
				$feesData = array('feesAmount' => $_POST['total_amount'], 'feesDate' => date("Y-m-d", strtotime($_POST['payment_date'])), 'feesMode' => $type, 'studentId' => $_POST['studentid']);
				if ($this -> fee_model -> addFee($feesData)) {
					$getMaximumFeeId = $this -> fee_model -> getLastId($feesData);
					$feeId = $getMaximumFeeId['feesId'];
					if ($type == 1) {
						$chequeData = array('feesId' => $feeId, 'chequeNumber' => $_POST['cheque_number'], 'feesChequeBankName' => $_POST['bankname'], 'feesChequeIssueDate' => date("Y-m-d", strtotime($_POST['cheque_issue_date'])), 'feesChequeIFSC' => $_POST['ifrc_code'], 'feesChequeBankBranchName' => $_POST['branchname']);
						$this -> load -> model('fees_cheque_model');
						$this -> fees_cheque_model -> addFeeCheque($chequeData);
					}

					$size = sizeof($_POST["payment_studentBatchId"]);
					$this -> load -> model('fees_details_model');
					$this -> load -> model('student_batch_model');
					for ($i = 0; $i < $size; $i++) {
						$feeDetailData = array('feesId' => $feeId, 'studentBatchId' => $_POST['payment_studentBatchId'][$i], 'feesDetailsAmount' => $_POST['payment_details'][$i]);
						$this -> fees_details_model -> addFeeDetails($feeDetailData);
					}
					redirect(base_url() . "branch_manager/fees_payment");
				} else {
					$this -> data['error'] = "An Error Occured.";
				}

			}
		} else {
			$this -> load -> model('user_model');
			$this -> data['student'] = $this -> user_model -> getDetailsByBranchAndRole($this -> branchCode, 5);
			$this -> load -> model("fee_model");
			$this -> data['fee_list'] = $this -> fee_model -> getFeeDetailsByBranch($this -> branchCode);
			$this -> data['title'] = "ADS | Fess Payment";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/fees_payment_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> view('backend/branch_manager_counsellor/fees_payment');
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/fees_payment_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	public function delete_fees($feesId) {
		$this -> load -> model('fee_model');
		$this -> fee_model -> deletefees($feesId);
		redirect(base_url() . "branch_manager_counsellor/fees_payment");
	}

	//Fees Receipt
	public function fees_receipt() {
		$this->data['menu'] = "fees payment";
		$this -> data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/feesreceipt_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager_counsellor/fees_receipt');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/feesreceipt_js');
		$this -> load -> view('backend/master_page/bottom');
	}

}
