<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require ('common.php');
class Job_provider extends CI_Controller {
	public function __construct()
    {    	
        parent::__construct();
        $this->load->library(array('form_validation','session','captcha')); 
		$this->load->model(array('job_provider_model','common_model'));
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
					redirect('provider/dashboard');
				}
				else{
					$fb['captcha'] = $this->captcha->main();
					$this->session->set_userdata('captcha_info', $fb['captcha']);
					$fb['reg_server_msg'] = 'Your Provided Login data is invalid!';	
					$data['institutiontype'] = $this->common_model->get_institution_type();
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
			$this->form_validation->set_rules('registrant_name', 'Name', 'trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('registrant_email_id', 'Email ID', 'trim|required|valid_email|xss_clean|is_unique[tr_organization_profile.registrant_email_id]');
			$this->form_validation->set_rules('registrant_mobile_no', 'Moblie', 'trim|required|numeric|exact_length[10]|xss_clean|is_unique[tr_organization_profile.registrant_mobile_no]');
            $this->form_validation->set_rules('captcha_value', 'Captcha', 'callback_validate_captcha');
			$this->form_validation->set_rules('provider_term_and_condition', 'Accept terms and condition', 'callback_accept_term_and_condition');
			/* Check whether registration form server side validation are valid or not */
			if ($this->form_validation->run() == FALSE)
	       	{
	       		/* Registration form invalid stage */
	       		$fb['reg_server_msg'] = 'Please provide valid information!';
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
					'registrant_name' => $this->input->post('registrant_name'),
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
						$fb['reg_server_msg'] = 'Resitration Successful!. Check your email address!!';	
						$data['institutiontype'] = $this->common_model->get_institution_type();
						$this->load->view('job-providers-login',$fb);
					}
					else{
						/* mail sent error stage. send  facebook login link and server message to login page */
						$fb['reg_server_msg'] = 'Some thing wrong in mail sending process. So please register again!';	
						$fb['captcha'] = $this->captcha->main();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
						$fb['institutiontype'] = $this->common_model->get_institution_type();
						$this->load->view('register-job-providers',$fb);
					}
				}
				else{
					/* data exist stage. send  facebook login link and server message to login page */
					$fb['reg_server_msg'] = 'Some thing wrong in data insertion process. So please register again!';
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
    	$session_data = $this->session->all_userdata();
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
				$this->load->view('company-dashboard-edit-profile',$data);
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
		$session_data = $this->session->all_userdata();
		$data['organization'] = (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['district'] = $this->common_model->get_all_district();
		$data['institutiontype'] = $this->common_model->get_institution_type();
		if(!$_POST){
			$this->load->view('company-dashboard-edit-profile',$data);
			$this->session->unset_userdata('upload_provider_logo_error');
		}
		else{
			/* Set validate condition for profile update form */
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			$this->form_validation->set_rules('organization_name', 'Organization name', 'trim|required|alpha_numeric_spaces|min_length[3]|xss_clean');
			$this->form_validation->set_rules('organization_logo', 'Organization logo', 'callback_organization_logo_validation');
			$this->form_validation->set_rules('address-line1', 'Address 1', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('address-line2', 'Address 2', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('address-line3', 'Address 3', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('organization_district', 'District ', 'trim|numeric|required|xss_clean', array('required' => 'Please choose your district'));
			$this->form_validation->set_rules('provider_logo', 'Your logo', 'trim|xss_clean');
			$this->form_validation->set_rules('provider_name', 'Your name', 'trim|required|min_length[3]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('provider_designation', 'Your Designation', 'trim|required|alpha_numeric|min_length[3]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('provider_dob', 'Date of Birth', 'callback_valid_date');
			$this->form_validation->set_rules('declar_accept', 'Declaration', 'callback_form_declaration');
			/* check forms data are valid are not */
			if ($this->form_validation->run())
		    {
		    	$provider_logo_file_name = '';
				$profile_completeness = 0;
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
						$provider_logo_file_name = '';
						$profile_completeness = 0;
	                }
	                else
	                {
	                    $provideruploaddata = $this->upload->data();
						$provider_logo_file_name = $provideruploaddata['file_name'];
						$profile_completeness = 10;
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
	                    //$data['upload_provider_logo_error'] = $this->upload->display_errors();
						$this->session->set_userdata('upload_provider_logo_error', $this->upload->display_errors());
						$organization_logo_file_name = '';
						
	                }
	                else
	                {
	                    $organizationuploaddata = $this->upload->data();
						$organization_logo_file_name = $organizationuploaddata['file_name'];
	                }
                }
				$dob_split = explode('/', $this->input->post('provider_dob'));
				$edit_profile_data = array(
					'organization_name'			=> $this->input->post('organization_name'),
					'organization_logo' 		=> base_url().'uploads/jobprovider/'.$organization_logo_file_name,
					'organization_address_1' 	=> $this->input->post('address-line1'),
					'organization_address_2' 	=> $this->input->post('address-line2'),
					'organization_address_3' 	=> $this->input->post('address-line3'),
					'organization_district_id'	=> $this->input->post('organization_district'),
					'registrant_name' 			=> $this->input->post('provider_name'),
					'registrant_designation' 	=> $this->input->post('provider_designation'),
					'registrant_date_of_birth' 	=> $dob_split[2].'-'.$dob_split[1].'-'.$dob_split[0],
					'registrant_logo'			=> base_url().'uploads/jobprovider/'.$provider_logo_file_name,
					'organization_profile_completeness' => 90+$profile_completeness,
				);
				if($this->job_provider_model->job_provider_update_profile($data['organization']['organization_id'],$edit_profile_data)=='updated')
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
		if($_POST){
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			$this->form_validation->set_rules('registrant_institution_type', 'Institution', 'trim|required|is_natural|xss_clean');
			$this->form_validation->set_rules('provider_mobile_no', 'Mobile number', 'trim|required|numeric|exact_length[10]|is_unique[tr_organization_profile.registrant_mobile_no]|xss_clean');
			$this->form_validation->set_rules('providerpassword', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('providerconfirmpassword', 'Password Confirmation', 'trim|required|matches[providerpassword]');
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
					$this->load->view('company-dashboard-edit-profile',$data);
				}
			}
			else{
				$data['organization'] = $organization_data;
				$this->load->view('company-dashboard',$data);
			}
		}
	}

	public function inbox(){
		$session_data = $this->session->all_userdata();
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
		echo json_encode($this->job_provider_model->candidate_full_data($candidate_id,$vacancy_id));
	}
	public function postjob(){
		$common = new Common();
		$session_data = $this->session->all_userdata();
		
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['classlevel']		= (isset($session_data['login_session']['institution_type'])?$this->common_model->classlevel_by_institution($session_data['login_session']['institution_type']):$this->common_model->classlevel_by_institution($data['organization']['institution_type_id']));
		$data['subjects']		= (isset($session_data['login_session']['institution_type'])?$this->common_model->subject_by_institution($session_data['login_session']['institution_type']):$this->common_model->subject_by_institution($data['organization']['institution_type_id']));
		$data['qualificatoin']	= (isset($session_data['login_session']['institution_type'])?$this->common_model->qualification_by_institution($session_data['login_session']['institution_type']):$this->common_model->qualification_by_institution($data['organization']['institution_type_id']));
		$data['medium']			= $this->common_model->medium_of_instruction();
		$data['university']		= $this->common_model->get_board_details();
		if(!$_POST){
			$this->load->view('company-dashboard-post-jobs',$data);
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('provider_ug_or_pg', 'Required course type', 'trim|required|alpha|callback_pg_or_ug_check|exact_length[2]|xss_clean');
			$this->form_validation->set_rules('provider_job_title', 'Job title', 'trim|required|callback_alpha_dash_space|max_length[80]|xss_clean');
			$this->form_validation->set_rules('provider_vacancy', 'No of vacancy', 'trim|required|numeric|is_natural_no_zero|max_length[8]|xss_clean');
			$this->form_validation->set_rules('provider_class_level', 'Class Level', 'trim|required|numeric|is_natural_no_zero|max_length[2]|xss_clean');
			$this->form_validation->set_rules('provider_qualification', 'Qualification', 'trim|required|numeric|is_natural_no_zero|max_length[2]|xss_clean');
			$this->form_validation->set_rules('provider_open_date', 'Open date', 'trim|required|callback_valid_date|exact_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_close_date', 'Close date', 'trim|required|callback_valid_date|exact_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_interview_start', 'Interview start date', 'trim|required|callback_valid_date|exact_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_interview_end', 'Interview end date', 'trim|required|callback_valid_date|exact_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_subject', 'Subjects', 'trim|required|numeric|is_natural_no_zero|max_length[2]|xss_clean');
			$this->form_validation->set_rules('provider_experience', 'Experience', 'trim|required|max_length[10]|xss_clean');
			$this->form_validation->set_rules('provider_university', 'University', 'trim|numeric|is_natural_no_zero|max_length[2]|xss_clean');
			$this->form_validation->set_rules('provider_medium_of_instruction', 'Medium of Instruction', 'trim|required|alpha|max_length[150]|xss_clean');
			$this->form_validation->set_rules('provider_min_salary', 'Minimum salary', 'trim|required|numeric|is_natural_no_zero|max_length[8]|xss_clean');
			$this->form_validation->set_rules('provider_max_salary', 'Maximum salary', 'trim|required|numeric|is_natural_no_zero|max_length[8]|xss_clean');
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
									'vacancies_qualification_id'	=> $this->input->post('provider_qualification'),
									'vacancies_open_date'			=> $common->reformatDate($this->input->post('provider_open_date')),
									'vacancies_close_date'			=> $common->reformatDate($this->input->post('provider_close_date')),
									'vacancies_interview_start_date'=> $common->reformatDate($this->input->post('provider_interview_start')),
									'vacancies_end_date'			=> $common->reformatDate($this->input->post('provider_interview_end')),
									'vacancies_subject_id'			=> $this->input->post('provider_subject'),
									'vacancies_experience'			=> $this->input->post('provider_experience'),
									'vacancies_university_board_id '=> $this->input->post('provider_university') !== ''?$this->input->post('provider_university'):NULL,
									'vacancies_medium'				=> $this->input->post('provider_medium_of_instruction'),
									'vacancies_start_salary'		=> $this->input->post('provider_min_salary'),
									'vacancies_end_salary'			=> $this->input->post('provider_max_salary'),
									'vacancies_accommodation_info'	=> $this->input->post('provider_accom_instruction'),
									'vacancies_instruction'			=> $this->input->post('provider_job_instruction')
								);
				if($this->job_provider_model->job_provider_post_vacancy($vacancy_data))
				{
					$data['post_job_server_msg'] = 'Your vacancy successfully posted!';
					$this->load->view('company-dashboard-post-jobs',$data);
				}
				else
				{
					$data['post_job_server_msg'] = 'Something wrong in data insertion process.Please try again!!';
					$this->load->view('company-dashboard-post-jobs',$data);
				}
				
			}
			else
			{
				$this->load->view('company-dashboard-post-jobs',$data);
			}
		}
	}
	public function postedjob()
	{
		$this->load->library('pagination');	
		$session_data = $this->session->all_userdata();
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
	public function browse_candidate(){
		$this->load->library('pagination');	
		$session_data = $this->session->all_userdata();
		$data['organization'] 			= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['posting']				= $this->common_model->applicable_posting($data['organization']['organization_institution_type_id']);
		$data['district']				= $this->common_model->get_all_district();
		$data['medium']					= $this->common_model->medium_of_instruction();
		$data['mother_tongue']			= $this->common_model->mother_tongue();
		$data['subject']				= $this->common_model->subjects($data['organization']['organization_institution_type_id']);
		$data['qualification']			= $this->common_model->qualification($data['organization']['organization_institution_type_id']);
		$data['subscrib_plan'] 			= $this->common_model->provider_subscription_active_plans($data['organization']['organization_id']);
		$pagination 					= array();
		$pagination["base_url"] 		= base_url() . "provider/candidate";
		$pagination["total_rows"] 		= $this->job_provider_model->all_candidate_list_counts($data['organization']['organization_institution_type_id']);
		$pagination["per_page"] 		= 20;
		$pagination['use_page_numbers'] = 0;
		$pagination['num_links'] 		= $this->job_provider_model->all_candidate_list_counts($data['organization']['organization_institution_type_id']);
		$pagination['cur_tag_open'] 	= '&nbsp;<li class="active"><a>';
		$pagination['cur_tag_close'] 	= '</a></li>';
		$pagination['next_link'] 		= 'Next';
		$pagination['prev_link'] 		= 'Previous';
		
		if($this->uri->segment(3)){
			$page = ($this->uri->segment(3));
		}
		else{
			$page = 0;
		}
		if($_POST){
			$this->session->set_userdata('pro_search_data', $_POST);
		}
		if(!empty($this->session->userdata('pro_search_data'))){
			$provider_search_data = $this->session->userdata('pro_search_data');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if(isset($provider_search_data['candidate_willing_district']) && $provider_search_data['candidate_willing_district'] != ''){
				$this->form_validation->set_rules('candidate_willing_district', 'District', 'trim|numeric|is_natural_no_zero|max_length[8]|xss_clean');
			}
			if(isset($provider_search_data['candidate_mother_tongue']) && $provider_search_data['candidate_mother_tongue'] != ''){
				$this->form_validation->set_rules('candidate_mother_tongue', 'Mother tongue', 'trim|numeric|is_natural_no_zero|max_length[8]|xss_clean');
			}
			if(isset($provider_search_data['candidate_experience']) && $provider_search_data['candidate_experience'] != ''){
				$this->form_validation->set_rules('candidate_experience', 'Experience', 'trim|max_length[8]|xss_clean');
			}
			if(isset($provider_search_data['candidate_posting_name']) && $provider_search_data['candidate_posting_name'] != ''){
				$this->form_validation->set_rules('candidate_posting_name', 'Posting', 'trim|numeric|is_natural_no_zero|max_length[8]|xss_clean');
			}
			if(isset($provider_search_data['candidate_nationality']) && $provider_search_data['candidate_nationality'] != ''){
				$this->form_validation->set_rules('candidate_posting_name', 'Nationality', 'trim|xss_clean');
			}
			if(isset($provider_search_data['candidate_religion']) && $provider_search_data['candidate_religion'] != ''){
				$this->form_validation->set_rules('candidate_religion', 'Religion', 'trim|xss_clean');
			}
			if(isset($provider_search_data['candidate_tet_status']) && $provider_search_data['candidate_tet_status'] != ''){
				$this->form_validation->set_rules('candidate_tet_status', 'TET status', 'trim|numeric|max_length[8]|xss_clean');
			}
			if(isset($provider_search_data['candidate_subject']) && $provider_search_data['candidate_subject'] != ''){
				$this->form_validation->set_rules('candidate_subject', 'Subject', 'trim|numeric|is_natural_no_zero|max_length[8]|xss_clean');
			}
			if(isset($provider_search_data['candidate_qualification']) && $provider_search_data['candidate_qualification'] != ''){
				$this->form_validation->set_rules('candidate_qualification', 'Qualification', 'trim|numeric|is_natural_no_zero|max_length[8]|xss_clean');
			}
			if(isset($provider_search_data['candidate_salary']) && $provider_search_data['candidate_salary'] != ''){
				$this->form_validation->set_rules('candidate_salary', 'Salary', 'trim|xss_clean');
			}
			$this->form_validation->run();
			$data["candidates"] = $this->job_provider_model->all_candidate_list_for_search($pagination["per_page"], $page,$data['organization']['organization_institution_type_id'],$provider_search_data);
			$pagination["total_rows"] 		= $this->job_provider_model->all_candidate_list_for_search_count($data['organization']['organization_institution_type_id'],$provider_search_data);
			$this->pagination->initialize($pagination);
			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );
			$data['search_mode'] = $provider_search_data['candidate_search_type'];
			$this->load->view('company-dashboard-browse-candidate',$data);
			
		}
		else{
			$data["candidates"] = $this->job_provider_model->all_candidate_list($pagination["per_page"], $page,$data['organization']['organization_institution_type_id']);
			$pagination["total_rows"] 		= $this->job_provider_model->all_candidate_list_counts($data['organization']['organization_institution_type_id']);
			$this->pagination->initialize($pagination);
			$str_links = $this->pagination->create_links();
			$data["links"] = explode('&nbsp;',$str_links );
			$data['search_mode'] = 'normal';
			$this->load->view('company-dashboard-browse-candidate',$data);
		}
		
	}
	public function changepassword(){
		$session_data = $this->session->all_userdata();
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		if(!$_POST){
			$this->load->view('company-dashboard-changepwd',$data);
		}
		else
		{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('provideroldpassword', 'Old password', 'trim|required|min_length[8]|xss_clean|callback_validpassword');
			$this->form_validation->set_rules('providernewpassword', 'New password', 'trim|required|min_length[8]|xss_clean');
			$this->form_validation->set_rules('providerconfirmnewpassword', 'Confirm password', 'trim|required|min_length[8]|xss_clean|matches[providernewpassword]');
			if ($this->form_validation->run()){
				$changepassworddata 	= array('registrant_password' => $this->input->post('providerconfirmnewpassword'));
				if($this->job_provider_model->update_provider_password($changepassworddata,$session_data['login_session']['pro_userid'])){
					$data['pasword_server_msg'] = 'Your password successfully changed!';
					$this->load->view('company-dashboard-changepwd',$data);
				}
				else{
					$data['pasword_server_msg'] = 'Some thing wrong data insertion process! Please try again!!';
					$this->load->view('company-dashboard-changepwd',$data);
				}
			}
			else {
				$this->load->view('company-dashboard-changepwd',$data);
			}
		}
	}
	public function feedback(){
		$session_data = $this->session->all_userdata();
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		if(!$_POST){
			$this->load->view('company-dashboard-feedback',$data);
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('feedback_subject', 'Subject', 'trim|required|min_length[5]|xss_clean');
			$this->form_validation->set_rules('feedback_content', 'Feedback', 'trim|required|min_length[50]|xss_clean');
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
					$this->load->view('company-dashboard-feedback',$data);
				}
				else{
					$data['feedback_server_msg'] = 'Soemthing wrong in data insertion process. Please try again later!';
					$this->load->view('company-dashboard-feedback',$data);
				}
			}
			else{
				$this->load->view('company-dashboard-feedback',$data);
			}
		}
	}
    public function postad(){
    	$session_data = $this->session->all_userdata();
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		if(!$_POST){
			$this->load->view('company-dashboard-post-adds',$data);	
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			$this->form_validation->set_rules('provider_ad_title', 'Title of ad', 'trim|required|alpha_numeric_spaces|min_length[3]|xss_clean');
			$this->form_validation->set_rules('provider_premium_ad_image', 'Ad image', 'callback_provider_premium_ad_validation');
			if ($this->form_validation->run()){
				if (!empty($_FILES['provider_premium_ad_image']['name'])){
			        $provider_premium_ad['upload_path'] 		= './uploads/jobprovider/premiumad';
					$provider_premium_ad['allowed_types'] 		= 'jpg|png|jpeg';
					$provider_premium_ad['max_size']     		= '2048';
					$provider_premium_ad['max_width'] 			= '1024';
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
												'ad_visible_days'		=> 30,
												'is_admin_verified'		=> 0,
												'premium_ads_status'	=> 1
											);
						if($this->job_provider_model->organization_premiun_ad_upload($premium_ad_data)){
							$data['premiumad_server_msg'] = 'Your premium ad upload successfully. Admin will approve soon. After that you ad image will shown on your selective position!';
							$this->load->view('company-dashboard-post-adds',$data);
						}
						else{
							$data['premiumad_server_msg'] = 'Soemthing wrong in data insertion process. Please try again later!';
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
		$session_data = $this->session->all_userdata();
		
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$data['subcription_plan'] = $this->common_model->subcription_plan();
		if(!$_POST){
			$this->load->view('company-dashboard-subscription',$data);	
		}
		else{
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
			if($this->job_provider_model->subscription_transaction_data($transaction_data)){
				$transaction_id = $this->db->insert_id();
				$subscription_plan_data = $this->common_model->subcription_plan($this->input->post('udf2'));
				$subcription_startdate = strtotime($subscription_plan_data[0]['subcription_valid_start_date']); 
				$subcription_end_date = strtotime($subscription_plan_data[0]['subcription_valid_end_date']);
				$datediff = $subcription_end_date - $subcription_startdate;
				$no_of_days =  floor($datediff / (60 * 60 * 24));
				if($this->input->post('status')==='success' ){
					$user_subscription_data = array(
													'organization_id' 								=> $this->input->post('udf1'),
													'subscription_id' 								=> $this->input->post('udf2'),
													'transcation_id' 								=> $transaction_id,
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
						$data['subscription_server_msg'] = 'Subscription will activated successfully! Your transaction id is '.$transaction_id;
						$this->load->view('company-dashboard-subscription',$data);
					}
					else {
						$data['subscription_server_msg'] = 'Soemthing wrong in data insertion process. Our customer representative will call you soon!. Please note that transaction id <b>('.$transaction_id.')</b> for future reference!';
						$this->load->view('company-dashboard-subscription',$data);			
					}
					
				}

			}
			else{
				$data['subscription_server_msg'] = 'Soemthing wrong in data insertion process. Our customer representative will call you soon!';
				$this->load->view('company-dashboard-subscription',$data);
			}
		}
		
	}
	
	public function candidateprofile() {
		$session_data = $this->session->all_userdata();
		$data['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
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
			$data['reg_server_msg'] = 'Your Provided Email Id is invalid!';	
			$this->load->view('forgot-password');
		}
		else{
	        $forget_where = '(registrant_email_id="'.$this->input->post('forget_email').'")';
	  		$forget_query = $this->db->get_where('tr_organization_profile',$forget_where)->row_array();
	      	if($forget_query['registrant_password'] != '') {
				$from_email = $emailsetup['smtp_user'];
				$this->email->initialize($emailsetup);
				$this->email->from($from_email, 'Teacher Recruit');
				$this->email->to($forget_query['registrant_email_id']);
	        	$this->email->subject('Get your forgotten Password');
	       		$this->email->message("Your registered password is ".$forget_query['registrant_password']);
	        	if($this->email->send()){
		        	$data['reg_server_msg'] = "Check your mail and get your password!";
		        	$this->load->view('forgot-password',$data);
	        	}
				else{
					show_error($this->email->print_debugger());
					$data['reg_server_msg'] = 'Some thing wrong in mail sending process. So please register again!';
					$this->load->view('forgot-password',$data);
				}
	      	}
			else{
				$data['reg_server_msg'] = 'Your Provided mail id is invalid!';	
				$this->load->view('forgot-password',$data);
			}
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
	public function organization_logo_validation(){
		
    	if (empty($_FILES['organization_logo']['name'])) {
    		$this->form_validation->set_message('organization_logo_validation', 'Please select file.');
            return false;
        }else{
            return true;
        }
	}
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
		if($pg_or_ug_data === 'ug' or $pg_or_ug_data === 'pg'){
			return TRUE;
		}
		else {
			$this->form_validation->set_message('pg_or_ug_check', 'Wrongly selected course type');
			return FALSE;
		}
		
	}
	public function alpha_dash_space($provider_job_title){
		if (! preg_match('/^[a-zA-Z\s]+$/', $provider_job_title)) {
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
			$this->form_validation->set_message('validpassword', 'The %s doesnot match!');
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
}