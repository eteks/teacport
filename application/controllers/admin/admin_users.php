<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_users_model');
		$this->load->library('form_validation');
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

	public function oldpassword_check($value,$params){
		//get main CodeIgniter object
	    $CI =& get_instance();
	    //load database library
	    $CI->load->database();    
	    $CI->form_validation->set_message('oldpassword_check', "Sorry, that %s is not match.");
	    list($table, $id, $field, $current_id) = explode(".", $params);    
	    $query = $CI->db->select()->from($table)->where($id, $current_id)->limit(1)->get();    
	    if ($query->row() && $query->row()->$field != $value)
	    {
	        return FALSE;
	    }
	}

	// State - Add Edit Delete View
	public function user_groups()
	{	
		//Functionality for Both update and save
		if(($this->input->post('action')=='update' && $this->input->post('rid')) || ($this->input->post('action')=='save')){
				if($this->input->post('action')=='update'){
					$id = $this->input->post('rid');
					$validation_rules = array(
		                            array(
		                              'field'   => 'user_group_name',
		                              'label'   => 'Group Name',
		                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_state.state_id.state_name.'.$id.']'

		                            ),
		                            array(
		                                 'field'   => 'user_group_description',
		                                 'label'   => 'Group Description',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'user_group_status',
		                                 'label'   => 'Group Status',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                        );
				}
				else{
					$validation_rules = array(
		                            array(
		                              'field'   => 'user_group_name',
		                              'label'   => 'Group Name',
		                              'rules'   => 'trim|required|xss_clean|is_unique[tr_admin_user_groups.user_group_name]'

		                            ),
		                            array(
		                                 'field'   => 'user_group_description',
		                                 'label'   => 'Group Description',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'user_group_status',
		                                 'label'   => 'Group Status',
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
	         		$data_values = $this->admin_users_model->user_groups($this->input->post('action')); //the value here will be pass either "update" or "save"
	         		$data['error'] = $data_values['error'];
			        $data['status'] = $data_values['status'];
	     		}
		}
		
    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_users_model->user_groups('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_users_model->user_groups('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['group_values'] = $data_values['group_values'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			// print_r($data_ajax['group_values']);
			$result['output'] = $this->load->view('admin/user_groups',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['group_values'] = $data_values['group_values'];
			$this->load->view('admin/user_groups',$data);
		}
	}
    public function user_accounts()
	{	
			$this->load->view('admin/user_accounts');
	}
	public function privileges()
	{	
			$this->load->view('admin/privileges');
	}
	public function edit_profile()
	{	
		$data['admin_values'] = $this->admin_users_model->teac_admin_edit_profile('init');
		$this->load->view('admin/edit_profile',$data);	
	}

	public function edit_profile_validation()
	{	
		$data['status'] = 0;
		$session_data = $this->session->userdata('login_session');
		$id = $session_data['admin_user_id'];
		$validation_rules = array(
 					          	array(
  			                        'field'   => 'user_name',
		 	                        'label'   => 'User Name',
		     	                    'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_admin_users.admin_user_id.admin_user_name.'.$id.']'
		 	                    ),
		 	                    array(
		 	                        'field'   => 'user_email',
		                            'label'   => 'User Mail',
		                            'rules'   => 'trim|required|xss_clean|valid_email|callback_edit_unique[tr_admin_users.admin_user_id.admin_user_email.'.$id.']'
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
			$data_values = $this->admin_users_model->teac_admin_edit_profile('update'); 
		 	$data['status'] = $data_values['status'];
		}
		echo $data['status'];
	}


	// Change password
	public function change_password()
	{	
		$this->load->view('admin/change_password');
	}

	// Change password validation
	public function change_password_validation()
	{	
		$data['status'] = 0;
		$session_data = $this->session->userdata('login_session');
		$id = $session_data['admin_user_id'];
		$validation_rules = array(
 					          	array(
				                	'field'   => 'current_pass',
				                 	'label'   => 'Current Password',
				                 	'rules'   => 'trim|required|xss_clean|callback_oldpassword_check[tr_admin_users.admin_user_id.admin_user_password.'.$id.']'
				              	),
				            	array(
				                 	'field'   => 'new_pass',
				                 	'label'   => 'New password',
				                 	'rules'   => 'trim|required|xss_clean'
				              	),
				            	array(
				                 	'field'   => 'new_pass_confirm',
				                 	'label'   => 'Confirm password',
				                 	'rules'   => 'trim|required|matches[new_pass]'
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
			$data_values = $this->admin_users_model->teac_admin_change_password(); 
		 	$data['status'] = $data_values['status'];
		}
		echo $data['status'];
	}


}
/* End of file Admin_users.php */ 
/* Location: ./application/controllers/Admin_users.php */