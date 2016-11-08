<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_provider extends CI_Controller {
	public function index()
	{
		$this->load->view('job-providers-login');
	}
	public function signup()
	{
		$this->load->view('register-job-providers.php');
	}
}
