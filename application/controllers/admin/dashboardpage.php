<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboardpage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->load->model('admin/dashboard_model');
	}
	public function dashboard()
	{	
		$data['district_vacancies'] = $this->dashboard_model->count_vacancies_by_district();
		$data['state_vacancies'] = $this->dashboard_model->count_vacancies_by_state();
		$data['qual_vacancies'] = $this->dashboard_model->count_vacancies_by_qualification();
		$data['inst_vacancies'] = $this->dashboard_model->count_vacancies_by_institution();
		$data['overall_vacancies'] = $this->dashboard_model->count_overall_vacancies();
		$data['overall_job'] = $this->dashboard_model->count_overall_job_applied();
		$data['jobseekers_count'] = $this->dashboard_model->count_overall_job_seekers();
		$data['jobproviders_count'] = $this->dashboard_model->count_overall_job_providers();
		$data['unique_visitors_count'] =$this->dashboard_model->count_unique_visitors();
		$data['visitors_count'] =$this->dashboard_model->count_visits();
		$data['paid_jobseekers_count'] = $this->dashboard_model->paid_job_providers();
		$data['paid_jobseekers_districtwise'] = $this->dashboard_model->paid_job_providers_by_district();
		$data['free_jobseekers_districtwise'] = $this->dashboard_model->free_job_providers_by_district();	
		$this->load->view('admin/index',$data);
	}
	public function get_chart_data() {
		echo "get_chart_data";
		// if (isset($_POST['start']) AND isset($_POST['end'])) {
		// 	$start_date = $_POST['start'];
		// 	$end_date = $_POST['end'];
		// 	$results = $this->dashboard_model->get_chart_data_for_visits($start_date, $end_date);
		// 	if ($results === NULL) {
		// 		echo json_encode('No record found');
		// 	} else {
		// 		echo json_encode($results);
		// 	}
		// } 
		// else {
		// 	echo json_encode('Date must be selected.');
		// }
	}
}
/* End of file dashboard.php */ 
/* Location: ./application/controllers/admin/dashboard.php */
