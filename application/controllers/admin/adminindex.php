<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminindex extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->load->library('form_validation');
		$this->load->model('admin/dashboard_model');
		$this->load->helper('custom');

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

	// State - Add Edit Delete View
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
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
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

	// Institution Type - Add Edit View Delete
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
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
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

	// Qualification - Add Edit View Delete
	public function qualification()
	{	
		$data['institution_types'] = $this->admin_model->get_institution_type(); 
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	  		$id = $this->input->post('rid');
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'educational_qualification',
		                              'label'   => 'Educational Qualification',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'educational_qualification_course_type',
		                                 'label'   => 'Educational Qualification Course Type',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'educational_qualifcation_inst_type_id',
		                                 'label'   => 'Educational Qualifcation Institution Type',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'educational_qualification_status',
		                                 'label'   => 'Educational Qualification Status',
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
         		$data_values = $this->admin_model->qualification_type('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

	   	// Save data
    	else if($this->input->post('action')=='save') {
      		$validation_rules = array(
		                            array(
		                              'field'   => 'educational_qualification',
		                              'label'   => 'Educational Qualification',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'educational_qualification_course_type',
		                                 'label'   => 'Educational Qualification Course Type',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'educational_qualifcation_inst_type_id',
		                                 'label'   => 'Educational Qualifcation Institution Type',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'educational_qualification_status',
		                                 'label'   => 'Educational Qualification Status',
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
	    		$data_values = $this->admin_model->qualification_type('save'); 
	    		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];	
      		}
    	}

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_model->qualification_type('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->qualification_type('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['qualification_type_values'] = $data_values['qualification_type_values'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/qualification',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['qualification_type_values'] = $data_values['qualification_type_values'];
			$this->load->view('admin/qualification',$data);
		}

	}

	// Extra Curricular - Add Edit View Delete
	public function extra_curricular()
	{	
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	  		$id = $this->input->post('rid');
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'extra_curricular',
		                              'label'   => 'Extra Curricular Name',
		                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_extra_curricular.extra_curricular_id.extra_curricular.'.$id.']'
		                            ),
		                            array(
		                                 'field'   => 'extra_curricular_status',
		                                 'label'   => 'Extra Curricular Status',
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
         		$data_values = $this->admin_model->extra_curricular('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

	   	// Save data
    	else if($this->input->post('action')=='save') {
      		$validation_rules = array(
            			          	array(
                        		      'field'   => 'extra_curricular',
		                              'label'   => 'Extra Curricular Name',
		                              'rules'   => 'trim|required|xss_clean|is_unique[tr_extra_curricular.extra_curricular]'
		                            ),
		                            array(
		                                 'field'   => 'extra_curricular_status',
		                                 'label'   => 'Extra Curricular Status',
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
	    		$data_values = $this->admin_model->extra_curricular('save'); 
	    		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];	
      		}
    	}

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_model->extra_curricular('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->extra_curricular('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['extra_curricular_values'] = $data_values['extra_curricular_values'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/extra_curricular',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['extra_curricular_values'] = $data_values['extra_curricular_values'];
			$this->load->view('admin/extra_curricular',$data);
		}
	}

	// Class Level - Add Edit View Delete
	public function class_level()
	{	
		$data['institution_types'] = $this->admin_model->get_institution_type(); 
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'class_level',
		                              'label'   => 'Class Level',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                           	array(
		                              'field'   => 'class_level_inst_type_id',
		                              'label'   => 'Institution Type Name',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'class_level_status',
		                                 'label'   => 'Class Level Status',
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
         		$data_values = $this->admin_model->class_level('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

	   	// Save data
    	else if($this->input->post('action')=='save') {
      		$validation_rules = array(
		                            array(
		                              'field'   => 'class_level',
		                              'label'   => 'Class Level',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                           	array(
		                              'field'   => 'class_level_inst_type_id',
		                              'label'   => 'Institution Type Name',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'class_level_status',
		                                 'label'   => 'Class Level Status',
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
	    		$data_values = $this->admin_model->class_level('save'); 
	    		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];	
      		}
    	}

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_model->class_level('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->class_level('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['class_level_values'] = $data_values['class_level_values'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/class_level',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['class_level_values'] = $data_values['class_level_values'];
			$this->load->view('admin/class_level',$data);
		}
	}

	// Departments - Add Edit Delete View
	public function departments()
	{	
		$data['qualification_list'] = $this->admin_model->get_qualification_values(); 

		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$id = $this->input->post('rid');
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'departments_name',
		                              'label'   => 'Departments Name',
		                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_departments.departments_id.departments_name.'.$id.']'

		                            ),
		                           	array(
		                              'field'   => 'department_educational_qualification_id',
		                              'label'   => 'Qualification Name',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'departments_status',
		                                 'label'   => 'Departments Status',
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
         		$data_values = $this->admin_model->departments('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

	   	// Save data
    	else if($this->input->post('action')=='save') {
      		$validation_rules = array(
		                            array(
		                              'field'   => 'departments_name',
		                              'label'   => 'Departments Name',
		                              'rules'   => 'trim|required|xss_clean|is_unique[tr_departments.departments_name]'

		                            ),
		                           	array(
		                              'field'   => 'department_educational_qualification_id',
		                              'label'   => 'Qualification Name',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'departments_status',
		                                 'label'   => 'Departments Status',
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
	    		$data_values = $this->admin_model->departments('save'); 
	    		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];	
      		}
    	}

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_model->departments('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->departments('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$departments_values = $data_values['departments_values'];
			$data_ajax['departments_values'] = get_qualication_by_dept($departments_values);
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/departments',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$departments_values = $data_values['departments_values'];
			$data['departments_values'] = get_qualication_by_dept($departments_values);
			$this->load->view('admin/departments',$data);
		}

	}

	// Subject - Add Edit View Delete
	public function subject()
	{	
		$data['institution_types'] = $this->admin_model->get_institution_type(); 

		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$id = $this->input->post('rid');
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'subject_name',
		                              'label'   => 'Subject Name',
		                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_subject.subject_id.subject_name.'.$id.']'

		                            ),
		                           	array(
		                              'field'   => 'subject_institution_id',
		                              'label'   => 'Institution Type',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'subject_status',
		                                 'label'   => 'Subject Status',
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
         		$data_values = $this->admin_model->subjects('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

	   	// Save data
    	else if($this->input->post('action')=='save') {
      		$validation_rules = array(
		                            array(
		                              'field'   => 'subject_name',
		                              'label'   => 'Subject Name',
		                              'rules'   => 'trim|required|xss_clean|is_unique[tr_subject.subject_name]'

		                            ),
		                           	array(
		                              'field'   => 'subject_institution_id',
		                              'label'   => 'Institution Type',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'subject_status',
		                                 'label'   => 'Subject Status',
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
	    		$data_values = $this->admin_model->subjects('save'); 
	    		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];	
      		}
    	}

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_model->subjects('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->subjects('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$subject_values = $data_values['subject_values'];
			$data_ajax['subject_values'] = get_institution_by_dept($subject_values);
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/subject',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$subject_values = $data_values['subject_values'];
			$data['subject_values'] = get_institution_by_dept($subject_values);
			$this->load->view('admin/subject',$data);
		}
	}

	public function district()
	{	
		$data['state_values'] = $this->admin_model->get_state_values(); 
		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'district_name',
		                              'label'   => 'District Name',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                           	array(
		                              'field'   => 'district_state_id',
		                              'label'   => 'State Name',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'district_status',
		                                 'label'   => 'District Status',
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
         		$data_values = $this->admin_model->districts('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

	   	// Save data
    	else if($this->input->post('action')=='save') {
      		$validation_rules = array(
		                            array(
		                              'field'   => 'district_name',
		                              'label'   => 'District Name',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                           	array(
		                              'field'   => 'district_state_id',
		                              'label'   => 'State Name',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'district_status',
		                                 'label'   => 'District Status',
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
	    		$data_values = $this->admin_model->districts('save'); 
	    		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];	
      		}
    	}

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_model->districts('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->districts('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['districts_values'] = $data_values['districts_values'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/district',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['districts_values'] = $data_values['districts_values'];
			$this->load->view('admin/district',$data);
		}
	}

	// University - Add Edit View Delete
	public function university()
	{	
		$data['class_level_values'] = $this->admin_model->get_class_levels(); 

		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	   		$id = $this->input->post('rid');
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'university_board_name',
		                              'label'   => 'University Board Name',
		                              'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_university_board.education_board_id.university_board_name.'.$id.']'

		                            ),
		                           	array(
		                              'field'   => 'university_class_level_id',
		                              'label'   => 'University Class Level Type',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'university_board_status',
		                                 'label'   => 'University Board Status',
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
         		$data_values = $this->admin_model->universities('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

	   	// Save data
    	else if($this->input->post('action')=='save') {
      		$validation_rules = array(
		                            array(
		                              'field'   => 'university_board_name',
		                              'label'   => 'University Board Name',
		                              'rules'   => 'trim|required|xss_clean|is_unique[tr_university_board.university_board_name]'

		                            ),
		                           	array(
		                              'field'   => 'university_class_level_id',
		                              'label'   => 'University Class Level Type',
		                              'rules'   => 'trim|required|xss_clean|'

		                            ),
		                            array(
		                                 'field'   => 'university_board_status',
		                                 'label'   => 'University Board Status',
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
	    		$data_values = $this->admin_model->universities('save'); 
	    		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];	
      		}
    	}

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_model->universities('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->universities('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$universities_values = $data_values['universities_values'];
			$data_ajax['universities_values'] = get_class_level_by_dept($universities_values);
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/university',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$universities_values = $data_values['universities_values'];
			$data['universities_values'] = get_class_level_by_dept($universities_values);
			$this->load->view('admin/university',$data);
		}
	}

	// Languages - Add Edit View Delete
	public function languages()
	{	

		// Update data
	   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
	  		$id = $this->input->post('rid');
	   		$validation_rules = array(
		                            array(
		                              'field'   => 'language_name',
		                              'label'   => 'Language Name',
		                              'rules'   => 'trim|required|xss_clean|edit_unique[tr_languages.language_id.language_name.'.$id.']'

		                            ),
		                            array(
		                                 'field'   => 'is_mother_tangue',
		                                 'label'   => 'Mother Tongue',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'is_medium_of_instruction',
		                                 'label'   => 'Medium of Instruction',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'language_status',
		                                 'label'   => 'Language Status',
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
         		$data_values = $this->admin_model->languages('update');
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
	    }

	   	// Save data
    	else if($this->input->post('action')=='save') {
      		$validation_rules = array(
		                            array(
		                              'field'   => 'language_name',
		                              'label'   => 'Language Name',
		                              'rules'   => 'trim|required|xss_clean|is_unique[tr_languages.language_name]'

		                            ),
		                            array(
		                                 'field'   => 'is_mother_tangue',
		                                 'label'   => 'Mother Tongue',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'is_medium_of_instruction',
		                                 'label'   => 'Medium of Instruction',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                            array(
		                                 'field'   => 'language_status',
		                                 'label'   => 'Language Status',
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
	    		$data_values = $this->admin_model->languages('save'); 
	    		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];	
      		}
    	}

    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_model->languages('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}
      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->languages('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['language_values'] = $data_values['language_values'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['output'] = $this->load->view('admin/languages',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['language_values'] = $data_values['language_values'];
			$this->load->view('admin/languages',$data);
		}
	}




}
/* End of file Adminindex.php */ 
/* Location: ./application/controllers/Adminindex.php */
