<?php
date_default_timezone_set('UTC');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Course_details extends CI_Controller{

	public function index(){
		$this -> load -> view('frontend/course_details');
	}
}
?>