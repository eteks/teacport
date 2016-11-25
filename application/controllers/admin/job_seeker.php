<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_Seeker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');

	}
	public function job_seeker_profile()
	{
		$this->load->view('admin/job_seeker_profile');

	}
	public function job_seeker_preference()
	{
		$this->load->view('admin/job_seeker_preference');

	}
	public function job_seeker_applied()
	{
		$this->load->view('admin/job_seeker_applied');

	}

	
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
