<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminindex extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->load->model('admin/dashboard');
	}
	public function dashboard()
	{	
		$this->dashboard->count_vacancies_by_district();
		$this->dashboard->count_vacancies_by_state();
		$this->dashboard->count_vacancies_by_qualification();
		$this->dashboard->count_vacancies_by_institution();
		$this->dashboard->count_overall_vacancies();
		$this->dashboard->count_overall_job_applied();
		$this->dashboard->count_overall_job_seekers();
		$this->dashboard->count_overall_job_providers();
		$this->dashboard->count_unique_visitors();
		$this->dashboard->paid_job_providers();
		$this->dashboard->paid_job_providers_by_district();
		$this->dashboard->free_job_providers_by_district();
		
		$this->load->view('admin/index');
	}
	public function state()
	{	
		$data_values = $this->admin_model->state();
		$data['state_values'] = $data_values['state_values'];
		$data['status'] = $data_values['status'];
		$data['error'] = $data_values['error'];
		if($data['error']==1) {
			echo $data['error'];
		}
		else {
			$this->load->view('admin/state',$data);
		}
	}
	public function district()
	{	
			$this->load->view('admin/district');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */