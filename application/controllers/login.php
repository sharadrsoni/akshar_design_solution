<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Login extends CI_Controller {

	public function index() {
		$this -> session -> sess_destroy();
		$this->data = array('error' => '');
		if (isset($_POST['login'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('username', 'Username', 'required|trim|alpha|max_length[50]');
			$this -> form_validation -> set_rules('password', 'Password', 'required|trim|alpha_numeric');
			if ($this -> form_validation -> run() == FALSE) {
				$this->data['validate'] = true;
				$this -> load -> view("backend/all_users/login", $this->data);
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
					$this->data['error'] = "Invalid Username or Password";
					$this -> load -> view("backend/all_users/login", $this->data);
				}
			}
		} else {
			$this -> load -> view("backend/all_users/login", $this->data);
		}
	}

	//Change Password
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

}
