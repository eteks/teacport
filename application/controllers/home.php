<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}
	
	//About us
	public function about()
	{
		$this->load->view('aboutus');
	}
	// for Candidate
	public function regcandidate()
	{
		$this->load->view('candidate-register');
	}
	
	public function logincandidate()
	{
		$this->load->view('candidate-login');
	}
	public function browsejobs()
	{
		$this->load->view('vacancies');
	}
	public function jobsbycategory()
	{
		$this->load->view('jobs-category');
	}
	public function faq()
	{
		$this->load->view('faq');
	}
    // for School
    public function regschool()
	{
		$this->load->view('school-register');
	}
	
	public function logschool()
	{
		$this->load->view('school-login');
	}
   //Contact us
    public function contact()
	{
		$this->load->view('contactus');
	}
	//Candidate Dashboard
	public function userdashboard()
	{
	   $this->load->view('user-dashboard');
	}   
	public function usereditprofile()
	{
	   $this->load->view('user-edit-profile');
	}
	public function userresume()
	{
	   $this->load->view('user-resume');
	}  
	public function userfollowedcompanies()
	{
	   $this->load->view('user-followed-companies');
	} 
	public function userjobapplied()
	{
	   $this->load->view('user-job-applied');
	} 
	//Single job post detail
	public function singlejob()
	{
	   $this->load->view('single-job');
	} 
    //Company Jobs post detail
    public function postjob()
	{
	   $this->load->view('post-job');
	} 
	//Company Dashboard 
	public function companydashboard()
	{
	   $this->load->view('company-dashboard');
	}
	public function companydashboardeditprofile()
	{
	   $this->load->view('company-dashboard-edit-profile');
	}
	public function companydashboardactivejobs()
	{
	   $this->load->view('company-dashboard-active-jobs');
	}
	public function companydashboardresume()
	{
	   $this->load->view('company-dashboard-resume');
	}
    public function companydashboardfeaturedjobs()
	{
	   $this->load->view('company-dashboard-featured-jobs');
	}
	 public function companydashboardfollowers()
	{
	   $this->load->view('company-dashboard-followers');
	}
	
	
	
    

}
