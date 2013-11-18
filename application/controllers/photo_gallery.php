<?php
date_default_timezone_set('UTC');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Photo_gallery extends CI_Controller{

	public function index(){
			$this -> load -> view('frontend/photo_gallery' , $this -> data);
	}
}
?>