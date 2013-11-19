<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/*
 | -------------------------------------------------------------------------
 | URI ROUTING
 | -------------------------------------------------------------------------
 | This file lets you re-map URI requests to specific controller functions.
 |
 | Typically there is a one-to-one relationship between a URL string
 | and its corresponding controller class/method. The segments in a
 | URL normally follow this pattern:
 |
 |	example.com/class/method/id/
 |
 | In some instances, however, you may want to remap this relationship
 | so that a different class/function is called than the one
 | corresponding to the URL.
 |
 | Please see the user guide for complete details:
 |
 |	http://codeigniter.com/user_guide/general/routing.html
 |
 | -------------------------------------------------------------------------
 | RESERVED ROUTES
 | -------------------------------------------------------------------------
 |
 | There area two reserved routes:
 |
 |	$route['default_controller'] = 'welcome';
 |
 | This route indicates which controller class should be loaded if the
 | URI contains no data. In the above example, the "welcome" class
 | would be loaded.
 |
 |	$route['404_override'] = 'errors/page_missing';
 |
 | This route will tell the Router what URI segments to use if those provided
 | in the URL cannot be matched to a valid route.
 |
 */

$route['default_controller'] = "welcome";
$route['404_override'] = '';
//Admin
$route['admin/event_type'] = "admin_branch_manager/event_type";
$route['admin/event_type/(:num)'] = "admin_branch_manager/event_type/$1";
$route['admin/delete_event_type'] = "admin_branch_manager/delete_event_type";
$route['admin/send_notification'] = "staff/send_notification_admin";
$route['admin/send_notification/(:num)'] = "staff/send_notification/$1";
$route['admin/search'] = "staff/search";
$route['admin/profile'] = "staff/profile";
$route['admin/profile/(:num)'] = "staff/profile/$1";

//Branch Manager
$route['branch_manager/studentregistration'] = "branch_manager_counsellor/studentregistration";
$route['branch_manager/studentregistration/(:num)'] = "branch_manager_counsellor/studentregistration/$1";
$route['branch_manager/fees_payment'] = "branch_manager_counsellor/fees_payment";
$route['branch_manager/fees_receipt'] = "branch_manager_counsellor/fees_receipt";
$route['branch_manager/inquiry'] = "branch_manager_counsellor/inquiry";
$route['branch_manager/inquiry/(:num)'] = "branch_manager_counsellor/inquiry/$1";
$route['branch_manager/delete_inquiry'] = "branch_manager_counsellor/delete_inquiry";
$route['branch_manager/book_inventory'] = "branch_manager_counsellor/book_inventory";
$route['branch_manager/book_inventory/(:num)'] = "branch_manager_counsellor/book_inventory/$1";
$route['branch_manager/event_type'] = "admin_branch_manager/event_type";
$route['branch_manager/event_type/(:num)'] = "admin_branch_manager/event_type/$1";
$route['branch_manager/delete_event_type'] = "admin_branch_manager/delete_event_type";
$route['branch_manager/send_notification'] = "staff/send_notification";
$route['branch_manager/send_notification/(:num)'] = "staff/send_notification/$1";
$route['branch_manager/profile'] = "staff/profile";

//Faculty
$route['faculty/send_notification'] = "staff/send_notification";
$route['faculty/send_notification/(:num)'] = "staff/send_notification/$1";
$route['faculty/profile'] = "staff/profile";
$route['faculty/search'] = "staff/search";

//Counsellor
$route['counsellor/studentregistration'] = "branch_manager_counsellor/studentregistration";
$route['counsellor/studentregistration/(:num)'] = "branch_manager_counsellor/studentregistration/$1";
$route['counsellor/fees_payment'] = "branch_manager_counsellor/fees_payment";
$route['counsellor/fees_receipt'] = "branch_manager_counsellor/fees_receipt";
$route['counsellor/randomPassword'] = "branch_manager_counsellor/randomPassword";
$route['counsellor/inquiry'] = "branch_manager_counsellor/inquiry";
$route['counsellor/inquiry/(:num)'] = "branch_manager_counsellor/inquiry/$1";
$route['counsellor/delete_inquiry'] = "branch_manager_counsellor/delete_inquiry";
$route['counsellor/send_notification'] = "staff/send_notification";
$route['counsellor/send_notification/(:num)'] = "staff/send_notification/$1";
$route['counsellor/profile'] = "staff/profile";
$route['counsellor/search'] = "staff/search";

//Student
$route['student/send_notification'] = "staff/send_notification";
$route['student/send_notification/(:num)'] = "staff/send_notification/$1";
/* End of file routes.php */
/* Location: ./application/config/routes.php */
