<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_Seeker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

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
