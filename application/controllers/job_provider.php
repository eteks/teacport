<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require ('common.php');
class Job_provider extends CI_Controller {
	public function __construct()
    {    	
        parent::__construct();
        $this->load->library(array('form_validation','session','captcha','image_lib','iptracker')); 
		$this->load->model(array('job_provider_model','common_model','job_seeker_model'));
		 session_start();
    }
	public function index()
	{
		/* initialize common controller php file*/
		$common = new Common();
		if(!$_POST){
			$data['captcha'] = $this->captcha->main();
			$this->session->set_userdata('captcha_info', $data['captcha']);
			/* Job provider login page with facebook login url */
			$data['institutiontype'] = $this->common_model->get_institution_type();
			$this->load->view('job-providers-login',$data);
		}
		else {
			/* set validation condition as per given input value are email or mobile number */
			$emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
			$mobileval="/^[1-9][0-9]*$/"; 
			if(preg_match($mobileval,$this->input->post('registrant_email_id'))){
				$this->form_validation->set_rules('registrant_email_id', 'Moblie', 'trim|required|numeric|exact_length[10]|xss_clean');
			}else if(preg_match($emailval,$this->input->post('registrant_email_id'))){
				$this->form_validation->set_rules('registrant_email_id', 'Email ID', 'trim|required|valid_email|xss_clean');
			}
			else{
				$this->form_validation->set_rules('registrant_email_id', 'Email ID or Mobile', 'trim|required|xss_clean');
			}
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('registrant_password', 'Password', 'trim|required|xss_clean');
			/* Check whether registration form server side validation are valid or not */
			if ($this->form_validation->run() == FALSE){
				$fb['captcha'] = $this->captcha->main();
				$this->session->set_userdata('captcha_info', $fb['captcha']);
				// $fb['reg_server_msg'] = 'Not a Registered User!Please Sign Up';	
				$fb['reg_server_msg'] = 'Invalid login Details!';	
				$fb['error'] = 1;
   				$fb['institutiontype'] = $this->common_model->get_institution_type();
				$this->load->view('job-providers-login',$fb);
			}
			else{
				$data = array(
					'registrant_login_data' => $this->input->post('registrant_email_id'),
					'registrant_password' => $this->input->post('registrant_password')
				);
				$checkvaliduser = $this->job_provider_model->check_valid_provider_login($data);
				if($checkvaliduser['valid_status'] === 'valid'){
					$this->session->set_userdata("login_status", TRUE);
					$this->session->set_userdata("login_session",$checkvaliduser);
					if(isset($_GET['reason']) && $_GET['reason']=='plan_selection') {
						$planid = $_GET['planid'];
						redirect('provider/subscription?reason=plan_selection&planid='.$planid);
					}
					else
						redirect('provider/dashboard');
				}
				else{
					$fb['captcha'] = $this->captcha->main();
					$this->session->set_userdata('captcha_info', $fb['captcha']);
					$fb['reg_server_msg'] = 'Invalid login Details!';
					$fb['error'] = 1;
					$fb['institutiontype'] = $this->common_model->get_institution_type();
					$this->load->view('job-providers-login',$fb);
				}
			}
		}
	}
	public function signup()
	{
		/* initialize common controller php file*/
		$common = new Common();
		/* initialize mail configuaration and load mail library */
		$ci =& get_instance();	
		$ci->config->load('email', true);
		$emailsetup = $ci->config->item('email');
		$this->load->library('email', $emailsetup);
		/* Registration page loading with out posted data */
		if(!$_POST){						
			$data['captcha'] = $this->captcha->main();
			$this->session->set_userdata('captcha_info', $data['captcha']);
			$data['institutiontype'] = $this->common_model->get_institution_type();
			$this->load->view('register-job-providers',$data);
		}
		/* Registration page loading with posted data */
		else{
			/* Set validate condition for registration form */
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			$this->form_validation->set_rules('registrant_institution_type', 'Institution', 'trim|required|is_natural|xss_clean');
			$this->form_validation->set_rules('organization_name', 'Organization Name', 'trim|required|min_length[3]|max_length[50]|is_unique[tr_organization_profile.organization_name]|xss_clean');
			$this->form_validation->set_rules('registrant_email_id', 'Email ID', 'trim|required|valid_email|xss_clean|is_unique[tr_organization_profile.registrant_email_id]');
			$this->form_validation->set_rules('registrant_mobile_no', 'Moblie', 'trim|required|numeric|exact_length[10]|xss_clean|is_unique[tr_organization_profile.registrant_mobile_no]');
            $this->form_validation->set_rules('captcha_value', 'Captcha', 'callback_validate_captcha');
			$this->form_validation->set_rules('provider_term_and_condition', 'Accept terms and condition', 'callback_accept_term_and_condition');
			/* Check whether registration form server side validation are valid or not */
			if ($this->form_validation->run() == FALSE)
	       	{
	       		/* Registration form invalid stage */
	       		$fb['reg_server_msg'] = 'Please provide valid information!';
	       		$fb['error'] = 1;
	       		$fb['captcha'] = $this->captcha->main();
				$this->session->set_userdata('captcha_info', $fb['captcha']);	
				$fb['institutiontype'] = $this->common_model->get_institution_type();
				$this->load->view('register-job-providers',$fb);	
	        }
			else
			{
				/* Registration form valid stage */
				/* Get and store posted data to array */
				$data = array(
					'organization_institution_type_id' => $this->input->post('registrant_institution_type'),
					'organization_name' => $this->input->post('organization_name'),
					'registrant_email_id' => $this->input->post('registrant_email_id'),
					'registrant_mobile_no' => $this->input->post('registrant_mobile_no'),
					'registrant_password' => $common->generateStrongPassword(),
					'organization_profile_completeness' => 33,
					'registrant_register_type' => 'teacherrecruite'
				);
			 	/* Check whether data exist or not.exist or not condition handled in job_provider_model.php */
				if($this->job_provider_model->create_job_provider($data) === 'inserted'){
					/* Data are not exist stage */
					/* Email configuration and mail template */
					$from_email = $emailsetup['smtp_user'];
					$subject = 'Teacher Recruit Registration';
					$message =  $this->load->view('email_template/provider', $data, TRUE);
					//$message = 'Dear '.$data['registrant_name'].',<br /><br />Your Teacher Recruit Application Password has been created to the following:.<br /><br /> <table border="1" bgcolor="#FEF1BC"><tbody><tr><td>Email :&nbsp;<strong><font color="blue">'.$data['registrant_email_id'].'</font></strong></td></tr><tr><td>Password :&nbsp;&nbsp;&nbsp;<strong><font color="blue">'.$data['registrant_password'].'</font></strong></td></tr></tbody></table><br /><br /><br />Thanks<br />Teacher Recruit Team';
					$this->email->initialize($emailsetup);
					$this->email->from($from_email, 'Teacher Recruit');
					$this->email->to($data['registrant_email_id']);
					$this->email->subject($subject);
					$this->email->message($message);
					/* Check whether mail send or not*/
					if($this->email->send()){
						/* mail sent success stage. send  facebook login link and server message to login page */
						$fb['reg_server_msg'] = 'Registration Successful!. Check your email address!!';	
						$fb['error'] = 2;
						$fb['institutiontype'] = $this->common_model->get_institution_type();
						$fb['captcha'] = $this->captcha->main();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
						$this->load->view('job-providers-login',$fb);
					}
					else{
						/* mail sent error stage. send  facebook login link and server message to login page */
						$fb['reg_server_msg'] = 'Some thing wrong in mail sending process. So please register again!';
						$fb['error'] = 1;
						$fb['captcha'] = $this->captcha->main();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
						$fb['institutiontype'] = $this->common_model->get_institution_type();
						$this->load->view('register-job-providers',$fb);
					}
				}
				else{
					/* data exist stage. send  facebook login link and server message to login page */
					$fb['reg_server_msg'] = 'Some thing wrong in data insertion process. So please register again!';
					$fb['error'] = 1;
					$fb['captcha'] = $this->captcha->main();
					$this->session->set_userdata('captcha_info', $fb['captcha']);	
					$fb['institutiontype'] = $this->common_model->get_institution_type();
					$this->load->view('register-job-providers',$fb);
				}
				
			}
		}

	}
	public function reload_captcha()
	{
		$data = $this->captcha->main();
		$data_value = $data['image_src'];
		$this->session->set_userdata('captcha_info', $data);
		echo $data_value;
	}
	
