<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_Model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }


public function insert_payment_gateway($status) {	

	if($status == 'update') {
		$data = array(
							'online_transfer_merchant_key' => $this->input->post('online_transfer_merchant_key'),
                              'online_transfer_merchant_salt' => $this->input->post('online_transfer_merchant_salt'),
                              'online_transfer_payment_base_url' => $this->input->post('online_transfer_payment_base_url'),
                              'bank_transfer_account_name' => $this->input->post('bank_transfer_account_name'),
                              'bank_transfer_account_number' => $this->input->post('bank_transfer_account_number'),
                              'bank_transfer_ifsc_code' => $this->input->post('bank_transfer_ifsc_code'),
				);
		$pay_rows = $this->db->get('tr_settings_payment_gateway');
		if($pay_rows -> num_rows() == 0) {
			$this->db->set('time', 'NOW()', FALSE);
		    $this->db->insert('tr_settings_payment_gateway', $data);
			$model_data['error'] = 1;
			$model_data['status'] = "Data inserted successfully";
		}
		else {
			$data = array(
							'online_transfer_merchant_key' => $this->input->post('online_transfer_merchant_key'),
                              'online_transfer_merchant_salt' => $this->input->post('online_transfer_merchant_salt'),
                              'online_transfer_payment_base_url' => $this->input->post('online_transfer_payment_base_url'),
                              'bank_transfer_account_name' => $this->input->post('bank_transfer_account_name'),
                              'bank_transfer_account_number' => $this->input->post('bank_transfer_account_number'),
                              'bank_transfer_ifsc_code' => $this->input->post('bank_transfer_ifsc_code'),
				);
			$update_where = '(payment_gateway_id="'.$this->input->post('hidden_id_settings').'")';
			$this->db->set($data); 
      		$this->db->where($update_where);
      		$this->db->update("tr_settings_payment_gateway",$data);
			$model_data['error'] = 1;
			$model_data['status'] = "Data Updated successfully";
		}
      	return $model_data;
	}

	// View
	else {
		$model_data['payment_values'] = $this->db->get('tr_settings_payment_gateway')->row_array();
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
							'system_email_address' => $this->input->post('system_email_address'),
                              'website_time_zone' => $this->input->post('website_time_zone'),
                              'facebook_app_id' => $this->input->post('facebook_app_id'),
                              'facebook_app_secret' => $this->input->post('facebook_app_secret'),
                              'twitter_app_id' => $this->input->post('twitter_app_id'),
                              'twitter_app_secret' => $this->input->post('twitter_app_secret'),
                              'google_app_id' => $this->input->post('google_app_id'),
                              'google_app_secret' => $this->input->post('google_app_secret'),
                              'linkedin_app_id' => $this->input->post('linkedin_app_id'),
                              'linkedin_app_secret' => $this->input->post('linkedin_app_secret'),
				);
		$pay_rows = $this->db->get('tr_settings_site_configuration');
		if($pay_rows -> num_rows() == 0) {
			$this->db->set('time', 'NOW()', FALSE);
		    $this->db->insert('tr_settings_site_configuration', $data);
			$model_data['error'] = 2;
			$model_data['status'] = "Data inserted successfully";
		}
		else {
			$data = array(
							'system_email_address' => $this->input->post('system_email_address'),
                              'website_time_zone' => $this->input->post('website_time_zone'),
                              'facebook_app_id' => $this->input->post('facebook_app_id'),
                              'facebook_app_secret' => $this->input->post('facebook_app_secret'),
                              'twitter_app_id' => $this->input->post('twitter_app_id'),
                              'twitter_app_secret' => $this->input->post('twitter_app_secret'),
                              'google_app_id' => $this->input->post('google_app_id'),
                              'google_app_secret' => $this->input->post('google_app_secret'),
                              'linkedin_app_id' => $this->input->post('linkedin_app_id'),
                              'linkedin_app_secret' => $this->input->post('linkedin_app_secret'),
				);
			$update_where = '( site_configuration_id="'.$this->input->post('hidden_id_settings').'")';
			$this->db->set($data); 
      		$this->db->where($update_where);
      		$this->db->update("tr_settings_site_configuration", $data);
			$model_data['error'] = 2;
			$model_data['status'] = "Data Updated successfully";
		}
      	return $model_data;
	}

	// View
	else {
		$model_data['payment_values'] = $this->db->get('tr_settings_site_configuration')->row_array();
		return $model_data;
	}
	}
public function insert_template_logo($status)
	{	
		if($status == 'update') {
		$data = array(
							'template_logo' => $this->input->post('template_logo'),
                              'template_logo_text' => $this->input->post('template_logo_text'),
				);
		$pay_rows = $this->db->get('tr_settings_template');
		if($pay_rows -> num_rows() == 0) {
			$this->db->set('time', 'NOW()', FALSE);
		    $this->db->insert('tr_settings_template', $data);
			$model_data['error'] = 2;
			$model_data['status'] = "Data inserted successfully";
		}
		else {
			$data = array(
							'template_logo' => $this->input->post('template_logo'),
                              'template_logo_text' => $this->input->post('template_logo_text'),
				);
			$update_where = '( template_id="'.$this->input->post('hidden_id_settings').'")';
			$this->db->set($data); 
      		$this->db->where($update_where);
      		$this->db->update("tr_settings_template", $data);
			$model_data['error'] = 2;
			$model_data['status'] = "Data Updated successfully";
		}
      	return $model_data;
	}

	// View
	else {
		$model_data['payment_values'] = $this->db->get('tr_settings_template')->row_array();
		return $model_data;
	}
	}




}