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
$route['404_override'] 									= 'missingpage';

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
$route['provider/candidate'] 							= 'job_provider/browse_candidate';
$route['provider/candidate/(:num)'] 					= 'job_provider/browse_candidate/$1';
$route['provider/candidateprofile/(:num)'] 				= 'job_provider/candidateprofile/$1';
$route['provider/postjob'] 								= 'job_provider/postjob';
$route['provider/postedjob'] 							= 'job_provider/postedjob';
$route['provider/postedjob/(:num)'] 					= 'job_provider/postedjob/$1';
$route['provider/postedjobdetail/(:num)'] 				= 'job_provider/postedjobdetail/$1';
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
$route['vacancies'] 									= 'home/vacancies';
$route['vacancies/(:num)']  							= 'home/vacancies/$1';
$route['informations'] 									= 'home/informations';
$route['terms'] 										= 'home/terms';




//Route url for admin
$route['main'] = 'admin/admin_login/teac_admin_login';
$route['main/dashboard'] = 'admin/dashboardpage/dashboard';
$route['main/dashboard/get_chart_data'] = 'admin/dashboardpage/get_chart_data';
$route['main/state'] = 'admin/adminindex/state';
$route['main/district'] = 'admin/adminindex/district';
$route['main/institution_types'] = 'admin/adminindex/institution_types';
$route['main/extra_curricular'] = 'admin/adminindex/extra_curricular';
$route['main/languages'] = 'admin/adminindex/languages';
$route['main/qualification'] = 'admin/adminindex/qualification';
$route['main/class_level'] = 'admin/adminindex/class_level';
$route['main/departments'] = 'admin/adminindex/departments';
$route['main/subject'] = 'admin/adminindex/subject';
$route['main/university'] = 'admin/adminindex/university';
$route['main/postings'] = 'admin/adminindex/posting';
$route['main/job_provider_profile'] = 'admin/job_provider/teacport_job_provider_profile';
$route['main/job_provider_vacancies'] = 'admin/job_provider/teacport_job_provider_vacancies';
$route['main/jobprovider_ads'] = 'admin/job_provider/teacport_job_provider_ads';
$route['main/jobprovider_activities'] = 'admin/job_provider/teacport_job_provider_activities';
$route['main/jobseeker_mailstatus'] = 'admin/job_seeker/teacport_jobseeker_mailstatus';
$route['main/organization_upgrade_or_renewal'] = 'admin/job_provider/organization_upgrade_or_renewal';
$route['main/transaction'] = 'admin/job_provider/transaction';
$route['main/dashboard_filter_vacancy'] = 'admin/dashboardpage/dashboard_filter_vacancy';
$route['main/dashboard_filter_provider'] = 'admin/dashboardpage/dashboard_filter_provider';

$route['main/subscription_plans'] = 'admin/subscription_plan/subscription_plans';
$route['main/plan_upgrade_creation'] = 'admin/subscription_plan/plan_upgrade_creation';
$route['main/organization_plan_notification'] = 'admin/subscription_plan/organization_plan_notification';

$route['main/user_groups'] = 'admin/admin_users/user_groups';
$route['main/user_accounts'] = 'admin/admin_users/user_accounts';
$route['main/privileges'] = 'admin/admin_users/privileges';

$route['main/job_seeker_profile'] = 'admin/job_seeker/teacport_job_seeker_profile';
$route['main/job_seeker_preference'] = 'admin/job_seeker/job_seeker_preference';
$route['main/job_seeker_applied'] = 'admin/job_seeker/job_seeker_applied';
// $route['main/admin_modules'] = 'admin/admin_users/admin_modules';

$route['main/edit_profile'] = 'admin/admin_users/edit_profile';
$route['main/change_password'] = 'admin/admin_users/change_password';
$route['main/logout'] = 'admin/admin_login/teac_admin_logout';

$route['main/payment_gateway'] = 'admin/setting/payment_gateway';
$route['main/sms_gateway'] = 'admin/setting/sms_gateway';
$route['main/configuration_option'] = 'admin/setting/configuration_option';
$route['main/template_logo'] = 'admin/setting/template_logo';

$route['main/site_visit_tracking'] = 'admin/other_module/site_visit_tracking';
$route['main/feedback_form'] = 'admin/other_module/feedback_form';





/* End of file routes.php */
/* Location: ./application/config/routes.php */