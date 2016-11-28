<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_Seeker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');
		$this->load->model('admin/job_seekermodel');
		$this->load->model('admin/admin_model');
		$this->load->library('upload');
	}
	public function job_seeker_profile()
	{
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$validation_rules = array();	
	  		$id = $this->input->post('rid');
	  		$action = $this->input->post('action');
	  		if($this->input->post('index')==1 || $this->input->post('index')=="end") {
	  			$validation_rules[] =  	array(
			                              'field'   => 'organization_name',
			                              'label'   => 'Organization Name',
			                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_organization_profile.organization_id.organization_name.'.$id.']'
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
			   	$validation_rules[] =   array(
			                                'field'   => 'organization_logo',
			                                'label'   => 'Organization Logo',
			                                'rules'   => 'callback_validate_image_type['.$action.'.organization_logo]'
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
			                                'rules'   => 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]|'
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
      			$upload_error = 0;
      			$is_end =0;
      			$upload_path = "assets/admin/uploads/";

    			if($this->input->post('index')=="end" && !empty($_FILES['organization_logo']['name']))
        		{	
        			$is_end = 1;   			
           			if($this->upload->do_upload('organization_logo'))
            		{
                		$upload_data = $this->upload->data(); 
                		$_POST['organization_logo'] = $upload_path.$upload_data['file_name']; 
                		$old_file_path = $_POST['old_file_path'] ;
                		$upload_error = 0;
                		@unlink(APPPATH.'../'.$old_file_path);
  	            	}
    		      	else
            		{
	                	$data['status'] = $this->upload->display_errors(); 
	                	$upload_error = 1;
	                	$data['error'] = 1;
                	}	
                }
     			if($is_end == 1 && $upload_error == 0) {
					$data_values = $this->job_seekermodel->get_seeker_profile('update');
         			$data['error'] = $data_values['error'];
		        	$data['status'] = $data_values['status'];
		        }
		        else if($is_end == 0 && $upload_error == 0 && $this->input->post('index')=="end"){
		        	$data_values = $this->job_seekermodel->get_seeker_profile('update');
         			$data['error'] = $data_values['error'];
		        	$data['status'] = $data_values['status'];
		        }
		        else if($is_end == 0 && $upload_error == 0 ){
		        	$data['error'] = 1;
					$data['status'] = "valid";
		        }
     		}
	    }

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->job_seekermodel->get_seeker_profile('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}

      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->job_seekermodel->get_seeker_profile('init'); 	
      	}
		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];
			$output['seeker_profile'] = $data_values['seeker_profile'];
			$result['output'] = $this->load->view('admin/job_seeker_profile',$output,true);
			echo json_encode($result);
		}
		else {
			$data['seeker_profile'] = $data_values['seeker_profile'];
			$this->load->view('admin/job_seeker_profile',$data);
		}
	}

	// Job seeker profile - Edit and Full view details
	public function teacport_job_seeker_profile_ajax()
	{
		if($this->input->post('action') && $this->input->post('value')) {
			$value = $this->input->post('value');
			$data['instution_values'] = $this->admin_model->get_institution_type_list();
			$data['district_values'] = $this->admin_model->get_district_values();
			// $data['seeker_full_profile'] = $this->job_seekermodel->get_full_seeker_profile($value);
			$data['seeker_full_profile'] = "test";
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/job_seeker_profile',$data);
		}
		else {
			redirect(base_url().'admin/admin_error');
		}
	}

	public function job_seeker_preference()
	{
		$this->load->view('admin/job_seeker_preference');

	}
	public function job_seeker_applied()
	{
		$this->load->view('admin/job_seeker_applied');

	}

	
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
