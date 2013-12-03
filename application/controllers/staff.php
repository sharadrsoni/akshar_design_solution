<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Staff extends CI_Controller {

	function __construct() {
		parent::__construct();
		$users = array(1, 2, 3, 4);
		parent::authenticate($users);
	}

	//Search
	public function search() {
		$this->data['menu'] = "search";
		$this -> data['title'] = "ADS | Search";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/search_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/search');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/search_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Send Notification
	public function send_notification() {
		$this->data['menu'] = "send notification";
		if (isset($_POST['register'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('message', 'Message', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$date = date("Y/m/d");
				if (isset($_POST['user_role'])) {
					$notificationData = array('notificationSendDate' => $date, 'notificationDescription' => $_POST['message'], 'userId' => $this -> userId, 'notificationStudentStaff' => 1);
					if (isset($_POST['individual_Batch'])) {
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($_POST["user_name"]);						
						for ($i = 1; $i < $size; $i++) {
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReceiverCategory' => 3, 'userId' => $_POST["user_name"][$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					} else {
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($_POST["batch_name"]);						
						for ($i = 1; $i < $size; $i++) {
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReceiverCategory' => 2, 'userId' => $_POST["batch_name"][$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					}
				} else {
					$notificationData = array('notificationSendDate' => $date, 'notificationDescription' => $_POST['message'], 'userId' => $this -> userId, 'notificationStudentStaff' => 0);
					if (isset($_POST['individual_all'])) {
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($_POST["faculty_name"]);						
						for ($i = 0; $i < $size; $i++) {
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReceiverCategory' => 3, 'userId' => $_POST["faculty_name"][$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					} else {
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReceiverCategory' => 1, 'userId' => $this -> branchCode);
						$this -> notification_receiver_model -> addReceiver($receiverData);
					}

				}

				redirect(base_url() . "staff/send_notification_admin");
			}
		} else {

			$this -> load -> model("batch_model");
			$batchName = $this -> batch_model -> getDetailsBranch($this -> branchCode);
			$this -> data['batch'] = $batchName;
			$this -> data['title'] = "ADS | Send Notifications";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/sendnotification_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> view('backend/branch_manager/send_notification');
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/sendnotification_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	//Send Notification Admin
	public function send_notification_admin() {
		$this->data['menu'] = "send notification";
		if (isset($_POST['register'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('message', 'Message', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$date = date("Y/m/d");
				if (isset($_POST['user_role'])) {
					$notificationData = array('notificationSendDate' => $date, 'notificationDescription' => $_POST['message'], 'userId' => $this -> userId, 'notificationStudentStaff' => 1);
					if (isset($_POST['branch_Batch'])) {
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($_POST["branch_name"]);						
						for ($i = 0; $i < $size; $i++) {
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReceiverCategory' => 1, 'userId' => $_POST["branch_name"][$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					} else {
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($_POST["batch_name"]);						
						for ($i = 0; $i < $size; $i++) {
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReceiverCategory' => 2, 'userId' => $_POST["batch_name"][$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					}
				} else {
					$notificationData = array('notificationSendDate' => $date, 'notificationDescription' => $_POST['message'], 'userId' => $this -> userId, 'notificationStudentStaff' => 0);
					if (isset($_POST['individual_Branch'])) {
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($_POST["user_name"]);
						for ($i = 0; $i < $size; $i++) {
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReceiverCategory' => 3, 'userId' => $_POST["user_name"][$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					} else {
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($_POST["branch_name"]);
						for ($i = 0; $i < $size; $i++) {
							
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReceiverCategory' => 1, 'userId' => $_POST["branch_name"][$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					}

				}

				redirect(base_url() . "staff/send_notification_admin");
			}
		} else {

			$this -> load -> model("branch_model");
			$branchName = $this -> branch_model -> getDetailsOfBranch();
			$this -> data['branchName'] = $branchName;
			$this -> data['title'] = "ADS | Send Notifications";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/sendnotification_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> view('backend/branch_manager/send_notification', $this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/sendnotification_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	//Profile
	public function profile() {
		$this -> data['title'] = "ADS | Profile";
		$this->data['menu'] = "profile";
		$this -> load -> model('user_model');
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/student_profile_css');
		$this->data['profile'] = $this -> user_model -> getDetailsbyUser($this -> userId);
		$this -> load -> view('backend/master_page/header', $this->data);
		$this -> load -> model("state_model");
		$this -> data['State'] = $this -> state_model -> getDetailsOfState();
		$this -> load -> model("batch_model");
		$this -> data['event'] = $this -> batch_model -> facultyBatchList($this -> userId);

		if (isset($_POST['edit_profile'])) {
			$staffData = array('userFirstName' => $_POST['first_name'], 'userMiddleName' => $_POST['middle_name'], 'userLastName' => $_POST['last_name'], 'userDOB' => $_POST['date_of_birth'], 'userContactNumber' => $_POST['mobile_no'], 'userEmailAddress' => $_POST['email'], 'userQualification' => $_POST['qualification'], 'userStreet1' => $_POST['street_1'], 'userStreet2' => $_POST['street_2'], 'userPostalCode' => $_POST['pin_code'], 'stateId' => $_POST['stateid'], 'cityId' => $_POST['cityid']);
			$this -> user_model -> updateUser($staffData, $this -> userId);
			redirect(base_url() . "staff/profile");
		}

		if (isset($_POST['change_avatar'])) {
			$config['upload_path'] = './images/avatar';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '10000';
			$config['file_name'] = $this -> userId;
			$this -> load -> library('upload', $config);
			$filed_name = "staff_avatar";
			$this -> upload -> do_upload($filed_name);
			$fileData = $this -> upload -> data();
			$staffData = array('userPhotograph' => $fileData['file_name']);
			$this -> user_model -> updateUser($staffData, $this -> userId);
			redirect(base_url() . "staff/profile");
		}

		if (isset($_POST['change_password'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('current_password', 'Current Password', 'required|trim|alpha_numeric|max_length[50]');
			$this -> form_validation -> set_rules('new_password', 'New Password', 'required|trim|alpha_numeric|max_length[50]');
			$this -> form_validation -> set_rules('re_new_password', 'Confirm New Password', 'required|trim|alpha_numeric|max_length[50]');
			$this -> form_validation -> set_rules('new_password', 'Confirm New Password', 'required|matches[re_new_password]|trim|max_length[50]');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {

				$currPass = $this -> user_model -> getDetailsbyUser($this -> userId, "userPassword");
				if ($currPass != $_POST['current_password']) {
					die("Error");
				} else {
					$staffData = array('userPassword' => $_POST['new_password']);
					$this -> user_model -> updateUser($staffData, $this -> userId);
					die("password changed successfully");

				}

			}
		}
		$this -> load -> view('backend/branch_manager/staff_profile',$this->data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_profile_js');
		$this -> load -> view('backend/master_page/bottom');
	}

}
