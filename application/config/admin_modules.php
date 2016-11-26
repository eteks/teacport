<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Multidimensional array to store the main_module and sub_module
//sub_module contains the module_name, operation_available for that module,route_url to redirect the page
$config['admin_modules'] = array(
	array(
		'main_module' => 'home',
		'sub_module' => array(
		array(
			'name' => 'dashboard', 
			'access_operation' => 'view', 
			'route_url' => base_url().'admin/dashboard' 
	))),

	array(
		'main_module' => 'admin users',
		'sub_module' => array(
		array(
			'name' => 'user groups', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'admin/user_groups' 
		),
		array(
			'name' => 'user accounts', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'admin/user_accounts' 
		),
		array(
			'name' => 'privileges', 
			'access_operation' => 'edit,view', 
			'route_url' => base_url().'admin/privileges' 
	))),

	array(
		'main_module' => 'master data',
		'sub_module' => array(
		array(
			'name' => 'state', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'admin/state' 
		),
		array(
			'name' => 'district', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'admin/district' 
		),
		array(
			'name' => 'institution type', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'admin/institution_types' 
		),
		array(
			'name' => 'extra curricular', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'admin/extra_curricular' 
		),
		array(
			'name' => 'languages', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'admin/languages' 
		),
		array(
			'name' => 'qualification', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'admin/qualification' 
		),
		array(
			'name' => 'class level', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'admin/class_level' 
		),
		array(
			'name' => 'department', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'admin/departments' 
		),
		array(
			'name' => 'subject', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'admin/subject' 
		),
		array(
			'name' => 'university / board', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'admin/university' 
		),
		array(
			'name' => 'posting details', 
			'access_operation' => 'add,edit,delete,view',  
			'route_url' => base_url().'admin/postings' 
	))),

	array(
		'main_module' => 'job providers',
		'sub_module' => array(
		array(
			'name' => 'profile', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'admin/job_provider_profile' 
		),
		array(
			'name' => 'vacancies posted', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'admin/job_provider_vacancies' 
		),
		array(
			'name' => 'organization activities', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'admin/jobprovider_activities' 
		),
		array(
			'name' => 'approved job mail status', 
			'access_operation' => 'view', 
			'route_url' => base_url().'admin/jobprovider_mailstatus' 
		),
		array(
			'name' => 'ads posted', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'admin/jobprovider_ads' 
	))),

	array(
		'main_module' => 'job seekers',
		'sub_module' => array(
		array(
			'name' => 'profile', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'admin/job_seeker_profile' 
		),
		array(
			'name' => 'job preferences', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'admin/job_seeker_preference' 
		),
		array(
			'name' => 'job applied', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'admin/job_seeker_applied' 
	))),

	array(
		'main_module' => 'plan settings',
		'sub_module' => array(
		array(
			'name' => 'plan creation & maintanence', 
			'access_operation' => 'add,edit,delete,view', 
			'route_url' => base_url().'admin/subscription_plans' 
	))),

	array(
		'main_module' => 'settings',
		'sub_module' => array(
		array(
			'name' => 'payment gateway setting', 
			'access_operation' => 'view', 
			'route_url' => base_url().'admin/payment_gateway' 
		),
		array(
			'name' => 'SMS gateway setting', 
			'access_operation' => 'view', 
			'route_url' => base_url().'admin/sms_gateway' 
		),
		array(
			'name' => 'configuration option', 
			'access_operation' => 'view', 
			'route_url' => base_url().'admin/configuration_option' 
		),
		array(
			'name' => 'template logo', 
			'access_operation' => 'view', 
			'route_url' => base_url().'admin/template_logo' 
	))),

	array(
		'main_module' => 'others',
		'sub_module' => array(
		array(
			'name' => 'feedback form', 
			'access_operation' => 'edit,delete,view', 
			'route_url' => base_url().'admin/feedback_form' 
		),
		array(
			'name' => 'site visits tracking', 
			'access_operation' => 'view', 
			'route_url' => base_url().'admin/site_visit_tracking' 
	))),
);

$config['admin_operation_rights'] = array();
// echo "<pre>";
// print_r($config['admin_modules']);
// echo "</pre>";
$config['current_page_rights'] = array();

$config['is_super_admin'] = false;

// $config['access_rights'] = array();