<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_Model extends CI_Model {

  	public function __construct()
  	{
    	$this->load->database();
  	}


	public function insert_payment_gateway($status) {	
		if($status == 'update') {
			$data = array(
							'online_transfer_merchant_id' => $this->input->post('merchant_id'),
                            'online_transfer_merchant_accesscode' => $this->input->post('merchant_accesscode'),
                            'online_transfer_merchant_workingkey' => $this->input->post('merchant_workingkey'),
                            'online_transfer_payment_base_url' => $this->input->post('payment_base_url'),
                            'bank_transfer_bank_name' => $this->input->post('bank_name'),
                            'bank_transfer_account_holder_name' => $this->input->post('holder_name'),
                            'bank_transfer_account_number' => $this->input->post('account_num'),
                            'bank_transfer_ifsc_code' => $this->input->post('ifsc_code'),
                            'bank_transfer_branch_name' => $this->input->post('branch_name'),
                            'bank_transfer_branch_code' => $this->input->post('branch_code'),
                            'bank_transfer_mobile_number' => $this->input->post('mobile_num'),
                            'bank_transfer_email' => $this->input->post('email'),
                            'bank_transfer_address' => $this->input->post('address'),
                            'payment_updated_date' => date('Y-m-d H:i:s'),
						);

			$pay_rows = $this->db->get('tr_settings_payment');
			if($pay_rows -> num_rows() == 0) {
			    $this->db->insert('tr_settings_payment', $data);
				$model_data['error'] = 1;
				$model_data['status'] = "Data inserted successfully";
			}
			else {
				$update_where = '(payment_gateway_id="'.$this->input->post('hidden_id_settings').'")';
				$this->db->set($data); 
      			$this->db->where($update_where);
      			$this->db->update("tr_settings_payment");
				$model_data['error'] = 1;
				$model_data['status'] = "Data Updated successfully";
			}
	      	return $model_data;
		}
		// View
		else {
			$model_data['payment_values'] = $this->db->get('tr_settings_payment')->row_array();
			return $model_data;
		}
	}
	public function insert_sms_gateway($status)
	{	
		$model_data['status'] = '';
		if($status == 'update') {
			$data = array(
							'sms_api_url' => $this->input->post('sms_api_url'),
	                        'sms_username' => $this->input->post('sms_username'),
	                        'sms_password' => $this->input->post('sms_password'),
	                        'sms_senderid' => $this->input->post('sms_senderid'),
	                        'sms_priority' => $this->input->post('sms_priority'),
	                        'sms_type' => $this->input->post('sms_type'),
	                        'sms_updated_date' => date('Y/m/d H:i:s')
					);
			$pay_rows = $this->db->get('tr_settings_sms_gateway');
			if($pay_rows -> num_rows() == 0) {
			    $this->db->insert('tr_settings_sms_gateway',$data);
				$model_data['status'] = "Data inserted successfully";
			}
			else {
				$this->db->where('sms_gateway_id',$this->input->post('hidden_id_settings'));
				$this->db->set($data); 
	      		$this->db->update("tr_settings_sms_gateway");
				$model_data['status'] = "Data Updated successfully";
			}
		}

		// View
		$model_data['payment_values'] = $this->db->get('tr_settings_sms_gateway')->row_array();
		return $model_data;
	}

	public function insert_configuration_option($status)
	{	

		if($status == 'update') {
			$data = array(
							'system_email_address'   => $this->input->post('system_email'),
	                        'enable_facebook_login'  => $this->input->post('fb_status'),
	                        'facebook_app_id'        => $this->input->post('fb_id'),
	                        'facebook_app_secret'    => $this->input->post('fb_key'),
	                        'enable_twitter_login'   => $this->input->post('tw_status'),
	                    	'twitter_app_id'         => $this->input->post('tw_id'),
	                        'twitter_app_secret'     => $this->input->post('tw_key'),
	                        'enable_google_login'    => $this->input->post('go_status'),
	                        'google_app_id'          => $this->input->post('go_id'),
	                        'google_app_secret'      => $this->input->post('go_key'),
	                        'google_developer_key'   => $this->input->post('go_dev_key'),
	                        'enable_linkedin_login'  => $this->input->post('li_status'),
	                        'linkedin_app_id'        => $this->input->post('li_id'),
	                        'linkedin_app_secret'    => $this->input->post('li_key'),
                          	'plan_grace_period_days' => $this->input->post('grace_days'),
	                        'grace_sms_count'        => $this->input->post('grace_sms'),
	                        'grace_email_count'      => $this->input->post('grace_email'),
	                        'grace_resume_count'     => $this->input->post('grace_resume'),
	                        'grace_ad_count'         => $this->input->post('grace_ad'),
	                        'grace_vacancy_count'    => $this->input->post('grace_vac'),
	                        'configuration_updated_date'  => date('Y-m-d H:i:s')
						);


	
			$pay_rows = $this->db->get('tr_settings_site_configuration');
			if($pay_rows -> num_rows() == 0) {
			    $this->db->insert('tr_settings_site_configuration', $data);
				$model_data['error'] = 2;
				$model_data['status'] = "Data inserted successfully";
			}
			else {
				$update_where = '(site_configuration_id="'.$this->input->post('hidden_id').'")';
				$this->db->set($data); 
	      		$this->db->where($update_where);
	      		$this->db->update("tr_settings_site_configuration");
				$model_data['error'] = 2;
				$model_data['status'] = "Data Updated successfully";
			}
	      	return $model_data;
		}

		// View
		else {
			$model_data['configuration'] = $this->db->get('tr_settings_site_configuration')->row_array();
			return $model_data;
		}
	}
	public function insert_template_logo($data,$status)
	{	
		if($status == 'update') {
			$pay_rows = $this->db->get('tr_settings_template');
			if($pay_rows -> num_rows() == 0) {
			    $this->db->insert('tr_settings_template', $data);
				$model_data['error'] = 2;
				$model_data['status'] = "Data inserted successfully";
			}
			else {
				$update_where = '( template_id="'.$this->input->post('hidden_id_settings').'")';
				$this->db->set($data); 
	      		$this->db->where($update_where);
	      		$this->db->update("tr_settings_template");
				$model_data['error'] = 2;
				$model_data['status'] = "Data Updated successfully";
			}
	      	return $model_data;
		}
		// View
		else {
			$model_data['logo_values'] = $this->db->get('tr_settings_template')->row_array();
			return $model_data;
		}
	}




}