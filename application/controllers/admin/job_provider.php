<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_Provider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/job_providermodel');
		$this->load->model('admin/admin_model');
		$this->load->library('upload');
		$this->load->library('form_validation');
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');

	}

	// Salary Validation
 	function check_greater_value($second_field,$first_field) 
	{ 
		if ($second_field < $first_field) { 
			$this->form_validation->set_message('check_greater_value', 'The %s field must contain a number greater than Minimum Salary'); 
			return FALSE;
		}
 		return TRUE;
	} 

	// Image validation
	function validate_image_type($value,$params) {
		// We must use atleast two paramenters in callback function - One is value that is default, another one is user defined values or custom values
		list($action,$field) = explode(".",$params); // To split the array values
        if(isset($_FILES[$field]) && !empty($_FILES[$field]['name'])) // Check it is exists and not empty
        {
           return TRUE;
        }
        else if($action == 'update') // If action is update means, No need to check validation
        {
        	$old_file_path = $_POST['old_file_path'];
        	if(isset($_POST['old_file_path']) && !empty($_POST['old_file_path'])) {
        		$_POST[$field] = $old_file_path;
            	// return TRUE;
        	}
        	else {
        		$_POST[$field] = NULL;
	            // $this->form_validation->set_message('validate_image_type', "The %s field is required");
	            // return FALSE;
        	}
        }
        else {
        	$_POST[$field] = NULL;
            $this->form_validation->set_message('validate_image_type', "The %s field is required");
            return FALSE;
        }
    }
					
	// Multi select function - To check the field is already exists or not
	function multiselect_validate($value,$params) 
	{
		//get main CodeIgniter object
	      $CI =& get_instance();
	      //load database library
	      $CI->load->database();    
	      $CI->form_validation->set_message('multiselect_validate', "The $params field is required.");
	      if ($value == "null")
	      {
	          return FALSE;
	      }
	}

	
	/* ===================          Job Provider Profile Controller Start     ====================== */

	// Job provider profile - Edit, Delete View
	public function teacport_job_provider_profile()
	{
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$validation_rules = array();	
	  		$id = $this->input->post('rid');
	  		$upload_path = "uploads/jobprovider/";
	  		$action = $this->input->post('action');
	  		// Tab 1 Validation
	  		if($this->input->post('index')==1 || $this->input->post('index')=="end") {
	  			$validation_rules[] =  	array( 'field'   => 'organization_name','label'   => 'Organization Name','rules'   => 'trim|xss_clean|required|alpha_numeric_spaces|min_length[3]|max_length[50]|edit_unique[tr_organization_profile.organization_id.organization_name.'.$id.']' );
			    $validation_rules[] =   array( 'field'   => 'institution_type','label'   => 'Institution Type','rules'   => 'trim|required|xss_clean|' );
			    $validation_rules[] =   array( 'field'   => 'organization_status','label'   => 'Organization Status','rules'   => 'trim|required|xss_clean|' );
			   	$validation_rules[] =   array( 'field'   => 'organization_logo','label'   => 'Organization Logo','rules'   => 'callback_validate_image_type['.$action.'.organization_logo]' );
	        }
	        // Tab 2 Validation
	   		if($this->input->post('index')==2 || $this->input->post('index')=="end") {
	   			$validation_rules[] =	array( 'field'   => 'org_addr_1','label'   => 'Organization Address1','rules'   => 'trim|xss_clean|required|alpha_numeric_spaces|min_length[3]|max_length[150]|' );
	   			$validation_rules[] =	array( 'field'   => 'org_addr_2','label'   => 'Organization Address2','rules'   => 'trim|xss_clean|required|alpha_numeric_spaces|min_length[3]|max_length[150]|' );
	   			$validation_rules[] =	array( 'field'   => 'org_addr_3','label'   => 'Organization Address3','rules'   => 'trim|xss_clean|required|alpha_numeric_spaces|min_length[3]|max_length[150]|' );
	   			$validation_rules[] =	array( 'field'   => 'organization_state','label'  => 'Organization State','rules'   => 'trim|xss_clean|required' );
	   			$validation_rules[] =	array( 'field'   => 'organization_district','label'  => 'Organization District','rules'   => 'trim|xss_clean|required' );
	   		}
	   		// Tab 3 Validation
	   		if($this->input->post('index')==3 || $this->input->post('index')=="end") {
	   			$validation_rules[] =	array( 'field'   => 'registrant_name','label'   => 'Registrant Name','rules'   => 'trim|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space' );
	   			// $validation_rules[] =	array( 'field'   => 'registrant_dob','label'   => 'Registrant DOB','rules'   => 'trim|required|xss_clean|' );
	   			$validation_rules[] =	array( 'field'   => 'registrant_designation','label'   => 'Registrant Designation','rules'   => 'trim|xss_clean|min_length[3]|max_length[50]' );
	   			$validation_rules[] =	array('field'   => 'registrant_email','label'   => 'Registrant Email','rules'   => 'trim|required|xss_clean|valid_email|edit_unique[tr_organization_profile.organization_id.registrant_email_id.'.$id.']' );
	   			$validation_rules[] =	array( 'field'   => 'registrant_mobile','label'   => 'Registrant Mobile','rules'   => 'trim|xss_clean|required|regex_match[/^[0-9]{10}$/]|edit_unique[tr_organization_profile.organization_id.registrant_mobile_no.'.$id.']' );
			    // $validation_rules[] =	array( 'field'   => 'sms_verify','label'   => 'Sms Verification','rules'   => 'trim|required|xss_clean|' );				                       
	   		}
	   		// Tab 4 Validation
	   		// if($this->input->post('index')==4 || $this->input->post('index')=="end") {
	   		// 	$validation_rules[] =	array( 'field'   => 'email_valid','label'   => 'Email Validity','rules'   => 'trim|required|xss_clean|' );
	   		// 	$validation_rules[] =	array( 'field'   => 'sms_valid', 'label'   => 'SMS Validity','rules'   => 'trim|required|xss_clean|' );
	   		// 	$validation_rules[] =	array( 'field'   => 'resume_valid','label'   => 'Resume Validity','rules'   => 'trim|required|xss_clean|' );
			   //  $validation_rules[] =	array( 'field'   => 'subscription_status','label'   => 'Subscription Status','rules'   => 'trim|required|xss_clean|' );			                       
	   		// }
	   		$this->form_validation->set_rules($validation_rules);
			if ($this->form_validation->run() == FALSE) {   
		        foreach($validation_rules as $row){
					$field = $row['field'];
			        $error = form_error($field);
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

    			if($this->input->post('index')=="end" && !empty($_FILES['organization_logo']['name']))
        		{	
        			$is_end = 1;   
        			$upload_image_path = PROVIDER_UPLOAD;
        			$config['upload_path'] = $upload_image_path; // APPPATH means our application folder path.
			        $config['allowed_types'] = 'jpg|jpeg|png'; // Allowed tupes
			        $config['encrypt_name'] = TRUE; // Encrypted file name for security purpose
			        $personnal_logo['file_ext_tolower'] 	= TRUE;
			        $config['max_size']    = '2048'; // Maximum size - 1MB
			    	$config['max_width']  = '1024'; // Maximumm width - 1024px
			    	$config['max_height']  = '768'; // Maximum height - 768px
			        $this->upload->initialize($config); // Initialize the configuration		
           			if($this->upload->do_upload('organization_logo'))
            		{
                		$upload_data = $this->upload->data(); 
                		$_POST['organization_logo'] = base_url().$upload_path.$upload_data['file_name']; 
                		$old_file_path = $_POST['old_file_path'] ;
                		$upload_error = 0;
                		//newly added for thumbnail
                		$organization_logo_thumb['image_library'] = 'gd2';
						$organization_logo_thumb['source_image'] = './uploads/jobprovider/'.$upload_data['file_name'];
						$organization_logo_thumb['create_thumb'] = TRUE;
						// $organization_logo_thumb['new_image'] = 'thumb_'.$organizationuploaddata['file_name'];
						$organization_logo_thumb['maintain_ratio'] = TRUE;
						$organization_logo_thumb['width']         = 180;
						$organization_logo_thumb['height']       = 180;
						$this->load->library('image_lib');
						$this->image_lib->initialize($organization_logo_thumb);
						// Resize operation
						if ( ! $this->image_lib->resize())
						{
	                		$data['upload_provider_logo_error'] = strip_tags($this->image_lib->display_errors()); 
						}
						$this->image_lib->clear();
						$keyword = "uploads";
	        			// To check whether the image path is cdn or local path
				        if(strpos( $old_file_path , $keyword ) !== false && !empty($old_file_path) ) {
	               			@unlink(APPPATH.'../'.$old_file_path);
	               			$thumb_image = explode('.', end(explode('/',$old_file_path)));
	               			@unlink(APPPATH.'../'.$upload_image_path.$thumb_image[0]."_thumb.".$thumb_image[1]);
				        }	
                		@unlink(APPPATH.'../'.$old_file_path);

                		$thumb_image = explode('.', end(explode('/',$old_file_path)));
	               		@unlink(APPPATH.'../'.$upload_image_path.$thumb_image[0]."_thumb.".$thumb_image[1]);

  	            	}
    		      	else
            		{
	                	$data['status'] = $this->upload->display_errors(); 
	                	$upload_error = 1;
	                	$data['error'] = 1;
                	}	
                }
     			if($is_end == 1 && $upload_error == 0) {
					$data_values = $this->job_providermodel->get_provider_profile('update');
         			$data['error'] = $data_values['error'];
		        	$data['status'] = $data_values['status'];
		        }
		        else if($is_end == 0 && $upload_error == 0 && $this->input->post('index')=="end"){
		        	$data_values = $this->job_providermodel->get_provider_profile('update');
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
      		$data_values = $this->job_providermodel->get_provider_profile('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}

      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->job_providermodel->get_provider_profile('init'); 	
      	}
		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];
			$output['provider_profile'] = $data_values['provider_profile'];
			$result['output'] = $this->load->view('admin/jobprovider_profile',$output,true);
			echo json_encode($result);
		}
		else {
			$data['provider_profile'] = $data_values['provider_profile'];
			$this->load->view('admin/jobprovider_profile',$data);
		}
	}

	// Job provider - Edit & Fullview Popup Ajax
	public function teacport_job_provider_profile_ajax()
	{
		if($this->input->post('action') && $this->input->post('value')) {
			$value = $this->input->post('value');
			$data['instution_values'] = $this->admin_model->get_institution_type_list();
			$data['district_values'] = $this->admin_model->get_district_values();
			$data['state_values'] = $this->admin_model->get_state_values();
			$data_values = $this->job_providermodel->get_full_provider_profile($value);
			$data['provider_full_profile'] = $data_values['provider_full_profile'];
			$data['payment_details'] = get_provider_subscription($data_values['payment_details']);
			// $data['payment_status'] = $data_values['payment_status'];
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/jobprovider_profile',$data);
		}
	}

	/* ===================          Job Provider Profile Controller End     ====================== */

	/* ===================          Job Provider Vacancy Controller Start     ====================== */

	// Job provider vacancy - Edit View Delete
	public function teacport_job_provider_vacancies()
	{
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$validation_rules = array();
	  		$id = $this->input->post('rid');
	  		if($this->input->post('index')==1 || $this->input->post('index')=="end") {
	  			$validation_rules[] =  	array( 'field'   => 'job_title','label'   => 'Job Title','rules'   => 'trim|required|xss_clean|callback_alpha_dash_space|min_length[3]|max_length[80]' );
			    $validation_rules[] =   array( 'field'   => 'vac_available','label'   => 'Vacancy Available','rules'   => 'trim|required|xss_clean|numeric|is_natural_no_zero|max_length[8]' );
			    $validation_rules[] =   array( 'field'   => 'vac_open_date','label'   => 'Vacancy Open Date','rules'   => 'trim|required|xss_clean|' );
			    $validation_rules[] =   array( 'field'   => 'vac_end_date','label'   => 'Vacancy End Date','rules'   => 'trim|required|xss_clean|' );
			    $validation_rules[] =   array( 'field'   => 'job_min_salary','label'   => 'Start Salary','rules'   => 'trim|required|xss_clean|numeric|is_natural_no_zero|min_length[4]|max_length[9]|' );
			    $validation_rules[] =   array( 'field'   => 'job_max_salary','label'   => 'End Salary','rules'   => 'trim|required|xss_clean|numeric|is_natural_no_zero|min_length[4]|max_length[9]|callback_check_greater_value['.$this->input->post('job_min_salary').']' );
			    $validation_rules[] =   array( 'field'   => 'vac_status','label'   => 'Vacancy Status','rules'   => 'trim|required|xss_clean|' );
	   		}
	   		if($this->input->post('index')==2 || $this->input->post('index')=="end") {
	   				$validation_rules[] =	array( 'field'   => 'qualification_name','label'   => 'Qualification Name','rules'   => 'trim|required|xss_clean|callback_multiselect_validate[Qualification Name]' );
	   				$validation_rules[] =	array( 'field'   => 'vac_experience','label'   => 'Vacancy Experience','rules'   => 'trim|required|xss_clean|numeric|is_natural_no_zero|max_length[3]' );
		   			$validation_rules[] =	array( 'field'   => 'vac_class','label'   => 'Vacancy Class','rules'   => 'trim|required|xss_clean|' );
	   				$validation_rules[] =	array( 'field'   => 'vac_univ_name','label'   => 'Vacancy University','rules'   => 'trim|required|xss_clean|' );
	   				$validation_rules[] =	array( 'field'   => 'vac_sub_name','label'   => 'Vacancy Subject','rules'   => 'trim|required|xss_clean|' );
	   		}
	   		if($this->input->post('index')==3 || $this->input->post('index')=="end") {
	   			$validation_rules[] =	array( 'field'   => 'vac_medium','label'   => 'Vacancy Medium','rules'   => 'trim|required|xss_clean|' );
	   			$validation_rules[] =	array( 'field'   => 'vac_accom','label'   => 'Vacancy Accomadation','rules'   => 'trim|required|xss_clean|callback_alpha_dash_space|max_length[150]|' );
	   			$validation_rules[] =	array( 'field'   => 'vac_instruction','label'   => 'Vacancy Instruction','rules'   => 'trim|required|xss_clean|min_length[50]|max_length[700]|' );
	   			$validation_rules[] =	array( 'field'   => 'vac_inter_sdate','label'   => 'Vacancy Interview Start Date','rules'   => 'trim|required|xss_clean|' );
	   			$validation_rules[] =	array('field'   => 'vac_inter_edate','label'   => 'Vacancy Interview End Date','rules'   => 'trim|required|xss_clean|' );			                       
	   		}
	   		$this->form_validation->set_rules($validation_rules);
			if ($this->form_validation->run() == FALSE) {   
		        foreach($validation_rules as $row){
					$field = $row['field']; //getting field name
			        $error = form_error($field); //getting error for field name
			        if($error){
			        	$data['status'] = strip_tags($error);
			            $data['error'] = 1;
			            break;
			        }
			    }
		  	}
      		else {
      			if($this->input->post('index')=="end") {
      				$data_values = $this->job_providermodel->get_provider_vacancy('update');
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
      		$data_values = $this->job_providermodel->get_provider_vacancy('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}

      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->job_providermodel->get_provider_vacancy('init'); 	
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];
			$output['provider_vacancy'] = $data_values['provider_vacancy'];
			$result['output'] = $this->load->view('admin/jobprovider_vacancy',$output,true);
			echo json_encode($result);
		}
		else {
			$data['provider_vacancy'] = $data_values['provider_vacancy'];
			$this->load->view('admin/jobprovider_vacancy',$data);
		}
	}


	// Job provider vacancy - Edit & Fullview Popup Ajax
	public function teacport_job_provider_vacancy_ajax()
	{
		if($this->input->post('action') && $this->input->post('value')) {
			$value = $this->input->post('value');
			$data['org_values'] = $this->admin_model->get_organization_values();
			$data['class_levels'] = $this->admin_model->get_class_levels_list();
			$data['university_values'] = $this->admin_model->get_university_list();
			$data['department_values'] = $this->admin_model->get_departments_values();
			$data['posting_values'] = $this->admin_model->get_posting_values();
			$data['subject_values'] = $this->admin_model->get_subjects_list();
			$data['medium_language_values'] = $this->admin_model->get_medium_language_list();
			$data['qualification_values'] = $this->admin_model->get_qualification_list();
			$data_vacancy = $this->job_providermodel->get_full_provider_vacancy($value);
			$data['provider_full_vacancies'] = get_provider_vacancy_by_qua($data_vacancy);
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/jobprovider_vacancy',$data);
		}
	}

	/* ===================          Job Provider Vacancy Controller End     ====================== */

	/* ===================          Job Provider Activities Controller Start     ====================== */

	// Job provider activities - Add Edit Delete
	public function teacport_job_provider_activities()
	{
		// $data['organization_values'] = $this->admin_model->get_organization_values();
		// $data['candidate_values'] = $this->admin_model->get_candidate_values();
		// $data['vacancy_values'] = $this->admin_model->get_vacancy_values();

		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	  		$id = $this->input->post('rid');
	   		$validation_rules = array( 
	   			// array( 'field' => 'act_org_name','label' => 'Organization Name','rules' => 'trim|required|xss_clean|' ),
		     	//array( 'field' => 'act_cand_name','label' => 'Candidate Name','rules' => 'trim|required|xss_clean|' ),
		        array( 'field' => 'act_sms','label'   => 'Sms Status','rules'   => 'trim|required|xss_clean|' ),
		        array( 'field' => 'act_email','label'   => 'Email Status','rules'   => 'trim|required|xss_clean|' ),
		        array( 'field' => 'act_resume', 'label' => 'Resume Status','rules' => 'trim|required|xss_clean|' ), );
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
         		$data_values = $this->job_providermodel->teacport_organization_activities('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->job_providermodel->teacport_organization_activities('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->job_providermodel->teacport_organization_activities('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['pro_activities'] = $data_values['pro_activities'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/jobprovider_activities',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['pro_activities'] = $data_values['pro_activities'];
			$this->load->view('admin/jobprovider_activities',$data);
		}	
	}

	/* ===================          Job Provider Activities Controller End     ====================== */

	/* ===================          Job Provider Ads Controller Start     ====================== */	


	// Job provider ads - Add Edit Delete View
	public function teacport_job_provider_ads()
	{
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$action = $this->input->post('action');
	  		$id = $this->input->post('rid');
	  		$upload_path = "uploads/jobprovider/premiumad/";
  			$validation_rules = array(
  				array( 'field'  => 'ads_name','label'   => 'Premium Ads Name','rules' => 'trim|required|xss_clean|alpha_numeric_spaces|min_length[3]|max_length[50]' ),
			    array( 'field'   => 'ads_days','label'   => 'Premium Visible Days','rules'   => 'trim|required|xss_clean|regex_match[/^[0-9]{1,15}$/]' ),
		        array( 'field'   => 'ads_status','label'   => 'Premium Visible Status','rules'   => 'trim|required|xss_clean|' ),
		        array( 'field'   => 'admin_verify','label'   => 'Admin Verification','rules'   => 'trim|required|xss_clean|' ),
		        array( 'field'   => 'ads_logo','label'   => 'Ads Logo','rules'   => 'callback_validate_image_type['.$action.'.ads_logo.'.$upload_path.']' ) );
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
      			if(!empty($_FILES['ads_logo']['name']))
        		{	   	
        			$config['upload_path'] = APPPATH . '../'.$upload_path; // APPPATH means our application folder path.
			        $config['allowed_types'] = 'jpg|jpeg|png'; // Allowed tupes
			        $config['encrypt_name'] = TRUE; // Encrypted file name for security purpose
			        $personnal_logo['file_ext_tolower'] 	= TRUE;
			        $config['max_size']    = '2048'; // Maximum size - 1MB
			    	$config['max_width']  = '1024'; // Maximumm width - 1024px
			    	$config['max_height']  = '768'; // Maximum height - 768px
			        $this->upload->initialize($config); // Initialize the configuration		
           			if($this->upload->do_upload('ads_logo'))
            		{
                		$upload_data = $this->upload->data(); 
                		$_POST['ads_logo'] = $upload_data['file_name']; 
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
                if($upload_error == 0) {
                	$data_values = $this->job_providermodel->get_provider_ads('update');
	       			$data['error'] = $data_values['error'];
		        	$data['status'] = $data_values['status'];
		        	//To send mail for provider if admin is verified their posted ads
		        	if($data['error'] == 2 && $this->input->post('current_verify') == 0 && $this->input->post('admin_verify') == 1){
		        		$ci =& get_instance();	
						$ci->config->load('email', true);
						$emailsetup = $ci->config->item('email');
						$this->load->library('email', $emailsetup);
						$from_email = $emailsetup['smtp_user'];
						$this->email->initialize($emailsetup);
						$this->email->from($from_email, 'Teachers Recruit');
		                $this->email->to($this->input->post('registrant_email'));
		    			$this->email->subject('Ads Verification Status');
		    			$message = $this->load->view('admin/email_template/ad_verify',TRUE);
		    			$this->email->message($message);

		    			if($this->email->send())
		    			{
		        			$mail_status = 1;
		    			}
		    			else 
		    			{
		        			$mail_status = 0;
		    			}
		        	}
                }				
	        }
	    }

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->job_providermodel->get_provider_ads('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->job_providermodel->get_provider_ads('init'); 	
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			if(isset($mail_status) == 1)
				$result['status'] ="Record Updated and Mail sent to provider Successfully";
			else
				$result['status'] = $data['status'];
			$result['error'] = $data['error'];
			$output['provider_ads'] = $data_values['provider_ads'];
			$result['output'] = $this->load->view('admin/jobprovider_ads',$output,true);
			echo json_encode($result);
		}
		else {
			$data['provider_ads'] = $data_values['provider_ads'];
			$this->load->view('admin/jobprovider_ads',$data);
		}
	}

	// Job provider ads - Edit Popup Ajax
	public function teacport_job_provider_ads_ajax()
	{
		if($this->input->post('action') && $this->input->post('value')) {
			$value = $this->input->post('value');
			$data['org_values'] = $this->admin_model->get_organization_values();
			$data['activities_details'] = $this->job_providermodel->get_full_provider_ads($value);
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/jobprovider_ads',$data);
		}
	}

	/* ===================          Job Provider Ads Controller End     ====================== */	

	/* ===================          Job Provider Plan Notification Controller Start     ====================== */	

	// Job provider plan notification - view
	public function organization_plan_notification()
	{
		$data['org_notification'] = $this->job_providermodel->get_organization_plan_notification();
		$this->load->view('admin/organization_plan_notification',$data);
	}	

	/* ===================          Job Provider Plan Notification Controller End     ====================== */	

	/* ===================          Job Provider Transaction Controller Start     ====================== */	

	// Job provoider transaction - View
	public function transaction()
	{	
		$data['job_provider_transaction'] = $this->job_providermodel->get_provider_transaction();
		$this->load->view('admin/transaction',$data);
	}

	// Job provider transaction - Fullview Ajax
	public function get_transaction_full_view()
	{
		if($this->input->post('action') && $this->input->post('value')) {
			$value = $this->input->post('value');
			$data['provider_full_transaction'] = $this->job_providermodel->get_provider_transaction_full_view($value);
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/transaction',$data);
		}
	}

	/* ===================          Job Provider Transaction Controller End     ====================== */	

}
/* End of file Job_Provider.php */ 
/* Location: ./application/controllers/Job_Provider.php */
