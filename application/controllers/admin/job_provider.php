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
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$validation_rules = array();	
	  		$id = $this->input->post('rid');
	  		if($this->input->post('index')==1 || $this->input->post('index')=="end") {
	  			$validation_rules[] =  	array(
			                              'field'   => 'organization_name',
			                              'label'   => 'Organization Name',
			                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_organization_profile.organization_id.organization_name.'.$id.''
			                            );
			    $validation_rules[] =   array(
			                            	'field'   => 'institution_type',
			                                'label'   => 'Institution Type',
			                                'rules'   => 'trim|required|xss_clean|'
			                            );
			    $validation_rules[] =   array(
			                                'field'   => 'organization_status',
			                                'label'   => 'Organization Status',
			                                'rules'   => 'trim|required|xss_clean|'
			                            );
			                        
	   		}
	   		if($this->input->post('index')==2 || $this->input->post('index')=="end") {
	   			$validation_rules[] =	array(
			                              'field'   => 'org_addr_1',
			                              'label'   => 'Organization Address',
			                              'rules'   => 'trim|required|xss_clean|'
			                            );
	   			$validation_rules[] =	array(
			                                'field'   => 'organization_district',
			                                'label'   => 'Organization District',
			                                'rules'   => 'trim|required|xss_clean|'
			                            );
	   		}
	   		if($this->input->post('index')==3 || $this->input->post('index')=="end") {
	   			$validation_rules[] =	array(
			                              'field'   => 'registrant_name',
			                              'label'   => 'Registrant Name',
			                              'rules'   => 'trim|required|xss_clean|'
			                            );
	   			$validation_rules[] =	array(
			                                'field'   => 'registrant_dob',
			                                'label'   => 'Registrant DOB',
			                                'rules'   => 'trim|required|xss_clean|'
			                            );
	   			$validation_rules[] =	array(
			                                'field'   => 'registrant_designation',
			                                'label'   => 'Registrant Designation',
			                                'rules'   => 'trim|required|xss_clean|'
			                            );
	   			$validation_rules[] =	array(
			                                'field'   => 'registrant_email',
			                                'label'   => 'Organization District',
			                                'rules'   => 'trim|required|xss_clean|valid_email|'
			                            );
	   			$validation_rules[] =	array(
			                                'field'   => 'registrant_mobile',
			                                'label'   => 'Registrant Mobile',
			                                'rules'   => 'trim|required|xss_clean|'
			                            );			                       
	   		}
	   		$this->form_validation->set_rules($validation_rules);
			if ($this->form_validation->run() == FALSE) {   
		        foreach($validation_rules as $row){
					$field = $row['field'];         //getting field name
			        $error = form_error($field);    //getting error for field name
			        if($error){
			        	$data['status'] = strip_tags($error);
			            $data['error'] = 1;
			            break;
			        }
			    }
		  	}
      		else {
      			if($this->input->post('index')=="end") {
      				$data_values = $this->job_providermodel->get_provider_profile('update');
         			$data['error'] = $data_values['error'];
		        	$data['status'] = $data_values['status'];
		        }
		        else {
		        	$data['error'] = 1;
					$data['status'] = "valid";
		        }
     		}
	    }

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->job_providermodel->get_provider_profile('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}

      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->job_providermodel->get_provider_profile('init'); 	
      	}

		if($data['error']==1 || $data['error']==2) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else {
			$data['provider_profile'] = $data_values['provider_profile'];
			$this->load->view('admin/jobprovider_profile',$data);
		}
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

	// Job provider mail details and status 
	public function teacport_jobprovider_mailstatus()
	{
		$this->load->view('admin/jobprovider_mailstatus');
	}




	

	


}
/* End of file Job_Provider.php */ 
/* Location: ./application/controllers/Job_Provider.php */
