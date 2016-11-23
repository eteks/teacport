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

	public function get_arrayvalues_bykeyvalue($array, $key, $key2, $v2)
	{
	    $ret = array();
	    foreach($array as $arr)
	    {
	        foreach($arr as $k => $v)
	        {
	            if($arr[$key2] == $v2)
	            {
	                if($k == $key)
	                    $ret[] = $v;   
	            }
	        }
	    }
	    $u = array_unique($ret);
	    return (sizeof($u) == 1) ? $u[0] : $u;
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
		//Functionality for Both update and save
		if(($this->input->post('action')=='update' && $this->input->post('rid')) || ($this->input->post('action')=='save')){
				if($this->input->post('action')=='update'){
					$id = $this->input->post('rid');
					$validation_rules = array(
		                            array(
		                              'field'   => 'admin_user_name',
		                              'label'   => 'Username',
		                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_admin_users.admin_user_id.admin_user_name.'.$id.']'

		                            ),
		                            array(
		                                 'field'   => 'admin_user_password',
		                                 'label'   => 'Password',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'admin_user_email',
		                                 'label'   => 'User Email',
		                                 'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_admin_users.admin_user_id.admin_user_email.'.$id.']'
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
	                                 'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_admin_users.admin_user_id.admin_user_email.'.$id.']'
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
			// print_r($data_ajax['group_values']);
			$result['output'] = $this->load->view('admin/user_accounts',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['user_details'] = $data_values['user_details'];
			$this->load->view('admin/user_accounts',$data);
		}	
			// $this->load->view('admin/user_accounts');
	}

	public function privileges()
	{	
			$admin_modules = $this->admin_users_model->get_all_modules();
			$res = array();
			foreach($admin_modules as $arr)
			{
			    foreach($arr as $k => $v)
			    {
			        if($k == 'sub_module')
			            $res[$arr['main_module']][$k] = $this->get_arrayvalues_bykeyvalue($admin_modules, $k, 'main_module', $arr['main_module']);
			        else if($k == 'module_id')
			            $res[$arr['main_module']][$k] = $this->get_arrayvalues_bykeyvalue($admin_modules, $k, 'main_module', $arr['main_module']);
			        else
			            $res[$arr['main_module']][$k] = $v;
			    }
			}
			//To pass all the admin modules for setting priveleges
			$data['admin_modules'] = $res;
			
			//To pass all the group type for setting priveleges
			$admin_group = $this->admin_users_model->get_admin_groups();
			$res_group = array();
			foreach($admin_group as $arr)
			{
			    foreach($arr as $k => $v)
			    {
			        if($k == 'access_module_id')
			            $res_group[$arr['user_group_id']][$k] = $this->get_arrayvalues_bykeyvalue($admin_group, $k, 'user_group_id', $arr['user_group_id']);
			        else if($k == 'access_permission')
			            $res_group[$arr['user_group_id']][$k] = $this->get_arrayvalues_bykeyvalue($admin_group, $k, 'user_group_id', $arr['user_group_id']);
			        else
			            $res_group[$arr['user_group_id']][$k] = $v;
			    }
			}
			$data['admin_group'] = $res_group;

			// echo "<pre>";
			// print_r($data['admin_group']);
			// echo "</pre>";
			if($this->input->is_ajax_request()) {
				$this->admin_users_model->insert_update_admin_prvileges($_POST['module_data']);
			}
			$this->load->view('admin/privileges',$data);
	}

	//Function to store all the admin menus to assign rights for each admin uses
	public function admin_modules()
	{	
			$this->admin_users_model->insert_modules($_POST['module_data']);
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
