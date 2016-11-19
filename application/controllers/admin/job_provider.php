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
		// $data['provider_full_profile'] = $this->job_providermodel->get_full_provider_profile(1);
		// echo "<pre>";
		// print_r($data['provider_full_profile']);
		// echo "</pre>";


	}

	// Job provider profile - Ajax
	public function teacport_job_provider_profile_ajax()
	{
		if($this->input->post('action') && $this->input->post('value')) {
			$value = $this->input->post('value');
			$data['instution_values'] = $this->admin_model->get_institution_type_list();
			$data['district_values'] = $this->admin_model->get_district_values();
			$data['provider_full_profile'] = $this->job_providermodel->get_full_provider_profile($value);
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/jobprovider_profile',$data);
		}
		else {
			redirect(base_url().'admin/admin_error');
		}
	}

	// Job provider vacancy
	public function teacport_job_provider_vacancies()
	{
		$this->load->view('admin/jobprovider_vacancy');
	}


	

	


}
/* End of file Job_Provider.php */ 
/* Location: ./application/controllers/Job_Provider.php */
