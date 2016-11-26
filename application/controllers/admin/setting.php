<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');

	}
	public function payment_gateway()
	{
		$this->load->view('admin/payment_gateway');
	}
	public function sms_gateway()
	{
		$this->load->view('admin/sms_gateway');
	}
	public function configuration_option()
	{
		$this->load->view('admin/configuration_option');
	}
	public function template_logo()
	{
		$this->load->view('admin/template_logo');
	}
	

	
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
