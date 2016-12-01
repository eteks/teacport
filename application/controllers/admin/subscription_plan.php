<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscription_Plan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/subscription_plan_model');
		$this->load->model('admin/admin_model');
		$this->load->library('form_validation');
		$this->load->helper('custom');
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');

	}

	// Job provider profile
	public function teacport_subscription_plans()
	{
		$data['subscription_plans'] = $this->subscription_plan_model->get_subscription_plans();
		$this->load->view('admin/subscription_plans',$data);
	}
	public function plan_upgrade_creation()
	{
		$this->load->view('admin/plan_upgrade_creation');
	}
	public function organization_plan_notification()
	{
		$this->load->view('admin/organization_plan_notification');
	}




	

	


}
/* End of file Subscription_Plan.php */ 
/* Location: ./application/controllers/Subscription_Plan.php */
