<?php
date_default_timezone_set('UTC');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Course_details extends CI_Controller{

	public function index(){
		$this->load->model('course_model');
		$this->data['course_details']=$this->course_model->getDetailsCourse('IT-473');
		
		$this -> load -> view('frontend/course_details',$this->data);
	}
}
?>