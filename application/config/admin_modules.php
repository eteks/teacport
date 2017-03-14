<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
------------------------------------------------------------------------------
In this file, declares all the global variable going to be used in Admin model, 
view and controller
------------------------------------------------------------------------------
*/

//Multidimensional array(Admin Modules) to store the main_module, sub_module and display icon
//sub_module contains the module_name, operation_available for that module, route_url to redirect the page
$config['admin_modules'] = array(
	array(
		'main_module' => 'home',
		'sub_module' => array(
		array(
			'name' => 'dashboard', 
			'access_operation' => 'view', 
			'route_url' => base_url().'main/dashboard' 
		)),
		'icon_name' => 'icon-home'
	),

	array(
		'main_module' => 'admin users',
		'sub_module' => array(
		array(
			'name' => 'user groups', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'main/user_groups' 
		),
		array(
			'name' => 'user accounts', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'main/user_accounts' 
		),
		array(
			'name' => 'privileges', 
			'access_operation' => 'edit,view', 
			'route_url' => base_url().'main/privileges' 
		)),
		'icon_name' => 'icon-user'
	),

	array(
		'main_module' => 'master data',
		'sub_module' => array(
		array(
			'name' => 'state', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'main/state' 
		),
		array(
			'name' => 'district', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'main/district' 
		),
		array(
			'name' => 'institution type', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'main/institution_types' 
		),
		array(
			'name' => 'extra curricular', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'main/extra_curricular' 
		),
		array(
			'name' => 'languages', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'main/languages' 
		),
		array(
			'name' => 'qualification', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'main/qualification' 
		),
		array(
			'name' => 'class level', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'main/class_level' 
		),
		array(
			'name' => 'department', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'main/departments' 
		),
		array(
			'name' => 'subject', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'main/subject' 
		),
		array(
			'name' => 'university / board', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'main/university' 
		),
		array(
			'name' => 'posting details', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'main/postings' 
		)),
		'icon_name' => 'icon-th'
	),

	array(
		'main_module' => 'job providers',
		'sub_module' => array(
		array(
			'name' => 'profile', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'main/job_provider_profile' 
		),
		array(
			'name' => 'vacancies posted', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'main/job_provider_vacancies' 
		),
		array(
			'name' => 'organization activities', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'main/jobprovider_activities' 
		),
		array(
			'name' => 'ads posted', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'main/jobprovider_ads' 
		),
		// array(
		// 	'name' => 'organization plan notification', 
		// 	'access_operation' => 'view', 
		// 	'route_url' => base_url().'main/organization_plan_notification' 
		// ),
		array(
			'name' => 'transaction', 
			'access_operation' => 'view', 
			'route_url' => base_url().'main/transaction' 
		)),
		'icon_name' => 'icon-sitemap'
	),

	array(
		'main_module' => 'job seekers',
		'sub_module' => array(
		array(
			'name' => 'profile', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'main/job_seeker_profile' 
		),
		array(
			'name' => 'job preferences', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'main/job_seeker_preference' 
		),
		array(
			'name' => 'job applied', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'main/job_seeker_applied' 
		),
		array(
			'name' => 'candidate approved job mail & status', 
			'access_operation' => 'view', 
			'route_url' => base_url().'main/jobseeker_mailstatus' 
		)),
		'icon_name' => 'icon-search'
	),

	array(
		'main_module' => 'plan settings',
		'sub_module' => array(
		array(
			'name' => 'plan creation & maintanence', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'main/subscription_plans' 
		),
		array(
			'name' => 'plan upgrade creation', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'main/customize_plan_settings' 
		)),
		'icon_name' => 'icon-wrench'
	),

	array(
		'main_module' => 'settings',
		'sub_module' => array(
		array(
			'name' => 'payment gateway setting', 
			'access_operation' => 'view', 
			'route_url' => base_url().'main/payment_gateway' 
		),
		array(
			'name' => 'SMS gateway setting', 
			'access_operation' => 'view', 
			'route_url' => base_url().'main/sms_gateway' 
		),
		array(
			'name' => 'configuration option', 
			'access_operation' => 'view', 
			'route_url' => base_url().'main/configuration_option' 
		),
		array(
			'name' => 'template logo', 
			'access_operation' => 'view', 
			'route_url' => base_url().'main/template_logo' 
		),
		// array(
		// 	'name' => 'Feed Bank Details', 
		// 	'access_operation' => 'view', 
		// 	'route_url' => base_url().'main/bank_details' 
		// )
		),
		'icon_name' => 'icon-cogs'
	),

	array(
		'main_module' => 'others',
		'sub_module' => array(
		array(
			'name' => 'feedback form', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'main/feedback_form' 
		),
		// array(
		// 	'name' => 'site visits tracking', 
		// 	'access_operation' => 'view', 
		// 	'route_url' => base_url().'main/site_visit_tracking' 
		// ),
		array(
			'name' => 'latest news', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'main/latest_news' 
		),
		array(
			'name' => 'site log', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'main/site_log' 
		)),
		'icon_name' => 'icon-tasks'
	),
);

$config['admin_operation_rights'] = array();
$config['current_page_rights'] = array();
$config['is_super_admin'] = false;
$config['access_rights'] = array();

/*added by thangam*/
$config['feedback_data'] = array();
$config['feedback_count'] = '';