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

$route['default_controller'] 							= "home/index";

if (strpos($_SERVER['REQUEST_URI'], 'main') !== FALSE)
	$route['404_override'] 								= 'admin_missingpage';
else
	$route['404_override'] 								= 'missingpage';

/* Route settings for Jobseeker and Jobprovider */
$route['login/seeker'] 									= 'job_seeker';
$route['login/provider'] 								= 'job_provider';
$route['login/featured_job'] 							= 'home/featured_job';
$route['login/facebook'] 								= 'social/facebook';
$route['login/facebookverify'] 							= 'social/facebookverify';
$route['login/seeker/facebook'] 						= 'social/seekerfacebook';
$route['login/seeker/facebookverify'] 					= 'social/seekerfacebookverify';
$route['login/seeker/twitter'] 							= 'social/seekertwitter';
$route['login/seeker/linkedin'] 						= 'social/seekerlinkedin';
$route['login/seeker/google'] 							= 'social/seekergoogle';
$route['login/twitter'] 								= 'social/twitter';
$route['login/linkedin'] 								= 'social/linkedin';
$route['login/google'] 									= 'social/google';
$route['login/provider/forgotpassword'] 				= 'job_provider/forgot_password';
$route['login/seeker/forgotpassword'] 					= 'job_seeker/forgot_password';
//SIGN UP
$route['signup/seeker'] 								= 'job_seeker/signup';
$route['signup/provider'] 								= 'job_provider/signup';
//JOB PROVIDER
$route['provider/dashboard'] 							= 'job_provider/dashboard';
$route['provider/initialdata'] 							= 'job_provider/initialdata';
$route['provider/dashboard/editprofile'] 				= 'job_provider/editprofile';
$route['provider/inbox'] 								= 'job_provider/inbox';
$route['provider/inbox/message'] 						= 'job_provider/inbox_message';
$route['provider/inbox/messagecount'] 					= 'job_provider/inbox_message_count';
$route['provider/inbox/fulldata'] 						= 'job_provider/inbox_message_full_data';
$route['provider/inbox/removedata'] 					= 'job_provider/inbox_message_remove_data';
$route['provider/candidate'] 							= 'job_provider/browse_candidate';
$route['provider/candidate/(:num)'] 					= 'job_provider/browse_candidate/$1';
$route['provider/candidateprofile/(:num)'] 				= 'job_provider/candidateprofile/$1';
$route['provider/postjob'] 								= 'job_provider/postjob';
$route['provider/postedjob'] 							= 'job_provider/postedjob';
$route['provider/postedjob/(:num)'] 					= 'job_provider/postedjob/$1';
$route['provider/postedjobdetail/(:num)'] 				= 'job_provider/postedjobdetail/$1';
$route['provider/editjob/(:num)'] 						= 'job_provider/editjobdetail/$1';
$route['provider/updatejob'] 							= 'job_provider/updatejob';
$route['provider/postedjob/removedata'] 				= 'job_provider/postedjob_remove_data';
$route['provider/postad'] 								= 'job_provider/postad';
$route['provider/subscription'] 						= 'job_provider/subscription';
$route['provider/payment'] 								= 'payu';
$route['provider/paymentreply'] 						= 'payu/reply';
$route['provider/feedback'] 							= 'job_provider/feedback/';
$route['provider/password'] 							= 'job_provider/changepassword/';
$route['provider/resume'] 								= 'job_provider/resume_download';
$route['provider/sendmail'] 							= 'job_provider/sendmail';
$route['provider/logout'] 								= 'job_provider/provider_logout';

//JOB SEEKER
$route['seeker/dashboard'] 								= 'job_seeker/dashboard';
$route['seeker/logout'] 								= 'job_seeker/seeker_logout';
// $route['seeker/initialdata'] 							= 'job_seeker/initialdata';
$route['seeker/editprofile'] 							= 'job_seeker/editprofile';
$route['seeker/inbox'] 								    = 'job_seeker/inbox';
$route['seeker/findjob'] 								= 'job_seeker/findjob';
$route['seeker/findjob/(:num)'] 						= 'job_seeker/findjob/$1';
$route['seeker/jobsapplied'] 							= 'job_seeker/jobsapplied';
$route['seeker/jobsapplied/(:num)'] 					= 'job_seeker/jobsapplied/$1';
$route['seeker/jobsapplieddetails/(:num)'] 				= 'job_seeker/applynow/$1';
// $route['seeker/applynow'] 								= 'job_seeker/applynow';
$route['seeker/applynow/(:num)'] 						= 'job_seeker/applynow/$1';
$route['seeker/password'] 								= 'job_seeker/change_password';
// $route['seeker/allinstitutions'] 						= 'job_seeker/allinstitutions';
$route['seeker/vacancies'] 								= 'job_seeker/vacancies';
$route['seeker/vacancies/(:num)'] 						= 'job_seeker/vacancies/$1';
$route['seeker/inbox/messagecount'] 					= 'job_seeker/inbox_message_count';
$route['seeker/inbox/message'] 							= 'job_seeker/inbox_message';
$route['seeker/inbox/fulldata'] 						= 'job_seeker/inbox_message_full_data';
$route['seeker/seeker_edit_form'] 						= 'job_seeker/edit_profile_validation_ajax';
$route['seeker/feedback'] 								= 'job_seeker/feedback';

