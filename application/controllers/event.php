<?php
date_default_timezone_set('UTC');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Event extends CI_Controller {

	public function index() {
		$this -> load -> model('newsCategory_model');
		$photograph = $this -> newsCategory_model -> getDetailsOfEvent();
		$photographDetails = array();
		foreach ($photograph as $key) {
			$photographDetails[$key->newsCategoryId] = $this -> newsCategory_model -> getEventDetails($key->newsCategoryId);
		}
		$this->data['newsCategories']=$photograph;
		$this->data['newCategoryDetails']=$photographDetails;
		$this -> load -> view('frontend/event', $this -> data);
	}
}
?>