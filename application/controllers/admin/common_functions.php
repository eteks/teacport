<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_functions extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->load->model('admin/admin_users_model');
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');
	}
	public function get_full_array_by_recursive_search(array $array, $needle)
	{
	    foreach ($array as $key => $value) {
	    	if(in_array($needle,$value))
	    		return $value;
	    }
	}
	public function admin_global_config(){
		if($this->session->userdata("admin_login_session")){
			//To store all the module in database when page loads from hook automatic calling
			$data = $this->admin_users_model->insert_modules();
			$admin_operation_rights = $this->admin_users_model->get_admin_rights_by_group();

			//set values to global array variable 'admin_operation_rights' which is initialized with empty array on config/admin_modules.php file
			$this->config->set_item('admin_operation_rights',  $admin_operation_rights);
			$current_url = base_url(uri_string());
			$current_page_rights = $this->get_full_array_by_recursive_search($admin_operation_rights,$current_url);

			//To get the admin access priveleges once if login and their user type
			$this->config->set_item('current_page_rights',  $current_page_rights);
			$is_super_admin = $this->session->userdata("admin_login_session")['is_super_admin'];
			$this->config->set_item('is_super_admin',  $is_super_admin);

			//Get feedback data records from database to set in global variable
			$admin_feedback_form = $this->admin_model->get_admin_feedback_form();
			$admin_feedback_msg_count = array_filter($admin_feedback_form, function($feed) { return $feed['is_viewed'] == '0'; });
			$this->config->set_item('feedback_count',count($admin_feedback_msg_count));
			$this->config->set_item('feedback_data',$admin_feedback_form);

		}	
	}
}
/* End of file common_functions.php */ 
/* Location: ./application/controllers/admin/common_functions.php */
