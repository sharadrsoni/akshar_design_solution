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
		$this->data['title'] = "ADS | Search";
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
		$this-> data['branch'] = $branchName;			
		$this->data['title'] = "ADS | Target Type";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/sendnotification_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/sendnotification');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/sendnotification_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Send Notification Admin
	public function send_notification_admin() {
		$this -> load -> model("branch_model");
		$branchName = $this -> branch_model -> getDetailsOfBranch();
		$this-> data['branch'] = $branchName;			
		$this->data['title'] = "ADS | Target Type";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/sendnotification_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/sendnotification');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/sendnotification_js');
		$this -> load -> view('backend/master_page/bottom');
	}


	//Profile
	public function profile() {

		$this->data['title'] = "ADS | Profile";
		$this->load->model('staff_model');
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/student_profile_css');
		$this -> load -> view('backend/master_page/header');
		if(isset($_POST['edit_profile']))
		{
			$staffData=array('userFirstName'=>$_POST['first_name'],'userMiddleName'=>$_POST['middle_name'],'userLastName'=>$_POST['last_name'],'userDOB'=>$_POST['date_of_birth'],'userContactNumber'=>$_POST['mobile_no'],'userEmailAddress'=>$_POST['email'],'userQualification'=>$_POST['qualification'],'userStreet1'=>$_POST['street_1'],'userStreet2'=>$_POST['street_2'],'userPostalCode'=>$_POST['pin_code'],'userState'=>$_POST['state'],'userCity'=>$_POST['city']);
			$this->staff_model->updateProfile($staffData,3);
			redirect(base_url() . "staff/profile");
		}
		
		$data['profile']=$this->staff_model->getDetailsById(3);
		$this -> load -> view('backend/branch_manager/staff_profile',$data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_profile_js');
		$this -> load -> view('backend/master_page/bottom');
	}
	}
