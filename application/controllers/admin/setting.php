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

			$validation = array(
								array(
									'field'  => 'system_email',
									'label'  => 'System Email',
									'rules'  =>  'trim|xss_clean|required|valid_email'
								),
								array(
									'field'  => 'fb_status',
									'label'  => 'Facebook Login Status',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'fb_id',
									'label'  => 'Facebook App ID',
									'rules'  =>  'trim|xss_clean|required|max_length[100]'
								),
								array(
									'field'  => 'fb_key',
									'label'  => 'Facebook Secret Key',
									'rules'  => 'trim|xss_clean|required|max_length[100]'
								),
								array(
									'field'  => 'tw_status',
									'label'  => 'Twitter Login Status',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'tw_id',
									'label'  => 'Twitter App ID',
									'rules'  => 'trim|xss_clean|required|max_length[100]'
								),
								array(
									'field'  => 'tw_key',
									'label'  => 'Twitter Secret Key',
									'rules'  => 'trim|xss_clean|required|max_length[100]'
								),
								array(
									'field'  => 'go_status',
									'label'  => 'Google Plus Login Status',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'go_id',
									'label'  => 'Google Plus App ID',
									'rules'  => 'trim|xss_clean|required|max_length[100]'
								),
								array(
									'field'  => 'go_key',
									'label'  => 'Google Plus Secret Key',
									'rules'  => 'trim|xss_clean|required|max_length[100]'
								),
								array(
									'field'  => 'go_dev_key',
									'label'  => 'Google Plus Developer Key',
									'rules'  => 'trim|xss_clean|required|max_length[100]'
								),
								array(
									'field'  => 'li_status',
									'label'  => 'Linkedin Login Status',
									'rules'  =>  'trim|xss_clean|required'
								),
								array(
									'field'  => 'li_id',
									'label'  => 'Linkedin App ID',
									'rules'  => 'trim|xss_clean|required|max_length[100]'
								),
								array(
									'field'  => 'li_key',
									'label'  => 'Linkedin Secret Key',
									'rules'  => 'trim|xss_clean|required|max_length[100]'
								),
								array(
									'field'  => 'grace_days',
									'label'  => 'Grace Period Days',
									'rules'  => 'trim|xss_clean|required|max_length[9]'
								),
								array(
									'field'  => 'grace_sms',
									'label'  => 'Grace Period Sms Count',
									'rules'  => 'trim|xss_clean|required|max_length[5]'
								),
								array(
									'field'  => 'grace_email',
									'label'  => 'Grace Period Email Count',
									'rules'  =>  'trim|xss_clean|required|max_length[5]'
								),
								array(
									'field'  => 'grace_resume',
									'label'  => 'Grace Period Resume Count',
									'rules'  => 'trim|xss_clean|required|max_length[5]'
								),
								array(
									'field'  => 'grace_ad',
									'label'  => 'Grace Period Ad Count',
									'rules'  => 'trim|xss_clean|required|max_length[5]'
								),
								array(
									'field'  => 'grace_vac',
									'label'  => 'Grace Period Vacancy Count',
									'rules'  => 'trim|xss_clean|required|max_length[5]'
								)
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
				$data_values = $this->setting_model->insert_configuration_option('update');
				$ajax_data['error'] = $data_values['error'];
				$ajax_data['status'] = $data_values['status'];	
			}
			echo json_encode($ajax_data);
		}
		else {
			$data_values = $this->setting_model->insert_configuration_option('init');
			$data['configuration'] = $data_values['configuration'];
			$this->load->view('admin/configuration_option',$data);
		}
	}
	public function template_logo()
	{
		$this->load->library(array('upload')); 
		if($this->input->post()) {
			$validation = array(
								array(
									'field'  => 'template_logo',
									'label'  => 'Template Logo',
									'rules'  =>  'trim|xss_clean|callback_validate_logo_type'
								),
								array(
									'field'  => 'template_logo_text',
									'label'  => 'Template Alternate Text',
									'rules'  =>  'trim|xss_clean|required'
								)
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
				$upload_image_path = TEMPLATE_LOGO;
	    		if(!empty($_FILES['template_logo']['name']))
	        	{
				 	$config['upload_path'] = APPPATH . '../'.$upload_image_path; // APPPATH means our application folder path.
			        $config['allowed_types'] = 'jpg|jpeg|png'; // Allowed tupes
			        $config['encrypt_name'] = TRUE; // Encrypted file name for security purpose
			        $config['max_size']    = '1024'; // Maximum size - 2MB
			    	$config['max_width']  = '1024'; // Maximumm width - 1024px
			    	$config['max_height']  = '768'; // Maximum height - 768px
			        $this->upload->initialize($config); // Initialize the configuration

	      			if($this->upload->do_upload('template_logo'))
	          		{
	              		$upload_data = $this->upload->data(); 

	              		$input_data = array(
	              							'template_logo' => base_url().$upload_image_path.$upload_data['file_name'],
	              							'template_logo_text' => $this->input->post('template_logo_text'),
	              							'template_updated_date' => date('Y-m-d H:i:s')
	              							);
						$data_values = $this->setting_model->insert_template_logo($input_data,'update');				
						$ajax_data['status'] = $data_values['status'];
			            $ajax_data['error'] = $data_values['error'];
						
				        if($this->input->post('old_file_path')) {
	               			@unlink($this->input->post('old_file_path'));
				        }
	            	}
	   		      	else
	           		{
	           			$ajax_data['status'] = strip_tags($this->upload->display_errors());
			            $ajax_data['error'] = 1;
	               	}	
	           	}
	           	else {
           			$input_data = array(
              							// 'template_logo' => $this->input->post('old_file_path'),
              							'template_logo_text' => $this->input->post('template_logo_text'),
              							'template_updated_date' => date('Y-m-d H:i:s')
              							);
					$data_values = $this->setting_model->insert_template_logo($input_data,'update');				
					$ajax_data['status'] = $data_values['status'];
		           	$ajax_data['error'] = $data_values['error'];
	           	}
			}
			echo json_encode($ajax_data);
		}
		else {
			$data_values = $this->setting_model->insert_template_logo(NULL,'init');
			$data['logo_values'] = $data_values['logo_values'];
			$this->load->view('admin/template_logo',$data);
		}
	}

public function bank_details()
	{		
		$this->load->view('admin/bank_details');
	}	


	function validate_logo_type($value) {

        if(isset($_FILES['template_logo']) && !empty($_FILES['template_logo']['name'])) // Check it is exists and not empty
        {
           return TRUE;
        }
        else if(isset($_POST['old_file_path']) && !empty($_POST['old_file_path']))
        {
        	
        	return TRUE;
        }
        else {
        	$_POST['template_logo'] = NULL; //
            $this->form_validation->set_message('validate_logo_type', "The %s field is required");
            return FALSE;
        }
    }
	

	
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
