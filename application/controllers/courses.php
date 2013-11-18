<?php
date_default_timezone_set('UTC');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Courses extends CI_Controller{

	public function index(){
		$this->load->model('course_model');
		$this -> data['course_category'] = $this -> course_model -> getCourseCategory();
		$this->data['course']=$this->course_model->getDetailsOfCourse();
		$this -> load -> view('frontend/courses',$this->data);
	}
	
	public function course_details($courseCode)
	{
		$this->load->model('course_model');
		$this->data['course_details']=$this->course_model->getDetailsOfCourseByCode($courseCode);
		$this -> load -> view('frontend/course_details',$this->data);
	}
}
?>