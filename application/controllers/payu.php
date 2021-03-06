<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payu extends CI_Controller {
	public function __construct()
    {    	
        parent::__construct();
		$this->load->library(array('form_validation','session','iptracker')); 
		$this->load->model(array('job_provider_model','common_model'));
    }
	public function index()
	{	
		$this->session->set_userdata('subscription_status',"success");
		$session_data = $this->session->all_userdata();
		if(empty($session_data['login_session']) || $session_data['login_session']['user_type'] != 'provider')
			redirect('provider/logout');
		$input['organization'] 	= (isset($session_data['login_session']['pro_userid'])?$this->job_provider_model->get_org_data_by_id($session_data['login_session']['pro_userid']):$this->job_provider_model->get_org_data_by_mail($session_data['login_session']['registrant_email_id']));
		$input['subcription_plan'] = $this->common_model->subcription_plan();
		$input['organization_chosen_plan'] = $this->common_model->organization_chosen_plan(isset($session_data['login_session']['pro_userid'])?$session_data['login_session']['pro_userid']:$input['organization']['organization_id']);
		$data = $this->input->post();

		// To check empty field or not
		if($data['udf1']!='' && $data['udf2']!='' && ($data['plan_option']=="original" || $data['plan_option']=="upgrade" || $data['plan_option']=="renewal")  && $data['amount'] > 0) {
			// Plan exists or not
			if(!in_array($data['udf2'],array_column($input['subcription_plan'],'subscription_id')) && $data ['plan_option']!="upgrade") {
				$this->session->set_userdata('subscription_status',"Your chosen plan not available now. Please try another plan");
				redirect('provider/subscription');
			}
			// Renewal Plan
			else if($data ['plan_option']=="renewal") {
				$valid = $this->job_provider_model->renewal_plan_valid($data['udf2'],$data['udf1']);
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
				$valid = $this->job_provider_model->orginal_plan_valid($data['udf2'],$data['udf1']);
				if($valid == 2) {
					$proper = 1; // If correct
				}
				else if($valid == 1) {
					$this->session->set_userdata('subscription_status',"Your are already subscribe the plan. Please choose renewal plan");
					redirect('provider/subscription');
				}
				else {
					$this->session->set_userdata('subscription_status',"Your are already subscribe another plan is active. Please use subscribed plan.");
					redirect('provider/subscription');
				}
			}
			// Upgrade Plan
			else {
				if($data['sms_count'] =='' && $data['email_count'] =='' && $data['resume_count'] =='' ) {
					$this->session->set_userdata('subscription_status',"Please enter value for upgrade plan ");
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

		if(isset($proper) && $proper == 1) {
			$posted = array();
			if (!empty($_POST)) {
				foreach ($_POST as $key => $value) {
					$posted[$key] = $value;
				}
			}
			$formError = 0;
			if (empty($posted['txnid'])) {
				// Generate random transaction id
				$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			} else {
				$txnid = $posted['txnid'];
			}					
			$hash = '';
			// Hash Sequence
			$posted['service_provider'] = 'payu_paisa';
			$posted['key'] = PAYUMERCHANTKEY;
			$posted['furl'] = PAYUFAILUREURL;
			$posted['surl'] = PAYUSUCCESSURL;
			$posted['curl'] = PAYUCANCELURL;
			$posted['txnid'] = $txnid;
		   	$arr = array('plan_option' => $data['plan_option'], 'sms' => $data['sms_count'], 'email' => $data['email_count'], 'resume' => $data['resume_count']);
			$posted['productinfo'] = json_encode($arr);
			$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
			if (empty($posted['hash']) && sizeof($posted) > 0) {
				if (empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])) {
							$formError = 1;
				} 
				else {
					$hashVarsSeq = explode('|', $hashSequence);
					$hash_string = '';
					foreach ($hashVarsSeq as $hash_var) {
						$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
						$hash_string .= '|';
					}
					$hash_string .= PAYUMERCHANTSALT;
					$posted['hash'] = strtolower(hash('sha512', $hash_string));
					$posted['action'] = PAYUBASEURL. '/_payment';
				}
			} 
			$this->load->view('payu',$posted);
		}

	
		// 		else{

		// 			//write free payment code
		// 			if($this->job_provider_model->subscribed_or_not($this->input->post('udf2'),$this->input->post('udf1'))){
		// 				$subscription_plan_data = $this->common_model->subcription_plan($this->input->post('udf2'));
		// 				$subcription_startdate = strtotime($subscription_plan_data[0]['subcription_valid_start_date']); 
		// 				$subcription_end_date = strtotime($subscription_plan_data[0]['subcription_valid_end_date']);
		// 				$datediff = $subcription_end_date - $subcription_startdate;
		// 				$no_of_days =  floor($datediff / (60 * 60 * 24));
		// 				$user_subscription_data = array(
		// 												'organization_id' 								=> $this->input->post('udf1'),
		// 												'subscription_id' 								=> $this->input->post('udf2'),
		// 												'organization_email_count' 						=> $subscription_plan_data[0]['subscription_email_counts'],
		// 												'organization_sms_count'						=> $subscription_plan_data[0]['subcription_sms_counts'],
		// 												'organization_post_vacancy_count' 				=> $subscription_plan_data[0]['subscription_max_no_of_posts'],
		// 												'organization_post_ad_count'					=> $subscription_plan_data[0]['subscription_max_no_of_ads'],
		// 												'organization_vacancy_remaining_count' 			=> $subscription_plan_data[0]['subscription_max_no_of_posts'],
		// 												'organization_ad_remaining_count'				=> $subscription_plan_data[0]['subscription_max_no_of_ads'],
		// 												'organization_resume_download_count'			=> $subscription_plan_data[0]['subcription_resume_download_count'],
		// 												'organization_email_remaining_count'			=> $subscription_plan_data[0]['subscription_email_counts'],
		// 												'organization_sms_remaining_count'				=> $subscription_plan_data[0]['subcription_sms_counts'],
		// 												'organization_remaining_resume_download_count'	=> $subscription_plan_data[0]['subcription_resume_download_count'],
		// 												'is_email_validity'								=> 1,
		// 												'is_sms_validity'								=> 1,
		// 												'is_resume_validity'							=> 1,
		// 												'org_sub_validity_start_date'					=> date('Y-m-d'),
		// 												'org_sub_validity_end_date'						=> date('Y-m-d' ,strtotime("+".$no_of_days." day")),
		// 												'organization_subscription_status'				=> 1
		// 											);
		// 				if($this->job_provider_model->subscriped_plan_data($user_subscription_data)){
		// 					$this->session->set_userdata('subscription_server_msg','free subscription activated successfully!');
		// 					redirect('provider/subscription');
		// 				}
		// 				else {
		// 					$this->session->set_userdata('subscription_server_msg', 'Something wrong in data insertion process. Our customer representative will call you soon!. ');
		// 					redirect('provider/subscription');
		// 				}
		// 			}
		// 			else{
		// 				$this->session->set_userdata('subscription_server_msg', 'You already used free subscription plan!');
		// 				redirect('provider/subscription');
		// 			}






		// 		}


		// 	}
		// 	else{
		// 		$this->session->set_userdata('subscription_server_msg', validation_errors());
		// 		redirect('provider/subscription');
		// 	}
			
		// }
		// else{
		// 	$this->load->library('user_agent');
		// 	redirect($this->agent->referrer());
		// }
	}

	public function reply()
	{
		$reply = array();
		if (!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				$reply[$key] = $value;
			}
		}
		$this->load->view('payureply',$reply);
	}
}