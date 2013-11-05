<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Login extends CI_Controller {

	public function index() {
		$this -> session -> sess_destroy();
		$data = array();
		if (isset($_POST['login'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('username', 'Username', 'required|trim');
			$this -> form_validation -> set_rules('password', 'Password', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$data['validate'] = true;
			} else {
				$loginData = array("userId" => $_POST['username'], "userPassword" => $_POST['password']);
				$this -> load -> model("user_model");
				$response = $this -> user_model -> authenticate($loginData);
				if ($response) {
					$sessionData['userId'] = $response;
					$this -> session -> set_userdata($sessionData);
					switch ($response) {
						case 1 :
							redirect(base_url() . "admin");
							break;
						case 2 :
							redirect(base_url() . "branch_manager");
							break;
						case 3 :
							redirect(base_url() . "faculty");
							break;
						case 4 :
							redirect(base_url() . "counsellor");
							break;
						case 5 :
							redirect(base_url() . "student");
							break;
					}
				} else {
					$data['error'] = "Invalid Username or Password";
				}
			}
		}
		$this -> load -> view("backend/all_users/login", $data);
	}

	//Change Password
	public function changepassword() {
		$data['title'] = "ADS | Change Password";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/changepassword_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/changepassword');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/changepassword_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Send Notification
	public function sendnotification() {
		$data['title'] = "ADS | Target Type";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/sendnotification_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/sendnotification');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/sendnotification_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Profile
	public function profile() {
		$data['title'] = "ADS | Profile";
		$this -> load -> view('backend/master_page/top', $data);
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
		
}
