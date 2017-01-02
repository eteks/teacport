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
		echo('test');
		$status = array();//array is initialized
		$errors=''; // variable is initialized
		$validation_rules = array(
	       array(
	             'field'   => 'online_transfer_merchant_key',
	             'label'   => 'Merchant Key',
	             'rules'   => 'trim|required|xss_clean|'
	          ),
	       array(
	             'field'   => 'online_transfer_merchant_salt',
	             'label'   => 'Merchant Salt',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'online_transfer_payment_base_url',
	             'label'   => 'Payment url',
	             'rules'   => 'trim|required|xss_clean'
	          ),  
	          array(
	             'field'   => 'bank_transfer_account_name',
	             'label'   => 'Account Name',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	          array(
	             'field'   => 'bank_transfer_account_number',
	             'label'   => 'Account Number',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	          array(
	             'field'   => 'bank_transfer_ifsc_code',
	             'label'   => 'IFSC Code',
	             'rules'   => 'trim|required|xss_clean'
	          ), 
	    );
	    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) {
	    	echo('test1');
	            foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    	}
    	else{
    		if(!empty($_POST)){
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
					'online_transfer_merchant_key' => $this->input->post('online_transfer_merchant_key'),
					'online_transfer_merchant_salt' => $this->input->post('online_transfer_merchant_salt'),
					'online_transfer_payment_base_url' => $this->input->post('online_transfer_payment_base_url'),
					'bank_transfer_account_name' => $this->input->post('bank_transfer_account_name'),
					'bank_transfer_account_number' => $this->input->post('bank_transfer_account_number'),
					'bank_transfer_ifsc_code' => $this->input->post('bank_transfer_ifsc_code'),
					);
					$result = $this->setting_model->insert_payment_gateway($data);
					if($result)
						$status['error_message'] = "Payment Gateway Created Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
			}
    	}
    	if(isset($_POST))
    		$status['photoshoot_type_data'] = array(
					'online_transfer_merchant_key' => $this->input->post('online_transfer_merchant_key'),
					'online_transfer_merchant_salt' => $this->input->post('online_transfer_merchant_salt'),
					'online_transfer_payment_base_url' => $this->input->post('online_transfer_payment_base_url'),
					'bank_transfer_account_name' => $this->input->post('bank_transfer_account_name'),
					'bank_transfer_account_number' => $this->input->post('bank_transfer_account_number'),
					'bank_transfer_ifsc_code' => $this->input->post('bank_transfer_ifsc_code'),
					);
		// print_r($status['error_message']);
		$this->load->view('admin/payment_gateway',$status);
		
	}
	public function sms_gateway()
	{
		echo('test');
		$status = array();//array is initialized
		$errors=''; // variable is initialized
		$validation_rules = array(
	       array(
	             'field'   => 'sms_api_url',
	             'label'   => 'SMS API URL',
	             'rules'   => 'trim|required|xss_clean|valid_url'
	          ),
	       array(
	             'field'   => 'sms_api_key',
	             'label'   => 'SMS API Key',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'sms_authentication_token',
	             'label'   => 'Authentication Token',
	             'rules'   => 'trim|required|xss_clean'
	          ),   
	    );
	    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) {
	    	echo('test1');
	            foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    	}
    	else{
    		if(!empty($_POST)){
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
					'sms_api_url' => $this->input->post('sms_api_url'),
					'sms_api_key' => $this->input->post('sms_api_key'),
					'sms_authentication_token' => $this->input->post('sms_authentication_token'),
					);
					$result = $this->setting_model->insert_sms_gateway($data);
					if($result)
						$status['error_message'] = "SMS Gateway Created Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
			}
    	}
    	if(isset($_POST))
    		$status['photoshoot_type_data'] = array(
					'sms_api_url' => $this->input->post('sms_api_url'),
					'sms_api_key' => $this->input->post('sms_api_key'),
					'sms_authentication_token' => $this->input->post('sms_authentication_token'),
					);
		// print_r($status['error_message']);
		$this->load->view('admin/sms_gateway',$status);
	}
	public function configuration_option()
	{
		echo('test');
		$status = array();//array is initialized
		$errors=''; // variable is initialized
		$validation_rules = array(
	       // array(
	       //       'field'   => 'enable_facebook_login',
	       //       'label'   => 'Merchant Key',
	       //       'rules'   => 'trim|required|xss_clean|'
	       //    ),
			array(
	             'field'   => 'system_email_address',
	             'label'   => 'System Email Address',
	             'rules'   => 'trim|required|xss_clean|valid_email'
	          ),
	        array(
	             'field'   => 'facebook_app_id',
	             'label'   => 'Facebook App ID',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	       array(
	             'field'   => 'facebook_app_secret',
	             'label'   => 'Facebook Secret Key',
	             'rules'   => 'trim|required|xss_clean'
	          ),  
	          // array(
	          //    'field'   => 'enable_twitter_login',
	          //    'label'   => 'Enable Twitter Log In',
	          //    'rules'   => 'trim|required|xss_clean'
	          // ),
	          array(
	             'field'   => 'twitter_app_id',
	             'label'   => 'Twitter Key',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	          array(
	             'field'   => 'twitter_app_secret',
	             'label'   => 'Twitter Secret',
	             'rules'   => 'trim|required|xss_clean'
	          ), 
	          // array(
	          //    'field'   => 'enable_google_login',
	          //    'label'   => 'Enable Google Log In',
	          //    'rules'   => 'trim|required|xss_clean'
	          // ),  
	          array(
	             'field'   => 'google_app_id',
	             'label'   => 'Google Key',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	          array(
	             'field'   => 'google_app_secret',
	             'label'   => 'Google Secret',
	             'rules'   => 'trim|required|xss_clean'
	          ),
	          // array(
	          //    'field'   => 'google_developer_key',
	          //    'label'   => 'IFSC Code',
	          //    'rules'   => 'trim|required|xss_clean'
	          // ),
	          // array(
	          //    'field'   => 'enable_linkedin_login',
	          //    'label'   => 'Enable LinkedIn Log In',
	          //    'rules'   => 'trim|required|xss_clean'
	          // ),  
	          array(
	             'field'   => 'linkedin_app_id',
	             'label'   => 'LinkedIn Key',
	             'rules'   => 'trim|required|xss_clean|'
	          ),
	          array(
	             'field'   => 'linkedin_app_secret',
	             'label'   => 'LinkedIn Secret',
	             'rules'   => 'trim|required|xss_clean'
	          ),	          
	          array(
	             'field'   => 'website_time_zone',
	             'label'   => 'Website Time Zone',
	             'rules'   => 'trim|required|xss_clean'
	          ),

	    );
	    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) {
	    	echo('test1');
	            foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    	}
    	else{
    		if(!empty($_POST)){
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
					// 'enable_facebook_login' => $this->input->post('enable_facebook_login'),
					'facebook_app_id' => $this->input->post('facebook_app_id'),
					'facebook_app_secret' => $this->input->post('facebook_app_secret'),
					'enable_twitter_login' => $this->input->post('enable_twitter_login'),
					'twitter_app_id' => $this->input->post('twitter_app_id'),
					'twitter_app_secret' => $this->input->post('twitter_app_secret'),
					'enable_google_login' => $this->input->post('enable_google_login'),
					'google_app_id' => $this->input->post('google_app_id'),
					'google_app_secret' => $this->input->post('google_app_secret'),
					'google_developer_key' => $this->input->post('google_developer_key'),
					'enable_linkedin_login' => $this->input->post('enable_linkedin_login'),
					'linkedin_app_id' => $this->input->post('linkedin_app_id'),
					'linkedin_app_secret' => $this->input->post('linkedin_app_secret'),
					'system_email_address' => $this->input->post('system_email_address'),
					);
					$result = $this->setting_model->insert_configuration_option($data);
					if($result)
						$status['error_message'] = "Payment Gateway Created Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
			}
    	}
    	if(isset($_POST))
    		$status['photoshoot_type_data'] = array(
					// 'enable_facebook_login' => $this->input->post('enable_facebook_login'),
					'facebook_app_id' => $this->input->post('facebook_app_id'),
					'facebook_app_secret' => $this->input->post('facebook_app_secret'),
					'enable_twitter_login' => $this->input->post('enable_twitter_login'),
					'twitter_app_id' => $this->input->post('twitter_app_id'),
					'twitter_app_secret' => $this->input->post('twitter_app_secret'),
					'enable_google_login' => $this->input->post('enable_google_login'),
					'google_app_id' => $this->input->post('google_app_id'),
					'google_app_secret' => $this->input->post('google_app_secret'),
					'google_developer_key' => $this->input->post('google_developer_key'),
					'enable_linkedin_login' => $this->input->post('enable_linkedin_login'),
					'linkedin_app_id' => $this->input->post('linkedin_app_id'),
					'linkedin_app_secret' => $this->input->post('linkedin_app_secret'),
					'system_email_address' => $this->input->post('system_email_address'),
					);
		// print_r($status['error_message']);
		$this->load->view('admin/configuration_option',$status);
	}
	public function template_logo()
	{
		echo('test');
		$status = array();//array is initialized
		$errors=''; // variable is initialized
		$validation_rules = array(
	       // array(
	       //       'field'   => 'template_logo',
	       //       'label'   => 'Logo',
	       //       'rules'   => 'trim|required|'
	       //    ),
	       array(
	             'field'   => 'template_logo_text',
	             'label'   => 'Logo Text',
	             'rules'   => 'trim|required|xss_clean|'
	          ),
	       array(
	             'field'   => 'template_updated_date',
	             'label'   => 'Logo Updated Date',
	             'rules'   => 'trim|required|xss_clean|'
	          ),
	    );
	    $this->form_validation->set_rules($validation_rules);
	    if ($this->form_validation->run() == FALSE) {
	    	echo('test1');
	            foreach($validation_rules as $row){
		            $field = $row['field'];          //getting field name
		            $error = form_error($field);    //getting error for field name
		                                            //form_error() is inbuilt function
		            //if error is their for field then only add in $errors_array array
		            if($error){
	                    $status['error_message'] = strip_tags($error);
	                    break;
		            }
	        	}
    	}
    	else{
    		if(!empty($_POST)){
				if (!empty($errors)) {
					$status['error_message'] = strip_tags($errors);
				}
				else{
					$data = array(
					'template_logo' => $this->input->post('template_logo'),
					'template_logo_text' => $this->input->post('template_logo_text'),
					'template_updated_date' => $this->input->post('template_updated_date'),
					);
					$result = $this->setting_model->insert_template_logo($data);
					if($result)
						$status['error_message'] = "Template Logo Created Successfully!";
					else
						$status['error_message'] = "Something went Wrong!";
				}		
			}
    	}
    	if(isset($_POST))
    		$status['photoshoot_type_data'] = array(
					'template_logo' => $this->input->post('template_logo'),
					'template_logo_text' => $this->input->post('template_logo_text'),
					'template_updated_date' => $this->input->post('template_updated_date'),
					);
		// print_r($status['error_message']);
		$this->load->view('admin/template_logo',$status);
	}
	public function image_upload()
	{
		if($_FILES['userimage']['size'] != 0){

        $upload_dir = './assets/images/';

        if (!is_dir($upload_dir)) {

             mkdir($upload_dir);

        }  

        $config['upload_path']   = $upload_dir;

        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name']     = 'userimage'.substr(md5(rand()),0,7);

        $config['overwrite']     = false;

        $config['max_size']  = '5120';

 

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userimage')){

            $this->form_validation->set_message('image_upload', $this->upload->display_errors());

            return false;

        }  

        else{

            $this->upload_data['file'] =  $this->upload->data();

            return true;

        }  

    }  

    else{

        $this->form_validation->set_message('image_upload', "No file selected");

        return false;

    }
	}
	

	
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
