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

	// Alpha with white space
 	public function alpha_dash_space($provider_job_title){
		if (! preg_match('/^[a-zA-Z\s]+$/', $provider_job_title)) {
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}
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
        		$_POST[$field] = NULL; //
	            // $this->form_validation->set_message('validate_image_type', "The %s is required");
	            // return FALSE;
        	}
        }
        else {
        	$_POST[$field] = NULL; //
            $this->form_validation->set_message('validate_image_type', "The %s is required");
            return FALSE;
        }
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

    /* ===================          Job Seeker Profile Controller Start     ====================== */

    // Job seeker profile - Add Edit View Delete
	public function teacport_job_seeker_profile()
	{
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$validation_rules = array();	
	  		$id = $this->input->post('rid');
	  		$action = $this->input->post('action');
	  		$upload_path = SEEKER_UPLOAD."pictures/";
	  		if($this->input->post('index')==1 || $this->input->post('index')=="end") {
	  			$validation_rules[] =  	array( 'field'   => 'cand_name','label'   => 'Candidate Name','rules'   => 'trim|required|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space' );
			    // $validation_rules[] =   array( 'field'   => 'cand_gen','label'   => 'Candidate Gender','rules'   => 'trim|required|xss_clean|' );
			    $validation_rules[] =   array( 'field'   => 'cand_fa_name','label'   => 'Candidate Father Name','rules'   => 'trim|required|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space' );
			   	// $validation_rules[] =   array( 'field'   => 'cand_dob','label'   => 'Candidate DOB','rules'   => 'trim|required|xss_clean|' );
			   	// $validation_rules[] =   array( 'field'   => 'cand_mar_status','label'   => 'Candidate Marital Status','rules'   => 'trim|required|xss_clean|' );
			   	// $validation_rules[] =   array( 'field'   => 'cand_moth_ton','label'   => 'Candidate Mother Tongue','rules'   => 'trim|required|xss_clean|' );
			   	// $validation_rules[] =   array( 'field'   => 'cand_known_lang','label'   => 'Candidate Known Languages','rules'   => 'trim|required|xss_clean' );
			}
	   		if($this->input->post('index')==2 || $this->input->post('index')=="end") {
	   			// $validation_rules[] =	array( 'field'   => 'cand_nationality','label'   => 'Nationality','rules'   => 'trim|required|xss_clean|' );
	   			// $validation_rules[] =	array( 'field'   => 'cand_religion','label'   => 'Religion','rules'   => 'trim|required|xss_clean|' );
	   			// $validation_rules[] =	array( 'field'   => 'cand_community','label'   => 'Community','rules'   => 'trim|required|xss_clean|' );
	   			// $validation_rules[] =	array( 'field'   => 'cand_phy','label'   => 'Physically Challenge Status','rules'   => 'trim|required|xss_clean|' );
	   			$validation_rules[] =	array( 'field'   => 'cand_img','label'   => 'Candidate Image','rules'   => 'callback_validate_image_type['.$action.'.cand_img]' );
	   			$validation_rules[] =	array( 'field'   => 'cand_status','label'   => 'Candidate Status','rules'   => 'trim|required|xss_clean|' );
	   		}
	  		if($this->input->post('index')==3 || $this->input->post('index')=="end") {
	   			$validation_rules[] =	array( 'field'   => 'cand_email','label'   => 'Email','rules'   => 'trim|required|xss_clean|valid_email' );
	   			$validation_rules[] =	array( 'field'   => 'cand_mobile','label'   => 'Mobile Number','rules'   => 'trim|xss_clean|regex_match[/^[0-9]{10}$/]|' );
	   			// $validation_rules[] =	array( 'field'   => 'cand_district','label'   => 'District Name','rules'   => 'trim|required|xss_clean|' );
	   			$validation_rules[] =	array( 'field'   => 'cand_address1','label'   => 'Address','rules'   => 'trim|required|xss_clean|minlength[3]|maxlength[150]' );
	   			$validation_rules[] =	array( 'field'   => 'cand_address2','label'   => 'Address','rules'   => 'trim|xss_clean|minlength[3]|maxlength[150]' );
	   			// $validation_rules[] =	array( 'field'   => 'cand_live_district','label'   => 'Live District','rules'   => 'trim|required|xss_clean|' );
			    $validation_rules[] =	array( 'field'   => 'cand_pincode','label'   => 'Pincode','rules'   => 'trim|xss_clean|regex_match[/^[0-9]{4,6}$/]|' );			                       
	   		}
	   		if($this->input->post('index')==4 || $this->input->post('index')=="end") {
	   			$validation_rules[] =	array( 'field'   => 'cand_institution','label'   => 'Candidate Institution','rules'   => 'trim|required|xss_clean' );                       
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

    			if($this->input->post('index')=="end" && !empty($_FILES['cand_img']['name']))
        		{	
        			$is_end = 1;
    				$config['upload_path'] = APPPATH . '../'.$upload_path; // APPPATH means our application folder path.
				    $config['allowed_types'] = 'jpg|jpeg|png'; // Allowed tupes
				    $config['encrypt_name'] = TRUE; // Encrypted file name for security purpose
				    $config['max_size']    = '1000'; // Maximum size - 1MB
					$config['max_width']  = '1024'; // Maximumm width - 1024px
					$config['max_height']  = '768'; // Maximum height - 768px
				    $this->upload->initialize($config); // Initialize the configuration   			
           			if($this->upload->do_upload('cand_img'))
            		{
                		$upload_data = $this->upload->data(); 
                		$_POST['cand_img'] = base_url().$upload_path.$upload_data['file_name']; 
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
			$data['mother_tongue'] = $this->admin_model->get_mother_tongue_language_list();
			$data['known_languages'] = $this->admin_model->get_language_list();
			$data['instution_values'] = $this->admin_model->get_institution_type_list();
			$data['district_values'] = $this->admin_model->get_district_values();
			$data['subject_values'] = $this->admin_model->get_subject_values();
			$data['extra_curricular_values'] = $this->admin_model->get_extra_curricular_values();
			$data_values = $this->job_seekermodel->get_full_seeker_profile($value);
			$data['seeker_full_profile'] = $data_values['seeker_full_profile'];
			$data['education_details'] = $data_values['education_details'];
			$data['experience_details'] = $data_values['experience_details'];
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/job_seeker_profile',$data);
		}
	}

	/* ===================          Job Seeker Profile Controller End     ====================== */

	/* ===================          Job Seeker Preference Controller Start     ====================== */

	// JOb seeker preference - Edit Delete View 
	public function job_seeker_preference()
	{
		$data['post_values'] = $this->admin_model->get_posting_values();
		$data['class_values'] = $this->admin_model->get_class_levels();
		$data['subject_values'] = $this->admin_model->get_subject_values();

		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	  		$id = $this->input->post('rid');
	   		$validation_rules = array(
		        array( 'field'   => 'cand_post','label'   => 'Posting Name','rules'   => 'trim|required|xss_clean|callback_multiselect_validate[Posting Name]' ),
		       	array( 'field'   => 'cand_ssalary','label' => 'Start Salary','rules' => 'trim|xss_clean|regex_match[/^[0-9]$/]|min_length[4]|max_length[9]' ),
		        array( 'field'   => 'cand_esalary','label' => 'End Salary','rules'   => 'trim|xss_clean|regex_match[/^[0-9]$/]|min_length[4]|max_length[9]|callback_check_greater_value['.$this->input->post('cand_ssalary').']' ),
		        array( 'field'   => 'cand_class','label'   => 'Class Name','rules'   => 'trim|required|xss_clean|callback_multiselect_validate[Posting Name]' ),
		        array( 'field'   => 'cand_sub','label'   => 'Subject Name','rules'   => 'trim|required|xss_clean|callback_multiselect_validate[Posting Name]' ) );
	 		$this->form_validation->set_rules($validation_rules);
	  		if ($this->form_validation->run() == FALSE) {   
		        foreach($validation_rules as $row){
		          $field = $row['field']; // getting field name
		          $error = form_error($field); // getting error for field name
		          if($error){
		            $data['status'] = strip_tags($error);
		            $data['error'] = 1;
		            break;
		          }
		        }
	  		}
      		else {
         		$data_values = $this->job_seekermodel->teacport_seeker_preference('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->job_seekermodel->teacport_seeker_preference('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->job_seekermodel->teacport_seeker_preference('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['preference'] = get_cand_pref_pcs($data_values['preference']);
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/job_seeker_preference',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['preference'] = get_cand_pref_pcs($data_values['preference']);
			$this->load->view('admin/job_seeker_preference',$data);
		}
	}

	/* ===================          Job Seeker Preference Controller End     ====================== */

	/* ===================          Job Seeker Applied Job Controller Start     ====================== */

	// Job seeker applied jobs - Edit View Delete
	public function job_seeker_applied()
	{
		$data['vac_values'] = $this->admin_model->get_vacancy_values();
		$data['cand_values'] = $this->admin_model->get_candidate_values();

		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	  		$id = $this->input->post('rid');
	   		$validation_rules = array(
		        // array( 'field'   => 'vac_name','label'   => 'Vacancy Name','rules'   => 'trim|required|xss_clean|' ),
		        // array( 'field'   => 'cand_name','label'  => 'Candidate Name','rules' => 'trim|required|xss_clean|' ),
		        array( 'field'   => 'job_status','label' => 'Job Status','rules'   => 'trim|required|xss_clean|' ) );
	 		$this->form_validation->set_rules($validation_rules);
	  		if ($this->form_validation->run() == FALSE) {   
		        foreach($validation_rules as $row){
		          $field = $row['field']; // getting field name
		          $error = form_error($field); // getting error for field name
		          if($error){
		            $data['status'] = strip_tags($error);
		            $data['error'] = 1;
		            break;
		          }
		        }
	  		}
      		else {
         		$data_values = $this->job_seekermodel->teacport_seeker_applied_job('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->job_seekermodel->teacport_seeker_applied_job('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->job_seekermodel->teacport_seeker_applied_job('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['job_applied'] = $data_values['job_applied'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/job_seeker_applied',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['job_applied'] = $data_values['job_applied'];
			$this->load->view('admin/job_seeker_applied',$data);
		}
	}

	/* ===================          Job Seeker Applied Job Controller End     ====================== */

	/* ===================          Job Seeker Mail Details and Status Controller Start     ====================== */

	// Job seeker mail details and status - View
	public function teacport_jobseeker_mailstatus()
	{
		$data['approved_candidate_jobs']=$this->job_seekermodel->get_approved_candidate_jobs();
		$this->load->view('admin/jobseeker_mailstatus',$data);
	}	

	/* ===================          Job Seeker Mail Details and Status Controller End     ====================== */


}
/* End of file Job_Seeker.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
