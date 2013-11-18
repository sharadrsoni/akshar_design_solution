<?php
date_default_timezone_set('UTC');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Courses extends CI_Controller{

	public function index(){
		$this->load->model('course_model');
		$this -> data['course'] = $this -> course_model -> getDetailsOfCourse();
		$this -> load -> view('frontend/courses',$this->data);
	}
}
?>