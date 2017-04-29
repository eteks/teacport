<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
		$this->load->model('admin/master_data_model');
		// $this->load->model('admin/dashboard_model');
		$this->load->helper('custom');
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');

	}

	// Alpha with white space
 	public function alpha_dash_space($provider_job_title){
		if (! preg_match('/^[a-zA-Z\s]+$/', $provider_job_title)) {
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	/* ===========            State Controller Start       ============ */

	// State - Add Edit Delete View
	public function state()
	{	
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
				        array('field'   => 's_name','label'   => 'State Name','rules'   => 'trim|required|xss_clean|callback_alpha_dash_space|max_length[50]|edit_unique[tr_state.state_id.state_name.'.$id.']' ),
				        array( 'field'   => 's_status','label'   => 'State Status','rules'   => 'trim|required|xss_clean|' ),);
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
		            	array( 'field'   => 's_name','label'   => 'State Name','rules'   => 'trim|required|xss_clean|callback_alpha_dash_space|max_length[50]|is_unique[tr_state.state_name]' ),
				        array( 'field'   => 's_status','label'   => 'State Status','rules'   => 'trim|required|xss_clean|' ),);
		      	}

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details ";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->state($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->state('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
	      	}

	      	if($data['error']==1) {
				$result['status'] = $data['status'];
				$result['error'] = $data['error'];	
				echo json_encode($result);
			}
			else if($data['error']==2) {
				$data_ajax['state_values'] = $data_values['state_values'];
				$data_ajax['status'] = $data['status'];
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/state',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->state('init');
			$data['state_values'] = $data_values['state_values'];
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/state',$data);
		}
	}

	/* ===========            State Controller End       ============ */

	/* ===========            District Controller Start       ============ */

	// District - Add Edit Delete View
	public function district()
	{	
		$data['state_values'] = $this->admin_model->get_state_values(); 
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
		                array( 'field'   => 'd_name','label'   => 'District Name','rules'   => 'trim|required|xss_clean|callback_alpha_dash_space|max_length[50]|' ),
		                array( 'field'   => 'd_state_name','label'   => 'State Name','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'd_status','label'   => 'District Status','rules'   => 'trim|required|xss_clean|' ), );
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
		                array( 'field'   => 'd_name','label'   => 'District Name','rules'   => 'trim|required|xss_clean|callback_alpha_dash_space|max_length[50]|' ),
		                array( 'field'   => 'd_state_name','label'   => 'State Name','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'd_status','label'   => 'District Status','rules'   => 'trim|required|xss_clean|' ), );
		      	}

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details ";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->districts($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->districts('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
	      	}

	      	if($data['error']==1) {
				$result['status'] = $data['status'];
				$result['error'] = $data['error'];	
				echo json_encode($result);
			}
			else if($data['error']==2) {
				$data_ajax['districts_values'] = $data_values['districts_values'];
				$data_ajax['status'] = $data['status'];
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/district',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->districts('init');
			$data['districts_values'] = $data_values['districts_values'];
			$data['search_districts_values'] = $data_values['search_districts_values'];
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/district',$data);
		}
	}

	/* ===========            District Controller End       ============ */

	/* ===========            Instiitution Type Controller Start       ============ */

	// Instritution Type - Add Edit Delete View
	public function institution_types()
	{	
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
		                array( 'field'   => 'i_name','label'   => 'Institution Type Name','rules'   => 'trim|required|xss_clean|max_length[100]|edit_unique[tr_institution_type.institution_type_id.institution_type_name.'.$id.']' ),
		                array( 'field'   => 'i_status','label'   => 'Institution Type Status','rules'   => 'trim|required|xss_clean|' ), );
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
            			array( 'field'   => 'i_name','label'   => 'Institution Type Name','rules'   => 'trim|required|xss_clean|max_length[100]|is_unique[tr_institution_type.institution_type_name]' ),
		                array( 'field'   => 'i_status','label'   => 'Institution Type Status','rules'   => 'trim|required|xss_clean|' ), );
		      	}

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details ";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->institution_type($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->institution_type('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
	      	}

	      	if($data['error']==1) {
				$result['status'] = $data['status'];
				$result['error'] = $data['error'];	
				echo json_encode($result);
			}
			else if($data['error']==2) {
				$data_ajax['institution_type_values'] = $data_values['institution_type_values'];
				$data_ajax['status'] = $data['status'];
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/institution_types',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->institution_type('init');
			$data['institution_type_values'] = $data_values['institution_type_values'];
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/institution_types',$data);
		}
	}

	/* ===========            Institution Type Controller End       ============ */

	/* ===========            Extra Curricular Controller Start       ============ */

	// Extra Curricular - Add Edit Delete View
	public function extra_curricular()
	{	
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
		                array( 'field'   => 'e_name','label'   => 'Extra Curricular Name','rules'   => 'trim|required|xss_clean|max_length[100]|edit_unique[tr_extra_curricular.extra_curricular_id.extra_curricular.'.$id.']' ),
		                array( 'field'   => 'e_status','label'   => 'Extra Curricular Status','rules'   => 'trim|required|xss_clean|' ), );
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
            			array( 'field'   => 'e_name','label'   => 'Extra Curricular Name','rules'   => 'trim|required|xss_clean|max_length[100]|is_unique[tr_extra_curricular.extra_curricular]' ),
		                array( 'field'   => 'e_status','label'   => 'Extra Curricular Status','rules'   => 'trim|required|xss_clean|' ), );
		      	}

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details ";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->extra_curricular($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->extra_curricular('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
	      	}

	      	if($data['error']==1) {
				$result['status'] = $data['status'];
				$result['error'] = $data['error'];	
				echo json_encode($result);
			}
			else if($data['error']==2) {
				$data_ajax['extra_curricular_values'] = $data_values['extra_curricular_values'];
				$data_ajax['status'] = $data['status'];
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/extra_curricular',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->extra_curricular('init');
			$data['extra_curricular_values'] = $data_values['extra_curricular_values'];
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/extra_curricular',$data);
		}
	}

	/* ===========            Extra Curricular Controller End       ============ */

	/* ===========            Languages Controller Start       ============ */

	// Languages - Add Edit Delete View
	public function languages()
	{	
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
		                array( 'field'   => 'l_name','label'   => 'Language Name','rules'   => 'trim|required|xss_clean|max_length[100]|edit_unique[tr_languages.language_id.language_name.'.$id.']' ),
		                array( 'field'   => 'l_mother_tongue','label'   => 'Mother Tongue','rules'   => 'trim|required|xss_clean|' ),
		                array('field'   => 'l_instruction','label'   => 'Medium of Instruction','rules'   => 'trim|required|xss_clean|' ),
		                array('field'   => 'l_status','label'   => 'Language Status','rules'   => 'trim|required|xss_clean|' ), );
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
		                array( 'field'   => 'l_name', 'label'   => 'Language Name','rules'   => 'trim|required|xss_clean|max_length[100]|is_unique[tr_languages.language_name]' ),
		                array( 'field'   => 'l_mother_tongue','label'   => 'Mother Tongue', 'rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'l_instruction','label'   => 'Medium of Instruction','rules'   => 'trim|required|xss_clean|' ),
		               	array( 'field'   => 'l_status','label'   => 'Language Status','rules'   => 'trim|required|xss_clean|' ), );
		        }

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details ";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->languages($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->languages('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
	      	}

	      	if($data['error']==1) {
				$result['status'] = $data['status'];
				$result['error'] = $data['error'];	
				echo json_encode($result);
			}
			else if($data['error']==2) {
				$data_ajax['language_values'] = $data_values['language_values'];
				$data_ajax['status'] = $data['status'];
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/languages',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->languages('init');
			$data['language_values'] = $data_values['language_values'];
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/languages',$data);
		}
	}

	/* ===========            Languages Controller End       ============ */

	/* ===========            Qualification Controller Start       ============ */

	// Qualification - Add Edit Delete View
	public function qualification()
	{	
		$data['institution_types'] = $this->admin_model->get_institution_type();
		if(isset($_POST['csv_form']) || isset($_FILES['csv'])){
			// $data['status'] = "Inserted Successfully";
			//get the csv file 
		    $file = $_FILES['csv']['tmp_name']; 
		    $handle = fopen($file,"r"); 	  
		    while (($sheet_data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
		    	if ($sheet_data[0]) { 
		    		//Check data already available in institution table
		    		$inst_where = '(institution_type_name="'.$sheet_data[2].'")';
		    		$this->db->select('institution_type_id,institution_type_name');
					$inst_query = $this->db->get_where('tr_institution_type',$inst_where)->row_array();
					if(sizeof($inst_query) == 0){ 
						$inst_query_data = array( 
	                        'institution_type_name' => $sheet_data[2],
	                        'institution_type_status' => 1,
	                      );
						$this->db->insert("tr_institution_type", $inst_query_data);
						$inst_id = $this->db->insert_id();
					}
					else{
						$inst_id = $inst_query['institution_type_id'];
					}
		            $qual_insert_data = array( 
	                        'educational_qualification' => $sheet_data[0],
	                       'educational_qualification_course_type' => ($sheet_data[1]) ? $sheet_data[1] : NULL,
	                        'educational_qualifcation_inst_type_id' => ($inst_id) ? $inst_id : NULL,
	                        'educational_qualification_status' => $sheet_data[3]
	                      );
		            $check_data = array(
		            	'educational_qualification' => $sheet_data[0],
		            	'educational_qualifcation_inst_type_id' => $inst_id
		            	);
		            $this->db->select('educational_qualification,educational_qualifcation_inst_type_id');
					$this->db->from('tr_educational_qualification');
					$this->db->where($check_data);
					$query = $this->db->get();
					if($query -> num_rows() == 0)
	  					$this->db->insert("tr_educational_qualification", $qual_insert_data);
      			} 
		    }  
		}
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
		                array( 'field'   => 'q_name','label'   => 'Educational Qualification','rules'   => 'trim|required|xss_clean|max_length[100]|' ),
		                array( 'field'   => 'q_inst_type','label'   => 'Educational Qualifcation Institution Type','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'q_status', 'label'   => 'Educational Qualification Status','rules'   => 'trim|required|xss_clean|' ), );
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
		                array( 'field'   => 'q_name','label'   => 'Educational Qualification','rules'   => 'trim|required|xss_clean|max_length[100]|' ),
		                array( 'field'   => 'q_inst_type','label'   => 'Educational Qualifcation Institution Type','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'q_status','label'   => 'Educational Qualification Status','rules'   => 'trim|required|xss_clean|' ), );
		        }

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->qualification_type($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->qualification_type('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
	      	}

	      	if($data['error']==1) {
				$result['status'] = $data['status'];
				$result['error'] = $data['error'];	
				echo json_encode($result);
			}
			else if($data['error']==2) {
				$data_ajax['qualification_type_values'] = $data_values['qualification_type_values'];
				$data_ajax['status'] = $data['status'];
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/qualification',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->qualification_type('init');
			$data['qualification_type_values'] = $data_values['qualification_type_values'];
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/qualification',$data);
		}
	}

	/* ===========            Qualification Controller End       ============ */

	/* ===========            Class Level Controller Start       ============ */

	// Class Level - Add Edit Delete View
	public function class_level()
	{	
		$data['institution_types'] = $this->admin_model->get_institution_type();
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
		               	array( 'field' => 'c_name','label' => 'Class Level','rules'   => 'trim|required|xss_clean|max_length[100]|' ),
		                array( 'field'   => 'c_inst_type','label'   => 'Institution Type Name','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'c_status','label'   => 'Class Level Status','rules'   => 'trim|required|xss_clean|' ), );
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
		                array( 'field' => 'c_name', 'label' => 'Class Level','rules'   => 'trim|required|xss_clean|max_length[100]|' ),
		                array( 'field'   => 'c_inst_type','label'   => 'Institution Type Name','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'c_status','label'   => 'Class Level Status','rules'   => 'trim|required|xss_clean|' ), );
		        }

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details ";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->class_level($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->class_level('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
	      	}

	      	if($data['error']==1) {
				$result['status'] = $data['status'];
				$result['error'] = $data['error'];	
				echo json_encode($result);
			}
			else if($data['error']==2) {
				$data_ajax['class_level_values'] = $data_values['class_level_values'];
				$data_ajax['status'] = $data['status'];
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/class_level',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->class_level('init');
			$data['class_level_values'] = $data_values['class_level_values'];
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/class_level',$data);
		}
	}

	/* ===========            Class Level Controller End       ============ */

	/* ===========            Departments Controller Start       ============ */

	// Departments- Add Edit Delete View
	public function departments()
	{	
		$data['qualification_list'] = $this->admin_model->get_qualification_values();
		if(isset($_POST['csv_form']) || isset($_FILES['csv'])){
			// $data['status'] = "Inserted Successfully";
			//get the csv file 
		    $file = $_FILES['csv']['tmp_name']; 
		    $handle = fopen($file,"r"); 	  
		    while (($sheet_data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
		    	if ($sheet_data[0]) { 
		    			$data_split = explode(",", $sheet_data[1]);
		    			$group_qual =array();
		    			foreach ($data_split as $value) {
		    				//Check data already available in institution table
			    			$qual_where = '(educational_qualification="'.$value.'")';
			    			$this->db->select('educational_qualification_id,educational_qualification');
							$qual_query = $this->db->get_where('tr_educational_qualification',$qual_where)->row_array();
							if(sizeof($qual_query) > 0){ 
								$qual_id = $qual_query['educational_qualification_id'];
								array_push($group_qual,$qual_id);
							}
		    			}
			            $dept_insert_data = array( 
		                        'departments_name' => $sheet_data[0],
		                        'department_educational_qualification_id' => implode(",", $group_qual),
		                        'departments_status' => $sheet_data[2]
		                      );
			            $this->db->select('departments_name');
						$this->db->from('tr_departments');
						$this->db->where('departments_name',$sheet_data[0]);
						$query = $this->db->get();
						if($query -> num_rows() == 0)
		  					$this->db->insert("tr_departments", $dept_insert_data);
      			} 
		    }  
		}		
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
		                array( 'field' => 'd_name','label' => 'Departments Name','rules' => 'trim|required|xss_clean|max_length[100]|edit_unique[tr_departments.departments_id.departments_name.'.$id.']' ),
		                array( 'field'   => 'd_qualification','label'   => 'Qualification Name','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'd_status','label'   => 'Departments Status','rules'   => 'trim|required|xss_clean|' ), );
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
		                array( 'field'   => 'd_name','label'   => 'Departments Name','rules'   => 'trim|required|xss_clean|max_length[100]|is_unique[tr_departments.departments_name]' ),
		                array( 'field'   => 'd_qualification','label'   => 'Qualification Name','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'd_status','label'   => 'Departments Status','rules'   => 'trim|required|xss_clean|' ), );
		        }

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details ";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->departments($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->departments('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
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
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/departments',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->departments('init');
			$departments_values = $data_values['departments_values'];
			$data['departments_values'] = get_qualication_by_dept($departments_values);
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/departments',$data);
		}
	}

	/* ===========            Departments Controller End       ============ */

	/* ===========            Subject Controller Start       ============ */

	// Subject- Add Edit Delete View
	public function subject()
	{	
		$data['institution_types'] = $this->admin_model->get_institution_type();
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
		                array( 'field'   => 's_name','label'   => 'Subject Name','rules'  => 'trim|required|xss_clean|max_length[100]|edit_unique[tr_subject.subject_id.subject_name.'.$id.']'),
		                array( 'field'   => 's_inst_type','label'   => 'Institution Type','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 's_status', 'label'   => 'Subject Status','rules'   => 'trim|required|xss_clean|' ), );
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
		                array( 'field'   => 's_name','label'   => 'Subject Name','rules'   => 'trim|required|xss_clean|max_length[100]|is_unique[tr_subject.subject_name]' ),
		                array( 'field'   => 's_inst_type','label'   => 'Institution Type','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 's_status','label'   => 'Subject Status','rules'   => 'trim|required|xss_clean|' ), );
		        }

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details ";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->subjects($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->subjects('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
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
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/subject',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->subjects('init');
			$subject_values = $data_values['subject_values'];
			$data['subject_values'] = get_institution_by_dept($subject_values);
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/subject',$data);
		}
	}

	/* ===========            Subject Controller End       ============ */

	/* ===========            University Controller Start       ============ */

	// University- Add Edit Delete View
	public function university()
	{	
		$data['class_level_values'] = $this->admin_model->get_class_levels();
		if(isset($_POST['csv_form']) || isset($_FILES['csv'])){
			// $data['status'] = "Inserted Successfully";
			//get the csv file 
		    $file = $_FILES['csv']['tmp_name']; 
		    $handle = fopen($file,"r"); 	  
		    while (($sheet_data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
		    	if ($sheet_data[0]) { 
		    			$data_split = explode(",", $sheet_data[1]);
		    			$group_class =array();
		    			foreach ($data_split as $value) {
		    				//Check data already available in institution table
			    			$class_where = '(class_level="'.$value.'")';
			    			$this->db->select('class_level_id,class_level,class_level_inst_type_id');
							$class_query = $this->db->get_where('tr_class_level',$class_where)->row_array();
							if(sizeof($class_query) > 0){ 
								$class_id = $class_query['class_level_id'];
								array_push($group_class,$class_id);
							}
		    			}
			            $univ_insert_data = array( 
		                        'university_board_name' => $sheet_data[0],
		                        'university_class_level_id' => implode(",", $group_class),
		                        'university_board_status' => $sheet_data[2]
		                      );
			            $this->db->select('university_board_name');
						$this->db->from('tr_university_board');
						$this->db->where('university_board_name',$sheet_data[0]);
						$query = $this->db->get();
						if($query -> num_rows() == 0)
		  					$this->db->insert("tr_university_board", $univ_insert_data);
      			} 
		    }  
		}	
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
		                array( 'field'   => 'u_name','label'   => 'University Board Name','rules'   => 'trim|required|xss_clean|max_length[100]|edit_unique[tr_university_board.education_board_id.university_board_name.'.$id.']' ),
		                array( 'field'   => 'u_class_level','label'   => 'University Class Level Type','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'u_status','label'   => 'University Board Status','rules'   => 'trim|required|xss_clean|' ), );
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
		                array( 'field'   => 'u_name','label'   => 'University Board Name','rules'   => 'trim|required|xss_clean|max_length[100]|is_unique[tr_university_board.university_board_name]' ),
		                array( 'field'   => 'u_class_level','label'   => 'University Class Level Type','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'u_status','label'   => 'University Board Status','rules'   => 'trim|required|xss_clean|' ), );
		        }

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details ";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->universities($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->universities('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
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
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/university',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->universities('init');
			$universities_values = $data_values['universities_values'];
			$data['universities_values'] = get_class_level_by_dept($universities_values);
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/university',$data);
		}
	}

	/* ===========            University Controller End       ============ */

	/* ===========            Postings Controller Start       ============ */

	// Postings- Add Edit Delete View
	public function posting()
	{	
		$data['institution_values'] = $this->admin_model->get_institution_type_list();
		if($_POST) {
			$secure_error = '';
			// Validate add and update data
		   	if($this->input->post('action')=='update' || $this->input->post('action')=='save') {
		   		// Update data
			   	if($this->input->post('action')=='update' && $this->input->post('rid')) {
			  		$id = $this->input->post('rid');
			  		$action_post = $this->input->post('action');
			   		$validation_rules = array(
		                array('field'   => 'p_name','label'   => 'Posting Name','rules'   => 'trim|required|xss_clean|max_length[100]|edit_unique[tr_languages.language_id.language_name.'.$id.']' ),
		                array( 'field'   => 'p_inst_type','label'   => 'Posting Institution Name','rules'   => 'trim|required|xss_clean|' ),
		                array( 'field'   => 'p_status','label'   => 'Posting Status','rules'   => 'trim|required|xss_clean|' ), );
			    }

			  	// Save data
		    	else if($this->input->post('action')=='save') {
		    		$action_post = $this->input->post('action');
		      		$validation_rules = array(
		                array( 'field'   => 'p_name','label'   => 'Posting Name','rules'   => 'trim|required|xss_clean|max_length[100]|is_unique[tr_languages.language_name]' ),
		                array( 'field'   => 'p_inst_type','label'   => 'Posting Institution Name','rules'   => 'trim|required|xss_clean|' ),
		               	array( 'field'   => 'p_status','label'   => 'Posting Status','rules'   => 'trim|required|xss_clean|' ), );
		        }

		      	// Error
		      	else {
		      		$data['error'] = 1;
			        $data['status'] = "Something went wrong. Please try again with correct details ";	
			        $secure_error = 1;
		      	}
		      	if($secure_error == '') {
			   		$this->form_validation->set_rules($validation_rules);
			      	if ($this->form_validation->run() == FALSE) {   
				        foreach($validation_rules as $row){
				        	$field = $row['field']; // getting field name
				        	$error = form_error($field); // getting error for field name
				        	if($error){
				            	$data['error'] = 1;
				            	$data['status'] = strip_tags($error);
				            	break;
				          	}
				        }
			      	}
		      		else {
			    		$data_values = $this->master_data_model->postings($action_post); 
			    		$data['error'] = $data_values['error'];
				        $data['status'] = $data_values['status'];	
		      		}
		      	}
	      	}
	      	// Delete data
	    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
	      		$data_values = $this->master_data_model->postings('delete'); 	
	      		$data['error'] = $data_values['error'];
			    $data['status'] = $data_values['status'];
	      	}
	      	else {
	      		$data['error'] = 1;
			    $data['status'] = "Something went wrong. Please try again with correct details ";	
	      	}

	      	if($data['error']==1) {
				$result['status'] = $data['status'];
				$result['error'] = $data['error'];	
				echo json_encode($result);
			}
			else if($data['error']==2) {
				$postings_values = $data_values['postings_values'];
				$data_ajax['postings_values'] = get_institution_by_postname($postings_values);
				$data_ajax['status'] = $data['status'];
				$data_ajax['mapped_data'] = $data_values['mapped_data'];
				$result['error'] = $data['error'];
				$result['output'] = $this->load->view('admin/postings',$data_ajax,true);
				echo json_encode($result);
			}
		}
		else {
		    $data['status'] = 0;
	    	$data_values = $this->master_data_model->postings('init');
			$postings_values = $data_values['postings_values'];
			$data['postings_values'] = get_institution_by_postname($postings_values);
			$data['mapped_data'] = $data_values['mapped_data'];
			$this->load->view('admin/postings',$data);
		}
	}

	/* ===========            Postings Controller End       ============ */

	// Get District by state
	public function district_state() {
		$data = '';
		if($this->input->post('value')) {
			$data = $this->admin_model->get_district_by_state($this->input->post('value'));
		}
		echo json_encode($data);
	}

	// Enabled location for search
	public function search_enabled_district() {
		$data = '';
		$data = $this->admin_model->do_enable_search_district($this->input->post('value'));
		echo $data;
	}

}
/* End of file Master_Data.php */ 
/* Location: ./application/controllers/Master_Data.php */
