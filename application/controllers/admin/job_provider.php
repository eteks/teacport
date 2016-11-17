<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_Provider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/job_providermodel');
		$this->load->model('admin/admin_model');
		$this->load->library('form_validation');

	}

	// Job provider profile
	public function teacport_job_provider_profile()
	{
		$data['instution_values'] = $this->admin_model->get_institution_type();
		$data['provider_profile'] = $this->job_providermodel->get_provider_profile();
		$this->load->view('admin/jobprovider_profile',$data);
	}

	// Job provider profile - Ajax
	public function teacport_job_provider_profile_ajax()
	{
		$data['instution_values'] = $this->admin_model->get_institution_type();
		$data['provider_full_profile'] = $this->job_providermodel->get_full_provider_profile();
		$this->load->view('admin/jobprovider_profile',$data);
	}

	// Job provider vacancy
	public function teacport_job_provider_vacancies()
	{
		$this->load->view('admin/jobprovider_vacancy');
	}


	

	


}
/* End of file Job_Provider.php */ 
/* Location: ./application/controllers/Job_Provider.php */
