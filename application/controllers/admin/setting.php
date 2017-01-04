<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');
		$this->load->model('admin/setting_model');
}

	public function payment_gateway()
	{
		if($this->input->post()) {
			if(!$this->input->post('online_transfer_merchant_key') && !$this->input->post('online_transfer_merchant_salt') && !$this->input->post('online_transfer_payment_base_url') && !$this->input->post('bank_transfer_account_name') && !$this->input->post('bank_transfer_account_number') && !$this->input->post('bank_transfer_ifsc_code')) {
				$ajax_data['error'] = 1;
				$ajax_data['status'] = "invalid";
				echo json_encode($ajax_data);
			}
			else {
				$data_values = $this->setting_model->insert_payment_gateway('update');
				$ajax_data['error'] = 1;
				$ajax_data['status'] = $data_values['status'];
				echo json_encode($ajax_data);
			}
		}
		else {
			$data['status'] = 0;
			$data_values = $this->setting_model->insert_payment_gateway('init');
			$data['payment_values'] = $data_values['payment_values'];
			$this->load->view('admin/payment_gateway',$data);
		}

	}

	public function sms_gateway()
	{
		$ajax_data['status'] = 0;
		$ajax_data['error'] = 0;
		if($this->input->post()) {
			if(!$this->input->post('sms_api_url') && !$this->input->post('sms_api_key') && !$this->input->post('sms_authentication_token')) {
				$ajax_data['error'] = 1;
				$ajax_data['status'] = "invalid";
				echo json_encode($ajax_data);
			}
			else {
				$data_values = $this->setting_model->insert_sms_gateway('update');
				$ajax_data['error'] = 1;
				$ajax_data['status'] = $data_values['status'];
				echo json_encode($ajax_data);
			}
		}
		else {
			$data['status'] = 0;
			$data_values = $this->setting_model->insert_sms_gateway('init');
			$data['payment_values'] = $data_values['payment_values'];
			$this->load->view('admin/sms_gateway',$data);
		}
	}
	public function configuration_option()
	{
		$ajax_data['status'] = 0;
		$ajax_data['error'] = 0;
		if($this->input->post()) {
			if(!$this->input->post('system_email_address') && !$this->input->post('website_time_zone') && !$this->input->post('facebook_app_id') && !$this->input->post('facebook_app_secret') && !$this->input->post('twitter_app_id') && !$this->input->post('twitter_app_secret') && !$this->input->post('google_app_id') && !$this->input->post('google_app_secret') && !$this->input->post('linkedin_app_id') && !$this->input->post('linkedin_app_secret')) {
				$ajax_data['error'] = 1;
				$ajax_data['status'] = "invalid";
				echo json_encode($ajax_data);
			}
			else {
				$data_values = $this->setting_model->insert_configuration_option('update');
				$ajax_data['error'] = 1;
				$ajax_data['status'] = $data_values['status'];
				echo json_encode($ajax_data);
			}
		}
		else {
			$data['status'] = 0;
			$data_values = $this->setting_model->insert_configuration_option('init');
			$data['payment_values'] = $data_values['payment_values'];
			$this->load->view('admin/configuration_option');
	}
}
	public function template_logo()
	{
		$ajax_data['status'] = 0;
		$ajax_data['error'] = 0;
		if($this->input->post()) {
			if(!$this->input->post('template_logo') && !$this->input->post('template_logo_text')) {
				$ajax_data['error'] = 1;
				$ajax_data['status'] = "invalid";
				echo json_encode($ajax_data);
			}
			else {
				$data_values = $this->setting_model->insert_template_logo('update');
				$ajax_data['error'] = 1;
				$ajax_data['status'] = $data_values['status'];
				echo json_encode($ajax_data);
			}
		}
		else {
			$data['status'] = 0;
			$data_values = $this->setting_model->insert_template_logo('init');
			$data['payment_values'] = $data_values['payment_values'];
			$this->load->view('admin/template_logo');
	}
}
	

	
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
