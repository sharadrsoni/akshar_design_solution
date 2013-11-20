<?php
date_default_timezone_set('UTC');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Contact_us extends CI_Controller{

	public function index(){
		$this->load -> model('course_model');		
		$this -> data["course"] = $this -> course_model -> getDetailsOfCourse();
		$this->load -> model('branch_model');		
		$this -> data["branch"] = $this -> branch_model -> getDetailsOfBranch();
		$this -> load -> view('frontend/contact_us' , $this -> data);
	}
	
	public function query($courseCode)
	{
		$this->data['courseCode']=$courseCode;
		$this->load -> model('course_model');		
		$this -> data["course"] = $this -> course_model -> getDetailsOfCourse();
		$this->load -> model('branch_model');		
		$this -> data["branch"] = $this -> branch_model -> getDetailsOfBranch();
		$this -> load -> view('frontend/contact_us' , $this -> data);
	}
}
?>