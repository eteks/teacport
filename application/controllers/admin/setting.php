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
			$validation = array(
								array(
									'field'  => 'merchant_id',
									'label'  => 'Merchant ID',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'merchant_accesscode',
									'label'  => 'Merchant Access Code',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'merchant_workingkey',
									'label'  => 'Merchant Working Key',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'payment_base_url',
									'label'  => 'Payment Base Url',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'bank_name',
									'label'  => 'Bank Name',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'holder_name',
									'label'  => 'Account Holder Name',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'account_num',
									'label'  => 'Account Number',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'ifsc_code',
									'label'  => 'IFSC Code',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'branch_name',
									'label'  => 'Branch Name',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'branch_code',
									'label'  => 'Branch Code',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'mobile_num',
									'label'  => 'Mobile Number',
									'rules'  =>  'trim|xss_clean|required|exact_length[10]'
								),
								array(
									'field'  => 'email',
									'label'  => 'Email',
									'rules'  =>  'trim|xss_clean|required|valid_email'
								),
								array(
									'field'  => 'address',
									'label'  => 'Address',
									'rules'  =>  'trim|xss_clean|required|'
								),
						);
			$this->form_validation->set_rules($validation);
			if($this->form_validation->run() == FALSE) {
				foreach($validation as $row){
			        $field = $row['field'];
			        $error = form_error($field);
			        if($error){
			    	    $ajax_data['status'] = strip_tags($error);
			            $ajax_data['error'] = 1;
			            break;
			        }
			    }
			}
			else {
				$data_values = $this->setting_model->insert_payment_gateway('update');
				$ajax_data['error'] = 2;
				$ajax_data['status'] = $data_values['status'];	
			}
			echo json_encode($ajax_data);
		}
		else {
			$ajax_data['status'] = 0;
			$data_values = $this->setting_model->insert_payment_gateway('init');
			$data['payment_values'] = $data_values['payment_values'];
			$this->load->view('admin/payment_gateway',$data);
		}
	}

	public function sms_gateway()
	{	
		$data['status'] = '';
		if($this->input->post()) {
			$this->form_validation->set_error_delimiters('<div class="admin_form_error">','</div>');
			$this->form_validation->set_rules('sms_api_url','Sms Api Url','trim|xss_clean|required');
			$this->form_validation->set_rules('sms_username','Sms Username','trim|xss_clean|required');
			$this->form_validation->set_rules('sms_password','Sms Password','trim|xss_clean|required');
			$this->form_validation->set_rules('sms_senderid','Sms SenderID','trim|xss_clean|required');
			$this->form_validation->set_rules('sms_priority','Sms Priority','trim|xss_clean|required');
			$this->form_validation->set_rules('sms_type','Sms Type','trim|xss_clean|required');
			if($this->form_validation->run()) {
				$data_values = $this->setting_model->insert_sms_gateway('update');
				$data['payment_values'] = $data_values['payment_values'];
				$data['status'] = $data_values['status'];
				$this->load->view('admin/sms_gateway',$data);
			}
			else {
				$this->load->view('admin/sms_gateway');
			}
		}
		else {
			$data_values = $this->setting_model->insert_sms_gateway('init');
			$data['payment_values'] = $data_values['payment_values'];
			$this->load->view('admin/sms_gateway',$data);
		}
	}

	public function configuration_option()
	{
		if($this->input->post()) {
			if(!$this->input->post('system_email_address') && !$this->input->post('website_time_zone') && !$this->input->post('facebook_app_id') && !$this->input->post('facebook_app_secret') && !$this->input->post('twitter_app_id') && !$this->input->post('twitter_app_secret') && !$this->input->post('google_app_id') && !$this->input->post('google_app_secret') && !$this->input->post('linkedin_app_id') && !$this->input->post('linkedin_app_secret')) {
				$ajax_data['error'] = 1;
				$ajax_data['status'] = "Please Enter Atleast One Data";
				echo json_encode($ajax_data);
			}
			else {
				$data_values = $this->setting_model->insert_configuration_option('update');
				$ajax_data['error'] = 2;
				$ajax_data['status'] = $data_values['status'];
				echo json_encode($ajax_data);
			}
		}
		else {
			$ajax_data['status'] = 0;
			$data_values = $this->setting_model->insert_configuration_option('init');
			$data['payment_values'] = $data_values['payment_values'];
			$this->load->view('admin/configuration_option',$data);
	}
}
	public function template_logo()
	{
		if($this->input->post()) {
			if(!$this->input->post('template_logo') && !$this->input->post('template_logo_text')) {
				$ajax_data['error'] = 1;
				$ajax_data['status'] = "Please Enter Atleast One Data";
				echo json_encode($ajax_data);
			}
			else {
				$data_values = $this->setting_model->insert_template_logo('update');
				$ajax_data['error'] = 2;
				$ajax_data['status'] = $data_values['status'];
				echo json_encode($ajax_data);
			}
		}
		else {
			$ajax_data['status'] = 0;
			$data_values = $this->setting_model->insert_template_logo('init');
			$data['payment_values'] = $data_values['payment_values'];
			$this->load->view('admin/template_logo',$data);
	}
}

public function bank_details()
	{		
		$this->load->view('admin/bank_details');
	}	

	

	
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
