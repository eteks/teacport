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

	// Edit unique function - To check the field is already exists or not
	function edit_unique($value, $params) 
	{
		//get main CodeIgniter object
	    $CI =& get_instance();
	    //load database library
	    $CI->load->database();    
	    $CI->form_validation->set_message('edit_unique', "Sorry, that %s is already being used.");
	    list($table, $id, $field, $current_id) = explode(".", $params);    
	    $query = $CI->db->select()->from($table)->where($field, $value)->limit(1)->get();    
	    if ($query->row() && $query->row()->$id != $current_id)
	    {
	        return FALSE;
	    }
	}

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
		                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_subscription.subscription_id.subscription_plan.'.$id.']'

		                            ),
		                            array(
		                                 'field'   => 'sub_price',
		                                 'label'   => 'Price',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_start_validity',
		                                 'label'   => 'Plan Start validity',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_end_validity',
		                                 'label'   => 'Plan End validity',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_vacancy',
		                                 'label'   => 'Max vacancy',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_sms',
		                                 'label'   => 'Max SMS',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_email',
		                                 'label'   => 'Max Email',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_resume',
		                                 'label'   => 'Max Resume',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_ads',
		                                 'label'   => 'Max Ads',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_days_ad_visible',
		                                 'label'   => 'Max Days Ad visible',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_features',
		                                 'label'   => 'Plan Features',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
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
		                              'rules'   => 'trim|required|xss_clean|is_unique[tr_subscription.subscription_plan]'

		                            ),
		                            array(
		                                 'field'   => 'sub_price',
		                                 'label'   => 'Price',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_start_validity',
		                                 'label'   => 'Plan Start validity',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_end_validity',
		                                 'label'   => 'Plan End validity',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_vacancy',
		                                 'label'   => 'Max vacancy',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_sms',
		                                 'label'   => 'Max SMS',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_email',
		                                 'label'   => 'Max Email',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_resume',
		                                 'label'   => 'Max Resume',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_ads',
		                                 'label'   => 'Max Ads',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_max_days_ad_visible',
		                                 'label'   => 'Max Days Ad visible',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'sub_features',
		                                 'label'   => 'Plan Features',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
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
			redirect(base_url().'admin/admin_error');
		}
	}
	public function plan_upgrade_creation()
	{
		$data['subscription_plans'] = $this->subscription_plan_model->plan_subscription_details('init');

		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	  		$id = $this->input->post('rid');
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'act_org_name',
		                              'label'   => 'Organization Name',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'act_cand_name',
		                                 'label'   => 'Candidate Name',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                        );
	 		$this->form_validation->set_rules($validation_rules);
	  		if ($this->form_validation->run() == FALSE) {   
		        foreach($validation_rules as $row){
		          $field = $row['field'];         //getting field name
		          $error = form_error($field);    //getting error for field name
		          if($error){
		            $data['status'] = strip_tags($error);
		            $data['error'] = 1;
		            break;
		          }
		        }
	  		}
      		else {
         		$data_values = $this->job_providermodel->teacport_organization_activities('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->job_providermodel->teacport_organization_activities('delete'); 	
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
			$data_ajax['pro_activities'] = $data_values['pro_activities'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/plan_upgrade_creation',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['subscription_plan_upgrade'] = $data_values['subscription_plan_upgrade'];
			$this->load->view('admin/plan_upgrade_creation',$data);
		}	
	}
	public function organization_plan_notification()
	{
		$this->load->view('admin/organization_plan_notification');
	}
}
/* End of file Subscription_Plan.php */ 
/* Location: ./application/controllers/Subscription_Plan.php */
