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
			/* Job provider login page with facebook login url */
			$data['fbloginurl'] = $common->facebookloginurl();
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
				$fb['reg_server_msg'] = 'Your Provided Login data is invalid!';	
   				$fb['fbloginurl'] = $common->facebookloginurl();
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
   					$fb['fbloginurl'] = $common->facebookloginurl();
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
			$data['fbloginurl'] = $common->facebookloginurl();
			$data['institutiontype'] = $this->common_model->get_institution_type();
			$data['captcha'] = $this->captcha->main();
			$this->session->set_userdata('captcha_info', $data['captcha']);
			$this->load->view('register-job-seekers',$data);
		}
		/* Registration page loading with posted data */
		else{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			/* Set validate condition for registration form */
			$this->form_validation->set_rules('candidate_institution_type', 'Institution', 'trim|required|numeric|xss_clean');
			$this->form_validation->set_rules('candidate_name', 'Name', 'trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('candidate_email', 'Email ID', 'trim|required|valid_email|xss_clean|is_unique[tr_candidate_profile.candidate_email]');
			$this->form_validation->set_rules('candidate_mobile_no', 'Moblie', 'trim|required|numeric|exact_length[10]|xss_clean');
			$this->form_validation->set_rules('captcha_value', 'Captcha', 'trim|required|callback_validate_captcha');
			/* Check whether registration form server side validation are valid or not */
			if ($this->form_validation->run() == FALSE)
	       	{
	       		/* Registration form invalid stage */
	       		$fb['reg_server_msg'] = 'Please provide valid information!';	
	       		$fb['fbloginurl'] = $common->facebookloginurl();
				$fb['institutiontype'] = $this->common_model->get_institution_type();
				$fb['captcha'] = $this->captcha->main();
				$this->session->set_userdata('captcha_info', $fb['captcha']);
				$this->load->view('register-job-seekers',$fb);	
	        }
			else
			{
				/* Registration form valid stage */
				/* Get and store posted data to array */
				$data = array(
					'candidate_institution_type' => $this->input->post('candidate_institution_type'),
					'candidate_name' => $this->input->post('candidate_name'),
					'candidate_email' => $this->input->post('candidate_email'),
					'candidate_mobile_no' => $this->input->post('candidate_mobile'),
					'captcha_value' => $this->input->post('captcha_value'),
					'candidate_password' => $common->generateStrongPassword()
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
						$fb['reg_server_msg'] = 'Resitration Successful!. Check your email address!!';	
	       				$fb['fbloginurl'] = $common->facebookloginurl();
	       				$fb['captcha'] = $this->captcha->main();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
						$this->load->view('job-seekers-login',$fb);
					}
					else{
						/* mail sent error stage. send  facebook login link and server message to login page */
						$fb['reg_server_msg'] = 'Some thing wrong in mail sending process. So please register again!';	
	       				$fb['fbloginurl'] = $common->facebookloginurl();
						$fb['institutiontype'] = $this->common_model->get_institution_type();
						$fb['captcha'] = $this->captcha->main();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
						$this->load->view('register-job-seekers',$fb);
					}
				}
				else{
					/* data exist stage. send  facebook login link and server message to login page */
					$fb['reg_server_msg'] = 'Some thing wrong in data insertion process. So please register again!';	
       				$fb['fbloginurl'] = $common->facebookloginurl();
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
    if($this->input->post('captcha_value') != $this->session->userdata['captcha_config'])
    {
        $this->form_validation->set_message('validate_captcha', 'Wrong captcha code');
        return false;
    }else{
        return true;
    }
}
	public function dashboard()
    {
    	$session_data = $this->session->all_userdata();
        $this->load->view('user-dashboard');
    }
	public function seeker_logout(){
		$this->session->set_userdata('login_status', FALSE);
		$this->session->unset_userdata('login_session');
		$this->session->sess_destroy();
    	redirect('/','refresh');
	}
}
