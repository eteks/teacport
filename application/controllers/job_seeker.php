<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require ('common.php');
class Job_seeker extends CI_Controller {
	private $callback_calls=0;
	private $pos_callback_calls=0;
	private $sub_callback_calls=0;
	private $ext_callback_calls=0;
	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session','captcha','upload','image_lib','iptracker')); 
		$this->load->model(array('job_seeker_model','common_model')); 
        session_start();
    }

    // Url Validation - Check whether the url format is correct or not
    function valid_url_format($str){
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            $this->form_validation->set_message('valid_url_format', 'The URL you entered is not correctly formatted.');
            return FALSE;
        }
        return TRUE;
 	}   

	// Terms and condtion validation - Post or not
 	public function accept_term_and_condition(){
		if ($this->input->post('accept_terms')){
			return TRUE;
		}
		else{
			$error = 'Please accept term and condition!.';
			$this->form_validation->set_message('accept_term_and_condition', $error);
			return FALSE;
		}
	}

 	// To store other option value and get that value - Mother Tongue
 	function other_mother_tongue($val){
 		if($val == "others" && $_POST['other_mother_tongue']!='') {
 			$array = array(
 							'language_name' => $_POST['other_mother_tongue'],
 							'is_mother_tangue' => 1,
 							'is_medium_of_instruction' => 0,
 							'language_status' => 2 // It means other option
 						);
 			$id = $this->common_model->insert_other_mother_tongue($array);
 			if($id == "active") {
 				$this->form_validation->set_message('other_mother_tongue', 'Entered %s other option is already exist.');
	       		return FALSE;
 			}
 			if($id == "inactive") {
 				$this->form_validation->set_message('other_mother_tongue', 'Entered %s other option is already inactive by Admin.');
	       		return FALSE;
 			}
 			else {
 				$_POST['cand_mother_ton'] = $id;
 			}
 		}
 		else if($val == "others") {
   			$this->form_validation->set_message('other_mother_tongue', 'The %s other option is required.');
	       	return FALSE;
 		}
 	} 

 	// To store other option value and get that value - Known Languages
 	function other_known_languages($val) {
 		$value = $this->callback_calls++;
 		// print_r($_POST['cand_known_lan']);
		// // $value = array();
		// // array_push($value,$val);
 		if(in_array('others',$_POST['cand_known_lan']) && $_POST['other_known_lang']!='' && $value == 0) {
 			$array = array(
 		 					'language_name' => $_POST['other_known_lang'],
 		 					'is_mother_tangue' => 0,
 		 					'is_medium_of_instruction' => 0,
 		 					'language_status' => 2 // It means other option
 		 				);
 		 	$id = $this->common_model->insert_other_mother_tongue($array);
 		 	if($id == "active") {
 				$this->form_validation->set_message('other_known_languages', 'Entered %s other option is already exist.');
	       		return FALSE;
 			}
 			if($id == "inactive") {
 				$this->form_validation->set_message('other_known_languages', 'Entered %s other option is already inactive by Admin.');
	       		return FALSE;
 			}
 			else {
 				$key = array_search('others', $_POST['cand_known_lan']);
 				if(trim($key) != '') {
 					$_POST['cand_known_lan'][$key] = $id;
 				}
 				$_POST['cand_known_lan_new'] = $_POST['cand_known_lan'];
				return TRUE;
 			}
 		}
 		else if(in_array('others',$_POST['cand_known_lan']) && $value == 0) {
   			$this->form_validation->set_message('other_known_languages', 'The %s other option is required.');
	       	return FALSE;
 		}
 		else if($value == 0) {
 			$_POST['cand_known_lan_new'] = $_POST['cand_known_lan'];
 			return TRUE;
 		}
 	} 

 	// To store other option value and get that value - Posting
 	function other_postings($val,$ins_id) {
 		$value = $this->pos_callback_calls++;
 		// print_r($_POST['cand_known_lan']);
		// // $value = array();
		// // array_push($value,$val);
 		if(in_array('others',$_POST['cand_posts']) && $_POST['other_posting']!='' && $value == 0) {
 			$array = array(
 		 					'posting_name' => $_POST['other_posting'],
 		 					'posting_institution_id' => $ins_id,
 		 					'posting_status' => 2, // It means other option
 		 				);
 		 	$id = $this->common_model->insert_other_posting($array);
 		 	if($id == "active") {
 				$this->form_validation->set_message('other_postings', 'Entered %s other option is already exist.');
	       		return FALSE;
 			}
 			if($id == "inactive") {
 				$this->form_validation->set_message('other_postings', 'Entered %s other option is already inactive by Admin.');
	       		return FALSE;
 			}
 			else {
 				$key = array_search('others', $_POST['cand_posts']);
 				if(trim($key) != '') {
 					$_POST['cand_posts'][$key] = $id;
 				}
 				$_POST['cand_posts_new'] = $_POST['cand_posts'];
				return TRUE;
 			}
 		}
 		else if(in_array('others',$_POST['cand_posts']) && $value == 0) {
   			$this->form_validation->set_message('other_postings', 'The %s other option is required.');
	       	return FALSE;
 		}
 		else if($value == 0) {
 			$_POST['cand_posts_new'] = $_POST['cand_posts'];
 			return TRUE;
 		}
 	} 

 	function other_subjects($val,$ins_id) {
 		$value = $this->sub_callback_calls++;
 		// print_r($_POST['cand_known_lan']);
		// // $value = array();
		// // array_push($value,$val);
 		if(in_array('others',$_POST['cand_sub']) && $_POST['other_subject']!='' && $value == 0) {
 			$array = array(
 		 					'subject_name' => $_POST['other_subject'],
 		 					'subject_institution_id' => $ins_id,
 		 					'subject_status' => 2, // It means other option
 		 				);
 		 	$id = $this->common_model->insert_other_subject($array);
 		 	if($id == "active") {
 				$this->form_validation->set_message('other_subjects', 'Entered %s other option is already exist.');
	       		return FALSE;
 			}
 			if($id == "inactive") {
 				$this->form_validation->set_message('other_subjects', 'Entered %s other option is already inactive by Admin.');
	       		return FALSE;
 			}
 			else {
 				$key = array_search('others', $_POST['cand_sub']);
 				if(trim($key) != '') {
 					$_POST['cand_sub'][$key] = $id;
 				}
 				$_POST['cand_sub_new'] = $_POST['cand_sub'];
				return TRUE;
 			}
 		}
 		else if(in_array('others',$_POST['cand_sub']) && $value == 0) {
   			$this->form_validation->set_message('other_subjects', 'The %s other option is required.');
	       	return FALSE;
 		}
 		else if($value == 0) {
 			$_POST['cand_sub_new'] = $_POST['cand_sub'];
 			return TRUE;
 		}
 	}

 	function other_extracurriculars($val) {
 		$value = $this->ext_callback_calls++;
 		// print_r($_POST['cand_known_lan']);
		// // $value = array();
		// // array_push($value,$val);
 		if(in_array('others',$_POST['cand_extra_cur']) && $_POST['other_extracurricular']!='' && $value == 0) {
 			$array = array(
 		 					'extra_curricular' => $_POST['other_extracurricular'],
 		 					'extra_curricular_status' => 2, // It means other option
 		 				);
 		 	$id = $this->common_model->insert_other_extracurricular($array);
 		 	if($id == "active") {
 				$this->form_validation->set_message('other_extracurriculars', 'Entered %s other option is already exist.');
	       		return FALSE;
 			}
 			if($id == "inactive") {
 				$this->form_validation->set_message('other_extracurriculars', 'Entered %s other option is already inactive by Admin.');
	       		return FALSE;
 			}
 			else {
 				$key = array_search('others', $_POST['cand_extra_cur']);
 				if(trim($key) != '') {
 					$_POST['cand_extra_cur'][$key] = $id;
 				}
 				$_POST['cand_extra_cur_new'] = $_POST['cand_extra_cur'];
				return TRUE;
 			}
 		}
 		else if(in_array('others',$_POST['cand_extra_cur']) && $value == 0) {
   			$this->form_validation->set_message('other_extracurriculars', 'The %s other option is required.');
	       	return FALSE;
 		}
 		else if($value == 0) {
 			$_POST['cand_extra_cur_new'] = $_POST['cand_extra_cur'];
 			return TRUE;
 		}
 	}
 	
 	

	// Alpha with white space
 	public function alpha_dash_space($provider_job_title){
		if (! preg_match('/^[a-zA-Z\s]+$/', $provider_job_title) && $provider_job_title!='') {
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}
	}	

	// Numeric with dot
 	public function numeric_dot($value) {
		if (! preg_match('/^[0-9]+(\\.[0-9]+)?$/', $value)) {
			$this->form_validation->set_message('numeric_dot', 'The %s field may only contain decimal or integer value');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	

	/* custom validataion rules */
	public function valid_date($date)
	{
		if(!empty($date)){
	   		$date_split =  explode('/', $date);
	   		if (count($date_split) == 3) {      
			    if (checkdate($date_split[1], $date_split[0], $date_split[2]))
			    {
			    	return TRUE;
			    }
		      	$this->form_validation->set_message('valid_date','The %s field date is not valid it should match this dd/mm/yyyy format');
	        	return FALSE;
		    }
		}
		else{
			$this->form_validation->set_message('valid_date','The %s field date is empty');
        	return false;
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
  
  	// Url Validaiton - Check whether the url exists or not
    // function url_exists($url){                                   
    //     $url_data = parse_url($url); // scheme, host, port, path, query
    //     if(!fsockopen($url_data['host'], isset($url_data['port']) ? $url_data['port'] : 80)){
    //         $this->form_validation->set_message('url_exists', 'The URL you entered is not accessible.');
    //         return FALSE;
    //     }               
    //     return TRUE;
    // }  

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
        		$keyword = "uploads";
    			// To check whether the image path is cdn or local path
		        if(strpos( $old_file_path , $keyword ) !== false) {
       				$_POST[$field] = base_url().$old_file_path;
		        }
		        else {
			       	$_POST[$field] = $old_file_path;
			    }
            	// return TRUE;
        	}
        	else {
        		$_POST[$field] = NULL; //
	            // $this->form_validation->set_message('validate_image_type', "The %s field is required");
	            // return FALSE;
        	}
        }
        else {
        	$_POST[$field] = NULL; //
            // $this->form_validation->set_message('validate_image_type', "The %s field is required");
            // return FALSE;
        }
    }

    function validate_file_type($value,$params) {
		// We must use atleast two paramenters in callback function - One is value that is default, another one is user defined values or custom values
		list($action,$field) = explode(".",$params); // To split the array values
        if(isset($_FILES[$field]) && !empty($_FILES[$field]['name'])) // Check it is exists and not empty
        {
           return TRUE;
        }
        else if($action == 'update') // If action is update means, No need to check validation
        {
        	$prev_file_path = $_POST['prev_file_path'];
        	if(isset($_POST['prev_file_path']) && !empty($_POST['prev_file_path'])) {
        		$_POST[$field] = base_url().$prev_file_path;
            	// return TRUE;
        	}
        	else {
        		$_POST[$field] = NULL; //
	            $this->form_validation->set_message('validate_file_type', "The %s field is required");
	            return FALSE;
        	}
        }
        else {
        	$_POST[$field] = NULL; //
            $this->form_validation->set_message('validate_file_type', "The %s field is required");
            return FALSE;
        }
    }

	public function index()
	{	
		$session_data = $this->session->all_userdata();
		if(!empty($session_data['login_session']['user_type'])) {
			if($session_data['login_session']['user_type'] == "seeker") {
				redirect('seeker/dashboard');
			}
			else {
				redirect('provider/dashboard');
			}
		}

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
				$fb['reg_server_msg'] = 'Invalid login Details!';	
				$fb['error'] = 1;
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
					if($this->input->get('redirect')) {
						redirect(base_url().$this->input->get('redirect'));
					}
					else {
						redirect('seeker/dashboard');
					}
				}
				else{
					$fb['captcha'] = $this->captcha->main();
					$this->session->set_userdata('captcha_info', $fb['captcha']);
					$fb['reg_server_msg'] = 'Invalid login Details!';	
					$fb['error'] = 1;
   					$fb['fbloginurl'] = $common->facebookloginurl_seeker();
					$fb['institutiontype'] = $this->common_model->get_institution_type();
					$this->load->view('job-seekers-login',$fb);
				}
			}
		}
	}
	public function signup()
	{	
		$session_data = $this->session->all_userdata();
		if(!empty($session_data['login_session']['user_type'])) {
			if($session_data['login_session']['user_type'] == "seeker") {
				redirect('seeker/dashboard');
			}
			else {
				redirect('provider/dashboard');
			}
		}

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
			$this->form_validation->set_rules('candidate_work_type', 'Candidate Work Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('captcha_value', 'Captcha', 'trim|required|callback_validate_captcha');
			$this->form_validation->set_rules('accept_terms','Accept terms and condition', 'callback_accept_term_and_condition');
			/* Check whether registration form server side validation are valid or not */
			if ($this->form_validation->run() == FALSE)
	       	{

	      		/* Registration form invalid stage */
	       		$fb['reg_server_msg'] = 'Please provide valid information11!';	
	       		$fb['error'] = 1;
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
					'candidate_type' => $this->input->post('candidate_work_type'),
					'candidate_password' => $common->generateStrongPassword(),
				);
				
			 	/* Check whether data exist or not.exist or not condition handled in job_provider_model.php */
				if($this->job_seeker_model->create_job_seeker($data) === 'inserted'){
					/* Data are not exist stage */
					/* Email configuration and mail template */
					$from_email = $emailsetup['smtp_user'];
					$subject = 'Teacher Recruit Candidate Registration';
					$message = $this->load->view('email_template/seeker', $data, TRUE);
					$this->email->initialize($emailsetup);
					$this->email->from($from_email, 'Teacher Recruit');
					$this->email->to($data['candidate_email']);
					$this->email->subject($subject);
					$this->email->message($message);
					/* Check whether mail send or not*/
					if($this->email->send()){
						/* mail sent success stage. send  facebook login link and server message to login page */
						$fb['reg_server_msg'] = 'Registration Successful!. Check your email address!!';	
						$fb['error'] = 2;
	       				$fb['fbloginurl'] = $common->facebookloginurl_seeker();
	       				$fb['captcha'] = $this->captcha->main();
						$fb['institutiontype'] = $this->common_model->get_institution_type();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
						$this->load->view('job-seekers-login',$fb);
					}
					else{
						/* mail sent error stage. send  facebook login link and server message to login page */
						$fb['reg_server_msg'] = 'Some thing wrong in mail sending process. So please register again!';
						$fb['error'] = 1;
	       				$fb['fbloginurl'] = $common->facebookloginurl_seeker();
						$fb['institutiontype'] = $this->common_model->get_institution_type();
						$fb['captcha'] = $this->captcha->main();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
						
						$this->load->view('register-job-seekers',$fb);
					}
				} else {
					/* data exist stage. send  facebook login link and server message to login page */					
					$fb['reg_server_msg'] = 'Some thing wrong in data insertion process. So please register again!';
					$fb['error'] = 1;
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
	public function readmore(){
		$session_data = $this->session->all_userdata();
		if(isset($session_data['login_session']))
		{
        $this->load->view('user-find-jobs');
		}
	    else {
		    redirect('login/seeker');
		}
	}

	/* ==============            Seeker Dashboard Start Here          ================ */

	// Dashboard
	public function dashboard() {     
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();	
     	$session_data = $this->session->all_userdata();  
     	if(!isset($session_data['login_session']) || empty($session_data['login_session'])) {
     		redirect('seeker/logout');
     	}
     	// print_r($session_data['login_session']);
		if($_POST) {
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if($this->input->post('popup_type') == 'social') {
				$this->form_validation->set_rules('seeker_email', 'Email', 'trim|required|xss_clean|valid_email');
				$this->form_validation->set_rules('seeker_mobile', 'Mobile', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]');
				$this->form_validation->set_rules('seeker_password', 'Password', 'trim|required|xss_clean|min_length[8]|max_length[20]');
				$this->form_validation->set_rules('seeker_confirmpass', 'Confirm Password', 'trim|required|xss_clean|min_length[8]|max_length[20]|matches[seeker_password]');
				$this->form_validation->set_rules('seeker_institution', 'Institution Type', 'trim|required|xss_clean|');
			}		
			$this->form_validation->set_rules('seeker_father', 'Father Name', 'trim|required|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space');
			$this->form_validation->set_rules('seeker_dob', 'Date Of Birth', 'trim|required|xss_clean|callback_valid_date');
			$this->form_validation->set_rules('seeker_address1', 'Address', 'trim|xss_clean|min_length[3]|max_length[150]');
			$this->form_validation->set_rules('seeker_address2', 'Address', 'trim|xss_clean|min_length[3]|max_length[150]');
			$this->form_validation->set_rules('candidate_work_type', 'Candidate Work Type', 'trim|required|xss_clean|');
			$this->form_validation->set_rules('seeker_district', 'District', 'trim|required|xss_clean');
			$this->form_validation->set_rules('seeker_state', 'State', 'trim|required|xss_clean');
				
			if($this->form_validation->run()) {
				if($this->input->post('seeker_address1') || $this->input->post('seeker_address2')) {
					$profile_complete = 40;
				}
				else {
					$profile_complete = 30;
				}
				$data_array = array(
					'candidate_father_name' => $this->input->post('seeker_father'),
					'candidate_date_of_birth' => date('Y-m-d',strtotime($this->input->post('seeker_dob'))),
					'candidate_address_1' => $this->input->post('seeker_address1'),
					'candidate_address_2' => $this->input->post('seeker_address2'),
					'candidate_profile_completeness' => $profile_complete,
					'candidate_state_id' => $this->input->post('seeker_state'),
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
						'candidate_profile_completeness' => $profile_complete,
						'candidate_state_id' => $this->input->post('seeker_state'),
						'candidate_district_id' => $this->input->post('seeker_district')
					);
				}

				$candidate_values = ($this->input->post('popup_type')) ? $this->job_seeker_model->check_seeker_popup_fields_social($data_array) : $this->job_seeker_model->check_seeker_popup_fields($data_array) ;
				;	
				$data['status'] = $candidate_values['status'];
				$data['error'] = $candidate_values['error'];
				if(!empty($candidate_values['candidate_data'])) {
					$this->session->set_userdata('login_session',$candidate_values['candidate_data']);
				}
			}		
		}

		$candidate_data = $this->job_seeker_model->get_cand_data_by_id($session_data['login_session']['candidate_id']);
		if($candidate_data['candidate_father_name'] == '' or $candidate_data['candidate_district_id'] == '' or $candidate_data['candidate_date_of_birth'] == '') 
		{
			if($candidate_data['candidate_institution_type'] == '0' or $candidate_data['candidate_institution_type'] == '' or $candidate_data['candidate_email'] == '' or $candidate_data['candidate_mobile_no'] == '' or $candidate_data['candidate_password'] == '') {
				$data['initial_data'] = 'show_popup';
				$data['popup_type'] = 'social';
			}
			else {
				$data['initial_data'] = 'show_popup';
				$data['popup_type'] = 'ordinary';
			}
		}
		// $data['district_values'] = $this->common_model->get_all_district();
		$data['district_values'] = '';
		$data['state_values'] = $this->common_model->get_all_state();
		$data['institution_values'] = $this->common_model->get_institution_type();
        // print_r($candidate_data);
        // echo $data['popup_type'];
        $data['user_data'] = $candidate_data;
        $data['sidebar_values'] = $this->job_seeker_model->candidate_sidebar_menu_values($session_data['login_session']['candidate_id']);
        $data['job_applied_count'] = $this->job_seeker_model->candidate_job_applied_count($session_data['login_session']['candidate_id']);
        $data['provider_values'] = $this->common_model->get_provider_details(isset($session_data['login_session']['candidate_institution_type'])?$session_data['login_session']['candidate_institution_type']:'');
		$this->load->view('user-dashboard',$data);
	}

	/* ==============            Seeker Dashboard End Here          ================ */

	/* ==============            Seeker Inbox Start Here          ================ */

	// Candidate inbox
	public function inbox(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session = $this->session->all_userdata();
		// print_r($session['login_session']);
		if(!isset($session['login_session']) || empty($session['login_session'])) {
     		redirect('seeker/logout');
     	}
		$data['candidate_data'] = $this->job_seeker_model->candidate_profile_by_id($session['login_session']['candidate_id']);
		$data['message'] = $this->job_seeker_model->job_seeker_inbox($session['login_session']['candidate_id']);
		$data['sidebar_values'] = $this->job_seeker_model->candidate_sidebar_menu_values($session['login_session']['candidate_id']);
		// print_r($data['candidate_id']);
		$data['provider_values'] = $this->common_model->get_provider_details(isset($session['login_session']['candidate_institution_type'])?$session['login_session']['candidate_institution_type']:'');
		$this->load->view('user-dashboard-inbox',$data);
	}

	// Candidate message - get message from db without page refersh (ajax)	
	public function inbox_message(){
		echo json_encode($this->job_seeker_model->job_seeker_inbox_ajax($this->input->post('cand_id'),$this->input->post('lastid')));
	}

	// Candidate inbox message count - get message count from db without page refersh (ajax)	
	public function inbox_message_count(){
		echo $this->job_seeker_model->job_seeker_unread_inbox_count($this->input->post('cand_id'));
	}	

	// Candidate inbox full data
	public function inbox_message_full_data() {
		$inbox_id = $this->input->post('inbox_id');	
		echo $this->job_seeker_model->job_seeker_inbox_full_data($inbox_id);
	}

	// Candidate inbox full data
	public function inbox_removedata() {
		$inbox_id = $this->input->post('inbox_id');	
		echo $this->job_seeker_model->job_seeker_inbox_removedata($inbox_id);
	}

	/* ==============            Seeker Inbox End Here          ================ */

	/* ==============            Seeker Edit Profile Start Here          ================ */

	// Job Seeker Edit Profile 
    public function editprofile() {
    	$data['site_visit_count'] = $this->common_model->get_site_visit_count();
    	$session = $this->session->all_userdata();
    	// print_r($session['login_session']);
    	if(!isset($session['login_session']) || empty($session['login_session'])) {
     		redirect('seeker/logout');
     	}
     	$data['update_status'] = '';
		$data['provider_values'] = $this->common_model->get_provider_details(isset($session['login_session']['candidate_institution_type'])?$session['login_session']['candidate_institution_type']:'');
		$data['candidate_values'] = $this->job_seeker_model->get_seeker_details($session['login_session']['candidate_id']);
    	$data['district_values'] = $this->common_model->get_all_district();
    	$data['state_values'] = $this->common_model->get_all_state();
    	$data['candidate_job_values'] = $this->job_seeker_model->get_seeker_applied_job($session['login_session']['candidate_id']);
    	$data['mother_language_values'] = $this->common_model->mother_tongue(1);
    	$data['medium_language_values'] = $this->common_model->medium_of_instruction();
    	$data['known_languages'] = $this->common_model->all_languages(1);
    	$data['posting_values'] = $this->common_model->applicable_posting($session['login_session']['candidate_institution_type'],1);
    	$data['class_values'] = $this->common_model->classlevel_by_institution($session['login_session']['candidate_institution_type']);
    	$data['exp_class_values'] = $this->common_model->classlevel_by_institution(NULL);
    	$data['subject_values'] = $this->common_model->subject_by_institution($session['login_session']['candidate_institution_type'],1);
    	$data['exp_subject_values'] = $this->common_model->subject_by_institution(NULL,NULL);
    	$data['qualification_values'] = $this->common_model->qualification($session['login_session']['candidate_institution_type']);
    	$data['education_values'] = $this->job_seeker_model->get_seeker_education_details($session['login_session']['candidate_id']);
    	$data['department_values'] = $this->common_model->get_department_details();
    	$data['board_values'] = $this->common_model->get_board_details();
    	$data['extra_curricular_values'] = $this->common_model->get_extra_curricular_details(1);
    	$data['experience_values'] = $this->job_seeker_model->get_seeker_experience_details($session['login_session']['candidate_id']);

    	$data['edit_profile_visible_status'] = 1;
    	// if(empty($data['district_values']) || empty($data['mother_language_values']) || empty($data['medium_language_values']) || empty($data['known_languages']) || empty($data['posting_values']) || empty($data['class_values']) || empty($data['subject_values']) || empty($data['qualification_values']) || empty($data['department_values']) || empty($data['board_values'])) {
    	// 	$data['edit_profile_visible_status'] = 0;
    	// }

    	// To store session values
    	$candidate_session_data = $this->job_seeker_model->seeker_session_values($session['login_session']['candidate_id']);

		if(!empty($candidate_session_data)) {
			$this->session->set_userdata('login_session',$candidate_session_data);
		}

    	$data['sidebar_values'] = $this->job_seeker_model->candidate_sidebar_menu_values($session['login_session']['candidate_id']);
		$this->load->view('user-edit-profile',$data);
	}

	// Job Seeker Edit Profile Validation - ajax
	public function edit_profile_validation_ajax() {
		$session = $this->session->all_userdata();
   		$action = "update"	;
   		// Experience Validation
   		if(!$this->input->post('cand_fresh')) {
			$validation_fields_experience = array(	
				    	array('field' => 'cand_exp_class[]', 'label' => 'Experience Class Level','rules' => 'required|trim|xss_clean'),
						array('field' => 'cand_exp_sub[]', 'label' => 'Experience Subject','rules' => 'required|trim|xss_clean'),
				    	array('field' => 'cand_exp_board[]', 'label' => 'Experience Board','rules' => 'required|trim|xss_clean'),
				    	array('field' => 'cand_exp_yr[]', 'label' => 'Experience Year','rules' => 'required|trim|xss_clean|callback_numeric_dot'),
				    );
		}
   		// Profile, Preference, Education, Communication Validation	
	   	$validation_fields = array(	
			array('field' => 'cand_firstname', 'label' => 'Name','rules' => 'required|trim|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space'),
			array('field' => 'other_mother_tongue', 'label' => 'Other Mother Tongue','rules' => 'trim|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space'),
			array('field' => 'other_known_lang', 'label' => 'Other Known Language','rules' => 'trim|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space'),
			array('field' => 'other_posting', 'label' => 'Other Posting','rules' => 'trim|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space'),
			array('field' => 'other_subject', 'label' => 'Other Subject','rules' => 'trim|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space'),
			array('field' => 'other_extracurricular', 'label' => 'Other Extracurricular','rules' => 'trim|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space'),
			array('field' => 'cand_gen', 'label' => 'Gender','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_dob', 'label' => 'Date Of Birth','rules' => 'trim|xss_clean|callback_valid_date'),
			array('field' => 'cand_fa_name', 'label' => 'Father Name','rules' => 'required|trim|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space'),
			array('field' => 'cand_pic', 'label' => 'Picture','rules' => 'callback_validate_image_type['.$action.'.cand_pic]'),
			array('field' => 'cand_marital', 'label' => 'Martial Status','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_native_state', 'label' => 'Native State','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_native_dis', 'label' => 'Native District','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_mother_ton', 'label' => 'Mother Tongue','rules' => 'required|trim|xss_clean|callback_other_mother_tongue'),
			array('field' => 'cand_known_lan[]', 'label' => 'Known Languages','rules' => 'required|trim|xss_clean|callback_other_known_languages'),
			array('field' => 'cand_nation', 'label' => 'Nation','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_religion', 'label' => 'Religion','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_communal', 'label' => 'Community','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_phy', 'label' => 'Physical Challenge Status','rules' => 'required|trim|xss_clean'),

			array('field' => 'cand_posts[]', 'label' => 'Apply Posting','rules' => 'required|trim|xss_clean|callback_other_postings['.$session['login_session']['candidate_institution_type'].']'),
			array('field' => 'cand_start_sal', 'label'=> 'Minimum Salary','rules' => 'required|trim|xss_clean|regex_match[/^[0-9]{4,9}$/]'),
			array('field' => 'cand_end_sal', 'label' => 'Maximum Salary','rules' => 'required|trim|xss_clean|regex_match[/^[0-9]{4,9}$/]|callback_check_greater_value['.$this->input->post('cand_start_sal').']' ),
			array('field' => 'cand_class[]', 'label' => 'Preference Class Level','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_sub[]', 'label' => 'Preference Subject','rules' => 'required|trim|xss_clean|callback_other_subjects['.$session['login_session']['candidate_institution_type'].']'),

		   	array('field' => 'cand_qual[]', 'label' => 'Education Qualification','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_yop[]', 'label' => 'Education Year Of Passing','rules' => 'required|trim|xss_clean|regex_match[/^[0-9]{4}$/]'),
			array('field' => 'cand_med[]', 'label' => 'Education Medium','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_dept[]', 'label' => 'Education Department','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_board[]', 'label' => 'Education Board','rules' => 'required|trim|xss_clean'),
			array('field' => 'cand_percen[]', 'label' => 'Education Percentage','rules' => 'required|trim|xss_clean|maxlength[5]|callback_numeric_dot'),
	    	array('field' => 'cand_tet', 'label' => 'TET Exam Status','rules' => 'required|trim|xss_clean'),
	    	// array('field' => 'cand_int_sub', 'label' => 'Interest Subject','rules' => 'required|trim|xss_clean'),
	    	array('field' => 'cand_extra_cur[]', 'label' => 'Extra Curricular','rules' => 'required|trim|required|xss_clean|callback_other_extracurriculars'),
			array('field' => 'cand_addr1', 'label' => 'Address','rules' => 'trim|xss_clean|minlength[3]|maxlength[150]'),
			array('field' => 'cand_addr2', 'label' => 'Address','rules' => 'trim|xss_clean|minlength[3]|maxlength[150]'),
			array('field' => 'cand_live_dis', 'label' => 'Live District','rules' => 'trim|xss_clean'),
	    	array('field' => 'cand_pincode', 'label' => 'Pincode','rules' => 'trim|xss_clean|regex_match[/^[0-9]{4,6}$/]'),
	    	array('field' => 'cand_email', 'label' => 'Email','rules' => 'required|trim|xss_clean|valid_email'),
	    	array('field' => 'cand_mobile', 'label' => 'Mobile','rules' => 'required|trim|xss_clean|regex_match[/^[0-9]{10}$/]'),
	    	// array('field' => 'cand_facebook', 'label' => 'Facebook Url','rules' => 'required|trim|xss_clean|callback_valid_url_format|'),
	    	// array('field' => 'cand_google', 'label' => 'Google Plus Url','rules' => 'required|trim|xss_clean|callback_valid_url_format|'),
	    	// array('field' => 'cand_linkedin', 'label' => 'Linkedin Url','rules' => 'required|trim|xss_clean|callback_valid_url_format|'),
	    	array('field' => 'cand_resume', 'label' => 'Resume','rules' => 'callback_validate_file_type['.$action.'.cand_resume]'),
	    	array('field' => 'cand_accept', 'label' => 'Accept Terms & Condition','rules' => 'required|trim|xss_clean'),
		);
		
		$this->form_validation->set_rules($validation_fields);
		if($this->form_validation->run() == FALSE) {
			foreach($validation_fields as $row) {
	          $field = $row['field'];
	          $error = form_error($field);
	          if($error){
	            $data['update_status'] = strip_tags($error);
	            break;
	          }
	        }
		}
		else {
			$validation_error = 0;
			if(!$this->input->post('cand_fresh')) {
				$this->form_validation->set_rules($validation_fields_experience);
				if($this->form_validation->run() == FALSE) {
					foreach($validation_fields_experience as $row){
				        $field = $row['field'];
				        $error = form_error($field);
				        if($error){
							$validation_error = 1;
					        $data['update_status'] = strip_tags($error);
				    	    break;
				        }
				    } 
				}
				else {
					$validation_error = 0;
				}
			}
			if($validation_error == 0) {
				$error = 0;
	   			$upload_image_path = SEEKER_UPLOAD."pictures/";
	   			$upload_resume_path = SEEKER_UPLOAD."resume/";
	    		if(!empty($_FILES['cand_pic']['name']))
	        	{
				 	$config['upload_path'] = APPPATH . '../'.$upload_image_path; // APPPATH means our application folder path.
			        $config['allowed_types'] = 'jpg|jpeg|png'; // Allowed tupes
			        $config['encrypt_name'] = TRUE; // Encrypted file name for security purpose
			        $config['max_size']    = '2048'; // Maximum size - 2MB
			    	$config['max_width']  = '1024'; // Maximumm width - 1024px
			    	$config['max_height']  = '768'; // Maximum height - 768px
			        $this->upload->initialize($config); // Initialize the configuration

	      			if($this->upload->do_upload('cand_pic'))
	          		{
	              		$upload_data = $this->upload->data(); 
	              		// Generate thumbnail image for uploaded image
	              		$cand_logo_thumb['image_library'] = 'gd2';
						$cand_logo_thumb['source_image'] = './uploads/jobseeker/pictures/'.$upload_data['file_name'];
						$cand_logo_thumb['create_thumb'] = TRUE;
						// $cand_logo_thumb['new_image'] = 'thumb_'.$upload_data['file_name'];
						$cand_logo_thumb['maintain_ratio'] = TRUE;
						$cand_logo_thumb['width']         = 180;
						$cand_logo_thumb['height']       = 180;
						$this->image_lib->initialize($cand_logo_thumb);
						// Resize operation
						if ( ! $this->image_lib->resize())
						{
							$error = 1;
	                		$data['update_status'] = strip_tags($this->image_lib->display_errors()); 
						}
						else {
							$error = 0;
						}
						$this->image_lib->clear();
	               		$_POST['cand_pic'] = base_url().$upload_image_path.$upload_data['file_name']; 
	               		$old_file_path = $_POST['old_file_path'] ;
	               		$upload_error = 0;
	              	    $keyword = "uploads";
	        			// To check whether the image path is cdn or local path
				        if(strpos( $old_file_path , $keyword ) !== false && !empty($old_file_path) ) {
	               			@unlink(APPPATH.'../'.$old_file_path);
	               			$thumb_image = explode('.', end(explode('/',$old_file_path)));
	               			@unlink(APPPATH.'../'.$upload_image_path.$thumb_image[0]."_thumb.".$thumb_image[1]);
				        }
	            	}
	   		      	else
	           		{
	           			$error = 1;
	                	$data['update_status'] = strip_tags($this->upload->display_errors()); 
	               	}	
	           	}
	           	else {
	           		$error = 0;
	           	}
	           	if($error == 0) {
	           		if(!empty($_FILES['cand_resume']['name'])) {
					 	$config['upload_path'] = APPPATH . '../'.$upload_resume_path; // APPPATH means our application folder path.
				        $config['allowed_types'] = 'pdf|doc'; // Allowed tupes
				        $config['encrypt_name'] = TRUE; // Encrypted file name for security purpose
				        $config['max_size']    = '1024'; // Maximum size - 2MB
				        $this->upload->initialize($config); // Initialize the configuration
		      			if($this->upload->do_upload('cand_resume'))
		          		{
		              		$upload_data = $this->upload->data(); 
		               		$_POST['cand_resume'] = base_url().$upload_resume_path.$upload_data['file_name']; 
		               		$prev_file_path = $_POST['prev_file_path'] ;
		               		$upload_error = 0;
		        			// To check whether the resume path is empty or not
					        if(!empty($prev_file_path) ) {
	               				@unlink(APPPATH.'../'.$prev_file_path);
				        	}	
							$data['update_status'] = $this->job_seeker_model->editprofile_validation($_POST);
		            	}
		   		      	else
		           		{
		                	$data['update_status'] = strip_tags($this->upload->display_errors()); 
		           			// $data['update_status'] = $_FILES['cand_resume']['name'];
		               	}	
		            }
		            else {
		            	$data['update_status'] = $this->job_seeker_model->editprofile_validation($_POST);
		            }	
	           	}
	        }
       	}
       	echo $data['update_status'];
	}

	/* ==============            Seeker Edit Profile End Here          ================ */

	/* ==============            Seeker Find Jobs Start Here          ================ */

	// Seeker Find Job
	public function findjob() {	
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();		
		if(!isset($session_data['login_session']) || empty($session_data['login_session'])) {
     		redirect('seeker/logout');
     	}
		$data['sidebar_values'] = $this->job_seeker_model->candidate_sidebar_menu_values($session_data['login_session']['candidate_id']);
		$data['provider_values'] = $this->common_model->get_provider_details(isset($session_data['login_session']['candidate_institution_type'])?$session_data['login_session']['candidate_institution_type']:'');
		$data['alldistricts'] = $this->common_model->get_all_district();
		if(!isset($session_data['login_session']['institution_type_id']) && empty($session_data['login_session']['institution_type_id'])) {
			$candidate_data = $this->job_seeker_model->get_cand_data_by_id($session_data['login_session']['candidate_id']);
			$session_data['login_session']['institution_type_id'] = $candidate_data['institution_type_id'];
		}		
		$data['applicable_postings'] = $this->common_model->applicable_posting($session_data['login_session']['candidate_institution_type']);
		$data['qualifications'] = $this->common_model->qualification_by_institution($session_data['login_session']['candidate_institution_type']);
		$data["applied_value"] = $this->job_seeker_model->job_seeker_applied_value($session_data['login_session']['candidate_id']);

		if(!empty($session_data['login_session']['institution_type_id'])) {	
			$search_inputs = array();	
			if($_POST) {
	    		$inputs = array(
	        				'keyword' => $this->input->post('search_keyword'),
	        				'min_amount' => $this->input->post('search_min_amount'),
	        				'location' => $this->input->post('search_location'),
	        				'max_amount' => $this->input->post('search_max_amount'),
	        				'experience' => $this->input->post('search_exp'),
	        				'posting' => $this->input->post('search_posting'),
	        				'qualification' => $this->input->post('search_qualification'),
	        				);
	    		$this->session->set_userdata('seeker_search_inputs',$inputs); // To store search inputs in session
	    	}
	    	$search_inputs = $this->session->userdata('seeker_search_inputs'); // To get search inputs from session

    		// Pagination values
    		$per_page = 20;

    		$offset = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)*$per_page : 0;
	        $search_results = $this->job_seeker_model->get_seeker_search_results($per_page, $offset,$session_data['login_session']['institution_type_id'],$search_inputs);
	    	$total_rows = $search_results['total_rows'];
	    	$data['search_inputs'] = $search_inputs;
	    	$data["search_results"] = $search_results['search_results'];

	    	//pagination
			$this->load->library('pagination');

			// Pagination configuration
  			$config['base_url'] = base_url().'seeker/findjob';
			$config['per_page'] = $per_page;
			$config['total_rows'] = $total_rows;
			$config['uri_segment'] = 3;
			$config['num_links'] = 4;
			$config['use_page_numbers'] = TRUE;

    		// Custom Configuration
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			// Pagination Inititalization
			$this->pagination->initialize($config);

			// Navigation Links
			$pagination_links = $this->pagination->create_links();
			$data["links"] = $pagination_links;
			$this->load->view('user-find-jobs', $data);
		}
		else {
			redirect('seeker/dashboard');
		}		
	}

	/* ==============            Seeker Find Jobs End Here          ================ */

	/* ==============            Seeker Applied Jobs Start Here          ================ */

	// Seeker Applied jobs
	public function jobsapplied() {
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();
		if(!isset($session_data['login_session']) || empty($session_data['login_session'])) {
     		redirect('seeker/logout');
     	}
		$data['sidebar_values'] = $this->job_seeker_model->candidate_sidebar_menu_values($session_data['login_session']['candidate_id']);		
		$data['provider_values'] = $this->common_model->get_provider_details(isset($session_data['login_session']['candidate_institution_type'])?$session_data['login_session']['candidate_institution_type']:'');

		// Pagination values
		$per_page = 20;

		$offset = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)*$per_page : 0;
		$total_rows = $this->job_seeker_model->candidate_job_applied_count($session_data['login_session']['candidate_id']);
        $data["jobsapplied"] = $this->job_seeker_model->job_seeker_applied_jobs($per_page, $offset,$session_data['login_session']['candidate_id']);

    	// Load pagination
		$this->load->library('pagination');

		// Pagination configuration
		$config['base_url'] = base_url().'seeker/jobsapplied';
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total_rows;
		$config['uri_segment'] = 3;
		$config['num_links'] = 4;
		$config['use_page_numbers'] = TRUE;

		// Custom Configuration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		// Pagination Inititalization
		$this->pagination->initialize($config);

		// Navigation Links
		$pagination_links = $this->pagination->create_links();
		$data["links"] = $pagination_links;
		$this->load->view('user-job-applied', $data);
	}

	/* ==============            Seeker Applied Jobs End Here          ================ */

	/* ==============            Seeker Feedback Start Here          ================ */

	// Seeker Feedback
	public function feedback() {
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();
		if(!isset($session_data['login_session']) || empty($session_data['login_session'])) {
     		redirect('seeker/logout');
     	}
		$data['sidebar_values'] = $this->job_seeker_model->candidate_sidebar_menu_values($session_data['login_session']['candidate_id']);
		// $data['candidate'] 	= $session_data['login_session']['candidate_id'];
		// $data['candidate_data'] = $this->job_seeker_model->candidate_profile_by_id($session_data['login_session']['candidate_id']);
		$data['provider_values'] = $this->common_model->get_provider_details(isset($session_data['login_session']['candidate_institution_type'])?$session_data['login_session']['candidate_institution_type']:'');
		if(!$_POST){
			$this->load->view('user-dashboard-feedback',$data);
		}
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('feedback_subject', 'Subject', 'trim|required|min_length[5]|max_length[100]|xss_clean');
			$this->form_validation->set_rules('feedback_content', 'Feedback', 'trim|required|min_length[50]|max_length[700]|xss_clean');
			if ($this->form_validation->run()){
				$feedback_data = array(
									'feedback_form_title' => $this->input->post('feedback_subject'),
									'feedback_form_message' => $this->input->post('feedback_content'),
									'is_organization' => 0,
									'is_candidate' => 1,
									'is_guest_user' => 0,
									'candidate_or_organization_id' => $session_data['login_session']['candidate_id'],
									'feedback_form_status' => 1
								);
				if($this->job_seeker_model->candidate_feedback_form($feedback_data)){
					$data['feedback_server_msg'] = 'Thanks for your valuable feedback! Our customer support representative will contact you soon!!';
					$data['error'] = 2;
					$this->load->view('user-dashboard-feedback',$data);
				}
				else{
					$data['feedback_server_msg'] = 'Soemthing wrong in data insertion process. Please try again later!';
					$data['error'] = 1;
					$this->load->view('user-dashboard-feedback',$data);
				}
			}
			else{
				$this->load->view('user-dashboard-feedback',$data);
			}
		}
	}

	/* ==============            Seeker Feedback End Here          ================ */

	/* ==============            Seeker Change Password Start Here          ================ */

	// Change password
	public function change_password() {
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();	
    	// print_r($session['login_session']);
    	if(!isset($session_data['login_session']) || empty($session_data['login_session'])) {
     		redirect('seeker/logout');
     	}
		$data['status'] = '';
		$data['error'] = '';
		if($_POST) {
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			/* Set validate condition for registration form */
			$id = $session_data['login_session']['candidate_id'];
			$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|xss_clean|');
			$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|xss_clean||min_length[8]|max_length[20]|');
			$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'trim|required|xss_clean||min_length[8]|max_length[20]|matches[new_pass]');
 	  		if ($this->form_validation->run()) {   
 	  			$data_array = array(
 	  						'old_password' => $this->input->post('old_pass'),
 	  						'new_password' => $this->input->post('new_pass'),
 	  						'candidate_id' => $id
 	  					);
 	  			$data_values = $this->job_seeker_model->password_change($data_array);
 	  			$data['status'] = $data_values['status'];
 	  			$data['error'] = $data_values['error'];
		    }
		}
		$data['sidebar_values'] = $this->job_seeker_model->candidate_sidebar_menu_values($session_data['login_session']['candidate_id']);
		$data['provider_values'] = $this->common_model->get_provider_details(isset($session_data['login_session']['candidate_institution_type'])?$session_data['login_session']['candidate_institution_type']:'');
		$this->load->view('user-dashboard-changepwd',$data);
	}

	/* ==============            Seeker Change Password End Here          ================ */

	/* ==============            Seeker Job Description Start Here  (Apply and Applied job)        ================ */

	// Seeker job apply and job description
	public function applynow() {
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$session_data = $this->session->all_userdata();	
		if(!isset($session_data['login_session']) || empty($session_data['login_session']) || $session_data['login_session']['user_type'] != 'seeker') {
			if($this->uri->segment(2) == "vacancy_details")
     			redirect('login/seeker?redirect='.$this->uri->uri_string());
     		else 
     			redirect('login/seeker');
     	}
     	$data['provider_values'] = $this->common_model->get_provider_details(isset($session_data['login_session']['candidate_institution_type'])?$session_data['login_session']['candidate_institution_type']:'');
		$data["current_jobvacancy_id"] = $this->uri->segment('3');
		$institution_id = (isset($session_data['login_session']['candidate_institution_type'])?$session_data['login_session']['candidate_institution_type']:'');
		$data['relatedjob_results'] = $this->job_seeker_model->get_relatedjob_list($data["current_jobvacancy_id"],$institution_id);
		$data['qualification'] = $this->common_model->qualification_by_institution($institution_id);
		// $data['sidebar_values'] = $this->job_seeker_model->candidate_sidebar_menu_values($session_data['login_session']['candidate_id']);
		$data["medium"] = $this->common_model->medium_of_instruction();
		if(!$_POST) {
			// echo 'default values to show in html';
			if($data["current_jobvacancy_id"]) {
				$data["applyjob"] = $this->job_seeker_model->job_seeker_detail_jobs($data["current_jobvacancy_id"]);
				if($session_data['login_session']['user_type'] != 'provider') {
					$data["applied_status"] = $this->job_seeker_model->job_seeker_applied_status($session_data['login_session']['candidate_id'],$data["current_jobvacancy_id"]);
				}
				$this->load->view('single-job', $data);
			}
		}
		else {
			// echo 'Post values default values to show in html';
			$session_data = $this->session->all_userdata();		
			$data["applyjob"] = $this->job_seeker_model->job_seeker_detail_jobs($data["current_jobvacancy_id"]);
			$data["applied_status"] = $this->job_seeker_model->job_seeker_applied_status($session_data['login_session']['candidate_id'],$data["applyjob"]['vacancies_id']);

			/** Insert data for Organization Inbox **/
			$seeker_appliedjob = array(									
									'inbox_messge'					=> 'Apply job',
									'inbox_organization_id'			=> $data["applyjob"]['organization_id'],
									'inbox_candidate_id'			=> $session_data['login_session']['candidate_id'],
									'inbox_vacancy_id'				=> $data["applyjob"]['vacancies_id'],
									'is_viewed'						=> 0,
									'inbox_status'					=> 1
								);
			/** Insert data for Candidate Applied Job **/
			$seeker_candidatejob = array(									
									'applied_job_vacancies_id'		=> $data["applyjob"]['vacancies_id'],
									'applied_job_candidate_id'		=> $session_data['login_session']['candidate_id'],
									'applied_job_status'			=> 1
									// 'applied_job_date'				=> date("Y-m-d")
								);
			if($data["applyjob"]['organization_institution_type_id'] == $institution_id ) {
				$apply_status = $this->job_seeker_model->job_seeker_apply_status($session_data['login_session']['candidate_id'],$data["applyjob"]['vacancies_id']);
				if ($apply_status == "success") {
					if($this->job_seeker_model->job_seeker_applied_job($seeker_appliedjob,$seeker_candidatejob)) {
						$data["applied_status"] = $this->job_seeker_model->job_seeker_applied_status($session_data['login_session']['candidate_id'],$data["current_jobvacancy_id"]);
						$data['post_job_server_msg'] = 'You Applied for the Job Successfully!';
						$this->load->view('single-job', $data);
					} 
					else {
						$data['post_job_server_msg'] = 'Something wrong in data insertion process.Please try again!!';
						redirect('missingpage');
					}
				}
				else {
					$data['post_job_server_msg'] = $apply_status;
					$this->load->view('single-job', $data);	
				}
			}
			else {
				$data['post_job_server_msg'] = 'Something went wrong. Please try again with correct details!!';
				$this->load->view('single-job', $data);
			}
		}
	}

	/* ==============            Seeker Job Description End Here  (Apply and Applied job)        ================ */


    public function seeker_logout() {
		$this->session->set_userdata('login_status', FALSE);
		$this->session->unset_userdata('login_session');
		$this->session->sess_destroy();
    	redirect('/','refresh');
	}

	public function forgot_password()
	{ 
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$ci =& get_instance();	
		$ci->config->load('email', true);
		$emailsetup = $ci->config->item('email');
		$this->load->library('email', $emailsetup);
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('forget_email', 'Email', 'trim|required|valid_email|xss_clean');
		/* Check whether registration form server side validation are valid or not */
		if ($this->form_validation->run() == FALSE) {
			$data['reg_server_msg'] = 'Provided Email Id is invalid!';	
			$data['error'] = 1;
			$this->load->view('forgot-password-seeker',$data);
			// $data['data_value'] = $this->db->get_where('tr_candidate_profile', array('username' => $candidate_name))->result_array();
			// $data['data_value'] = $this->db->get_where('tr_candidate_profile', array('password' => $candidate_password))->result_array();
		}
		else{
	        $forget_where = '(candidate_email="'.$this->input->post('forget_email').'")';
	  		$forget_query = $this->db->get_where('tr_candidate_profile',$forget_where)->row_array();
	      	if(isset($forget_query['candidate_password']) && !empty($forget_query['candidate_password'])) {
				$from_email = $emailsetup['smtp_user'];
				$this->email->initialize($emailsetup);
				$this->email->from($from_email, 'Teacher Recruit');
				$this->email->to($forget_query['candidate_email']);
	        	$this->email->subject('Get your forgotten Password');
	        	$message = $this->load->view('email_template/forget_pwd_seeker', $forget_query, TRUE);
				$this->email->message($message);
	       		// $this->email->message("Your registered password is ".$forget_query['candidate_password']);
	        	if($this->email->send()){
		        	$data['reg_server_msg'] = "Check your mail and get your password!";
		        	$data['error'] = 2;
		        	$this->load->view('forgot-password-seeker',$data);
	        	}
				else{
					show_error($this->email->print_debugger());
					$data['reg_server_msg'] = 'Some thing wrong in mail sending process. So please register again!';
					$data['error'] = 1;
					$this->load->view('forgot-password-seeker',$data);
				}
	      	}
			else{
				$data['reg_server_msg'] = 'Your Provided Email Id is invalid';	
				$data['error'] = 1;
				$this->load->view('forgot-password-seeker',$data);
			}
		}   	 		
	}
	/*Added by thangam*/
	public function editprofile_fullview(){

		$this->load->view('user-edit-profile-full-view.html');
	}
	/*End of full view*/



	// Commented by siva
	// /** Seeker Inital Data Validation With Pop-up **/		
	// public function initialdata(){			
	// 	if($_POST){				
	// 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
	// 		$this->form_validation->set_rules('seeker_father', 'Father Name', 'trim|required|xss_clean');
	// 		$this->form_validation->set_rules('seeker_dob', 'Date Of Birth', 'trim|required|xss_clean');
	// 		$this->form_validation->set_rules('seeker_address1', 'Address', 'trim|required|xss_clean');
	// 		$this->form_validation->set_rules('seeker_district', 'District', 'trim|required|xss_clean');
			
	// 		if ($this->form_validation->run()){					
	// 			$initial_data_profile = array(
	// 				'candidate_password'	=> $this->input->post('seekerpassword'),
	// 				'candidate_mobile_no'	=> $this->input->post('registrant_mobile_no'),
	// 				'candidate_profile_completeness' => 41
	// 			);					
	// 			if($this->job_seeker_model->job_seeker_update_profile($this->input->post('candidate_id'),$initial_data_profile)=='updated'){
	// 					redirect('seeker/dashboard');
	// 				}
	// 			} 
	// 			else {					
	// 				// $session_data = $this->session->all_userdata();
	// 				// $user_email = (isset($session_data['login_session']['candidate_email'])?$session_data['login_session']['candidate_email']:$session_data['login_session']['candidate_id']);
	// 				// 	if($this->job_seeker_model->check_has_initial_data($user_email)=='has_no_data'){						
	// 				// 		$data['initial_data'] = 'show_popup';
	// 				// 	}
	// 				// 	else{
	// 				// 		echo 'Out';
	// 				// 		$data['initial_data'] = 'hide_popup';
	// 				// 	}

	// 				// $candidate_data = (isset($session_data['login_session']['candidate_id'])?$this->job_seeker_model->get_cand_data_by_id($session_data['login_session']['candidate_id']):$this->job_seeker_model->get_cand_data_by_mail($session_data['login_session']['candidate_email']));

	// 				// // if($candidate_data['organization_name'] == '' or $candidate_data['organization_logo'] == '' or $candidate_data['organization_address_1'] == '' or $candidate_data['organization_address_2'] == '' or $candidate_data['organization_address_3'] == '' or $candidate_data['organization_district_id'] == '' or $candidate_data['registrant_name'] == '' or $candidate_data['registrant_designation'] == '' ){

	// 				// if($candidate_data['candidate_name'] == '' or $candidate_data['candidate_image_path'] == '' or $candidate_data['candidate_address_1'] == '' or $candidate_data['candidate_address_2'] == '' or $candidate_data['candidate_live_district_id'] == '' ){
	// 				// 		if($data['initial_data'] === 'show_popup'){
	// 				// 			$data['user_data'] = $candidate_data;
	// 				// 				$this->load->view('user-dashboard',$data);
	// 				// 			} else {
	// 				// 				redirect('seeker/dashboard/editprofile');
	// 				// 			}
	// 				// } else {
	// 				// 	$data['user_data'] = $candidate_data;
	// 				// 	$this->load->view('user-dashboard',$data);
	// 				// }
	// 				redirect('seeker/dashboard');
	// 			}
	// 		} /** POST END **/
	// 	}

		
		

	


	
	
	

	

} // End
