<?php 
class Missingpage extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() 
    { 
    	$this->load->model('common_model');
    	$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$data['search_jobs_location'] = $this->common_model->get_search_jobs_location();
        $this->load->view('404page',$data); //loading in my template 
    } 
} 
?> 