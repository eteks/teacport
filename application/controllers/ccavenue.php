<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccavenue extends CI_Controller {
	public function __construct()
    {    	
        parent::__construct();
		$this->load->library(array('form_validation','session','iptracker')); 
		$this->load->model(array('job_provider_model','common_model'));
    }
	public function index()
	{	
		$this->session->set_userdata('subscription_status',"success");
		$this->session->set_userdata('order_id','0');
		$payment_settings = $this->common_model->get_payment_settings();
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']) || $session_data['login_session']['user_type'] != 'provider')
			redirect('provider/logout');
		$input['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$mail_id = $input['organization']['registrant_email_id'];
		$email_data['organization_name'] = $input['organization']['organization_name'];
		$input['subcription_plan'] = $this->common_model->subcription_plan();
		$input['organization_current_plan'] = $this->common_model->organization_current_plan(isset($session_data['login_session']['pro_userid'])?$session_data['login_session']['pro_userid']:$input['organization']['organization_id']);
		$data = $this->input->post();

		// merchant_param1,plan_option - Plan Name
		// merchant_param2 - Organization id
		// merchant_param3 - Plan id
		// merchant_param4 - Csrf
		// merchant_param5 - Upgrade count (Sms,Email,Resume)

		// To check empty field or not
		if($data['merchant_param2']!='' && $data['merchant_param3']!='' && ($data['plan_option']=="original" || $data['plan_option']=="upgrade" || $data['plan_option']=="renewal")) {

			// Plan exists or not
			if(!in_array($data['merchant_param3'],array_column($input['subcription_plan'],'subscription_id')) && $data ['plan_option']!="upgrade") {
				$this->session->set_userdata('subscription_status',"Your chosen plan not available now. Please try another plan");
				redirect('provider/subscription');
			}

			// Renewal Plan
			else if($data ['plan_option']=="renewal") {
				$valid = $this->job_provider_model->renewal_plan_valid($data['merchant_param3'],$data['merchant_param2']);
				if($valid == 2) {
					$proper = 1; // If correct
				}
				else {
					$this->session->set_userdata('subscription_status',"Your Renewal plan not available now. Please try again later.");
					redirect('provider/subscription');
				}
			}

			// Orginal Plan
			else if($data ['plan_option']=="original") {
				$valid = $this->job_provider_model->orginal_plan_valid($data['merchant_param3'],$data['merchant_param2']);
				if($valid == 2) {
					$proper = 1; // If correct
				}
				else {
					$this->session->set_userdata('subscription_status',"Your are already subscribed the plan. Please choose renewal plan");
					redirect('provider/subscription');
				}
			}

			// Upgrade Plan
			else {
				if($data['sms_count'] =='' && $data['email_count'] =='' && $data['resume_count'] =='' ) {
					$this->session->set_userdata('subscription_status',"Please enter value for upgrade plan ");
					redirect('provider/subscription');
				}
				else if(empty($input['organization_current_plan']) || (isset($input['organization_current_plan']['subscription_id']) && $input['organization_current_plan']['subscription_id']!=$data['merchant_param3'])) {
					$this->session->set_userdata('subscription_status',"Your Upgrade plan not available now. Please try again later.");
					redirect('provider/subscription');
				}
				else {
					$proper = 1; // If correct
				}
			}
		}
		else {
			$this->session->set_userdata('subscription_status',"Something went wrong. Please try againg with correct details");
			redirect('provider/subscription');
		}

		if(isset($proper) && $proper == 1 && $data['amount'] > 0) {
			$posted = array();
			if (!empty($_POST)) {
				foreach ($_POST as $key => $value) {
					$posted[$key] = $value;
				}
			}
			if(!empty($payment_settings)) {
				$posted['merchant_id']  = $payment_settings['online_transfer_merchant_id'];
				$posted['access_code']  = $payment_settings['online_transfer_merchant_accesscode'];
				$posted['working_key']  = $payment_settings['online_transfer_merchant_workingkey'];
				$posted['action']       = $payment_settings['online_transfer_payment_base_url'];	
			}
			// $posted['merchant_id']  = CCAVENUEMERCHANTID;
			// $posted['access_code']  = CCAVENUEACCESSCODE;
			// $posted['working_key']  = CCAVENUEWORKINGKEY;
			// $posted['action']       = CCAVENUEBASEURL;	

			$posted['currency']     = 'INR';
			$posted['redirect_url'] = CCAVENUEREDIRECTURL;
			$posted['cancel_url']   = CCAVENUECANCELURL;
			$posted['language']     = 'en';	
			// Generate random order id
			$posted['order_id']     = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			$this->session->set_userdata('order_id',$posted['order_id']);
			$posted['merchant_param5'] = (!empty($data['sms_count']) ? $data['sms_count'] : "0")."#".(!empty($data['email_count']) ? $data['email_count'] : "0")."#".(!empty($data['resume_count']) ? $data['resume_count'] : "0");

			$this->load->view('ccavenue_request',$posted);
		}

		else if(isset($proper) && $proper == 1 && $data['amount'] <= 0) {
			$valid = $this->job_provider_model->orginal_plan_valid_free($data['merchant_param3'],$data['merchant_param2']);
			if($valid == 2) {
				$subscription_plan_data = $this->common_model->subcription_plan($data['merchant_param3']);
				$no_of_days = $subscription_plan_data[0]['subscription_validity_days'] - 1;
				$user_subscription_data = array(
												'organization_id' 						=> $data['merchant_param2'],
												'subscription_id' 					    => $data['merchant_param3'],
												'organization_transcation_id' 			=> NULL,
												'organization_post_vacancy_count' 		=> $subscription_plan_data[0]['subscription_max_no_of_posts'],
												'organization_vacancy_remaining_count' 	=> $subscription_plan_data[0]['subscription_max_no_of_posts'],
												'organization_post_ad_count' 			=> $subscription_plan_data[0]['subscription_max_no_of_ads'],
												'organization_ad_remaining_count' 		=> $subscription_plan_data[0]['subscription_max_no_of_ads'],
												'organization_email_count' 				=> $subscription_plan_data[0]['subscription_email_counts'],
												'organization_sms_count'				=> $subscription_plan_data[0]['subcription_sms_counts'],
												'organization_resume_download_count'	=> $subscription_plan_data[0]['subcription_resume_download_count'],
												'organization_email_remaining_count'	=> $subscription_plan_data[0]['subscription_email_counts'],
												'organization_sms_remaining_count'		=> $subscription_plan_data[0]['subcription_sms_counts'],
												'organization_remaining_resume_download_count'	=> $subscription_plan_data[0]['subcription_resume_download_count'],
												'is_email_validity'						=> 1,
												'is_sms_validity'						=> 1,
												'is_resume_validity'					=> 1,
												'org_sub_validity_start_date'			=> date('Y-m-d'),
												'org_sub_validity_end_date'				=> date('Y-m-d' ,strtotime("+".$no_of_days." day")),
												'organizaion_sub_updated_date'          => date('Y-m-d' ,strtotime("+".$no_of_days." day")),
												'organization_subscription_status'		=> 1
											);
					
				if($this->job_provider_model->insert_orignial_plan($user_subscription_data)) {
					$email_data['subscription_details'] = $this->common_model->provider_subscription_active_plans($data['merchant_param2']);
					// Email configuration
					$this->config->load('email', true);
					$emailsetup = $this->config->item('email');
					$this->load->library('email', $emailsetup);
					$from_email = $emailsetup['smtp_user'];
					$subject = 'Subscription Details';
					$message = $this->load->view('email_template/subscription', $email_data, TRUE);
					$this->email->initialize($emailsetup);	
					$this->email->from($from_email, 'Teacher Recruit');
					$this->email->to($mail_id);
					$this->email->subject($subject);
					$this->email->message($message);
					/* Check whether mail send or not*/
					$this->email->send();
					$this->session->set_userdata('subscription_status',"Subscription will activated successfully!");
					redirect('provider/subscription');
				}
				else {
					$this->session->set_userdata('subscription_status',"Something went wrong in data insertion process.");
					redirect('provider/subscription');
				}
			}
			else {
				$this->session->set_userdata('subscription_status',"Your are already subscribed the plan. Please choose another plan");
				redirect('provider/subscription');
			}
		}
	}

	public function reply()
	{
		$reply = array();
		if (!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				$reply[$key] = $value;
			}
		}
		$reply['workingKey']  = CCAVENUEWORKINGKEY;
		$this->load->view('ccavenue_response',$reply);
	}
}