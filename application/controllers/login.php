<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Login extends CI_Controller {

	public function index() {
		$this -> data['menu'] = "dashboard";
		$this -> session -> sess_destroy();
		$this -> data = array('error' => '');
		if (isset($_POST['login'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('username', 'Username', 'required|trim|alpha_numeric|max_length[50]');
			$this -> form_validation -> set_rules('password', 'Password', 'required|trim|alpha_numeric');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
				$this -> load -> view("backend/all_users/login", $this -> data);
			} else {
				$loginData = array("userId" => $_POST['username'], "userPassword" => $_POST['password']);
				$this -> load -> model("user_model");
				$response = $this -> user_model -> authenticate($loginData);
				if ($response) {
					//$sessionData = array('userId' => $_POST['username'], 'roleId' => $response);
					$this -> session -> set_userdata('userId', $_POST['username']);
					$this -> session -> set_userdata('roleId', $response);
					switch ($response) {
						case 1 :
							redirect("admin");
							break;
						case 2 :
							redirect("branch_manager");
							break;
						case 3 :
							redirect("faculty");
							break;
						case 4 :
							redirect("counsellor");
							break;
						case 5 :
							redirect("student");
							break;
					}
				} else {
					$this -> data['error'] = "Invalid Username or Password";
					$this -> load -> view("backend/all_users/login", $this -> data);
				}
			}
		} else {
			$this -> load -> view("backend/all_users/login", $this -> data);
		}
	}

	//Change Password
	public function change_password() {
		$this -> data['title'] = "ADS | Change Password";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/changepassword_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/changepassword');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/changepassword_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//forgot password
	public function forgot_password() {
		$this -> data['title'] = "ADS | Forgot Password";
		if (isset($_POST['sendpassword'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('email', 'Email ID', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$this -> load -> model("user_model");
				$randomPassword = $this -> user_model -> randomPassword();
				$userDetail = $this -> user_model -> getUserDetailsbyEmail($_POST['email']);
				if ($userDetail != null) {
					$config = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.googlemail.com', 'smtp_port' => 465, 'smtp_user' => 'swegroup3@gmail.com', 'smtp_pass' => '@SweGroup3@', 'mailtype' => 'html', 'charset' => 'iso-8859-1');
					$this -> load -> library('email', $config);
					$this -> email -> set_newline("\r\n");
					$this -> email -> from('swegroup3@gmail.com@gmail.com', 'Sharad Soni');
					$this -> email -> to($_POST['email']);
					$this -> email -> subject('Email Test');
					$text = 'Hello ' . $userDetail -> userFirstName . ' ' . $userDetail -> userMiddleName . ' ' . $userDetail -> userLastName . ',' . "<br>" . 'This mail is from <b>Akshar Design Solution</b> for reseting your password.' . "<br><br>" . 'Your Temporary Password is:' . "<br>" . 'password - ' . $randomPassword . "<br><br><br>" . 'You are Rrequired to login and change password <a href="localhost/akshar_design_solution/login/" target="_blank">Login Here</a>';
					$this -> email -> message($text);
					$forgot_key = sha1(uniqid());
					$insertData = array("userPassword" => $randomPassword);
					if ($this -> email -> send() && $this -> user_model -> forgot_password($insertData, $_POST['email'])) {
						redirect(base_url() . "login");
					}
				} else {
					redirect(base_url() . "login");
				}
			}
		}
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/all_users/forgot_password');
	}

}