	public function dashboard()
    {
    	$data['site_visit_count'] = $this->common_model->get_site_visit_count();
    	$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$organization_email = (isset($session_data['login_session']['pro_email'])?$session_data['login_session']['pro_email']:$session_data['login_session']['registrant_email_id']);
		
		if($this->job_provider_model->check_has_initial_data($organization_email)=='has_no_data'){
			$data['initial_data'] = 'show_popup';
		}
		else{
			$data['initial_data'] = 'hide_popup';
		}
		$organization_data = (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
        $data['subscrib_plan'] = $this->common_model->provider_subscription_active_plans($organization_data['organization_id']);
		$data['postedjobs'] = $this->common_model->posted_jobs_count($organization_data['organization_id']);
        $this->session->set_userdata('registrant_logo',$organization_data['registrant_logo']);
        if($organization_data['organization_name'] == '' or $organization_data['organization_address_1'] == '' or $organization_data['organization_address_2'] == '' or $organization_data['organization_address_3'] == '' or $organization_data['organization_district_id'] == ''){
			$data['organization'] = $organization_data;
			$data['district'] = $this->common_model->get_all_district();
			$data['institutiontype'] = $this->common_model->get_institution_type();
			if($data['initial_data'] === 'show_popup')
			{
				$this->load->view('company-dashboard',$data);
			}
			else
			{
				redirect('provider/dashboard/editprofile');
			}
		}
		else{
			$data['organization'] = $organization_data;
			$this->load->view('company-dashboard',$data);
		}
        
    }
	public function provider_logout(){
		$this->session->set_userdata('login_status', FALSE);
		$this->session->unset_userdata('token');
		$this->session->unset_userdata('userData');
		$this->session->unset_userdata('login_session');
		unset($_SESSION['FBRLH_state']);
		unset($_SESSION['facebook_access_token']);
		$this->session->sess_destroy();
    	redirect('/','refresh');
	}
	public function editprofile(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data['organization'] = (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['district'] = $this->common_model->get_all_district();
		$data['institutiontype'] = $this->common_model->get_institution_type();
		$data['state_values'] = $this->common_model->get_all_state();
		if(!$_POST){
			$this->load->view('company-dashboard-edit-profile',$data);
			$this->session->unset_userdata('upload_provider_logo_error');
		}
		else{
			/* Set validate condition for profile update form */
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			$this->form_validation->set_rules('organization_name', 'Organization name', 'trim|alpha_numeric_spaces|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('organization_logo', 'Organization logo', 'trim|xss_clean');
			$this->form_validation->set_rules('address-line1', 'Address 1', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('address-line2', 'Address 2', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('address-line3', 'Address 3', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('organization_state', 'State ', 'trim|numeric|required|xss_clean', array('required' => 'Please choose your state'));
			$this->form_validation->set_rules('organization_district', 'District ', 'trim|numeric|required|xss_clean', array('required' => 'Please choose your district'));
			$this->form_validation->set_rules('provider_logo', 'Your logo', 'trim|xss_clean');
			$this->form_validation->set_rules('provider_name', 'Your name', 'trim|min_length[3]|max_length[50]|callback_alpha_dash_space|xss_clean');
			$this->form_validation->set_rules('provider_designation', 'Your Designation', 'trim|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('provider_dob', 'Date of Birth', 'callback_valid_date_required');
			$this->form_validation->set_rules('declar_accept', 'Declaration', 'callback_form_declaration');
			/* check forms data are valid are not */
			if ($this->form_validation->run())
		    {
		    	$provider_logo_path_name = '';
		    	$organization_logo_path_name = '';
		    	$upload_image_path = PROVIDER_UPLOAD;
		    	$data['upload_provider_logo_error'] = '';
		    	if($this->input->post('old_ologo_file_path')) {
		    		$organization_logo_path_name = base_url().$this->input->post('old_ologo_file_path');
		    	}
		    	if($this->input->post('old_plogo_file_path')) {
		    		$keyword = "uploads";
        			// To check whether the image path is cdn or local path
			        if(strpos( $this->input->post('old_plogo_file_path') , $keyword ) !== false) {
		    			$provider_logo_path_name = base_url().$this->input->post('old_plogo_file_path');
			        }
			        else {
			        	$provider_logo_path_name = $this->input->post('old_plogo_file_path');
			        }
		    	}

		    	if (!empty($_FILES['provider_logo']['name']))
				{
					$personnal_logo['upload_path'] 			= './uploads/jobprovider';
					$personnal_logo['allowed_types'] 		= 'jpg|png|jpeg';
					$personnal_logo['max_size']     		= '2048';
					$personnal_logo['max_width'] 			= '1024';
					$personnal_logo['max_height'] 			= '768';
					$personnal_logo['encrypt_name'] 		= TRUE;
					$personnal_logo['file_ext_tolower'] 	= TRUE;
					$this->load->library('upload', $personnal_logo);
					$this->upload->initialize($personnal_logo);
					if ( ! $this->upload->do_upload('provider_logo'))
					{
	                    $data['upload_provider_logo_error'] = $this->upload->display_errors();
						$provider_logo_path_name = '';
	                }
	                else
	                {
	                    $provideruploaddata = $this->upload->data();
						$provider_logo_file_name = $provideruploaddata['file_name'];
						$provider_logo_path_name = base_url().'uploads/jobprovider/'.$provider_logo_file_name;
						$provider_logo_thumb['image_library'] = 'gd2';
						$provider_logo_thumb['source_image'] = './uploads/jobprovider/'.$provider_logo_file_name;
						$provider_logo_thumb['create_thumb'] = TRUE;
						// $provider_logo_thumb['new_image'] = 'thumb_'.$provideruploaddata['file_name'];
						$provider_logo_thumb['maintain_ratio'] = TRUE;
						$provider_logo_thumb['width']         = 180;
						$provider_logo_thumb['height']       = 180;
						$provider_old_path = $this->input->post('old_plogo_file_path');
						$this->image_lib->initialize($provider_logo_thumb);
						// Resize operation
						if ( ! $this->image_lib->resize())
						{
	                		$data['upload_provider_logo_error'] = strip_tags($this->image_lib->display_errors()); 
						}
						$this->image_lib->clear();
	              	    $keyword = "uploads";
	        			// To check whether the image path is cdn or local path
				        if(strpos( $provider_old_path , $keyword ) !== false && !empty($provider_old_path) ) {
	               			@unlink(APPPATH.'../'.$provider_old_path);
	               			$thumb_image = explode('.', end(explode('/',$provider_old_path)));
	               			@unlink(APPPATH.'../'.$upload_image_path.$thumb_image[0]."_thumb.".$thumb_image[1]);
				        }					
	                }
				}
				if (!empty($_FILES['organization_logo']['name'])){
			        $organization_logo['upload_path'] 		= './uploads/jobprovider';
					$organization_logo['allowed_types'] 	= 'jpg|png|jpeg';
					$organization_logo['max_size']     		= '2048';
					$organization_logo['max_width'] 		= '1024';
					$organization_logo['max_height'] 		= '768';
					$organization_logo['encrypt_name'] 		= TRUE;
					$organization_logo['file_ext_tolower'] 	= TRUE;
					$this->load->library('upload', $organization_logo);
					$this->upload->initialize($organization_logo);
					if ( ! $this->upload->do_upload('organization_logo'))
					{
	                    $data['upload_provider_logo_error'] = $this->upload->display_errors();
						$this->session->set_userdata('upload_provider_logo_error', $this->upload->display_errors());
						$organization_logo_path_name = '';
						
	                }
	                else
	                {
	                    $organizationuploaddata = $this->upload->data();
						$organization_logo_file_name = $organizationuploaddata['file_name'];
						$organization_logo_path_name = base_url().'uploads/jobprovider/'.$organization_logo_file_name;
						$organization_logo_thumb['image_library'] = 'gd2';
						$organization_logo_thumb['source_image'] = './uploads/jobprovider/'.$organization_logo_file_name;
						$organization_logo_thumb['create_thumb'] = TRUE;
						// $organization_logo_thumb['new_image'] = 'thumb_'.$organizationuploaddata['file_name'];
						$organization_logo_thumb['maintain_ratio'] = TRUE;
						$organization_logo_thumb['width']         = 180;
						$organization_logo_thumb['height']       = 180;
						$organization_old_path = $this->input->post('old_ologo_file_path');
						$this->image_lib->initialize($organization_logo_thumb);
						// Resize operation
						if ( ! $this->image_lib->resize())
						{
	                		$data['upload_provider_logo_error'] = strip_tags($this->image_lib->display_errors()); 
						}
						$this->image_lib->clear();
	              	    $keyword = "uploads";
	        			// To check whether the image path is cdn or local path
				        if(strpos( $organization_old_path , $keyword ) !== false && !empty($organization_old_path) ) {
	               			@unlink(APPPATH.'../'.$organization_old_path);
	               			$thumb_image = explode('.', end(explode('/',$organization_old_path)));
	               			@unlink(APPPATH.'../'.$upload_image_path.$thumb_image[0]."_thumb.".$thumb_image[1]);
				        }
	                }
                }
				$dob_split = explode('/', $this->input->post('provider_dob'));

				$profile_completeness = 90;
				if(!empty($organization_logo_path_name)) {
					$profile_completeness = $profile_completeness + 2;
				}	
				if(!empty($provider_logo_path_name)) {
					$profile_completeness = $profile_completeness + 2;
				}
				if($this->input->post('provider_name')) {
					$profile_completeness = $profile_completeness + 2;
				}
				if($this->input->post('provider_designation')) {
					$profile_completeness = $profile_completeness + 2;
				}
				if($this->input->post('provider_dob')) {
					$dob = $dob_split[2].'-'.$dob_split[1].'-'.$dob_split[0];
					$profile_completeness = $profile_completeness + 2;
				}
				else {
					$dob = NULL;
				}

				$edit_profile_data = array(
					'organization_name'			=> $this->input->post('organization_name'),
					'organization_logo' 		=> $organization_logo_path_name,
					'organization_address_1' 	=> $this->input->post('address-line1'),
					'organization_address_2' 	=> $this->input->post('address-line2'),
					'organization_address_3' 	=> $this->input->post('address-line3'),
					'organization_state_id'	=> $this->input->post('organization_state'),
					'organization_district_id'	=> $this->input->post('organization_district'),
					'registrant_name' 			=> $this->input->post('provider_name'),
					'registrant_designation' 	=> $this->input->post('provider_designation'),
					'registrant_date_of_birth' 	=> $dob,
					'registrant_logo'			=> $provider_logo_path_name,
					'organization_profile_completeness' => $profile_completeness,
				);
				if($this->job_provider_model->job_provider_update_profile($data['organization']['organization_id'],$edit_profile_data)=='updated' && $data['upload_provider_logo_error'] == '')
				{
					redirect('provider/dashboard');
				}
		    }
		    else
		    {
		    	$this->load->view('company-dashboard-edit-profile',$data);
		    }		
		}
		
	}
	public function initialdata(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		if($_POST){
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			$this->form_validation->set_rules('registrant_institution_type', 'Institution', 'trim|required|is_natural|xss_clean');
			$this->form_validation->set_rules('provider_mobile_no', 'Mobile number', 'trim|required|numeric|exact_length[10]|is_unique[tr_organization_profile.registrant_mobile_no]|xss_clean');
			$this->form_validation->set_rules('providerpassword', 'Password', 'trim|required|min_length[8]|max_length[20]');
			$this->form_validation->set_rules('providerconfirmpassword', 'Password Confirmation', 'trim|required|matches[providerpassword]|min_length[8]|max_length[20]');
			if ($this->form_validation->run()){
				$initial_data_profile = array(
					'organization_institution_type_id' => $this->input->post('registrant_institution_type'),
					'registrant_password'	=> $this->input->post('providerpassword'),
					'registrant_mobile_no'	=> $this->input->post('provider_mobile_no'),
					'organization_profile_completeness' => 40
				);
				if($this->job_provider_model->job_provider_update_profile($this->input->post('organizationid'),$initial_data_profile)=='updated')
				{
					redirect('provider/dashboard');
				}
			}
			else{
				$session_data = $this->session->all_userdata();
				if(empty($session_data['login_session']))
					redirect('provider/logout');
				$organization_email = (isset($session_data['login_session']['pro_email'])?$session_data['login_session']['pro_email']:$session_data['login_session']['registrant_email_id']);
				if($this->job_provider_model->check_has_initial_data($organization_email)=='has_no_data'){
					$data['initial_data'] = 'show_popup';
				}
				else{
					$data['initial_data'] = 'hide_popup';
				}
				$organization_data = (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		        $data['subscrib_plan'] = $this->common_model->provider_subscription_active_plans($organization_data['organization_id']);
		        $data['postedjobs'] = $this->common_model->posted_jobs_count($organization_data['organization_id']);
		        if($organization_data['organization_name'] == '' or $organization_data['organization_address_1'] == '' or $organization_data['organization_address_2'] == '' or $organization_data['organization_address_3'] == '' or $organization_data['organization_district_id'] == ''){
					if($data['initial_data'] === 'show_popup')
					{
						$data['organization'] = $organization_data;
						$data['district'] = $this->common_model->get_all_district();
						$data['institutiontype'] = $this->common_model->get_institution_type();
						$this->load->view('company-dashboard',$data);
					}
					else
					{
						redirect('provider/dashboard/editprofile');
					}
					
				}
				else{
					$data['organization'] = $organization_data;
					$this->load->view('company-dashboard',$data);
				}
			}
		}
		else{
			$session_data = $this->session->all_userdata();
			if(empty($session_data['login_session']))
				redirect('provider/logout');
			$organization_email = (isset($session_data['login_session']['pro_email'])?$session_data['login_session']['pro_email']:$session_data['login_session']['registrant_email_id']);
			if($this->job_provider_model->check_has_initial_data($organization_email)=='has_no_data'){
				$data['initial_data'] = 'show_popup';
			}
			else{
				$data['initial_data'] = 'hide_popup';
			}
			$organization_data = (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
	        $data['subscrib_plan'] = $this->common_model->provider_subscription_active_plans($organization_data['organization_id']);
	        $data['postedjobs'] = $this->common_model->posted_jobs_count($organization_data['organization_id']);
	        if($organization_data['organization_name'] == '' or $organization_data['organization_logo'] == '' or $organization_data['organization_address_1'] == '' or $organization_data['organization_address_2'] == '' or $organization_data['organization_address_3'] == '' or $organization_data['organization_district_id'] == '' or $organization_data['registrant_name'] == '' or $organization_data['registrant_designation'] == '' ){
				$data['organization'] = $organization_data;
				$data['district'] = $this->common_model->get_all_district();
				$data['institutiontype'] = $this->common_model->get_institution_type();
				if($data['initial_data'] === 'show_popup')
				{
					$this->load->view('company-dashboard',$data);
				}
				else
				{
					redirect('provider/dashboard/editprofile');
				}
			}
			else{
				$data['organization'] = $organization_data;
				$this->load->view('company-dashboard',$data);
			}
		}
	}

	public function inbox(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$inboxdata['organization'] = (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$inboxdata['message'] = $this->job_provider_model->job_provider_inbox($session_data['login_session']['pro_userid']);
		$this->load->view('company-dashboard-inbox',$inboxdata);
	}
	public function inbox_message(){
		echo json_encode($this->job_provider_model->job_provider_inbox_ajax($this->input->post('orgid'),$this->input->post('lastid')));
	}
	public function inbox_message_count(){
		echo $this->job_provider_model->job_provider_unread_inbox_count($this->input->post('orgid'));
	}
	public function inbox_message_full_data(){
		$candidate_id = $this->input->post('candidate_id');	
		$vacancy_id = $this->input->post('vacancy');
		$inbox_id = $this->input->post('inbox_id');	
		$this->job_provider_model->provider_inbox_update($inbox_id);
		echo json_encode($this->job_provider_model->candidate_full_data($candidate_id,$vacancy_id));
	}
	public function inbox_message_remove_data(){
		$inbox_id = $this->input->post('inbox_id');
		if($this->job_provider_model->provider_inbox_remove_update($inbox_id)){
			echo "deleted";
		}
		else{
			echo "error";
		}		
	}
	public function postjob() {
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$common = new Common();
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['classlevel']		= (isset($session_data['login_session']['institution_type'])?$this->common_model->classlevel_by_institution($session_data['login_session']['institution_type']):$this->common_model->classlevel_by_institution($data['organization']['institution_type_id']));
		$data['subjects']		= (isset($session_data['login_session']['institution_type'])?$this->common_model->subject_by_institution($session_data['login_session']['institution_type']):$this->common_model->subject_by_institution($data['organization']['institution_type_id']));
		$data['applicable_posting']		= (isset($session_data['login_session']['institution_type'])?$this->common_model->applicable_posting($session_data['login_session']['institution_type']):$this->common_model->applicable_posting($data['organization']['institution_type_id']));
		$data['qualification']	= (isset($session_data['login_session']['institution_type'])?$this->common_model->qualification_by_institution($session_data['login_session']['institution_type']):$this->common_model->qualification_by_institution($data['organization']['institution_type_id']));
		$data['medium']			= $this->common_model->medium_of_instruction();
		$institution_type = isset($session_data['login_session']['institution_type'])?$session_data['login_session']['institution_type']:$data['organization']['institution_type_id'];
		// $data['university']		= $this->common_model->get_board_details();
		$data['university']		= '';
		$data['subscrib_plan'] 	= $this->common_model->provider_subscription_active_plans($data['organization']['organization_id']);
		if(!$_POST){
			$this->load->view('company-dashboard-post-jobs',$data);
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			// $this->form_validation->set_rules('provider_ug_or_pg', 'Required course type', 'trim|required|alpha|callback_pg_or_ug_check|max_length[3]|xss_clean');
			$this->form_validation->set_rules('provider_job_title', 'Job title', 'trim|required|callback_alpha_dash_space|min_length[3]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('provider_vacancy', 'No of vacancy', 'trim|required|numeric|is_natural_no_zero|max_length[5]|xss_clean');
			$this->form_validation->set_rules('provider_class_level', 'Class Level', 'trim|required|numeric|is_natural_no_zero|max_length[2]|xss_clean');
			$this->form_validation->set_rules('provider_qualification[]', 'Qualification', 'trim|xss_clean|callback_multiple_qualification');
			$this->form_validation->set_rules('provider_open_date', 'Open date', 'trim|required|callback_valid_date|exact_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_close_date', 'Close date', 'trim|required|callback_valid_date|exact_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_interview_start', 'Interview start date', 'trim|required|callback_valid_date|exact_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_interview_end', 'Interview end date', 'trim|required|callback_valid_date|exact_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_subject', 'Subjects', 'trim|required|xss_clean|callback_other_subject['.$institution_type.']');
			$this->form_validation->set_rules('provider_experience', 'Experience', 'trim|required|max_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_university', 'University', 'trim|numeric|is_natural_no_zero|max_length[2]|xss_clean');
			$this->form_validation->set_rules('provider_medium_of_instruction[]', 'Medium of Instruction', 'trim|required|xss_clean|callback_multiple_medium');
			$this->form_validation->set_rules('provider_min_salary', 'Minimum salary', 'trim|required|numeric|is_natural_no_zero|min_length[4]|max_length[9]|xss_clean');
			$this->form_validation->set_rules('provider_max_salary', 'Maximum salary', 'trim|required|numeric|is_natural_no_zero|min_length[4]|max_length[9]|callback_check_greater_value['.$this->input->post('provider_min_salary').']|xss_clean');
			$this->form_validation->set_rules('provider_accom_instruction', 'Accomadation Information', 'trim|required|callback_alpha_dash_space|max_length[150]|xss_clean');
			$this->form_validation->set_rules('provider_job_instruction', 'Job instruction', 'trim|required|min_length[50]|max_length[700]|xss_clean');
			if ($this->form_validation->run())
			{
				
				$vacancy_data = array(
									'vacancies_course_type'			=> ($this->input->post('provider_ug_or_pg')) ? $this->input->post('provider_ug_or_pg') : NULL, 
									'vacancies_department_id'		=> ($this->input->post('provider_department')) ? implode(',',$this->input->post('provider_department')) : NULL, 
									'vacancies_applicable_posting_id' => ($this->input->post('provider_posting')) ? $this->input->post('provider_posting') : NULL, 
									'vacancies_organization_id'		=> $data['organization']['organization_id'],
									'vacancies_job_title'			=> $this->input->post('provider_job_title'),
									'vacancies_available'			=> $this->input->post('provider_vacancy'),
									'vacancies_class_level_id'		=> $this->input->post('provider_class_level'),
									'vacancies_qualification_id'	=> implode(',',$this->input->post('provider_qualification')),
									'vacancies_open_date'			=> $common->reformatDate($this->input->post('provider_open_date')),
									'vacancies_close_date'			=> $common->reformatDate($this->input->post('provider_close_date')),
									'vacancies_interview_start_date'=> $common->reformatDate($this->input->post('provider_interview_start')),
									'vacancies_end_date'			=> $common->reformatDate($this->input->post('provider_interview_end')),
									'vacancies_subject_id'			=> $this->input->post('provider_subject'),
									'vacancies_experience'			=> $this->input->post('provider_experience'),
									'vacancies_university_board_id '=> $this->input->post('provider_university') !== ''?$this->input->post('provider_university'):NULL,
									'vacancies_medium'				=> implode(',',$this->input->post('provider_medium_of_instruction')),
									'vacancies_start_salary'		=> $this->input->post('provider_min_salary'),
									'vacancies_end_salary'			=> $this->input->post('provider_max_salary'),
									'vacancies_accommodation_info'	=> $this->input->post('provider_accom_instruction'),
									'vacancies_instruction'			=> $this->input->post('provider_job_instruction')
								);
				if($this->job_provider_model->job_provider_post_job_exist_or_not($vacancy_data)){
					
					$vacancy_status = $this->job_provider_model->job_provider_post_vacancy($vacancy_data);

					if($vacancy_status == "success")
					{
						$data['post_job_server_msg'] = 'Your vacancy successfully posted!';
						$data['error'] = 2;
						$this->load->view('company-dashboard-post-jobs',$data);
					}
					else if($vacancy_status == "failure")
					{
						$data['post_job_server_msg'] = 'Maximum number of vacancy exceeds!!';
						$data['error'] = 1;
						$this->load->view('company-dashboard-post-jobs',$data);
					}
					else {
						$data['post_job_server_msg'] = 'Something wrong in data insertion process.Please try again!!';
						$data['error'] = 1;
						$this->load->view('company-dashboard-post-jobs',$data);
					}
				}
				else{
					$data['post_job_server_msg'] = 'Your posting same job title and vacancy.';
					$data['error'] = 1;
					$this->load->view('company-dashboard-post-jobs',$data);
				}
			}
			else
			{
				$this->load->view('company-dashboard-post-jobs',$data);
			}
		}
	}
	public function multiple_qualification(){
		$arr_course = $this->input->post('provider_qualification');
     	if(empty($arr_course)){
     		$this->form_validation->set_message('multiple_qualification','Select at least one qualification');
	        return false;
		}
		else{
			return true;
		}
	}
	public function multiple_medium(){
		$arr_course = $this->input->post('provider_medium_of_instruction');
     	if(empty($arr_course)){
     		$this->form_validation->set_message('multiple_medium','Select at least one medium');
	        return false;
        }
		else{
			return true;
		}
	}
	public function postedjob()
	{
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$this->load->library('pagination');	
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$pagination = array();
		$pagination["base_url"] = base_url() . "provider/postedjob";
		$pagination["total_rows"] = $this->job_provider_model->job_provider_posted_job_counts($session_data['login_session']['pro_userid']);
		$pagination["per_page"] = 20;
		$pagination['use_page_numbers'] = 0;
		$pagination['num_links'] = $this->job_provider_model->job_provider_posted_job_counts($session_data['login_session']['pro_userid']);
		$pagination['cur_tag_open'] = '&nbsp;<li class="active"><a>';
		$pagination['cur_tag_close'] = '</a></li>';
		$pagination['next_link'] = 'Next';
		$pagination['prev_link'] = 'Previous';
		$this->pagination->initialize($pagination);
		if($this->uri->segment(3)){
			$page = ($this->uri->segment(3)) ;
		}
		else{
			$page = 0;
		}
		$data["postedjob"] = $this->job_provider_model->job_provider_posted_jobs($pagination["per_page"], $page,$session_data['login_session']['pro_userid']);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$this->load->view('company-dashboard-posted-jobs',$data);
	}
	public function postedjobdetail(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data["current_jobvacancy_id"] = $this->uri->segment('3');
		if($data["current_jobvacancy_id"]){
			$data["applyjob"] = $this->job_seeker_model->job_seeker_detail_jobs($data["current_jobvacancy_id"]);
			// if($session_data['login_session']['pro_userid'] === $data["applyjob"]["vacancies_organization_id"]){
				$data["qualification"] = $this->job_seeker_model->qualification_ids($data["applyjob"]["vacancies_qualification_id"]);
				$data["medium"] = $this->job_seeker_model->medium_of_instruction($data["applyjob"]["vacancies_medium"]);
				$this->load->view('company-dashboard-posted-jobs-detail', $data);
			// }
			// else{
			// 	redirect('missingpage');
			// }
		}
		else{
			redirect('provider/postedjob');
		}
	}
	public function editjobdetail(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data["current_jobvacancy_id"] = $this->uri->segment('3');
		if($data["current_jobvacancy_id"]){
			$data["applyjob"] = $this->job_seeker_model->job_seeker_detail_jobs($data["current_jobvacancy_id"]);
			if($session_data['login_session']['pro_userid'] === $data["applyjob"]["vacancies_organization_id"]){
				$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
				$data['classlevel']		= (isset($session_data['login_session']['institution_type'])?$this->common_model->classlevel_by_institution($session_data['login_session']['institution_type']):$this->common_model->classlevel_by_institution($data['organization']['institution_type_id']));
				$data['subjects']		= (isset($session_data['login_session']['institution_type'])?$this->common_model->subject_by_institution($session_data['login_session']['institution_type'],1):$this->common_model->subject_by_institution($data['organization']['institution_type_id'],1));
				$data['qualificatoin']	= (isset($session_data['login_session']['institution_type'])?$this->common_model->qualification_by_institution($session_data['login_session']['institution_type']):$this->common_model->qualification_by_institution($data['organization']['institution_type_id']));
				$data['medium']			= $this->common_model->medium_of_instruction();
				$data['departments']	= $this->common_model->get_department_details();
				$data['university']		= $this->common_model->get_board_details();
				$data['qualification']	= (isset($session_data['login_session']['institution_type'])?$this->common_model->qualification_by_institution($session_data['login_session']['institution_type']):$this->common_model->qualification_by_institution($data['organization']['institution_type_id']));
				$data['applicable_posting']		= (isset($session_data['login_session']['institution_type'])?$this->common_model->applicable_posting($session_data['login_session']['institution_type']):$this->common_model->applicable_posting($data['organization']['institution_type_id']));
				$this->load->view('company-dashboard-edit-jobs', $data);
			}
			else{
				redirect('missingpage');
			}
		}
		else{
			redirect('provider/postedjob');
		}
	}
	public function browse_candidate(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$this->load->library('pagination');	
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data['organization'] 			= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['posting']				= $this->common_model->applicable_posting($data['organization']['organization_institution_type_id']);
		$data['district']				= $this->common_model->get_all_district();
		$data['medium']					= $this->common_model->medium_of_instruction();
		$data['mother_tongue']			= $this->common_model->mother_tongue();
		$data['subject']				= $this->common_model->subjects($data['organization']['organization_institution_type_id']);
		$data['class_level']			= $this->common_model->classlevel_by_institution($data['organization']['organization_institution_type_id']);
		$data['qualification']			= $this->common_model->qualification($data['organization']['organization_institution_type_id']);
		$data['subscrib_plan'] 			= $this->common_model->provider_subscription_active_plans($data['organization']['organization_id']);
		$pagination 					= array();
		$pagination["base_url"] 		= base_url() . "provider/candidate";
		// $pagination["total_rows"] 		= $this->job_provider_model->all_candidate_list_counts($data['organization']['organization_institution_type_id']);
		$pagination["per_page"] 		= 20;
		$pagination['use_page_numbers'] = TRUE;
		$pagination['uri_segment'] 		= 3;
		$pagination['num_links'] 		= 4;
		$pagination['cur_tag_open'] 	= '&nbsp;<li class="active"><a>';
		$pagination['cur_tag_close'] 	= '</a></li>';
		$pagination['next_link'] 		= 'Next';
		$pagination['prev_link'] 		= 'Prev';
		$pagination['first_link'] 		= 'First';
		$pagination['first_tag_open']	= '<li>';
		$pagination['first_tag_close'] 	= '</li>';
		$pagination['last_link'] 		= 'Last';
		$pagination['last_tag_open'] 	= '<li>';
		$pagination['last_tag_close'] 	= '</li>';
		
		$offset = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)*$pagination["per_page"] : 0;

		if($_POST){
			$this->session->set_userdata('pro_search_data', $_POST);
		}
		// if(!empty($this->session->userdata('pro_search_data'))){
		$provider_search_data = $this->session->userdata('pro_search_data');

		// $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		// if(isset($provider_search_data['candidate_willing_district']) && $provider_search_data['candidate_willing_district'] != ''){
		// 	$this->form_validation->set_rules('candidate_willing_district', 'District', 'trim|numeric|is_natural_no_zero|max_length[8]|xss_clean');
		// }
		// if(isset($provider_search_data['candidate_mother_tongue']) && $provider_search_data['candidate_mother_tongue'] != ''){
		// 	$this->form_validation->set_rules('candidate_mother_tongue', 'Mother tongue', 'trim|numeric|is_natural_no_zero|max_length[8]|xss_clean');
		// }
		// if(isset($provider_search_data['candidate_experience']) && $provider_search_data['candidate_experience'] != ''){
		// 	$this->form_validation->set_rules('candidate_experience', 'Experience', 'trim|max_length[8]|xss_clean');
		// }
		// if(isset($provider_search_data['candidate_posting_name']) && $provider_search_data['candidate_posting_name'] != ''){
		// 	$this->form_validation->set_rules('candidate_posting_name', 'Posting', 'trim|numeric|is_natural_no_zero|max_length[8]|xss_clean');
		// }
		// if(isset($provider_search_data['candidate_nationality']) && $provider_search_data['candidate_nationality'] != ''){
		// 	$this->form_validation->set_rules('candidate_posting_name', 'Nationality', 'trim|xss_clean');
		// }
		// if(isset($provider_search_data['candidate_religion']) && $provider_search_data['candidate_religion'] != ''){
		// 	$this->form_validation->set_rules('candidate_religion', 'Religion', 'trim|xss_clean');
		// }
		// if(isset($provider_search_data['candidate_tet_status']) && $provider_search_data['candidate_tet_status'] != ''){
		// 	$this->form_validation->set_rules('candidate_tet_status', 'TET status', 'trim|numeric|max_length[8]|xss_clean');
		// }
		// if(isset($provider_search_data['candidate_subject']) && $provider_search_data['candidate_subject'] != ''){
		// 	$this->form_validation->set_rules('candidate_subject', 'Subject', 'trim|numeric|is_natural_no_zero|max_length[8]|xss_clean');
		// }
		// if(isset($provider_search_data['candidate_qualification']) && $provider_search_data['candidate_qualification'] != ''){
		// 	$this->form_validation->set_rules('candidate_qualification', 'Qualification', 'trim|numeric|is_natural_no_zero|max_length[8]|xss_clean');
		// }
		// if(isset($provider_search_data['candidate_salary']) && $provider_search_data['candidate_salary'] != ''){
		// 	$this->form_validation->set_rules('candidate_salary', 'Salary', 'trim|xss_clean');
		// }
		// $this->form_validation->run();
		$data["candidates"] = $this->job_provider_model->all_candidate_list_for_search($pagination["per_page"], $offset,$data['organization']['organization_institution_type_id'],$provider_search_data);
		$pagination["total_rows"] 		= $this->job_provider_model->all_candidate_list_for_search_count($data['organization']['organization_institution_type_id'],$provider_search_data);
		$this->pagination->initialize($pagination);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$data['search_mode'] = isset($provider_search_data['candidate_search_type'])?$provider_search_data['candidate_search_type']:'';
		$data['search_inputs'] = $provider_search_data;
		$this->load->view('company-dashboard-browse-candidate',$data);
			
		// }
		// else{
		// 	$data["candidates"] = $this->job_provider_model->all_candidate_list($pagination["per_page"], $page,$data['organization']['organization_institution_type_id']);
		// 	$pagination["total_rows"] 		= $this->job_provider_model->all_candidate_list_counts($data['organization']['organization_institution_type_id']);
		// 	$this->pagination->initialize($pagination);
		// 	$str_links = $this->pagination->create_links();
		// 	$data["links"] = explode('&nbsp;',$str_links );
		// 	$data['search_mode'] = 'normal';
		// 	$this->load->view('company-dashboard-browse-candidate',$data);
		// }
	}
	public function updatejob(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$common = new Common();
		$session_data = $this->session->all_userdata();
		$data['organization'] 			= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		if($_POST){
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			// $this->form_validation->set_rules('provider_ug_or_pg', 'Required course type', 'trim|alpha|callback_pg_or_ug_check|max_length[3]|xss_clean');
			$this->form_validation->set_rules('provider_job_title', 'Job title', 'trim|required|callback_alpha_dash_space|max_length[150]|xss_clean');
			$this->form_validation->set_rules('provider_vacancy', 'No of vacancy', 'trim|required|numeric|is_natural_no_zero|max_length[8]|xss_clean');
			$this->form_validation->set_rules('provider_class_level', 'Class Level', 'trim|required|numeric|is_natural_no_zero|max_length[2]|xss_clean');
			$this->form_validation->set_rules('provider_qualification[]', 'Qualification', 'trim|xss_clean|callback_multiple_qualification');
			// $this->form_validation->set_rules('provider_department[]', 'Department', 'trim|xss_clean|');
			$this->form_validation->set_rules('provider_subject', 'Subjects', 'trim|required|numeric|is_natural_no_zero|xss_clean');
			$this->form_validation->set_rules('provider_experience', 'Experience', 'trim|required|max_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_university', 'University', 'trim|numeric|is_natural_no_zero|max_length[2]|xss_clean');
			$this->form_validation->set_rules('provider_posting', 'Applicable Posting', 'trim|numeric|max_length[2]|xss_clean');
			$this->form_validation->set_rules('provider_medium_of_instruction[]', 'Medium of Instruction', 'trim|required|xss_clean|callback_multiple_medium');
			$this->form_validation->set_rules('provider_min_salary', 'Minimum salary', 'trim|required|numeric|is_natural_no_zero|min_length[4]|max_length[9]|xss_clean');
			$this->form_validation->set_rules('provider_max_salary', 'Maximum salary', 'trim|required|numeric|is_natural_no_zero|min_length[4]|max_length[9]|xss_clean');
			$this->form_validation->set_rules('provider_accom_instruction', 'Accomadation Information', 'trim|required|callback_alpha_dash_space|max_length[150]|xss_clean');
			$this->form_validation->set_rules('provider_job_instruction', 'Job instruction', 'trim|required|min_length[50]|max_length[700]|xss_clean');
			if ($this->form_validation->run())
			{
				$vacancy_data = array(
									'vacancies_course_type'			=> $this->input->post('provider_ug_or_pg'),
									'vacancies_organization_id'		=> $data['organization']['organization_id'],
									'vacancies_job_title'			=> $this->input->post('provider_job_title'),
									'vacancies_available'			=> $this->input->post('provider_vacancy'),
									'vacancies_class_level_id'		=> $this->input->post('provider_class_level'),
									'vacancies_qualification_id'	=> implode(',',$this->input->post('provider_qualification')),
									'vacancies_subject_id'			=> $this->input->post('provider_subject'),
									'vacancies_department_id'		=> $this->input->post('provider_department')?implode(',',$this->input->post('provider_department')):NULL,
									'vacancies_experience'			=> $this->input->post('provider_experience'),
									'vacancies_university_board_id '=> $this->input->post('provider_university') !== ''?$this->input->post('provider_university'):NULL,
									'vacancies_applicable_posting_id '=> $this->input->post('provider_posting') !== ''?$this->input->post('provider_posting'):NULL,
									'vacancies_medium'				=> implode(',',$this->input->post('provider_medium_of_instruction')),
									'vacancies_start_salary'		=> $this->input->post('provider_min_salary'),
									'vacancies_end_salary'			=> $this->input->post('provider_max_salary'),
									'vacancies_accommodation_info'	=> $this->input->post('provider_accom_instruction'),
									'vacancies_instruction'			=> $this->input->post('provider_job_instruction')
								);
				if($this->job_provider_model->job_provider_post_vacancy_update($vacancy_data,$this->input->post('provider_id')))
				{
					$this->session->set_userdata('post_job_server_msg','Your vacancy successfully updated!');
					$this->session->set_userdata('error',2);
					redirect('provider/postedjob');
				}
				else
				{
					$this->session->set_userdata('post_job_server_msg','Something wrong in data insertion process.Please try again!!');
					$this->session->set_userdata('error',1);
					redirect('provider/postedjob');
				}
			}
			else
			{
				$this->session->set_userdata('post_job_server_msg','Please provide valid information!!');
				$this->session->set_userdata('error',1);
				redirect('provider/editjob/'.$this->input->post('provider_id'));
			}
		}
	}
	public function postedjob_remove_data(){
		if($_POST){
			$vacancyid = $this->input->post('vacancy_id');
			if($this->job_provider_model->provider_postedjob_remove_update($vacancyid)){
				echo "deleted";
			}
			else{
				echo "error";
			}		
		}
	}
	public function changepassword(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['error'] = '';
		if(!$_POST){
			$this->load->view('company-dashboard-changepwd',$data);
		}
		else
		{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('provideroldpassword', 'Old password', 'trim|required|xss_clean|callback_validpassword');
			$this->form_validation->set_rules('providernewpassword', 'New password', 'trim|required|min_length[8]|xss_clean');
			$this->form_validation->set_rules('providerconfirmnewpassword', 'Confirm password', 'trim|required|min_length[8]|xss_clean|matches[providernewpassword]');
			if ($this->form_validation->run()){
				$changepassworddata 	= array('registrant_password' => $this->input->post('providerconfirmnewpassword'));
				if($this->job_provider_model->update_provider_password($changepassworddata,$session_data['login_session']['pro_userid'])){
					$data['pasword_server_msg'] = 'Your password successfully changed!';
					$data['error'] = 2;
					$this->load->view('company-dashboard-changepwd',$data);
				}
				else{
					$data['pasword_server_msg'] = 'Some thing wrong data insertion process! Please try again!!';
					$data['error'] = 1;
					$this->load->view('company-dashboard-changepwd',$data);
				}
			}
			else {
				$this->load->view('company-dashboard-changepwd',$data);
			}
		}
	}

	public function feedback(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		if(!$_POST){
			$this->load->view('company-dashboard-feedback',$data);
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('feedback_subject', 'Subject', 'trim|required|min_length[5]|max_length[100]|xss_clean');
			$this->form_validation->set_rules('feedback_content', 'Feedback', 'trim|required|min_length[50]|max_length[700]|xss_clean');
			if ($this->form_validation->run()){
				$feedback_data = array(
									'feedback_form_title' => $this->input->post('feedback_subject'),
									'feedback_form_message' => $this->input->post('feedback_content'),
									'is_organization' => 1,
									'is_candidate' => 0,
									'is_guest_user' => 0,
									'candidate_or_organization_id' => $session_data['login_session']['pro_userid'],
									'feedback_form_status' => 1
								);
				if($this->job_provider_model->organization_feedback_form($feedback_data)){
					$data['feedback_server_msg'] = 'Thanks for your valuable feedback! Our customer support representative will contact you soon!!';
					$data['error'] = 2;
					$this->load->view('company-dashboard-feedback',$data);
				}
				else{
					$data['feedback_server_msg'] ='Soemthing wrong in data insertion process. Please try again later!';
					$data['error'] = 1;
					$this->load->view('company-dashboard-feedback',$data);
				}
			}
			else{
				$this->load->view('company-dashboard-feedback',$data);
			}
		}
	}
    public function postad(){
    	$data['site_visit_count'] = $this->common_model->get_site_visit_count();
    	$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['subscrib_plan'] 	= $this->common_model->provider_subscription_active_plans($data['organization']['organization_id']);
		$visible_days = 0;
		if(!empty($data['subscrib_plan'])) {
		 	$subscription_id = $data['subscrib_plan']['subscription_id'];
		 	$visible_days = $this->common_model->subscription_visible_days($subscription_id);
		}

		if(!$_POST){
			$this->load->view('company-dashboard-post-adds',$data);	
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			$this->form_validation->set_rules('provider_ad_title', 'Title of ad', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[50]|xss_clean|is_unique[tr_premium_ads.premium_ads_name]');
			$this->form_validation->set_rules('provider_premium_ad_image', 'Ad image', 'callback_provider_premium_ad_validation');
			if ($this->form_validation->run()){
				if (!empty($_FILES['provider_premium_ad_image']['name'])){
			        $provider_premium_ad['upload_path'] 		= './uploads/jobprovider/premiumad';
					$provider_premium_ad['allowed_types'] 		= 'jpg|png|jpeg';
					$provider_premium_ad['max_size']     		= '2048';
					$provider_premium_ad['min_width'] 			= '800';
					$provider_premium_ad['min_height'] 			= '300';
					$provider_premium_ad['max_width'] 			= '1268';
					$provider_premium_ad['max_height'] 			= '768';
					$provider_premium_ad['encrypt_name'] 		= TRUE;
					$provider_premium_ad['file_ext_tolower'] 	= TRUE;
					$this->load->library('upload', $provider_premium_ad);
					$this->upload->initialize($provider_premium_ad);
					if ( ! $this->upload->do_upload('provider_premium_ad_image'))
					{
						$data['provider_premium_ad_error'] = $this->upload->display_errors();
						$this->load->view('company-dashboard-post-adds',$data);
	                }
	                else
	                {
	                    $provider_premium_aduploaddata = $this->upload->data();
						$premium_ad_data = array(
												'premium_ads_name'		=> $this->input->post('provider_ad_title'),
												'ads_image_path'		=> $provider_premium_aduploaddata['file_name'],
												'organization_id'		=> $session_data['login_session']['pro_userid'],
												'ad_visible_days'		=> $visible_days,
												'is_admin_verified'		=> 0,
												'premium_ads_status'	=> 1
											);
						$ads_status = $this->job_provider_model->organization_premiun_ad_upload($premium_ad_data);
						if($ads_status == "success")
						{
							$data['premiumad_server_msg'] = 'Advertisement Uploaded Successfully. Ads will be flashed soon after administrator approval.';
							$data['error'] = 2;
							$this->load->view('company-dashboard-post-adds',$data);
						}
						else if($ads_status == "failure")
						{
							$data['premiumad_server_msg'] = 'Maximum number of ads exceeds!!';
							$data['error'] = 1;
							$this->load->view('company-dashboard-post-adds',$data);
						}
						else {
							$data['premiumad_server_msg'] = 'Soemthing wrong in data insertion process. Please try again later!';
							$data['error'] = 1;
							$this->load->view('company-dashboard-post-adds',$data);
						}
	                }
                }
			}
			else{
				$this->load->view('company-dashboard-post-adds',$data);
			}
		}	
	}
	public function subscription(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['subcription_plan'] = $this->common_model->subcription_plan();
		$data['organization_chosen_plan'] = $this->common_model->organization_chosen_plan(isset($session_data['login_session']['pro_userid'])?$session_data['login_session']['pro_userid']:$data['organization']['organization_id']);
		$data['subscription_upgrade_plan'] = get_subscription_upgrade($this->common_model->subscription_upgrade_plan());
		if($this->input->post('subpack') && !in_array($this->input->post('subpack'),array_column($data['subscription_upgrade_plan'],'sub_id'))) {
			$data['secutiy_msg'] = "Something went wrong. Please try again with correct details";
			$data['chosen_plan'] = '';
			$data['organization_chosen_plan'] =array();
		}
		else {
			$data['chosen_plan'] = $this->input->post('subpack')?$this->input->post('subpack'):'';
		}


		$server_msg = $this->session->userdata('subscription_status');
		if($_POST && !$this->input->post('subpack') && !empty($server_msg)) {
			$options = json_decode($_POST['productinfo'],true);
			$transaction_data = array(
									'organization_id' 			=> $this->input->post('udf1'),
									'tracking_id ' 				=> $this->input->post('txnid'),
									'mihpayid' 					=> $this->input->post('mihpayid'),
									'payumoneyid' 				=> $this->input->post('payuMoneyId'),
									'merchant_key' 				=> $this->input->post('key'),
									'bank_code' 				=> $this->input->post('bankcode'),
									'bank_referrence_number' 	=> $this->input->post('bank_ref_num'),
									'transaction_status' 		=> $this->input->post('status'),
									'payment_mode' 				=> $this->input->post('mode'),
									'pg_type' 					=> $this->input->post('PG_TYPE'),
									'unmapped_status' 			=> $this->input->post('unmappedstatus'),
									'card_name' 				=> $this->input->post('name_on_card'),
									'card_number' 				=> $this->input->post('cardnum'),
									'transaction_date_time' 	=> $this->input->post('addedon'),
									'discount_value' 			=> $this->input->post('discount'),
									'amount' 					=> $this->input->post('amount'),
									'net_amount_debit' 			=> $this->input->post('net_amount_debit'),
									'error_code' 				=> $this->input->post('error'),
									'error_message' 			=> $this->input->post('error_Message'),
								);
			if($this->job_provider_model->subscription_transaction_data($transaction_data) && $this->input->post('status')==='success'){
				$transaction_id = $this->db->insert_id();
				if($options['plan_option'] != "upgrade") {
					$subscription_plan_data = $this->common_model->subcription_plan($this->input->post('udf2'));
					$no_of_days = $subscription_plan_data[0]['subscription_validity_days'];
					if($this->input->post('status')==='success' ){
						$user_subscription_data = array(
													'organization_id' 								=> $this->input->post('udf1'),
													'subscription_id' 								=> $this->input->post('udf2'),
													'organization_transcation_id' 					=> $transaction_id,
													'organization_post_vacancy_count' 				=> $subscription_plan_data[0]['subscription_max_no_of_posts'],
													'organization_vacancy_remaining_count' 						=> $subscription_plan_data[0]['subscription_max_no_of_posts'],
													'organization_post_ad_count' 				=> $subscription_plan_data[0]['subscription_max_no_of_ads'],
													'organization_ad_remaining_count' 						=> $subscription_plan_data[0]['subscription_max_no_of_ads'],
													'organization_email_count' 						=> $subscription_plan_data[0]['subscription_email_counts'],
													'organization_sms_count'						=> $subscription_plan_data[0]['subcription_sms_counts'],
													'organization_resume_download_count'			=> $subscription_plan_data[0]['subcription_resume_download_count'],
													'organization_email_remaining_count'			=> $subscription_plan_data[0]['subscription_email_counts'],
													'organization_sms_remaining_count'				=> $subscription_plan_data[0]['subcription_sms_counts'],
													'organization_remaining_resume_download_count'	=> $subscription_plan_data[0]['subcription_resume_download_count'],
													'is_email_validity'								=> 1,
													'is_sms_validity'								=> 1,
													'is_resume_validity'							=> 1,
													'org_sub_validity_start_date'					=> date('Y-m-d'),
													'org_sub_validity_end_date'						=> date('Y-m-d' ,strtotime("+".$no_of_days." day")),
													'organization_subscription_status'				=> 1
												);
					
						if($this->job_provider_model->subscriped_plan_data($user_subscription_data)){
							if($options['plan_option'] == "renewal") {
								$org_sub_id = $this->job_provider_model->organization_subscription_data($this->input->post('udf1'),$this->input->post('udf2'));
								$user_renewal_data = array(
													'organization_subscription_id' 					=> $org_sub_id['organization_subscription_id'],
													'is_renewal' 									=> 1,
													'validity_start_date' 							=> $org_sub_id['org_sub_validity_start_date'],
													'validity_end_date'								=> $org_sub_id['org_sub_validity_end_date'],
													'transaction_id'								=> $transaction_id,
													'status'										=> 1
												);
								if($this->job_provider_model->subscribe_upgrade_renewal($user_renewal_data)) {
									$data['subscription_server_msg'] = 'Subscription will activated successfully! Your transaction id is '.$transaction_id;
								}
								else {
									$data['subscription_server_msg'] = 'Soemthing wrong in data insertion process. Our customer representative will call you soon!. Please note that transaction id <b>('.$transaction_id.')</b> for future reference!';
								}
							}
							else {
								$data['subscription_server_msg'] = 'Subscription will activated successfully! Your transaction id is '.$transaction_id;
							}				
							// $this->load->view('company-dashboard-subscription',$data);
						}
						else {
							$data['subscription_server_msg'] = 'Soemthing wrong in data insertion process. Our customer representative will call you soon!. Please note that transaction id <b>('.$transaction_id.')</b> for future reference!';
							// $this->load->view('company-dashboard-subscription',$data);			
						}
					}
				}
				if($options['plan_option'] == "upgrade") {
					$subscription_plan_data = $this->common_model->subcription_plan($this->input->post('udf2'));
					if($this->input->post('status')==='success' ){
						$org_sub_id = $this->job_provider_model->organization_subscription_data($this->input->post('udf1'),$this->input->post('udf2'));
						$user_subscription_data = array(
													'organization_id' 								=> $this->input->post('udf1'),
													'subscription_id' 								=> $this->input->post('udf2'),
													'organization_transcation_id' 					=> $transaction_id,
													'organization_email_count' 						=> $org_sub_id['organization_email_count'] + $options['email'],
													'organization_sms_count'						=> $org_sub_id['organization_sms_count'] + $options['sms'],
													'organization_resume_download_count'			=> $org_sub_id['organization_resume_download_count'] + $options['resume'],
													'organization_email_remaining_count'			=> $org_sub_id['organization_email_remaining_count'] + $options['email'],
													'organization_sms_remaining_count'				=> $org_sub_id['organization_sms_remaining_count'] + $options['sms'],
													'organization_remaining_resume_download_count'	=> $org_sub_id['organization_remaining_resume_download_count'] + $options['resume'],
													'is_email_validity'								=> (($org_sub_id['organization_email_remaining_count'] + $options['email']) > 0 ? 1 : 0),
													'is_sms_validity'								=> (($org_sub_id['organization_sms_remaining_count'] + $options['sms']) > 0 ? 1 : 0),
													'is_resume_validity'							=> (($org_sub_id['organization_remaining_resume_download_count'] + $options['resume']) > 0 ? 1 : 0),
													'organization_subscription_status'				=> 1
												);
						if($this->job_provider_model->subscriped_plan_data($user_subscription_data)){
							$user_upgrade_data = array(
													'organization_subscription_id' 					=> $org_sub_id['organization_subscription_id'],
													'is_renewal' 									=> 0,
													'validity_start_date' 							=> $org_sub_id['org_sub_validity_start_date'],
													'validity_end_date'								=> $org_sub_id['org_sub_validity_end_date'],
													'transaction_id'								=> $transaction_id,
													'status'										=> 1
												);
							if($this->job_provider_model->subscribe_upgrade_renewal($user_upgrade_data)) {
								$data['subscription_server_msg'] = 'Subscription will upgraded successfully! Your transaction id is '.$transaction_id;
							}
							else {
								$data['subscription_server_msg'] = 'Soemthing wrong in data insertion process. Our customer representative will call you soon!. Please note that transaction id <b>('.$transaction_id.')</b> for future reference!';
							}
							// $this->load->view('company-dashboard-subscription',$data);
						}
						else {
							$data['subscription_server_msg'] = 'Soemthing wrong in data insertion process. Our customer representative will call you soon!. Please note that transaction id <b>('.$transaction_id.')</b> for future reference!';
							// $this->load->view('company-dashboard-subscription',$data);			
						}
					}
				}
			}
			else {
				$data['subscription_server_msg'] = 'Transaction failed! please try again';
				// $this->load->view('company-dashboard-subscription',$data);
			}
		}
		if($server_msg != "success") {
			$data['subscription_server_msg'] = $server_msg;
		}
		$this->session->unset_userdata('subscription_status');	
		$this->load->view('company-dashboard-subscription',$data);
	}
	
	public function candidateprofile() {
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']))
			redirect('provider/logout');
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['subscrib_plan'] = $this->common_model->provider_subscription_active_plans($data['organization']['organization_id']);
		$candidate_id = $this->uri->segment(3);
		$institution_type_id = $data['organization']['organization_institution_type_id'];	
		$data['candidate'] = $this->job_provider_model->candidate_full_data($candidate_id);
		if($data['candidate']['personnal']['candidate_institution_type'] == $institution_type_id){
			$this->load->view('company-dashboard-candidate-detail',$data);
		}
		else{
			$this->load->view('404page');
		}
 	}
	
	public function forgot_password()
	{
		$ci =& get_instance();	
		$ci->config->load('email', true);
		$emailsetup = $ci->config->item('email');
		$this->load->library('email', $emailsetup);
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('forget_email', 'Email', 'trim|required|valid_email|xss_clean');
		/* Check whether registration form server side validation are valid or not */
		if ($this->form_validation->run() == FALSE){
			$data['reg_server_msg'] = 'Please enter a valid email address';	
			$data['error'] = 1;
			$this->load->view('forgot-password',$data);
		} 
			
		else{
	        $forget_where = '(registrant_email_id="'.$this->input->post('forget_email').'")';
	  		$forget_query = $this->db->get_where('tr_organization_profile',$forget_where)->row_array();
	  		if(isset($forget_query['registrant_password']) && !empty($forget_query['registrant_password'])) {
				$from_email = $emailsetup['smtp_user'];
				$this->email->initialize($emailsetup);
				$this->email->from($from_email, 'Teacher Recruit');
				$this->email->to($forget_query['registrant_email_id']);
	        	$subject = $this->email->subject('Get your forgotten Password');
	        	$message = $this->load->view('email_template/forget_pwd_user', $forget_query, TRUE);
	        	// print_r($message);
				$this->email->message($message);
	       		// $this->email->message("Your registered password is ".$forget_query['registrant_password']);
	        	if($this->email->send()){
		        	$data['reg_server_msg'] = "Password has been sent to your registered email address";
		        	$data['error'] = 2;
		        	$this->load->view('forgot-password',$data);
	        	}
				else{
					show_error($this->email->print_debugger());
					$data['reg_server_msg'] = 'Some thing wrong in mail sending process. So please register again!';
					$data['error'] = 1;
					$this->load->view('forgot-password',$data);
				}
	      	}
			else{
				$data['reg_server_msg'] = 'Provided mail id is invalid!';	
				$data['error'] = 1;
				$this->load->view('forgot-password',$data);
			}
		}   	
	}
	public function sendmail(){
		if($_POST){
			$candidate_det = $this->job_seeker_model->candidate_profile_by_id($this->input->post('candidate_id'));
			$candidate_id = $this->input->post('candidate_id');	
			$org_id = $this->input->post('org_id');
			$org_det['organization_details'] = $this->job_provider_model->organization_email_details($org_id);
			$org_det['candidate_name'] = $candidate_det['candidate_name'];
			$vac_det['candidate_name'] = $candidate_det['candidate_name'];
			$vac_id = ($this->input->post('vac_id'))?$this->input->post('vac_id'):'';

			// Email configuration
			$this->config->load('email', true);
			$emailsetup = $this->config->item('email');
			$this->load->library('email', $emailsetup);
			$from_email = $emailsetup['smtp_user'];
			$subject = 'Interview Call Letter';
			if($vac_id != '') {
				$vac_det['vacancy_details'] = $this->job_provider_model->vac_org_by_id($vac_id);
				if(!empty($vac_det)) {
					$message = $this->load->view('email_template/job_shortlist_by_vac', $vac_det, TRUE);
				}
				else {
					$message = $this->load->view('email_template/job_shortlist_by_org', $org_det, TRUE);
				}
			}
			else {
				$message = $this->load->view('email_template/job_shortlist_by_org', $org_det, TRUE);
			}
			$this->email->initialize($emailsetup);	
			$this->email->from($from_email, 'Teacher Recruit');
			$this->email->to($candidate_det['candidate_email']);
			$this->email->subject($subject);
			$this->email->message($message);
			/* Check whether mail send or not*/
			if($this->email->send()){
				$status = $this->job_provider_model->provider_mail_send_update($candidate_id,$org_id,$vac_id);
				$data['status'] = ($status['status']!='')?$status['status']:"failure";
				$data['subscribe_details'] = $status['subscribe_details'];
			}
			else {
				$status = $this->job_provider_model->provider_mail_send_update($candidate_id,$org_id,$vac_id);
				$data['status'] = "failure";
				$data['subscribe_details'] = $status['subscribe_details'];
			}
			echo json_encode($data);
		}else{
			redirect('missingpage');
		}
	}
	public function resume_download(){
		if($_POST) {
			$candidate_id = $this->input->post('candidate_id');	
			$org_id = $this->input->post('org_id');
			$vac_id = ($this->input->post('vac_id'))?$this->input->post('vac_id'):'';
			$status = $this->job_provider_model->provider_resume_download_update($candidate_id,$org_id,$vac_id);
			$data['status'] = ($status['status']!='')?$status['status']:"failure";
			$data['subscribe_details'] = $status['subscribe_details'];
			echo json_encode($data);
		}
		else{
			redirect('missingpage');
		}
	}
	public function sendsms(){
		if($_POST){
			$candidate_det = $this->job_seeker_model->candidate_profile_by_id($this->input->post('candidate_id'));
			$org_id = $this->input->post('org_id');
			$vac_id = ($this->input->post('vac_id'))?$this->input->post('vac_id'):'';
			$candidate_id = $this->input->post('candidate_id');	
			if($vac_id != '') {
				$link = base_url()."seeker/vacancy_details/".$vac_id;
				$msg = "We+are+pleased+to+inform+you+that+you+have+been+shortlisted+for+the+job+you+have+been+applied+and+you+are+invited+to+attend+an+interview.+Please+visit+$link";
			}
			else {
				$link = base_url()."user-followed-companies/".$org_id;
				$msg = "We+are+pleased+to+inform+you+that+you+have+been+shortlisted+and+you+are+invited+to+attend+an+interview.+Please+visit+$link";
			}
			$url = "http://www.etekchnoservices.com/sms/sendsms.php?uid=7845729671&pwd=iloveindia&phone=".$candidate_det['candidate_mobile_no']."&msg=$msg";
			$get = file_get_contents($url);
			if($get == "true") {
				$status = $this->job_provider_model->provider_sms_send_update($candidate_id,$org_id,$vac_id);
				$data['status'] = ($status['status']!='')?$status['status']:"failure";
				$data['subscribe_details'] = $status['subscribe_details'];
				echo json_encode($data);
			}
			else {
				$status = $this->job_provider_model->provider_sms_send_update($candidate_id,$org_id,$vac_id);
				$data['status'] = "failure";
				$data['subscribe_details'] = $status['subscribe_details'];
				echo json_encode($data);
			}
		}
		else{
			redirect('missingpage');
		}
	}
	/* custom validataion rules */
	public function valid_date($date)
	{
		if(!empty($date)){
	   		$date_split =  explode('/', $date);
	   		if(checkdate($date_split[1],$date_split[0],$date_split[2]) ) {
	      		return true;
	   		} else {
	     		$this->form_validation->set_message('valid_date','The %s date is not valid it should match this dd/mm/yyyy format');
	        	return false;
	   		}
		}
		else{
			$this->form_validation->set_message('valid_date','The %s date is empty');
        	return false;
		}
	}

	public function valid_date_required($date)
	{
		if(!empty($date)){
	   		$date_split =  explode('/', $date);
	   		if(checkdate($date_split[1],$date_split[0],$date_split[2]) ) {
	      		return true;
	   		} else {
	     		$this->form_validation->set_message('valid_date','The %s date is not valid it should match this dd/mm/yyyy format');
	        	return false;
	   		}
		}
		else{
        	return true;
		}
	}
	// public function organization_logo_validation(){
		
 //    	if (empty($_FILES['organization_logo']['name'])) {
 //    		$this->form_validation->set_message('organization_logo_validation', 'Please select file.');
 //            return false;
 //        }else{
 //            return true;
 //        }
	// }
	public function provider_premium_ad_validation(){
		if (empty($_FILES['provider_premium_ad_image']['name'])) {
    		$this->form_validation->set_message('provider_premium_ad_validation', 'Please upload image.');
            return false;
        }else{
            return true;
        }
	}
	public function form_declaration(){
		 if ($this->input->post('declar_accept'))
		{
			return TRUE;
		}
		else
		{
			$error = 'Please check declaration!.';
			$this->form_validation->set_message('form_declaration', $error);
			return FALSE;
		}
	}
	public function validate_captcha(){
		$entereddata = $this->input->post('captcha_value');
		$session_captcha = $this->session->userdata['captcha_info'];
	    if($entereddata != $session_captcha['code'])
	    {
	        $this->form_validation->set_message('validate_captcha', 'Wrong captcha code');
	        return FALSE;
			
	    }else{
	        return TRUE;
	    }
	}
	public function pg_or_ug_check(){
		$pg_or_ug_data = $this->input->post('provider_ug_or_pg');
		if($pg_or_ug_data === 'ug' or $pg_or_ug_data === 'pg' or $pg_or_ug_data === 'phd'){
			return TRUE;
		}
		else {
			$this->form_validation->set_message('pg_or_ug_check', 'Wrongly selected course type');
			return FALSE;
		}
		
	}
	public function alpha_dash_space($provider_job_title){
		if (! preg_match('/^[a-zA-Z\s]+$/', $provider_job_title) && $provider_job_title!='') {
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function validpassword()
	{
		$oldpassword	= $this->input->post('provideroldpassword');
		$providerid 	= $this->session->userdata('login_session');
		if($this->job_provider_model->checkvalidpassword($oldpassword,$providerid['pro_userid'])){
			
			return TRUE;
		}
		else {
			$this->form_validation->set_message('validpassword', 'The %s does not match!');
			return FALSE;
		}
	} 
	public function accept_term_and_condition(){
		if ($this->input->post('provider_term_and_condition')){
			return TRUE;
		}
		else{
			$error = 'Please accept term and condition!.';
			$this->form_validation->set_message('accept_term_and_condition', $error);
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

	public function joblevel_qualification()
	{
		$data = '';
		$session_data = $this->session->all_userdata();
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$ins_id	= (isset($session_data['login_session']['institution_type'])?$session_data['login_session']['institution_type']:$data['organization']['institution_type_id']);
		if($this->input->post('value')) {
			$data = $this->common_model->qualification_by_joblevel($this->input->post('value'),$ins_id);
		}
		echo json_encode($data);   	
	}
	public function class_level_university()
	{
		$data = '';
		if($this->input->post('value')) {
			$data = $this->common_model->university_by_classlevel($this->input->post('value'));
		}
		echo json_encode($data);   	
	}

	public function qualification_department()
	{
		$data = '';
		if($this->input->post('value')) {
			$data = $this->common_model->department_by_qualification($this->input->post('value'));
		}
		echo json_encode($data);   	
	}
	
	// To store other option value and get that value - Subject
 	function other_subject($val,$ins_id) {
 		if($val == "others" && $_POST['other_subject']!='') {
 			$array = array(
 							'subject_name' => $_POST['other_subject'],
 							'subject_institution_id' => $ins_id,
 							'subject_status' => 2 // It means other option
 						);
 			$id = $this->common_model->insert_other_subject($array);
 			if($id == "active") {
 				$this->form_validation->set_message('other_subject', 'Entered %s other option is already exist.');
	       		return FALSE;
 			}
 			if($id == "inactive") {
 				$this->form_validation->set_message('other_subject', 'Entered %s other option is already inactive by Admin.');
	       		return FALSE;
 			}
 			else {
 				$_POST['provider_subject'] = $id;
 			}
 		}
 		else if($val == "others") {
   			$this->form_validation->set_message('other_subject', 'The %s other option is required.');
	       	return FALSE;
 		}
 	}  





 
} // End