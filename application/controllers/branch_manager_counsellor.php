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

	public function delete_inquiry($inquiryId) {
		$this -> load -> model('inquiry_model');
		$this -> inquiry_model -> deleteInquiry($inquiryId);
		redirect(base_url() . "branch_manager/inquiry");
	}

	//Student Registration
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

	//Fees Payment
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

	//Fees Receipt
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

}
