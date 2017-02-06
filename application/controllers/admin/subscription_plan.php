<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscription_Plan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/subscription_plan_model');
		$this->load->model('admin/admin_model');
		$this->load->library('form_validation');
		$this->load->helper('custom');
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');

	}

	public function compareDate() {
	  $start = explode('/', $_POST['sub_start_validity']);
      $startDate = $start[2]."-".$start[1]."-".$start[0];
      $end = explode('/', $_POST['sub_end_validity']);
      $endDate = $end[2]."-".$end[1]."-".$end[0];
	  if (strtotime($endDate) >= strtotime($startDate))
	    return True;
	  else {
	    $this->form_validation->set_message('compareDate', '%s should be greater than Validity Start Date.');
	    return False;
	  }
	}

	// public function checkDateFormat($date) {
	// 	if (preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/", $date)) {
	// 		if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
	// 			return true;
	// 		else{
	// 			$this->form_validation->set_message('checkDateFormat', "Date Format must be in the format dd/mm/yyyy");
	// 			return false;
	// 		}		
	// 	} 
	// 	else {
	// 		$this->form_validation->set_message('checkDateFormat', "Date Format must be in the format dd/mm/yyyy");
	// 		return false;
	// 	}
	// } 

	// Job provider profile
	public function subscription_plans()
	{
		//Functionality for Both update and save
		if(($this->input->post('action')=='update' && $this->input->post('rid')) || ($this->input->post('action')=='save')){

				if($this->input->post('action')=='update'){
					$id = $this->input->post('rid');
					$validation_rules = array(
		                            array(
		                              'field'   => 'sub_plan',
		                              'label'   => 'Plan Name',
		                              'rules'   => 'trim|required|xss_clean|min_length[3]|max_length[50]|edit_unique[tr_subscription.subscription_id.subscription_plan.'.$id.']'
		                              //edit_unique is a custom funciton
		                            ),
		                            array(
		                                 'field'   => 'sub_price',
		                                 'label'   => 'Price',
		                                 'rules'   => 'trim|required|xss_clean|max_length[9]|regex_match[/^([0-9]+(.[0-9]+)?)*$/]'
		                            ),
		                            array(
		                                 'field'   => 'validity_days',
		                                 'label'   => 'Validity Days',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[4]|'
		                            ),
		                            // array(
		                            //      'field'   => 'sub_start_validity',
		                            //      'label'   => 'Plan Start validity',
		                            //      'rules'   => 'trim|required|xss_clean'
		                            // ),
		                            // array(
		                            //      'field'   => 'sub_end_validity',
		                            //      'label'   => 'Plan End validity',
		                            //      // 'rules'   => 'trim|required|xss_clean|callback_checkDateFormat|callback_compareDate'
		                            //      'rules'   => 'trim|required|xss_clean|callback_compareDate'
		                            // ),
		                            array(
		                                 'field'   => 'sub_max_vacancy',
		                                 'label'   => 'Max vacancy',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_sms',
		                                 'label'   => 'Max SMS',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_email',
		                                 'label'   => 'Max Email',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_resume',
		                                 'label'   => 'Max Resume',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_ads',
		                                 'label'   => 'Max Ads',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_days_ad_visible',
		                                 'label'   => 'Max Days Ad visible',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[3]|'
		                            ),
		                            // array(
		                            //      'field'   => 'sub_features',
		                            //      'label'   => 'Plan Features',
		                            //      'rules'   => 'trim|required|xss_clean|min_length[10]|max_length[150]'
		                            // ),
		                            array(
		                                 'field'   => 'sub_status',
		                                 'label'   => 'Plan Status',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                        );
				}
				else{
					$validation_rules = array(
		                            array(
		                              'field'   => 'sub_plan',
		                              'label'   => 'Plan Name',
		                              'rules'   => 'trim|required|xss_clean|min_length[3]|max_length[50]|is_unique[tr_subscription.subscription_plan]'

		                            ),
		                            array(
		                                 'field'   => 'sub_price',
		                                 'label'   => 'Price',
		                                 'rules'   => 'trim|required|xss_clean|max_length[9]|regex_match[/^([0-9]+(.[0-9]+)?)*$/]'
		                            ),
		                            // array(
		                            //      'field'   => 'sub_start_validity',
		                            //      'label'   => 'Plan Start validity',
		                            //      'rules'   => 'trim|required|xss_clean'
		                            // ),
		                            // array(
		                            //      'field'   => 'sub_end_validity',
		                            //      'label'   => 'Plan End validity',
		                            //      'rules'   => 'trim|required|xss_clean|callback_compareDate'
		                            // ),
		                            array(
		                                 'field'   => 'sub_max_vacancy',
		                                 'label'   => 'Max vacancy',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_sms',
		                                 'label'   => 'Max SMS',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_email',
		                                 'label'   => 'Max Email',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_resume',
		                                 'label'   => 'Max Resume',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_ads',
		                                 'label'   => 'Max Ads',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_days_ad_visible',
		                                 'label'   => 'Max Days Ad visible',
		                                 'rules'   => 'trim|required|xss_clean|numeric|max_length[15]|'
		                            ),
		                            // array(
		                            //      'field'   => 'sub_features',
		                            //      'label'   => 'Plan Features',
		                            //      'rules'   => 'trim|required|xss_clean|min_length[10]|max_length[150]'
		                            // ),
		                            array(
		                                 'field'   => 'sub_status',
		                                 'label'   => 'Plan Status',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                        );
				}
				$this->form_validation->set_rules($validation_rules);
		  		if ($this->form_validation->run() == FALSE) {   
			        foreach($validation_rules as $row){
			          $field = $row['field'];         //getting field name
			          $error = form_error($field);    //getting error for field name
			          //form_error() is inbuilt function
			          //if error is their for field then only add in $errors_array array
			          if($error){
			            $data['status'] = strip_tags($error);
			            $data['error'] = 1;
			            break;
			          }
			        }
		  		}
	      		else {
	         		$data_values = $this->subscription_plan_model->plan_subscription_details($this->input->post('action')); //the value here will be pass either "update" or "save"
	         		$data['error'] = $data_values['error'];
			        $data['status'] = $data_values['status'];
	     		}
		}
		
    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->subscription_plan_model->plan_subscription_details('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->subscription_plan_model->plan_subscription_details('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['subscription_plans'] = $data_values['subscription_plans'];
			$data_ajax['status'] = $data['status'];
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/subscription_plans',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['subscription_plans'] = $data_values['subscription_plans'];
			$this->load->view('admin/subscription_plans',$data);
		}
	}
	// subscription plan creation - ajax while click edit button
	public function subscription_plans_ajax()
	{
		if($this->input->post('action') && $this->input->post('value')) {
			$value = $this->input->post('value');
			$data['subscription_plan_details'] = $this->subscription_plan_model->get_plan_subscription_details($value);
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/subscription_plans',$data);
		}
		else {
			redirect(base_url().'main/admin_error');
		}
	}
	// public function plan_upgrade_creation()
	// {	
	// 	$data['subscription_plans'] = $this->subscription_plan_model->plan_subscription_details('init')['subscription_plans'];
	// 	// Update and save data
	//    if(($this->input->post('action')=='update' && $this->input->post('rid')) || ($this->input->post('action')=='save')){
	//    		$validation_rules = array(
	// 	                            array(
	// 	                              'field'   => 'subscription_name',
	// 	                              'label'   => 'Subscription Plan',
	// 	                              'rules'   => 'trim|required|xss_clean|'

	// 	                            ),
	// 	                           	array(
	// 	                              'field'   => 'sms_count',
	// 	                              'label'   => 'SMS count',
	// 	                              'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'

	// 	                            ),
	// 	                            array(
	// 	                              'field'   => 'email_count',
	// 	                              'label'   => 'Email count',
	// 	                              'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
	// 	                            ),
	// 	                            array(
	// 	                              'field'   => 'resume_count',
	// 	                              'label'   => 'Resume count',
	// 	                              'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
	// 	                            ),
	// 	                            array(
	// 	                              'field'   => 'price',
	// 	                              'label'   => 'Price',
	// 	                              'rules'   => 'trim|required|xss_clean|max_length[9]|regex_match[/^([0-9]+(.[0-9]+)?)*$/]'
	// 	                            ),
	// 	                            array(
	// 	                                 'field'   => 'plan_upgrade_creation_status',
	// 	                                 'label'   => 'Plan Upgrade Status',
	// 	                                 'rules'   => 'trim|required|xss_clean|'
	// 	                            ),
	// 	                        );
	//  		$this->form_validation->set_rules($validation_rules);
	//   		if ($this->form_validation->run() == FALSE) {   
	// 	        foreach($validation_rules as $row){
	// 	          $field = $row['field'];         //getting field name
	// 	          $error = form_error($field);    //getting error for field name
	// 	          //form_error() is inbuilt function
	// 	          //if error is their for field then only add in $errors_array array
	// 	          if($error){
	// 	            $data['status'] = strip_tags($error);
	// 	            $data['error'] = 1;
	// 	            break;
	// 	          }
	// 	        }
	//   		}
 //      		else {
 //         		$data_values = $this->subscription_plan_model->plan_subscription_upgrade_details($this->input->post('action'));//the value here will be pass either "update" or "save"
 //         		$data['error'] = $data_values['error'];
	// 	        $data['status'] = $data_values['status'];
 //     		}
	//     }

 //    	// Delete data
 //    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
 //      		$data_values = $this->subscription_plan_model->plan_subscription_upgrade_details('delete'); 	
 //      		$data['error'] = $data_values['error'];
	// 	    $data['status'] = $data_values['status'];
 //      	}
 //      	else {
 //      		$data['error'] = 0;
	// 	    $data['status'] = 0;
 //      		$data_values = $this->subscription_plan_model->plan_subscription_upgrade_details('init');
 //      	}

	// 	if($data['error']==1) {
	// 		$result['status'] = $data['status'];
	// 		$result['error'] = $data['error'];	
	// 		echo json_encode($result);
	// 	}
	// 	else if($data['error']==2) {
	// 		$data_ajax['subscription_plan_upgrade'] = $data_values['subscription_plan_upgrade'];
	// 		$data_ajax['status'] = $data['status'];
	// 		$result['error'] = $data['error'];
	// 		$result['output'] = $this->load->view('admin/plan_upgrade_creation',$data_ajax,true);
	// 		echo json_encode($result);
	// 	}
	// 	else {
	// 		$data['subscription_plan_upgrade'] = $data_values['subscription_plan_upgrade'];
	// 		$this->load->view('admin/plan_upgrade_creation',$data);
	// 	}

	// }

	public function customize_plan_settings(){
		$data['subscription_plans'] = $this->subscription_plan_model->plan_subscription_details('init')['subscription_plans'];
		// Update and save data
	   if(($this->input->post('action')=='update' && $this->input->post('rid')) || ($this->input->post('action')=='save')){
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'subscription_name',
		                              'label'   => 'Subscription Plan',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                              'field'   => 'upgrade_option[]',
		                              'label'   => 'Upgrade option',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                              'field'   => 'upgrade_price[]',
		                              'label'   => 'Upgrade Price',
		                              'rules'   => 'trim|required|xss_clean|max_length[9]|regex_match[/^([0-9]+(.[0-9]+)?)*$/]'
		                            ),
		                           	array(
		                              'field'   => 'upgrade_min[]',
		                              'label'   => 'Minimum allowed',
		                              'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'

		                            ),
		                            array(
		                              'field'   => 'upgrade_max[]',
		                              'label'   => 'Maximum allowed',
		                              'rules'   => 'trim|required|xss_clean|numeric|max_length[5]|'
		                            ),
		                        );
	 		$this->form_validation->set_rules($validation_rules);
	  		if ($this->form_validation->run() == FALSE) {   
		        foreach($validation_rules as $row){
		          $field = $row['field'];         //getting field name
		          $error = form_error($field);    //getting error for field name
		          //form_error() is inbuilt function
		          //if error is their for field then only add in $errors_array array
		          if($error){
		            $data['status'] = strip_tags($error);
		            $data['error'] = 1;
		            break;
		          }
		        }
	  		}
      		else {
         		$data_values = $this->subscription_plan_model->plan_subscription_upgrade_details($this->input->post('action'));//the value here will be pass either "update" or "save"
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }
	    // Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->subscription_plan_model->plan_subscription_upgrade_details('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->subscription_plan_model->plan_subscription_upgrade_details('init');
      	}
	    if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			// $data_ajax['subscription_plan_upgrade'] = $data_values['subscription_plan_upgrade'];
			//To group data by subscription id from plan ugrade data array
		    $res = array();
		    foreach($data_values['subscription_plan_upgrade'] as $val) {
		        $res[$val['subscription_plan']][] = $val;		    
			}
			$data_ajax['subscription_plan_upgrade'] = $res;
			$data_ajax['status'] = $result['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/customize_plan_settings',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			// $data['subscription_plan_upgrade'] = $data_values['subscription_plan_upgrade'];	
			//To group data by subscription id from plan ugrade data array
		    $res = array();
		    foreach($data_values['subscription_plan_upgrade'] as $val) {
		        $res[$val['subscription_plan']][] = $val;		    
			}
			// echo "<pre>";
			// print_r($res);
			// echo "</pre>";
			$data['subscription_plan_upgrade'] = $res;
			$this->load->view('admin/customize_plan_settings',$data);
		}
	}

	
	
}
/* End of file Subscription_Plan.php */ 
/* Location: ./application/controllers/Subscription_Plan.php */
