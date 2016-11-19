<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscription_Plan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/subscription_plan_model');
		$this->load->model('admin/admin_model');
		$this->load->library('form_validation');
		$this->load->helper('custom');

	}

	// Job provider profile
	public function teacport_subscription_plans()
	{
		$data['subscription_plans'] = $this->subscription_plan_model->get_subscription_plans();
		$this->load->view('admin/subscription_plans',$data);
	}




	

	


}
/* End of file Subscription_Plan.php */ 
/* Location: ./application/controllers/Subscription_Plan.php */
