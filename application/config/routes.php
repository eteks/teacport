<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

$route['default_controller'] = "home/index";
$route['404_override'] = 'missingpage';

/* Route settings for Jobseeker and Jobprovider */
$route['login/seeker'] = 'job_seeker';
$route['login/provider'] = 'job_provider';
$route['login/facebook'] = 'social/facebook';
$route['login/facebookverify'] = 'social/facebookverify';
$route['login/twitter'] = 'social/twitter';
// $route['login/twitterverify'] = 'social/facebookverify';
// $route['login/twitterify'] = 'social/facebookverify';
$route['login/linkedin'] = 'social/linkedin';

$route['signup/seeker'] = 'job_seeker/signup';
$route['signup/provider'] = 'job_provider/signup';

$route['aboutus'] = 'home/aboutus';
$route['contactus'] = 'home/contactus';

//Route url for admin
$route['admin'] = 'admin/login/index_login';
$route['admin/dashboard'] = 'admin/dashboardpage/dashboard';
$route['admin/state'] = 'admin/adminindex/state';
$route['admin/district'] = 'admin/adminindex/district';
$route['admin/institution_types'] = 'admin/adminindex/institution_types';
$route['admin/extra_curricular'] = 'admin/adminindex/extra_curricular';
$route['admin/languages'] = 'admin/adminindex/languages';
$route['admin/qualification'] = 'admin/adminindex/qualification';
$route['admin/class_level'] = 'admin/adminindex/class_level';
$route['admin/departments'] = 'admin/adminindex/departments';
$route['admin/subject'] = 'admin/adminindex/subject';
$route['admin/dashboard/get_chart_data'] = 'admin/dashboardpage/get_chart_data';

/* End of file routes.php */
/* Location: ./application/config/routes.php */