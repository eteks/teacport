<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_seeker extends CI_Controller {
	public function index()
	{
		$this->load->view('job-seekers-login');
	}
	public function signup()
	{
		$this->load->view('register-job-seekers.php');
	}
}
