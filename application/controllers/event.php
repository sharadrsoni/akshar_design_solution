<?php
date_default_timezone_set('UTC');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Event extends CI_Controller{

	public function index(){
			$this -> load -> view('frontend/event' , $this -> data);
	}
}
?>