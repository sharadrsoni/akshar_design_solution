<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class newsCategory_model extends CI_Model {

	public function getDetailsOfEvent() {
		return $this -> db -> get("news_category") -> result();
	}
	
	public function getEventDetails($newsCategoryId) {
		$this -> db -> where("newsCategoryId", $newsCategoryId);
		return $this -> db -> select('newsCategoryDetailsPhotograph') -> get('news_category_details') -> result();	
	}

}
?>