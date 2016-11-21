<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_Provider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/job_providermodel');
		$this->load->model('admin/admin_model');
		$this->load->library('form_validation');
		$this->load->helper('custom');

	}

	// Job provider profile
	public function teacport_job_provider_profile()
	{
		$data['provider_profile'] = $this->job_providermodel->get_provider_profile();
		$this->load->view('admin/jobprovider_profile',$data);
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
		$data['provider_vacancy'] = $this->job_providermodel->get_provider_vacancy();


		// $data_val = $this->job_providermodel->get_full_provider_vacancy(1);

		// $data['provider_full_vacancies'] = get_provider_vacancy_by_qua($data_val);

		// echo "<pre>";



		// print_r($data['provider_full_vacancies']);

		// echo "</pre>";





		$this->load->view('admin/jobprovider_vacancy',$data);
	}


	// Job provider profile - Ajax
	public function teacport_job_provider_vacancy_ajax()
	{
		if($this->input->post('action') && $this->input->post('value')) {
			$value = $this->input->post('value');
		// 	$data['instution_values'] = $this->admin_model->get_institution_type_list();
		// 	$data['district_values'] = $this->admin_model->get_district_values();
			$data['class_levels'] = $this->admin_model->get_class_levels_list();
			$data['university_values'] = $this->admin_model->get_university_list();
			$data['subject_values'] = $this->admin_model->get_subjects_list();
			$data['qualification_values'] = $this->admin_model->get_qualification_list();




			
			$data_vacancy = $this->job_providermodel->get_full_provider_vacancy($value);
			$data['provider_full_vacancies'] = get_provider_vacancy_by_qua($data_vacancy);
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/jobprovider_vacancy',$data);
		}
		else {
			redirect(base_url().'admin/admin_error');
		}
	}

	// Job provider ads 
	public function teacport_job_provider_ads()
	{
		$this->load->view('admin/jobprovider_ads');
	}

	// Job provider ads 
	public function teacport_job_provider_activities()
	{
		$this->load->view('admin/jobprovider_activities');
	}



	

	


}
/* End of file Job_Provider.php */ 
/* Location: ./application/controllers/Job_Provider.php */
