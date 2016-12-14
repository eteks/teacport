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
				if($checkvaliduser['valid_status'] === 'valid') {
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
     	if($session_data['login_status'] != TRUE) {
     		redirect('missingpage');
     	}
     	// print_r($session_data['login_session']);
		if($_POST) {
			if($this->input->post('popup_type') == 'social') {
				$this->form_validation->set_rules('seeker_email', 'Email', 'trim|required|xss_clean|valid_email');
				$this->form_validation->set_rules('seeker_mobile', 'Mobile', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]');
				$this->form_validation->set_rules('seeker_password', 'Password', 'trim|required|xss_clean|');
				$this->form_validation->set_rules('seeker_confirmpass', 'Confirm Password', 'trim|required|xss_clean|matches[seeker_password]');
				$this->form_validation->set_rules('seeker_institution', 'Institution Type', 'trim|required|xss_clean|');
			}

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('seeker_father', 'Father Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('seeker_dob', 'Date Of Birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('seeker_address1', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('seeker_address2', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('seeker_district', 'District', 'trim|required|xss_clean');
		
			if($this->form_validation->run()) {
				$data_array = array(
					'candidate_father_name' => $this->input->post('seeker_father'),
					'candidate_date_of_birth' => $this->input->post('seeker_dob'),
					'candidate_address_1' => $this->input->post('seeker_address1'),
					'candidate_address_2' => $this->input->post('seeker_address2'),
					'candidate_district_id' => $this->input->post('seeker_district')
					);
				if($this->input->post('popup_type') == 'social') {
					$data_array = array(
						'candidate_email' => $this->input->post('seeker_email'),
						'candidate_mobile_no' => $this->input->post('seeker_mobile'),
						'candidate_password' => $this->input->post('seeker_password'),
						'candidate_institution_type' => $this->input->post('seeker_institution'),
						'candidate_father_name' => $this->input->post('seeker_father'),
						'candidate_date_of_birth' => date('Y-m-d',strtotime($this->input->post('seeker_dob'))),
						'candidate_address_1' => $this->input->post('seeker_address1'),
						'candidate_address_2' => $this->input->post('seeker_address2'),
						'candidate_district_id' => $this->input->post('seeker_district')
					);
				}

				$candidate_values = ($this->input->post('popup_type')) ? $this->job_seeker_model->check_seeker_popup_fields_social($data_array) : $this->job_seeker_model->check_seeker_popup_fields($data_array) ;
				;	
				$data['status'] = $candidate_values['status'];
				if(!empty($candidate_values['candidate_data'])) {
					$this->session->set_userdata('login_session',$candidate_values['candidate_data']);
				}
			}		
		}



		$candidate_data = $this->job_seeker_model->get_cand_data_by_id($session_data['login_session']['candidate_id']);

		// if(!empty($candidate_data['candidate_father_name']))
		if($candidate_data['candidate_father_name'] == '' or $candidate_data['candidate_address_1'] == '' or $candidate_data['candidate_district_id'] == '' or $candidate_data['candidate_date_of_birth'] == '') 
		{
			if($candidate_data['candidate_institution_type'] == '' or $candidate_data['candidate_email'] == '' or $candidate_data['candidate_mobile_no'] == '' or $candidate_data['candidate_password'] == '') {
				$data['initial_data'] = 'show_popup';
				$data['popup_type'] = 'social';
			}
			else {
				$data['initial_data'] = 'show_popup';
				$data['popup_type'] = 'ordinary';
			}
		}
		$data['district_values'] = $this->common_model->get_all_district();
		$data['institution_values'] = $this->common_model->get_institution_type();
        // print_r($candidate_data);
        // echo $data['popup_type'];
        $data['user_data'] = $candidate_data;
		$this->load->view('user-dashboard',$data);
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
			$this->form_validation->set_rules('seeker_father', 'Father Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('seeker_dob', 'Date Of Birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('seeker_address1', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('seeker_district', 'District', 'trim|required|xss_clean');
			
			if ($this->form_validation->run()){					
				$initial_data_profile = array(
					'candidate_password'	=> $this->input->post('seekerpassword'),
					'candidate_mobile_no'	=> $this->input->post('registrant_mobile_no'),
					'candidate_profile_completeness' => 41
				);					
				if($this->job_seeker_model->job_seeker_update_profile($this->input->post('candidate_id'),$initial_data_profile)=='updated'){
						redirect('seeker/dashboard');
					}
				} 
				else {					
					// $session_data = $this->session->all_userdata();
					// $user_email = (isset($session_data['login_session']['candidate_email'])?$session_data['login_session']['candidate_email']:$session_data['login_session']['candidate_id']);
					// 	if($this->job_seeker_model->check_has_initial_data($user_email)=='has_no_data'){						
					// 		$data['initial_data'] = 'show_popup';
					// 	}
					// 	else{
					// 		echo 'Out';
					// 		$data['initial_data'] = 'hide_popup';
					// 	}

					// $candidate_data = (isset($session_data['login_session']['candidate_id'])?$this->job_seeker_model->get_cand_data_by_id($session_data['login_session']['candidate_id']):$this->job_seeker_model->get_cand_data_by_mail($session_data['login_session']['candidate_email']));

					// // if($candidate_data['organization_name'] == '' or $candidate_data['organization_logo'] == '' or $candidate_data['organization_address_1'] == '' or $candidate_data['organization_address_2'] == '' or $candidate_data['organization_address_3'] == '' or $candidate_data['organization_district_id'] == '' or $candidate_data['registrant_name'] == '' or $candidate_data['registrant_designation'] == '' ){

					// if($candidate_data['candidate_name'] == '' or $candidate_data['candidate_image_path'] == '' or $candidate_data['candidate_address_1'] == '' or $candidate_data['candidate_address_2'] == '' or $candidate_data['candidate_live_district_id'] == '' ){
					// 		if($data['initial_data'] === 'show_popup'){
					// 			$data['user_data'] = $candidate_data;
					// 				$this->load->view('user-dashboard',$data);
					// 			} else {
					// 				redirect('seeker/dashboard/editprofile');
					// 			}
					// } else {
					// 	$data['user_data'] = $candidate_data;
					// 	$this->load->view('user-dashboard',$data);
					// }
					redirect('seeker/dashboard');
				}
			} /** POST END **/
		}

	// Job Seeker Edit Profile 
    
    public function editprofile() {
    	$session = $this->session->all_userdata();
    	// print_r($session['login_session']);
    	if($session['login_status'] != TRUE) {
     		redirect('missingpage');
     	}
     	$data['update_status'] = '';

    	$data['candidate_values'] = $this->job_seeker_model->get_seeker_details($session['login_session']['candidate_id']);
    	$data['district_values'] = $this->common_model->get_all_district();
    	$data['candidate_job_values'] = $this->job_seeker_model->get_seeker_applied_job($session['login_session']['candidate_id']);
    	$data['mother_language_values'] = $this->common_model->mother_tongue();
    	$data['medium_language_values'] = $this->common_model->medium_of_instruction();
    	$data['posting_values'] = $this->common_model->applicable_posting($session['login_session']['candidate_institution_type']);
    	$data['class_values'] = $this->common_model->classlevel_by_institution($session['login_session']['candidate_institution_type']);
    	$data['subject_values'] = $this->common_model->subject_by_institution($session['login_session']['candidate_institution_type']);
    	$data['qualification_values'] = $this->common_model->qualification($session['login_session']['candidate_institution_type']);
    	$data['education_values'] = $this->job_seeker_model->get_seeker_education_details($session['login_session']['candidate_id']);
    	$data['department_values'] = $this->common_model->get_department_details();
    	$data['board_values'] = $this->common_model->get_board_details();
    	$data['extra_curricular_values'] = $this->common_model->get_extra_curricular_details();
    	$data['experience_values'] = $this->job_seeker_model->get_seeker_experience_details($session['login_session']['candidate_id']);


    	if($_POST) {
    		
    		 //   			array('field' => 'cand_firstname', 'label' => 'Name','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_gen', 'label' => 'Gender','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_dob', 'label' => 'Date Of Birth','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_fa_name', 'label' => 'Father Name','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_pic', 'label' => 'Picture','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_marital', 'label' => 'Martial Status','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_native_dis', 'label' => 'Native District','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_mother_ton', 'label' => 'Mother Tongue','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_known_lan[]', 'label' => 'Known Languages','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_nation', 'label' => 'Nation','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_religion', 'label' => 'Religion','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_communal', 'label' => 'Community','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_phy', 'label' => 'Physical Challenge Status','rules' => 'required|trim|xss_clean'),

    			// 	array('field' => 'cand_posts[]', 'label' => 'Apply Posting','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_start_sal', 'label' => 'Minimum Salary','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_end_sal', 'label' => 'Maximum Salary','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_class[]', 'label' => 'Preference Class Level','rules' => 'required|trim|xss_clean'),
    			// array('field' => 'cand_sub[]', 'label' => 'Preference Subject','rules' => 'required|trim|xss_clean')


    		// Profile, Preference Validation	
	   		$validation_fields = array(
 
    			array('field' => 'cand_posts[]', 'label' => 'Apply Posting','rules' => 'required|trim|xss_clean'),
    			array('field' => 'cand_start_sal', 'label' => 'Minimum Salary','rules' => 'required|trim|xss_clean'),
    			array('field' => 'cand_end_sal', 'label' => 'Maximum Salary','rules' => 'required|trim|xss_clean'),
    			array('field' => 'cand_class[]', 'label' => 'Preference Class Level','rules' => 'required|trim|xss_clean'),
    			array('field' => 'cand_sub[]', 'label' => 'Preference Subject','rules' => 'required|trim|xss_clean')




    		);
    		$this->form_validation->set_rules($validation_fields);
    		if($this->form_validation->run() == FALSE) {
    			foreach($validation_fields as $row){
		          $field = $row['field'];
		          $error = form_error($field);
		          if($error){
		            $data['update_status'] = strip_tags($error);
		            break;
		          }
		        }
    		}
    		else {
    			$data['update_status'] = $this->job_seeker_model->editprofile_validation($_POST);
    		}
    	}
    	// echo "<pre>";
    	// print_r($data['experience_values']);
    	// echo "</pre>";

		$this->load->view('user-edit-profile',$data);
	}
	
	/** Job Seeker find Jobs - Start Here **/
	public function findjob(){	
		$this->load->library('pagination');	
		$session_data = $this->session->all_userdata();		
		$data['candidate_data'] = (isset($session_data['login_session']['candidate_id'])?$this->job_seeker_model->get_cand_data_by_id($session_data['login_session']['candidate_id']):$this->job_seeker_model->get_cand_data_by_mail($session_data['login_session']['candidate_email']));

		

		if(!isset($session_data['login_session']['institution_type_id'])) {
			$candidate_data = $this->job_seeker_model->get_cand_data_by_mail($session_data['login_session']['candidate_email']);
			$session_data['login_session']['candidate_id'] = $candidate_data['candidate_id'];
			$session_data['login_session']['institution_type_id'] = $candidate_data['institution_type_id'];
		}

		if(isset($session_data['login_session']['institution_type_id'])) {	

			$pagination = array();
			$pagination["base_url"] = base_url() . "seeker/findjob";
			$pagination["per_page"] = 1;
			$pagination["use_page_numbers"] = 0;	
			$pagination['cur_tag_open'] = '&nbsp;<li class="active"><a>';
			$pagination['cur_tag_close'] = '</a></li>';
			$pagination['next_link'] = 'Next';
			$pagination['prev_link'] = 'Previous';
			//$pagination['use_page_numbers'] = TRUE;

			if($_POST){


				
			}else{
				
				$pagination["total_rows"] = $this->job_seeker_model->job_seeker_find_job_counts($session_data['login_session']['institution_type_id']);
				$pagination['num_links'] = $this->job_seeker_model->job_seeker_find_job_counts($session_data['login_session']['institution_type_id']);				
				$this->pagination->initialize($pagination);
				if($this->uri->segment(3)){ $page = ($this->uri->segment(3)) ; 	} else{	$page = 0;}	
				$data["findjob"] = $this->job_seeker_model->job_seeker_find_jobs($pagination["per_page"], $page,$session_data['login_session']['institution_type_id']);	
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
			}
		
			$data['get_institution_types'] = $this->common_model->get_institution_type();
			$data['get_all_districts'] = $this->common_model->get_all_district();
			$data['mother_tongues'] = $this->common_model->mother_tongue();
			$data['applicable_postings'] = $this->common_model->applicable_posting();
			$data['subjects'] = $this->common_model->subjects();
			$data['qualifications'] = $this->common_model->qualification();
			$this->load->view('user-find-jobs', $data);
		}		
	}
	/** Job Seeker find Jobs - End Here **/

	public function jobsapplied(){
		$this->load->view('user-job-applied');
	}

	public function applynow(){
		$data["current_jobvacancy_id"] = $this->uri->segment('3');
		$data["applyjob"] = $this->job_seeker_model->job_seeker_detail_jobs($data["current_jobvacancy_id"]);
		//print_r($this->db->last_query());		
		$this->load->view('single-job', $data);
	}
	
	// if($data["current_jobvacancy_id"]) {
	// 		$data["applyjob"] = $this->job_seeker_model->job_seeker_detail_jobs($data["current_jobvacancy_id"]);
	// 		$data["qualification"] = $this->job_seeker_model->qualification_ids($data["applyjob"]["vacancies_qualification_id"]);
	// 		$data["medium"] = $this->job_seeker_model->medium_of_instruction($data["applyjob"]["vacancies_medium"]);
	// 		$this->load->view('single-job', $data);
	// 	}else {
	// 		$this->load->view('single-job');
	// 	}
	// }	


	// Change password
	public function change_password() {
		$session_data = $this->session->all_userdata();	
    	// print_r($session['login_session']);
    	if($session_data['login_status'] != TRUE) {
     		redirect('missingpage');
     	}
		$data['status'] = '';
		if($_POST) {
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			/* Set validate condition for registration form */
			$id = $session_data['login_session']['candidate_id'];
			$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|xss_clean|max_length[20]|');
			$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|xss_clean|max_length[20]');
			$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'trim|required|xss_clean|max_length[20]|matches[new_pass]');
 	  		if ($this->form_validation->run()) {   
 	  			$data_array = array(
 	  						'old_password' => $this->input->post('old_pass'),
 	  						'new_password' => $this->input->post('new_pass'),
 	  						'candidate_id' => $id
 	  					);
 	  			$data['status'] = $this->job_seeker_model->password_change($data_array);
		    }
		}
		$this->load->view('user-dashboard-changepwd',$data);
	}

	// Candidate inbox
	public function inbox(){
		$session = $this->session->all_userdata();
		// print_r($session['login_session']);
		if($session['login_status'] != TRUE) {
     		redirect('missingpage');
     	}
		$data['candidate_data'] = $this->job_seeker_model->candidate_profile_by_id($session['login_session']['candidate_id']);
		$data['message'] = $this->job_seeker_model->job_seeker_inbox($session['login_session']['candidate_id']);

		// print_r($data['candidate_id']);
		$this->load->view('user-dashboard-inbox',$data);
	}

	// Candidate message - get message from db without page refersh (ajax)	
	public function inbox_message(){
		echo json_encode($this->job_seeker_model->job_seeker_inbox_ajax($this->input->post('cand_id'),$this->input->post('lastid')));
	}

	// Candidate inbox message count
	public function inbox_message_count(){
		echo $this->job_seeker_model->job_seeker_unread_inbox_count($this->input->post('cand_id'));
	}	

	// Candidate inbox full data
	public function inbox_message_full_data() {
		$inbox_id = $this->input->post('inbox_id');	
		echo json_encode($this->job_seeker_model->job_seeker_inbox_full_data($inbox_id));
	}


} // End


