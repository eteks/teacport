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
		$data['paid_jobprovider_count'] = $this->dashboard_model->paid_job_providers();
		$data['paid_jobprovider_districtwise'] = $this->dashboard_model->paid_job_providers_by_district();
		$data['free_jobprovider_districtwise'] = $this->dashboard_model->free_job_providers_by_district();	
		$data['latest_job_providers'] = $this->dashboard_model->latest_job_providers();	
		$data['latest_vacancy_jobs'] = $this->dashboard_model->latest_vacancy_jobs();	
		$this->load->view('admin/index',$data);
	}
	public function get_chart_data() {
		if (isset($_POST['start']) AND isset($_POST['end'])) {
			$start_date = $_POST['start'];
			$end_date = $_POST['end'];
			$results = $this->dashboard_model->get_chart_data_for_visits($start_date, $end_date);
			if ($results === NULL) {
				echo json_encode('No record found');
			} else {
				echo json_encode($results);
			}
		} 
		else {
			echo json_encode('Date must be selected.');
		}
	}
	public function dashboard_filter_vacancy(){
		$data = array();
		$result_data = array();
		$filter_option = $_POST['filter_option'];
		if($filter_option == "district"){
			$data_value = $this->dashboard_model->count_vacancies_by_district();
			foreach ($data_value as $key => $value) {
				array_push( $result_data, array("count_data" => $value['count_dist'],'name_data' => $value['district_name'],"label_name" => "District Name"));
			}
		}
		else if($filter_option == "state"){
			$data_value = $this->dashboard_model->count_vacancies_by_state();
			foreach ($data_value as $key => $value) {
				array_push( $result_data, array("count_data" => $value['count_st'],'name_data' => $value['state_name'],"label_name" => "State Name"));
			}
		}
		else if($filter_option == "qualification"){
			$data_value = $this->dashboard_model->count_vacancies_by_qualification();
			foreach ($data_value as $key => $value) {
				array_push( $result_data, array("count_data" => $value['count_qual'],'name_data' => $value['educational_qualification'],"label_name" => "Educational Qualification"));
			}
		}
		else if($filter_option == "inst_type"){
			$data_value = $this->dashboard_model->count_vacancies_by_institution();
			foreach ($data_value as $key => $value) {
				array_push( $result_data, array("count_data" => $value['count_inst'],'name_data' => $value['institution_type_name'],"label_name" => "Institution Type"));
			}
		}
		$data = $result_data;
		echo json_encode($data);
	}
	public function dashboard_filter_provider(){
		$data = array();
		$result_data = array();
		$filter_option = $_POST['filter_option'];
		if($filter_option == "paid_provider"){
			$data_value = $this->dashboard_model->paid_job_providers();
			foreach ($data_value as $key => $value) {
				array_push( $result_data, array("count_data" => $value['count_plan'],'name_data' => $value['subscription_plan'],"label_name" => "Plan"));
			}
		}
		else if($filter_option == "paid_provider_district"){
			$data_value = $this->dashboard_model->paid_job_providers_by_district();
			foreach ($data_value as $key => $value) {
				array_push( $result_data, array("count_data" => $value['count_dist'],'name_data' => $value['district_name'],"label_name" => "District Name"));
			}
		}
		else if($filter_option == "free_provider_district"){
			$data_value = $this->dashboard_model->free_job_providers_by_district();
			foreach ($data_value as $key => $value) {
				array_push( $result_data, array("count_data" => $value['count_dist'],'name_data' => $value['district_name'],"label_name" => "District Name"));
			}
		}
		$data = $result_data;
		echo json_encode($data);
	}
}
/* End of file dashboard.php */ 
/* Location: ./application/controllers/admin/dashboard.php */
