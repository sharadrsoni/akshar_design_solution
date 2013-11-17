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
		$this -> load -> model("branch_model");
		$branchName = $this -> branch_model -> getDetailsOfBranch();
		$this -> data['branch'] = $branchName;
		$this -> data['title'] = "ADS | Send Notifications";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/sendnotification_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/send_notification');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/sendnotification_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Send Notification Admin
	public function send_notification_admin() {
		if (isset($_POST['register'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('message', 'Message', 'required|trim');
			if ($this -> form_validation -> run() == FALSE) {
				$this -> data['validate'] = true;
			} else {
				$date = date("Y/m/d");
				$notificationData = array('notificationSendDate' => $date, 'notificationDescription' => $_POST['message'], 'userId' => $this -> userId);
				if (isset($_POST['user_role'])) {
					if (isset($_POST['branch_Batch'])) {
						$branchId = explode(",", $_POST['branch_name']);
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($notificationId);
						for ($i = 0; $i < $size; $i++) {
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReciverCategory' => 1, 'userId' => $branchId[$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					} else {
						$batchId = explode(",", $_POST['batch_name']);
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($notificationId);
						for ($i = 0; $i < $size; $i++) {
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReciverCategory' => 1, 'userId' => $batchId[$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					}
				} else {
					if (isset($_POST['individual_Batch'])) {
						$userId = explode(",", $_POST['user_name']);
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($notificationId);
						for ($i = 0; $i < $size; $i++) {
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReciverCategory' => 1, 'userId' => $userId[$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					} else {
						$branchId = explode(",", $_POST['branch_name']);
						$this -> load -> model("notification_model");
						$this -> load -> model("notification_receiver_model");
						$this -> notification_model -> addNotification($notificationData);
						$notificationId = $this -> notification_model -> getId($notificationData);
						$size = sizeof($notificationId);
						for ($i = 0; $i < $size; $i++) {
							$receiverData = array('notificationId' => $notificationId['notificationId'], 'notificationReciverCategory' => 1, 'userId' => $branchId[$i]);
							$this -> notification_receiver_model -> addReceiver($receiverData);
						}
					}

				}
				
				redirect(base_url() . "staff/send_notification_admin");
			}
		} else {

			$this -> load -> model("branch_model");
			$branchName = $this -> branch_model -> getDetailsOfBranch();
			$this -> data['branch'] = $branchName;
			$this -> data['title'] = "ADS | Send Notifications";
			$this -> load -> view('backend/master_page/top', $this -> data);
			$this -> load -> view('backend/css/sendnotification_css');
			$this -> load -> view('backend/master_page/header');
			$this -> load -> view('backend/branch_manager/send_notification',$this -> data);
			$this -> load -> view('backend/master_page/footer');
			$this -> load -> view('backend/js/sendnotification_js');
			$this -> load -> view('backend/master_page/bottom');
		}
	}

	//Profile
	public function profile() {

		$this -> data['title'] = "ADS | Profile";
		$this -> load -> model('user_model');
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/student_profile_css');
		$data['profile'] = $this -> user_model -> getDetailsbyUser($this -> userId);
		$this -> load -> view('backend/master_page/header', $data);

		if (isset($_POST['edit_profile'])) {
			$staffData = array('userFirstName' => $_POST['first_name'], 'userMiddleName' => $_POST['middle_name'], 'userLastName' => $_POST['last_name'], 'userDOB' => $_POST['date_of_birth'], 'userContactNumber' => $_POST['mobile_no'], 'userEmailAddress' => $_POST['email'], 'userQualification' => $_POST['qualification'], 'userStreet1' => $_POST['street_1'], 'userStreet2' => $_POST['street_2'], 'userPostalCode' => $_POST['pin_code'], 'userState' => $_POST['state'], 'userCity' => $_POST['city']);
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
			$staffData = array('avtar' => $fileData['file_name']);
			$this -> user_model -> updateUser($staffData, $this -> userId);
			redirect(base_url() . "staff/profile");
		}

		if (isset($_POST['change_password'])) {
			$this -> load -> library("form_validation");
			$this -> form_validation -> set_rules('current_password', 'Current Password', 'required|trim');
			$this -> form_validation -> set_rules('new_password', 'New Password', 'required|trim');
			$this -> form_validation -> set_rules('re_new_password', 'Confirm New Password', 'required|trim');
			$this -> form_validation -> set_rules('new_password', 'Confirm New Password', 'required|matches[re_new_password]|trim');
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
		$this -> load -> view('backend/branch_manager/staff_profile');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_profile_js');
		$this -> load -> view('backend/master_page/bottom');
	}

}
