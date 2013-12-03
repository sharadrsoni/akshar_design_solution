<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;
	protected $userId;
	protected $roleId;
	protected $branchCode;
	protected $data = array();
	/**
	 * Constructor
	 */

	public function authenticate($roleId) {
		$isAuthenticated = false;
		foreach ($roleId as $key) {
			if ($this -> session -> userdata("roleId") == $key) {
				$this -> userId = $this -> session -> userdata("userId");
				$this -> roleId = $this -> session -> userdata("roleId");
				$this -> load -> model("user_model");
				$userDetail = $this -> user_model -> getUserDetails($this -> userId);
				$this -> branchCode = $userDetail -> branchCode;
				$this -> data['username'] = $userDetail -> userFirstName . " " . $userDetail -> userMiddleName . " " . $userDetail -> userLastName;
				$this -> data['avtar'] = $userDetail -> userPhotograph;
				$this -> load -> model("role_model");
				$this -> data['role'] = $this -> role_model -> getDetailsByRole($this -> roleId) -> roleName;
				$this -> data['roleId'] = $this -> roleId;
				$isAuthenticated = true;
				$this->data['notification'] = $this->notification();
				break;
			}
		}
		if (!$isAuthenticated) {
			redirect(base_url() . "login");
		}

	}

	private function notification() {
		return $this->db->query("select U.userFirstName, U.userMiddleName, U.userLastName, notificationDescription FROM user U, notification N, notification_receiver NR where U.userId = N.userId and N.notificationId=NR.notificationId and (NR.userId ='" . $this->userId . "' OR NR.userId ='" . $this->branchCode . "' OR NR.userId IN(SELECT batchId FROM student_batch where studentId = '" . $this->userId . "'))")->result();
	}

	public function __construct() {
		self::$instance = &$this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class) {
			$this -> $var = &load_class($class);
		}

		$this -> load = &load_class('Loader', 'core');

		$this -> load -> initialize();

		log_message('debug', "Controller Class Initialized");
	}

	public static function & get_instance() {
		return self::$instance;
	}

}

// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */
