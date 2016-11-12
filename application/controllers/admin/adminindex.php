<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminindex extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->load->library('form_validation');
		$this->load->model('admin/dashboard_model');
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
	public function state()
	{	
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	  		$id = $this->input->post('rid');
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'state_name',
		                              'label'   => 'State Name',
		                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_state.state_id.state_name.'.$id.']'

		                            ),
		                            array(
		                                 'field'   => 'state_status',
		                                 'label'   => 'State Status',
		                                 'rules'   => 'trim|required|xss_clean|'
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
         		$data_values = $this->admin_model->state('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

	   	// Save data
    	else if($this->input->post('action')=='save') {
      		$validation_rules = array(
            			          	array(
                        		      'field'   => 'state_name',
		                              'label'   => 'State Name',
		                              'rules'   => 'trim|required|xss_clean|is_unique[tr_state.state_name]'
		                            ),
		                            array(
		                                 'field'   => 'state_status',
		                                 'label'   => 'State Status',
		                                 'rules'   => 'trim|required|xss_clean|'
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
		            $data['error'] = 1;
		            $data['status'] = strip_tags($error);
		            break;
		          }
		        }
	      	}
      		else {
	    		$data_values = $this->admin_model->state('save'); 
	    		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];	
      		}
    	}

    	// Delete data
    	else if($this->input->post('action')=='delete') {
      		$data_values = $this->admin_model->state('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->state('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['state_values'] = $data_values['state_values'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/state',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['state_values'] = $data_values['state_values'];
			$this->load->view('admin/state',$data);
		}
	}
	public function district()
	{	
			$this->load->view('admin/district');
	}
	public function institution_types()
	{	
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	  		$id = $this->input->post('rid');
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'institution_type_name',
		                              'label'   => 'Institution Type Name',
		                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_institution_type.institution_type_id.institution_type_name.'.$id.']'

		                            ),
		                            array(
		                                 'field'   => 'institution_type_status',
		                                 'label'   => 'Institution Type Status',
		                                 'rules'   => 'trim|required|xss_clean|'
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
         		$data_values = $this->admin_model->institution_type('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

	   	// Save data
    	else if($this->input->post('action')=='save') {
      		$validation_rules = array(
            			          	array(
                        		      'field'   => 'institution_type_name',
		                              'label'   => 'Institution Type Name',
		                              'rules'   => 'trim|required|xss_clean|is_unique[tr_institution_type.institution_type_name]'
		                            ),
		                            array(
		                                 'field'   => 'institution_type_status',
		                                 'label'   => 'Institution Type Status',
		                                 'rules'   => 'trim|required|xss_clean|'
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
		            $data['error'] = 1;
		            $data['status'] = strip_tags($error);
		            break;
		          }
		        }
	      	}
      		else {
	    		$data_values = $this->admin_model->institution_type('save'); 
	    		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];	
      		}
    	}

    	// Delete data
    	else if($this->input->post('action')=='delete') {
      		$data_values = $this->admin_model->institution_type('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->institution_type('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['institution_type_values'] = $data_values['institution_type_values'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/institution_types',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['institution_type_values'] = $data_values['institution_type_values'];
			$this->load->view('admin/institution_types',$data);
		}

	}
	public function extra_curricular()
	{	
			$this->load->view('admin/extra_curricular');
	}
	public function languages()
	{	
			$this->load->view('admin/languages');
	}
	public function qualification()
	{	
			$this->load->view('admin/qualification');
	}
	public function class_level()
	{	
			$this->load->view('admin/class_level');
	}
	public function departments()
	{	
			$this->load->view('admin/departments');
	}
	public function subject()
	{	
			$this->load->view('admin/subject');
	}
}
/* End of file welcome.php */ 
/* Location: ./application/controllers/welcome.php */
