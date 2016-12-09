<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require ('common.php');
class Job_seeker extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session','captcha')); 
		$this->load->model(array('job_seeker_model','common_model')); 
        session_start();
    }

	public function index()
	{
		$common = new Common();
		if(!$_POST){
			$data['captcha'] = $this->captcha->main();
			$this->session->set_userdata('captcha_info', $data['captcha']);
			/* Job provider login page with facebook login url */
			$data['fbloginurl'] = $common->facebookloginurl_seeker();
			$data['institutiontype'] = $this->common_model->get_institution_type();
			$this->load->view('job-seekers-login',$data);
		}
		else {
			/* set validation condition as per given input value are email or mobile number */
			$emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
			$mobileval="/^[1-9][0-9]*$/"; 
			if(!preg_match($emailval,$this->input->post('candidate_email'))){
				$this->form_validation->set_rules('candidate_email', 'Moblie', 'trim|required|numeric|exact_length[10]|xss_clean');
			}else if(!preg_match($mobileval,$this->input->post('candidate_email'))){
				$this->form_validation->set_rules('candidate_email', 'Email ID', 'trim|required|valid_email|xss_clean');
			}
			$this->form_validation->set_rules('candidate_password', 'Password', 'trim|required|xss_clean');
			/* Check whether registration form server side validation are valid or not */
			if ($this->form_validation->run() == FALSE){
				$fb['captcha'] = $this->captcha->main();
				$this->session->set_userdata('captcha_info', $fb['captcha']);
				$fb['reg_server_msg'] = 'Your Provided Login data is invalid!';	
   				$fb['fbloginurl'] = $common->facebookloginurl_seeker();
   				$fb['institutiontype'] = $this->common_model->get_institution_type();
				$this->load->view('job-seekers-login',$fb);
			}
			else{
				$data = array(
					'candidate_login_data' => $this->input->post('candidate_email'),
					'candidate_password' => $this->input->post('candidate_password')
				);
				$checkvaliduser = $this->job_seeker_model->check_valid_seeker_login($data);
				if($checkvaliduser['valid_status'] === 'valid'){
					$this->session->set_userdata("login_status", TRUE);
					$this->session->set_userdata("login_session",$checkvaliduser);
					redirect('seeker/dashboard');
				}
				else{
					$fb['reg_server_msg'] = 'Your Provided Login data is invalid!';	
   					$fb['fbloginurl'] = $common->facebookloginurl_seeker();
					$this->load->view('job-seekers-login',$fb);
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
			$data['fbloginurl'] = $common->facebookloginurl_seeker();
			$data['institutiontype'] = $this->common_model->get_institution_type();
			$data['captcha'] = $this->captcha->main();
			$this->session->set_userdata('captcha_info', $data['captcha']);
			$this->load->view('register-job-seekers',$data);
		}
		/* Registration page loading with posted data */
		else {
			/* set validation condition as per given input value are email or mobile number */
			$emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
			$mobileval="/^[1-9][0-9]*$/"; 
			if(!preg_match($mobileval,$this->input->post('candidate_mobile_no'))){
				$this->form_validation->set_rules('candidate_mobile_no', 'Moblie', 'trim|required|numeric|exact_length[10]|xss_clean');
			}else if(!preg_match($emailval,$this->input->post('candidate_email'))){
				$this->form_validation->set_rules('candidate_email', 'Email ID', 'trim|required|valid_email|xss_clean');
			}
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			/* Set validate condition for registration form */
			$this->form_validation->set_rules('candidate_institution_type', 'Institution', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('candidate_name', 'Name', 'trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('candidate_email', 'Email ID', 'trim|required|valid_email|xss_clean|is_unique[tr_candidate_profile.candidate_email]');
			$this->form_validation->set_rules('candidate_mobile_no', 'Moblie', 'trim|required|numeric|exact_length[10]|xss_clean');
			$this->form_validation->set_rules('captcha_value', 'Captcha', 'trim|required|callback_validate_captcha');
			$this->form_validation->set_rules('accept_terms','trim|required', 'callback_accept_terms');
			/* Check whether registration form server side validation are valid or not */
			if ($this->form_validation->run() == FALSE)
	       	{
	       		/* Registration form invalid stage */
	       		$fb['reg_server_msg'] = 'Please provide valid information!';	
	       		$fb['fbloginurl'] = $common->facebookloginurl_seeker();
				$fb['institutiontype'] = $this->common_model->get_institution_type();
				$fb['captcha'] = $this->captcha->main();
				$this->session->set_userdata('captcha_info', $fb['captcha']);
				$this->load->view('register-job-seekers',$fb);	
	        } else {	        	
				/* Registration form valid stage */
				/* Get and store posted data to array */
				$data = array(
					'candidate_institution_type' => $this->input->post('candidate_institution_type'),
					'candidate_name' => $this->input->post('candidate_name'),
					'candidate_email' => $this->input->post('candidate_email'),
					'candidate_mobile_no' => $this->input->post('candidate_mobile_no'),
					'candidate_registration_type' => 'teacherrecruit',
					'candidate_password' => $common->generateStrongPassword(),
				);
				
			 	/* Check whether data exist or not.exist or not condition handled in job_provider_model.php */
				if($this->job_seeker_model->create_job_seeker($data) === 'inserted'){
					/* Data are not exist stage */
					/* Email configuration and mail template */
					$from_email = $emailsetup['smtp_user'];
					$subject = 'Teacher Recruit Candidate Registration';
					$message = 'Dear '.$data['candidate_name'].',<br /><br />Your Teacher Recruit Application Password has been created to the following:.<br /><br /> <table border="1" bgcolor="#FEF1BC"><tbody><tr><td>Email :&nbsp;<strong><font color="blue">'.$data['candidate_email'].'</font></strong></td></tr><tr><td>Password :&nbsp;&nbsp;&nbsp;<strong><font color="blue">'.$data['candidate_password'].'</font></strong></td></tr></tbody></table><br /><br /><br />Thanks<br />Teacher Recruit Team';
					$this->email->initialize($emailsetup);
					$this->email->from($from_email, 'Teacher Recruit');
					$this->email->to($data['candidate_email']);
					$this->email->subject($subject);
					$this->email->message($message);
					/* Check whether mail send or not*/
					if($this->email->send()){
						/* mail sent success stage. send  facebook login link and server message to login page */
						$fb['reg_server_msg'] = 'Registration Successful!. Check your email address!!';	
	       				$fb['fbloginurl'] = $common->facebookloginurl_seeker();
	       				$fb['captcha'] = $this->captcha->main();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
						$this->load->view('job-seekers-login',$fb);
					}
					else{
						/* mail sent error stage. send  facebook login link and server message to login page */
						$fb['reg_server_msg'] = 'Some thing wrong in mail sending process. So please register again!';	
	       				$fb['fbloginurl'] = $common->facebookloginurl_seeker();
						$fb['institutiontype'] = $this->common_model->get_institution_type();
						$fb['captcha'] = $this->captcha->main();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
						
						$this->load->view('register-job-seekers',$fb);
					}
				} else {
					/* data exist stage. send  facebook login link and server message to login page */					
					$fb['reg_server_msg'] = 'Some thing wrong in data insertion process. So please register again!';	
       				$fb['fbloginurl'] = $common->facebookloginurl_seeker();
					$fb['institutiontype'] = $this->common_model->get_institution_type();
					$fb['captcha'] = $this->captcha->main();
					$this->session->set_userdata('captcha_info', $fb['captcha']);
					$this->load->view('register-job-seekers',$fb);
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

	public function dashboard() {     	

     	$session_data = $this->session->all_userdata();  
     	// print_r($session_data);
     	// exit();  		
		$candidate_email = (isset($session_data['login_session']['candidate_email'])?$session_data['login_session']
			['candidate_email']:$session_data['login_session']['candidate_id']);

		if($this->job_seeker_model->check_has_initial_data($candidate_email)=='has_no_data'){
			$data['initial_data'] = 'show_popup';			
		}
		else{
			$data['initial_data'] = 'hide_popup';			
		}	
		
		$candidate_data = (isset($session_data['login_session']['candidate_id'])?$this->job_seeker_model->get_cand_data_by_id($session_data['login_session']['candidate_id']):$this->job_seeker_model->get_cand_data_by_mail($session_data['login_session']['candidate_email']));

         if($candidate_data['candidate_name'] == '' or $candidate_data['candidate_image_path'] == '' or $candidate_data['candidate_address_1'] == '' or $candidate_data['candidate_address_2'] == '' or $candidate_data['candidate_live_district_id'] == '' ){

			if($data['initial_data'] === 'show_popup')
			{
				$data['user_data'] = $candidate_data;
				$this->load->view('user-dashboard',$data);
			} else {				
				$data['user_data'] = $candidate_data;
				$this->load->view('user-dashboard',$data);
			}			
		} else {			
			$data['user_data'] = $candidate_data;
			$this->load->view('user-dashboard',$data);
		}

     }

     public function seeker_logout(){
		$this->session->set_userdata('login_status', FALSE);
		$this->session->unset_userdata('login_session');
		$this->session->sess_destroy();
    	redirect('/','refresh');
	}

	public function forgot_password()
	{
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
				if(count($forget_query) != 0) {
					$config['protocol'] = 'smtp';
					$config['smtp_host'] = 'smtp.googlemail.com';
					$config['smtp_port'] = 25;
					$config['smtp_user'] = $forget_query['registrant_email_id'];
					$config['smtp_pass'] = '********';          
					$this->load->library('email', $config);   
					$this->email->from('thangamgold45@gmail.com', 'Thangam');
					$this->email->to($config['smtp_user']);           
					$this->email->subject('Get your forgotten Password');
					$this->email->message("Your registered password is ".$forget_query['registrant_password']);
					$this->email->send();
					$data['reg_server_msg'] = "Mail has sent successfully";
					$this->load->view('forgot-password-seeker',$data);
				} else {
					$data['reg_server_msg'] = 'Your Provided Login data is invalid!';	
					$this->load->view('forgot-password',$data);
				}
			}   		
	}

		/** Seeker Inital Data Validation With Pop-up **/		
		public function initialdata(){			
			if($_POST){				
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
				$this->form_validation->set_rules('registrant_mobile_no', 'Mobile number', 'trim|required|numeric');
				$this->form_validation->set_rules('seekerpassword', 'Password', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('seekerconfirmpassword', 'Password Confirmation', 'trim|required|matches[seekerpassword]');

				if ($this->form_validation->run()){					
					$initial_data_profile = array(
					'candidate_password'	=> $this->input->post('seekerpassword'),
					'candidate_mobile_no'	=> $this->input->post('registrant_mobile_no'),
					'candidate_profile_completeness' => 41
					);					
					if($this->job_seeker_model->job_seeker_update_profile($this->input->post('candidate_id'),$initial_data_profile)=='updated'){
						redirect('seeker/dashboard');
					}
				} else {					
					$session_data = $this->session->all_userdata();
					$user_email = (isset($session_data['login_session']['candidate_email'])?$session_data['login_session']['candidate_email']:$session_data['login_session']['candidate_id']);
						if($this->job_seeker_model->check_has_initial_data($user_email)=='has_no_data'){						
							$data['initial_data'] = 'show_popup';
						}
						else{
							echo 'Out';
							$data['initial_data'] = 'hide_popup';
						}

					$candidate_data = (isset($session_data['login_session']['candidate_id'])?$this->job_seeker_model->get_cand_data_by_id($session_data['login_session']['candidate_id']):$this->job_seeker_model->get_cand_data_by_mail($session_data['login_session']['candidate_email']));

					// if($candidate_data['organization_name'] == '' or $candidate_data['organization_logo'] == '' or $candidate_data['organization_address_1'] == '' or $candidate_data['organization_address_2'] == '' or $candidate_data['organization_address_3'] == '' or $candidate_data['organization_district_id'] == '' or $candidate_data['registrant_name'] == '' or $candidate_data['registrant_designation'] == '' ){

					if($candidate_data['candidate_name'] == '' or $candidate_data['candidate_image_path'] == '' or $candidate_data['candidate_address_1'] == '' or $candidate_data['candidate_address_2'] == '' or $candidate_data['candidate_live_district_id'] == '' ){
							if($data['initial_data'] === 'show_popup'){
								$data['user_data'] = $candidate_data;
									$this->load->view('user-dashboard',$data);
								} else {
									redirect('seeker/dashboard/editprofile');
								}
					} else {
						$data['user_data'] = $candidate_data;
						$this->load->view('user-dashboard',$data);
					}
				}
			} /** POST END **/
		}

	// Job Seeker Edit Profile 
    
    public function editprofile(){
		$this->load->view('user-edit-profile');
	}
	
	public function findjob(){
		$this->load->view('user-resume');
	}

	public function jobsapplied(){
		$this->load->view('user-job-applied');
	}
	


	// 	public function editprofile(){
	// 		$this->form_validation->set_rules('organization_name', 'Organization name', 'trim|required|alpha|min_length[3]|xss_clean');
	// 		$session_data = $this->session->all_userdata();
	// 		$data['user_data'] = (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
	// 		$data['district'] = $this->common_model->get_all_district();
	// 		if(!$_POST){
				
	// 			$this->load->view('company-dashboard-edit-profile',$data);
	// 			$this->session->unset_userdata('upload_provider_logo_error');
	// 		}
	// 		else{
	// 			/* Set validate condition for profile update form */
	// 			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
	// 			$this->form_validation->set_rules('organization_name', 'Organization name', 'trim|required|alpha_numeric_spaces|min_length[3]|xss_clean');
	// 			$this->form_validation->set_rules('organization_logo', 'Organization logo', 'callback_organization_logo_validation');
	// 			$this->form_validation->set_rules('address-line1', 'Address 1', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[150]|xss_clean');
	// 			$this->form_validation->set_rules('address-line2', 'Address 2', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[150]|xss_clean');
	// 			$this->form_validation->set_rules('address-line3', 'Address 3', 'trim|required|alpha_numeric_spaces|min_length[3]|max_length[150]|xss_clean');
	// 			$this->form_validation->set_rules('organization_district', 'District ', 'trim|numeric|required|xss_clean', array('required' => 'Please choose your district'));
	// 			$this->form_validation->set_rules('provider_logo', 'Your logo', 'trim|xss_clean');
	// 			$this->form_validation->set_rules('provider_name', 'Your name', 'trim|required|min_length[3]|max_length[150]|xss_clean');
	// 			$this->form_validation->set_rules('provider_designation', 'Your Designation', 'trim|required|alpha_numeric|min_length[3]|max_length[150]|xss_clean');
	// 			$this->form_validation->set_rules('provider_dob', 'Date of Birth', 'callback_valid_date');
	// 			$this->form_validation->set_rules('declar_accept', 'Declaration', 'callback_form_declaration');
	// 			// /* check forms data are valid are not */
	// 			if ($this->form_validation->run())
	// 		    {
	// 		    	$provider_logo_file_name = '';
	// 				$profile_completeness = 0;
	// 		    	if (!empty($_FILES['provider_logo']['name']))
	// 				{
	// 					$personnal_logo['upload_path'] 			= './uploads/jobprovider';
	// 					$personnal_logo['allowed_types'] 		= 'jpg|png|jpeg';
	// 					$personnal_logo['max_size']     		= '2048';
	// 					$personnal_logo['max_width'] 			= '1024';
	// 					$personnal_logo['max_height'] 			= '768';
	// 					$personnal_logo['encrypt_name'] 		= TRUE;
	// 					$personnal_logo['file_ext_tolower'] 	= TRUE;
	// 					$this->load->library('upload', $personnal_logo);
	// 					$this->upload->initialize($personnal_logo);
	// 					if ( ! $this->upload->do_upload('provider_logo'))
	// 					{
	// 	                    $data['upload_provider_logo_error'] = $this->upload->display_errors();
	// 						$provider_logo_file_name = '';
	// 						$profile_completeness = 0;
	// 	                }
	// 	                else
	// 	                {
	// 	                    $provideruploaddata = $this->upload->data();
	// 						$provider_logo_file_name = $provideruploaddata['file_name'];
	// 						$profile_completeness = 10;
	// 	                }
						
	// 				}
	// 				if (!empty($_FILES['organization_logo']['name'])){
	// 			        $organization_logo['upload_path'] 		= './uploads/jobprovider';
	// 					$organization_logo['allowed_types'] 	= 'jpg|png|jpeg';
	// 					$organization_logo['max_size']     		= '2048';
	// 					$organization_logo['max_width'] 		= '1024';
	// 					$organization_logo['max_height'] 		= '768';
	// 					$organization_logo['encrypt_name'] 		= TRUE;
	// 					$organization_logo['file_ext_tolower'] 	= TRUE;
	// 					$this->load->library('upload', $organization_logo);
	// 					$this->upload->initialize($organization_logo);
	// 					if ( ! $this->upload->do_upload('organization_logo'))
	// 					{
	// 	                    //$data['upload_provider_logo_error'] = $this->upload->display_errors();
	// 						$this->session->set_userdata('upload_provider_logo_error', $this->upload->display_errors());
	// 						$organization_logo_file_name = '';
							
	// 	                }
	// 	                else
	// 	                {
	// 	                    $organizationuploaddata = $this->upload->data();
	// 						$organization_logo_file_name = $organizationuploaddata['file_name'];
	// 	                }
	//                 }
	// 				$dob_split = explode('/', $this->input->post('provider_dob'));
	// 				$edit_profile_data = array(
	// 					'organization_name'			=> $this->input->post('organization_name'),
	// 					'organization_logo' 		=> $organization_logo_file_name,
	// 					'organization_address_1' 	=> $this->input->post('address-line1'),
	// 					'organization_address_2' 	=> $this->input->post('address-line2'),
	// 					'organization_address_3' 	=> $this->input->post('address-line3'),
	// 					'organization_district_id'	=> $this->input->post('organization_district'),
	// 					'registrant_name' 			=> $this->input->post('provider_name'),
	// 					'registrant_designation' 	=> $this->input->post('provider_designation'),
	// 					'registrant_date_of_birth' 	=> $dob_split[2].'-'.$dob_split[1].'-'.$dob_split[0],
	// 					'registrant_logo'			=> $provider_logo_file_name,
	// 					'organization_profile_completeness' => 90+$profile_completeness,
	// 				);
	// 				if($this->job_provider_model->job_provider_update_profile($data['user_data']['organization_id'],$edit_profile_data)=='updated')
	// 				{
	// 					redirect('provider/dashboard');
	// 				}
	// 		    }
	// 		    else
	// 		    {
	// 		    	$this->load->view('company-dashboard-edit-profile',$data);
	// 		    }		
	// 		}
		
	// } /** End of Edit Profile **/

	public function inbox(){		
		$this->load->view('user-dashboard-inbox');
	}	
}

