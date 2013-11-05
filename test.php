public function staff() {

		$roleId = 1;

		$data['title'] = "ADS | Staff";
		$this -> load -> view('backend/master_page/top', $data);
		$this -> load -> view('backend/css/staff_css');
		$this -> load -> view('backend/master_page/header');
		
		$this -> load -> model("staff_model");
		$staff = $this -> staff_model -> getAllDetails();

		$this -> load -> model("role_model");
		$facultyName = $this -> role_model -> getDetailsByRole($roleId);
		
		$this -> load -> view('backend/js/staff_js');
		$this -> load -> view('backend/master_page/bottom');
}