<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_users_model');
		$this->load->library('form_validation');
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');
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
		                              'rules'   => 'trim|required|xss_clean|edit_unique[tr_admin_user_groups.user_group_id.user_group_name.'.$id.']'
		                              //edit_unique is a custom funciton

		                            ),
		                            array(
		                                 'field'   => 'user_group_description',
		                                 'label'   => 'Group Description',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'user_super_admin',
		                                 'label'   => 'Admin Type',
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
		                                 'field'   => 'user_super_admin',
		                                 'label'   => 'Admin Type',
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
			$data_ajax['mapped_data'] = $data_values['mapped_data'];
			$result['error'] = $data['error'];
			// print_r($data_ajax['group_values']);
			$result['output'] = $this->load->view('admin/user_groups',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['group_values'] = $data_values['group_values'];
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/user_groups',$data);
		}
	}
    public function user_accounts()
	{
		$session_data = $this->session->userdata('admin_login_session');
		//Functionality for Both update and save
		if(($this->input->post('action')=='update' && $this->input->post('rid')) || ($this->input->post('action')=='save')){
				if($this->input->post('action')=='update'){
					$id = $this->input->post('rid');
					$validation_rules = array(
		                            array(
		                              'field'   => 'admin_user_name',
		                              'label'   => 'Username',
		                              'rules'   => 'trim|required|xss_clean|edit_unique[tr_admin_users.admin_user_id.admin_user_name.'.$id.']'
		                              //edit_unique is a custom funciton

		                            ),
		                            array(
		                                 'field'   => 'admin_user_password',
		                                 'label'   => 'Password',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'admin_user_email',
		                                 'label'   => 'User Email',
		                                 'rules'   => 'trim|required|xss_clean|valid_email|edit_unique[tr_admin_users.admin_user_id.admin_user_email.'.$id.']'
		                                 //edit_unique is a custom funciton
		                            ),
		                            array(
		                                 'field'   => 'admin_user_group',
		                                 'label'   => 'Group',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'admin_user_status',
		                                 'label'   => 'User Status',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                        );
				}
				else{
					$validation_rules = array(
	                            array(
	                              'field'   => 'admin_user_name',
	                              'label'   => 'Username',
	                              'rules'   => 'trim|required|xss_clean|is_unique[tr_admin_users.admin_user_name]'
	                            ),
	                            array(
	                                 'field'   => 'admin_user_password',
	                                 'label'   => 'Password',
	                                 'rules'   => 'trim|required|xss_clean|'
	                            ),
	                            array(
	                                 'field'   => 'admin_user_email',
	                                 'label'   => 'User Email',
	                                 'rules'   => 'trim|required|xss_clean|valid_email|is_unique[tr_admin_users.admin_user_email]'
	                            ),
	                            array(
	                                 'field'   => 'admin_user_group',
	                                 'label'   => 'Group',
	                                 'rules'   => 'trim|required|xss_clean|'
	                            ),
	                            array(
	                                 'field'   => 'admin_user_status',
	                                 'label'   => 'User Status',
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
	         		$data_values = $this->admin_users_model->user_accounts($this->input->post('action')); //the value here will be pass either "update" or "save"
	         		$data['error'] = $data_values['error'];
			        $data['status'] = $data_values['status'];
	     		}
		}
		
    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_users_model->user_accounts('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_users_model->user_accounts('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['user_details'] = $data_values['user_details'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/user_accounts',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['user_details'] = $data_values['user_details'];
			$data['user_groups'] = $this->admin_users_model->get_user_groups(); 
			$this->load->view('admin/user_accounts',$data);
		}	
	}

	public function privileges()
	{	
			$admin_modules = $this->admin_users_model->get_all_modules();
			$res = array();
			foreach($admin_modules as $arr)
			{
			    foreach($arr as $k => $v)
			    {
			        if($k == 'sub_module' || $k == 'module_id')
			            $res[$arr['main_module']][$k] = $this->get_arrayvalues_bykeyvalue($admin_modules, $k, 'main_module', $arr['main_module'],$is_unique = true);
			        else if($k == 'operation_available')
			            $res[$arr['main_module']][$k] = $this->get_arrayvalues_bykeyvalue($admin_modules, $k, 'main_module', $arr['main_module'],$is_unique = false);
			        else
			            $res[$arr['main_module']][$k] = $v;
			    }
			}
			//To pass all the admin modules for setting priveleges
			$data['admin_modules_list'] = $res;
			
			//To pass all the group type for setting priveleges
			$admin_group = $this->admin_users_model->get_admin_groups();
			$res_group = array();
			foreach($admin_group as $arr)
			{
			    foreach($arr as $k => $v)
			    {
			        if($k == 'access_module_id' || $k == 'access_permission')
			            $res_group[$arr['user_group_id']][$k] = $this->get_arrayvalues_bykeyvalue($admin_group, $k, 'user_group_id', $arr['user_group_id'],$is_unique = false);
			        else
			            $res_group[$arr['user_group_id']][$k] = $v;
			    }
			}
			$data['admin_group'] = $res_group;
			if($this->input->is_ajax_request()) {
				$result = $this->admin_users_model->insert_update_admin_prvileges($_POST['module_data']);
				echo json_encode($result);
			}
			else
				$this->load->view('admin/privileges',$data);
	}
	
	public function edit_profile()
	{	
		$data['admin_values'] = $this->admin_users_model->teac_admin_edit_profile('init');
		$this->load->view('admin/edit_profile',$data);	
	}

	public function edit_profile_validation()
	{	
		$data['status'] = 0;
		$session_data = $this->session->userdata('admin_login_session');
		$id = $session_data['admin_user_id'];
		$user_name = $session_data["admin_user_name"];
		$user_email = $session_data["admin_user_email"];
		$validation_rules = array(
 					          	array(
  			                        'field'   => 'user_name',
		 	                        'label'   => 'User Name',
		     	                    'rules'   => 'trim|required|xss_clean|edit_unique[tr_admin_users.admin_user_id.admin_user_name.'.$id.']'
		 	                    ),
		 	                    array(
		 	                        'field'   => 'user_email',
		                            'label'   => 'User Mail',
		                            'rules'   => 'trim|required|xss_clean|valid_email|edit_unique[tr_admin_users.admin_user_id.admin_user_email.'.$id.']'
		                            //edit_unique is a custom funciton
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
		 	$data['error'] = 2;
			if($user_name!=$_POST['user_name'] || $user_email!=$_POST['user_email'])
				$data['session_data'] = true;
		}
		// echo $data['status'];
		echo json_encode($data);
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
		$session_data = $this->session->userdata('admin_login_session');
		$id = $session_data['admin_user_id'];
		$user_password = $session_data["admin_user_password"];
		$validation_rules = array(
 					          	array(
				                	'field'   => 'current_pass',
				                 	'label'   => 'Current Password',
				                 	'rules'   => 'trim|required|xss_clean|oldpassword_check[tr_admin_users.admin_user_id.admin_user_password.'.$id.']' 
				                 	//oldpassword_check is a custom function
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
		 	$data['error'] = 2;
			if($user_password!=$_POST['new_pass'])
				$data['session_data'] = true;
		}
		echo json_encode($data);
	}
}
/* End of file Admin_users.php */ 
/* Location: ./application/controllers/Admin_users.php */
