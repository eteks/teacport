<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_seeker extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('ajax_model'); 
        $this->load->library('form_validation'); 
        // $this->load->library('session'); 
    }

	public function index()
	{
		$this->load->view('job-seekers-login');
	}
	public function signup()
	{
		$this->load->view('register-job-seekers');
	}
	public function register_job_seeker()
	{
		$data = $this->ajax_model->get_registeration_status_seeker();
		echo $data;
	}
	public function login_job_seeker()
    {   
        $data = $this->ajax_model->get_login_status_seeker();
        echo $data;
    }
}
