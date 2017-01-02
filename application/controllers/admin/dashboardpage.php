<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboardpage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->load->model('admin/dashboard_model');
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');
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
		$data['page_high_count_visits'] = $this->dashboard_model->page_high_count_visits();	
		$this->load->view('admin/index',$data);
	}
	public function get_chart_data() {
		if (isset($_POST['start']) AND isset($_POST['end'])) {
			$start_date = $_POST['start'];
			$end_date = $_POST['end'];
			$results = $this->dashboard_model->get_chart_data_for_visits($start_date, $end_date);
			if ($results === NULL) {
				echo json_encode('No data avaliable');
			} else {
				echo json_encode($results);
			}
		} 
		else {
			echo json_encode('Date must be selected.');
		}
	}
	public function dashboard_filter_vacancy(){
		$result_data = array();
		$filter_option = $_POST['filter_option'];
		if($filter_option == "district"){
			$data_value = $this->dashboard_model->count_vacancies_by_district();
			if(count($data_value) >0){
				foreach ($data_value as $key => $value) {
					array_push( $result_data, array("count_data" => $value['count_dist'],'name_data' => $value['district_name']));
					array_push( $result_data, array("label_name" => "District Name"));
				}
			}
			else
			{
				array_push( $result_data, array("label_name" => "District Name"));
			}	
		}
		else if($filter_option == "state"){
			$data_value = $this->dashboard_model->count_vacancies_by_state();
			if(count($data_value) >0){
				foreach ($data_value as $key => $value) {
					array_push( $result_data, array("count_data" => $value['count_st'],'name_data' => $value['state_name']));
					array_push( $result_data, array("label_name" => "State Name"));
				}
			}
			else
			{
				array_push( $result_data, array("label_name" => "State Name"));
			}
		}
		else if($filter_option == "qualification"){
			$data_value = $this->dashboard_model->count_vacancies_by_qualification();
			if(count($data_value) >0){
				foreach ($data_value as $key => $value) {
					array_push( $result_data, array("count_data" => $value['count_qual'],'name_data' => $value['educational_qualification']));
					array_push( $result_data, array("label_name" => "Educational Qualification"));
				}
			}
			else
			{
				array_push( $result_data, array("label_name" => "Educational Qualification"));
			}
		}
		else if($filter_option == "inst_type"){
			$data_value = $this->dashboard_model->count_vacancies_by_institution();
			if(count($data_value) >0){
				foreach ($data_value as $key => $value) {
					array_push( $result_data, array("count_data" => $value['count_inst'],'name_data' => $value['institution_type_name']));
					array_push( $result_data, array("label_name" => "Institution Type"));
				}
			}
			else
			{
				array_push( $result_data, array("label_name" => "Institution Type"));
			}
		}
		echo json_encode($result_data);
	}
	public function dashboard_filter_provider(){
		$result_data = array();
		$filter_option = $_POST['filter_option'];
		if($filter_option == "paid_provider"){
			$data_value = $this->dashboard_model->paid_job_providers();
			if(count($data_value) >0){
				foreach ($data_value as $key => $value) {
					array_push( $result_data, array("count_data" => $value['count_plan'],'name_data' => $value['subscription_plan'],"label_name" => "Plan"));
				}
			}
			else
			{
				array_push( $result_data, array("label_name" => "Plan"));
			}	
		}
		else if($filter_option == "paid_provider_district"){
			$data_value = $this->dashboard_model->paid_job_providers_by_district();
			if(count($data_value) >0){
				foreach ($data_value as $key => $value) {
					array_push( $result_data, array("count_data" => $value['count_dist'],'name_data' => $value['district_name'],"label_name" => "District Name"));
				}
			}
			else
			{
				array_push( $result_data, array("label_name" => "District Name"));
			}	
		}
		else if($filter_option == "free_provider_district"){
			$data_value = $this->dashboard_model->free_job_providers_by_district();
			if(count($data_value) >0){
				foreach ($data_value as $key => $value) {
					array_push( $result_data, array("count_data" => $value['count_dist'],'name_data' => $value['district_name'],"label_name" => "District Name"));
				}
			}
			else
			{
				array_push( $result_data, array("label_name" => "District Name"));
			}	
		}
		echo json_encode($result_data);
	}
}
/* End of file dashboard.php */ 
/* Location: ./application/controllers/admin/dashboard.php */
