<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Branch_manager_consellor extends CI_Controller {

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

}
