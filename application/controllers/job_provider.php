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
			/* Job provider login page with facebook login url */
			$data['fbloginurl'] = $common->facebookloginurl();
			$this->load->view('job-providers-login',$data);
		}
		else {
			/* set validation condition as per given input value are email or mobile number */
			$emailval = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
			$mobileval="/^[1-9][0-9]*$/"; 
			if(!preg_match($emailval,$this->input->post('registrant_email_id'))){
				$this->form_validation->set_rules('registrant_email_id', 'Moblie', 'trim|required|numeric|exact_length[10]|xss_clean');
			}else if(!preg_match($mobileval,$this->input->post('registrant_email_id'))){
				$this->form_validation->set_rules('registrant_email_id', 'Email ID', 'trim|required|valid_email|xss_clean');
			}
			$this->form_validation->set_rules('registrant_password', 'Password', 'trim|required|xss_clean');
			/* Check whether registration form server side validation are valid or not */
			if ($this->form_validation->run() == FALSE){
				$fb['reg_server_msg'] = 'Your Provided Login data is invalid!';	
   				$fb['fbloginurl'] = $common->facebookloginurl();
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
					$fb['reg_server_msg'] = 'Your Provided Login data is invalid!';	
   					$fb['fbloginurl'] = $common->facebookloginurl();
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
		// $data['captcha'] = $this->captcha->main();
		// $this->session->set_userdata('captcha_info', $data['captcha']);

		/* Registration page loading with out posted data */
		if(!$_POST){
			$data['captcha'] = $this->captcha->main();
			$this->session->set_userdata('captcha_info', $data['captcha']);
			$data['fbloginurl'] = $common->facebookloginurl();
			$data['institutiontype'] = $this->common_model->get_institution_type();
			$this->load->view('register-job-providers',$data);
		}
		/* Registration page loading with posted data */
		else{
			/* Set validate condition for registration form */
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div

			$this->form_validation->set_rules('registrant_institution_type', 'Institution', 'trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('registrant_name', 'Name', 'trim|required|alpha|min_length[3]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('registrant_email_id', 'Email ID', 'trim|required|valid_email|xss_clean|is_unique[tr_organization_profile.registrant_email_id]');
			$this->form_validation->set_rules('registrant_mobile_no', 'Moblie', 'trim|required|numeric|exact_length[10]|xss_clean');
            $this->form_validation->set_rules('captcha_value', 'Captcha', 'trim|required|callback_validate_captcha');
			/* Check whether registration form server side validation are valid or not */
			if ($this->form_validation->run() == FALSE)
	       	{
	       		/* Registration form invalid stage */
	       		$fb['reg_server_msg'] = 'Please provide valid information!';
	       		$fb['captcha'] = $this->captcha->main();
				$this->session->set_userdata('captcha_info', $fb['captcha']);	
	       		$fb['fbloginurl'] = $common->facebookloginurl();
				$fb['institutiontype'] = $this->common_model->get_institution_type();
				$fb['captcha'] = $this->captcha->main();
				$this->session->set_userdata('captcha_info', $fb['captcha']);
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
					'captcha_value' => $this->input->post('captcha_value'),
					'registrant_password' => $common->generateStrongPassword()
				);
			 	/* Check whether data exist or not.exist or not condition handled in job_provider_model.php */
				if($this->job_provider_model->create_job_provider($data) === 'inserted'){
					/* Data are not exist stage */
					/* Email configuration and mail template */
					$from_email = $emailsetup['smtp_user'];
					$subject = 'Teacher Recruit Registration';
					$message = 'Dear '.$data['registrant_name'].',<br /><br />Your Teacher Recruit Application Password has been created to the following:.<br /><br /> <table border="1" bgcolor="#FEF1BC"><tbody><tr><td>Email :&nbsp;<strong><font color="blue">'.$data['registrant_email_id'].'</font></strong></td></tr><tr><td>Password :&nbsp;&nbsp;&nbsp;<strong><font color="blue">'.$data['registrant_password'].'</font></strong></td></tr></tbody></table><br /><br /><br />Thanks<br />Teacher Recruit Team';
					$this->email->initialize($emailsetup);
					$this->email->from($from_email, 'Teacher Recruit');
					$this->email->to($data['registrant_email_id']);
					$this->email->subject($subject);
					$this->email->message($message);
					/* Check whether mail send or not*/
					if($this->email->send()){
						/* mail sent success stage. send  facebook login link and server message to login page */
						$fb['reg_server_msg'] = 'Resitration Successful!. Check your email address!!';	
						$fb['captcha'] = $this->captcha->main();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
	       				$fb['fbloginurl'] = $common->facebookloginurl();
						$this->load->view('job-providers-login',$fb);
					}
					else{
						/* mail sent error stage. send  facebook login link and server message to login page */
						$fb['reg_server_msg'] = 'Some thing wrong in mail sending process. So please register again!';	
						$fb['captcha'] = $this->captcha->main();
						$this->session->set_userdata('captcha_info', $fb['captcha']);
	       				$fb['fbloginurl'] = $common->facebookloginurl();
						$fb['institutiontype'] = $this->common_model->get_institution_type();
						$this->load->view('register-job-providers',$fb);
					}
				}
				else{
					/* data exist stage. send  facebook login link and server message to login page */
					$fb['reg_server_msg'] = 'Some thing wrong in data insertion process. So please register again!';
					$fb['captcha'] = $this->captcha->main();
					$this->session->set_userdata('captcha_info', $fb['captcha']);	
       				$fb['fbloginurl'] = $common->facebookloginurl();
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
        $this->load->view('company-dashboard');
    }
	public function provider_logout(){
		$this->session->set_userdata('login_status', FALSE);
		$this->session->unset_userdata('login_session');
		$this->session->sess_destroy();
    	redirect('/','refresh');
	}
	
	
	//Akila created
	
	public function companydbd_editprofile(){
		$this->load->view('company-dashboard-edit-profile');
	}
	public function companydbd_browsejobs(){
		$this->load->view('company-dashboard-browse-jobs');
	}
	
	public function companydbd_postjobs(){
		$this->load->view('company-dashboard-post-jobs');
	}
	public function companydbd_resume(){
		$this->load->view('company-dashboard-resume');
	}
	
	
}
