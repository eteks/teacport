<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_provider extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('ajax_model'); 
        $this->load->library('form_validation'); 
        $this->load->library('session'); 
    }
	public function index()
	{
		$this->load->view('job-providers-login');
	}
	public function signup()
	{
		$this->load->view('register-job-providers');
	}
	public function register_job_provider()
	{
		$data = $this->ajax_model->get_registeration_status_provider();
		echo $data;
	}
	    public function login_job_provider()
    {   
        $data = $this->ajax_model->get_login_status_provider();
        echo $data;
    }
}