//OTHER PAGES
$route['aboutus'] 										= 'home/aboutus';
$route['contactus'] 									= 'home/contactus';							
$route['pricing']										= 'home/pricing';
$route['faq'] 											= 'home/faq';
$route['allinstitutions'] 								= 'home/allinstitutions';
$route['allinstitutions/(:num)'] 						= 'home/allinstitutions/$1';
$route['user-followed-companies/(:num)'] 				= 'home/userfollowedcompanies/$1';
$route['vacancies'] 									= 'home/vacancies';
$route['vacancies/(:num)']  							= 'home/vacancies/$1';
$route['informations'] 									= 'home/informations';
$route['terms'] 										= 'home/terms';




/* ===================          Route settings for Admin Start     ====================== */

$route['main'] = 'admin/admin_login/teac_admin_login';
$route['admin'] = 'admin_missingpage';
$route['main/dashboard'] = 'admin/dashboardpage/dashboard';
$route['main/dashboard/get_chart_data'] = 'admin/dashboardpage/get_chart_data';

/* ===================          Route settings for Admin Master Data Start     ====================== */

/* $route['url_path'] = 'folder_name/controller_name/function_name' */
$route['main/state'] = 'admin/master_data/state';
$route['main/district'] = 'admin/master_data/district';
$route['main/institution_types'] = 'admin/master_data/institution_types';
$route['main/extra_curricular'] = 'admin/master_data/extra_curricular';
$route['main/languages'] = 'admin/master_data/languages';
$route['main/qualification'] = 'admin/master_data/qualification';
$route['main/class_level'] = 'admin/master_data/class_level';
$route['main/departments'] = 'admin/master_data/departments';
$route['main/subject'] = 'admin/master_data/subject';
$route['main/university'] = 'admin/master_data/university';
$route['main/postings'] = 'admin/master_data/posting';

/* ===================          Route settings for Admin Master Data End     ====================== */

/* ===================          Route settings for Admin Job Provider Start     ====================== */

/* $route['url_path'] = 'folder_name/controller_name/function_name' */
$route['main/job_provider_profile'] = 'admin/job_provider/teacport_job_provider_profile';
$route['main/job_provider_edit_profile'] = 'admin/job_provider/teacport_job_provider_profile_ajax';
$route['main/job_provider_vacancies'] = 'admin/job_provider/teacport_job_provider_vacancies';
$route['main/job_provider_edit_vacancy'] = 'admin/job_provider/teacport_job_provider_vacancy_ajax';
$route['main/jobprovider_activities'] = 'admin/job_provider/teacport_job_provider_activities';
$route['main/jobprovider_ads'] = 'admin/job_provider/teacport_job_provider_ads';
$route['main/job_provider_edit_ads'] = 'admin/job_provider/teacport_job_provider_ads_ajax';
$route['main/organization_plan_notification'] = 'admin/job_provider/organization_plan_notification';
$route['main/transaction'] = 'admin/job_provider/transaction';
$route['main/transaction_fullview'] = 'admin/job_provider/get_transaction_full_view';

/* ===================          Route settings for Admin Job Provider End     ====================== */

/* ===================          Route settings for Admin Job Seeker Start     ====================== */

/* $route['url_path'] = 'folder_name/controller_name/function_name' */
$route['main/job_seeker_profile'] = 'admin/job_seeker/teacport_job_seeker_profile';
$route['main/teacport_job_seeker_profile_ajax'] = 'admin/job_seeker/teacport_job_seeker_profile_ajax';
$route['main/job_seeker_preference'] = 'admin/job_seeker/job_seeker_preference';
$route['main/job_seeker_applied'] = 'admin/job_seeker/job_seeker_applied';
$route['main/jobseeker_mailstatus'] = 'admin/job_seeker/teacport_jobseeker_mailstatus';

/* ===================          Route settings for Admin Job Seeker End     ====================== */



$route['main/dashboard_filter_vacancy'] = 'admin/dashboardpage/dashboard_filter_vacancy';
$route['main/dashboard_filter_provider'] = 'admin/dashboardpage/dashboard_filter_provider';

$route['main/subscription_plans'] = 'admin/subscription_plan/subscription_plans';
$route['main/plan_upgrade_creation'] = 'admin/subscription_plan/plan_upgrade_creation';

$route['main/user_groups'] = 'admin/admin_users/user_groups';
$route['main/user_accounts'] = 'admin/admin_users/user_accounts';
$route['main/privileges'] = 'admin/admin_users/privileges';

// $route['main/admin_modules'] = 'admin/admin_users/admin_modules';

$route['main/edit_profile'] = 'admin/admin_users/edit_profile';
$route['main/edit_profile_validation'] = 'admin/admin_users/edit_profile_validation';
$route['main/change_password'] = 'admin/admin_users/change_password';
$route['main/change_password_validation'] = 'admin/admin_users/change_password_validation';
$route['main/logout'] = 'admin/admin_login/teac_admin_logout';

$route['main/payment_gateway'] = 'admin/setting/payment_gateway';
$route['main/sms_gateway'] = 'admin/setting/sms_gateway';
$route['main/configuration_option'] = 'admin/setting/configuration_option';
$route['main/template_logo'] = 'admin/setting/template_logo';

$route['main/site_visit_tracking'] = 'admin/other_module/site_visit_tracking';
$route['main/feedback_form'] = 'admin/other_module/feedback_form';
$route['main/admin_login'] = 'admin/admin_login';
$route['main/subscription_plans_ajax'] = 'admin/subscription_plan/subscription_plans_ajax';
$route['main/get_feedback_full_view'] = 'admin/other_module/get_feedback_full_view';
$route['main/admin_forget'] = 'admin/admin_login/admin_forget';

/* ===================          Route settings for Admin End     ====================== */


/* End of file routes.php */
/* Location: ./application/config/routes.php */