<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class Student extends CI_Controller {

	function __construct() {
		parent::__construct();
		$users = array(5);
		parent::authenticate($users);
	}

	//Dashboard
	public function index() {
		$data['title'] = "ADS | Dashboard";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/dashboard_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/dashboard');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/dashboard_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Show marks
	public function showmarks() {
		$data['title'] = "ADS | Target Type";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/test_result_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/test_result');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/test_result_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Show Attendance
	public function showattendance() {
		$data['title'] = "ADS | Time Table";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/show_attendance_css');
		$this -> load -> view('backend/master_page/header');
		$this -> load -> view('backend/branch_manager/show_attendance');
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/show_attendance_js');
		$this -> load -> view('backend/master_page/bottom');
	}

	//Profile
	public function profile() {
		$this->load->model('student_model');
		$data['title'] = "ADS | Profile";
		$this -> load -> view('backend/master_page/top', $this -> data);
		$this -> load -> view('backend/css/student_profile_css');
		$this -> load -> view('backend/master_page/header');
		
		if(isset($_POST['edit_profile']))
		{
		
			$studentData=array('userFirstName'=>$_POST['first_name'],'userMiddleName'=>$_POST['middle_name'],'userLastName'=>$_POST['last_name'],'userDOB'=>$_POST['date_of_birth'],'userContactNumber'=>$_POST['mobile_no'],'userEmailAddress'=>$_POST['email'],'userQualification'=>$_POST['qualification'],'userStreet1'=>$_POST['street_1'],'userStreet2'=>$_POST['street_2'],'userPostalCode'=>$_POST['pin_code'],'userState'=>$_POST['state'],'userCity'=>$_POST['city']);
			$otherData=array('studentInstituteName'=>$_POST['name_of_institute'],'studentGuardianName'=>$_POST['guardian_name'],'studentGuardianOccupation'=>$_POST['occupation_of_guardian'],'studentReferenceName'=>$_POST['reference']);
			
			$this->student_model->updateProfile($studentData,$otherData,6);
			redirect(base_url() . "student/profile");
		}
		$data['profile']=$this->student_model->getDetailsById(6);
		$data['moreinfo']=$this->student_model->getDetilsByStudentId(6);
		$this -> load -> view('backend/branch_manager/student_profile',$data);
		$this -> load -> view('backend/master_page/footer');
		$this -> load -> view('backend/js/student_profile_js');
		$this -> load -> view('backend/master_page/bottom');
	}

}
