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

	//Random Password Genterator Function
	function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789`~!@#$%^&*";
		$pass = array();
		//remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1;
		//put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);
		//turn the array into a string
	}

	//Inquiry
	public function inquiry($inquiryID = '') {
		$this -> load -> model("inquiry_model");
		$this -> load -> model("course_category_model");
		$courseCategoryName = $this -> course_category_model -> getDetailsOfCourseCategory();
		$this->data['category'] = $courseCategoryName;
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
				$this -> form_validation -> set_rules('first_name', 'First Name', 'required|trim');
				$this -> form_validation -> set_rules('middle_name', 'Middle Name', 'required|trim');
				$this -> form_validation -> set_rules('last_name', 'Last Name', 'required|trim');
				$this -> form_validation -> set_rules('date_of_birth', 'Date Of Birth', 'required|trim');
				$this -> form_validation -> set_rules('mobile_no', 'Mobile No', 'required|trim');
				$this -> form_validation -> set_rules('email', 'email', 'required|trim');
				$this -> form_validation -> set_rules('qualification', 'qualification', 'required|trim');
				$this -> form_validation -> set_rules('email', 'email', 'required|trim');
				$this -> form_validation -> set_rules('occupation_of_student', 'Ocuupation of self', 'required|trim');
				$this -> form_validation -> set_rules('street_1', 'Street', 'required|trim');
				$this -> form_validation -> set_rules('street_2', 'Street', 'required|trim');
				$this -> form_validation -> set_rules('city', 'City', 'required|trim');
				$this -> form_validation -> set_rules('state', 'State', 'required|trim');
				$this -> form_validation -> set_rules('coursecategory', 'Course Category', 'required|trim');
				$this -> form_validation -> set_rules('course', 'Course', 'required|trim');
				$this -> form_validation -> set_rules('date_of_doj', 'Date of Joining', 'required|trim');
				$this -> form_validation -> set_rules('name_of_institute', 'Institute Name', 'required|trim');
				$this -> form_validation -> set_rules('occupation_of_guardian', 'Ocuupation of Gurdian', 'required|trim');
				$this -> form_validation -> set_rules('reference', 'Reference', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$inquiryData = array('inquiryStudentFirstName' => $_POST['first_name'], 'inquiryStudentMiddleName' => $_POST['middle_name'], 'inquiryStudentLastName' => $_POST['last_name'], 'inquiryDOB' => date("Y-m-d", strtotime($_POST['date_of_birth'])), 'inquiryContactNumber' => $_POST['mobile_no'], 'inquiryStudentOccupation' => $_POST['occupation_of_student'], 'inquiryQualification' => $_POST['qualification'], 'inquiryEmailAddress' => $_POST['email'], 'inquiryStreet1' => $_POST['street_1'], 'inquiryStreet2' => $_POST['street_2'], 'inquiryCity' => $_POST['city'], 'inquiryState' => $_POST['state'], 'inquiryPostalCode' => $_POST['pin_code'], 'inquiryInstituteName' => $_POST['name_of_institute'], 'inquiryGuardianOccupation' => $_POST['occupation_of_guardian'], 'inquiryReferenceName' => $_POST['reference'], 'inquirybranchCode' => $this -> branchCode,'courseCode' => $_POST['course'],'inquiryExpectedDOJ' => date("Y-m-d", strtotime($_POST['date_of_doj'])),'inquiryDate' => now());
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
		$this -> load -> model('user_model');
		if (isset($_POST['registerStudent'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('firstname', 'First Name', 'required|trim');
			$this -> form_validation -> set_rules('lastname', 'Last Name', 'required|trim');
			$this -> form_validation -> set_rules('email', 'Email ID', 'required|trim');
			$this -> form_validation -> set_rules('contact_number', 'Contact Number', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$maxuserId = $this -> user_model -> getMaxId();
				$userId = $maxuserId['userId'];
				$userId = floatval($userId);
				if ($userId != null) {
					$userId++;
				} else {
					$userId = 1;
				}
				if ($userId < 10) {
					$userId = "00" . $userId;
				} else if ($userId < 100 && $userId > 9) {
					$userId = "0" . $userId;
				}
				$pass = $this -> randomPassword();
				$userData = array('userId' => $userId, 'userFirstName' => $_POST['firstname'], 'branchCode' => $this -> branchCode, 'roleId' => 5, 'userPassword' => $pass, 'userMiddleName' => $_POST['middlename'], 'userLastName' => $_POST['lastname'], 'userEmailAddress' => $_POST['email'], 'userContactNumber' => $_POST['contact_number']);
				if ($this -> user_model -> addUser($userData)) {
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
				if($maxLimit['batchStrength'] - $presentCount['c'] ==0 && $presentCount != null)
				{
					$this -> data['error'] = "Batch Full";
					redirect(base_url() . "branch_manager_counsellor/studentregistration");
				}
			if (isset($_POST['isbookissue']))
				$val = 1;
			else
				$val = 0;
			$studentBatchData = array('studentId' => $_POST['studentid'], 'StudentBatchHasReceivedSet' => $val, 'batchId' => $_POST['batchid'],'courseFees' => $_POST['course_fees']);
			if ($this -> student_batch_model -> addStudentbatch($studentBatchData)) {
				redirect(base_url() . "branch_manager_counsellor/studentregistration");
			} else {
				$this -> data['error'] = "An Error Occured.";
			}
		} else {

			$this -> load -> model('course_model');
			$this -> load -> model('batch_model');
			$this -> data['title'] = "ADS | Student Registration";
			$this -> data['course'] = $this -> course_model -> getDetailsOfCourse();
			$this -> data['student'] = $this -> user_model -> getDetailsByBranchAndRole($this -> branchCode, 5);
			$this -> data['batchId'] = $this -> batch_model -> getDetailsByBranch($this -> branchCode);
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
				$this -> form_validation -> set_rules('course_id', 'Course Name', 'required|trim');
				$this -> form_validation -> set_rules('inventory_quantity', 'Quantity', 'required|trim');
				if ($this -> form_validation -> run() == FALSE) {
					$this -> data['validate'] = true;
				} else {
					$inventoryData = array('inventoryInwardQuantity' => $_POST['inventory_quantity'], 'courseId' => $_POST['course_id'], 'branchCode' => $this -> branchCode);
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

		if (isset($_POST['submitPayment'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('payment_date', 'Payment Date', 'required|trim');
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
					for ($i = 0; $i < $size; $i++) 
					{						
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
