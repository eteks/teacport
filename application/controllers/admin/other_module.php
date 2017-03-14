<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Other_module extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');
		$this->load->model('admin/admin_model');

	}
	public function site_visit_tracking()
	{
		$this->load->view('admin/site_visit_tracking');
	}
	public function feedback_form()
	{		
		$this->load->view('admin/feedback_form');
	}
	// public function latest_news_popup()
	// {		
	// 	$this->load->view('admin/latest_news_popup');
	// }
	public function latest_news()
	{	
		//Functionality for Both update and save
		if(($this->input->post('action')=='update' && $this->input->post('rid')) || ($this->input->post('action')=='save')){
			$validation_rules = array();
			if($this->input->post('action')=='update'){
				$id = $this->input->post('rid');
				$validation_rules[] = array( 'field'   => 'news_title','label'   => 'News title','rules'   => 'trim|required|xss_clean|min_length[15]|max_length[150]|edit_unique[tr_latest_news.latest_news_id.latest_news_title.'.$id.']' );
				$validation_rules[] = array( 'field'   => 'news_type','label'   => 'News Type','rules'   => 'trim|required|xss_clean' );
				if($this->input->post('news_type') && $this->input->post('news_type')=="link") {
					$validation_rules[] = array( 'field'   => 'news_link','label'   => 'News Link','rules'   => 'trim|required|xss_clean' );
				}
				else if($this->input->post('news_type') && $this->input->post('news_type')=="content") {
					$validation_rules[] = array( 'field'   => 'news_content','label'   => 'News Content','rules'   => 'trim|required|xss_clean' );
				}
				$validation_rules[] = array( 'field'   => 'news_status','label'   => 'News Status','rules'   => 'trim|required|xss_clean' );
			}
			else{
				$validation_rules[] = array( 'field'   => 'news_title','label'   => 'News title','rules'   => 'trim|required|xss_clean|min_length[15]|max_length[150]|is_unique[tr_latest_news.latest_news_title]' );
				$validation_rules[] = array( 'field'   => 'news_type','label'   => 'News Type','rules'   => 'trim|required|xss_clean' );
				if($this->input->post('news_type') && $this->input->post('news_type')=="link") {
					$validation_rules[] = array( 'field'   => 'news_link','label'   => 'News Link','rules'   => 'trim|required|xss_clean' );
				}
				else if($this->input->post('news_type') && $this->input->post('news_type')=="content") {
					$validation_rules[] = array( 'field'   => 'news_content','label'   => 'News Content','rules'   => 'trim|required|xss_clean' );
				}
				$validation_rules[] = array( 'field'   => 'news_status','label'   => 'News Status','rules'   => 'trim|required|xss_clean' );
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
         		$data_values = $this->admin_model->latest_news($this->input->post('action')); //the value here will be pass either "update" or "save"
         		$data['error'] = $data_values['error'];
		        $data['status'] = $data_values['status'];
     		}
		}
		
    	// Delete data
    	else if($this->input->post('action')=='delete' && $this->input->post('rid')) {
      		$data_values = $this->admin_model->latest_news('delete'); 	
      		$data['error'] = $data_values['error'];
		    $data['status'] = $data_values['status'];
      	}

      	else {
      		$data['error'] = 0;
		    $data['status'] = 0;
      		$data_values = $this->admin_model->latest_news('init');
      	}

		if($data['error']==1) {
			$result['status'] = $data['status'];
			$result['error'] = $data['error'];	
			echo json_encode($result);
		}
		else if($data['error']==2) {
			$data_ajax['latest_news_values'] = $data_values['latest_news_values'];
			$data_ajax['status'] = $data['status'];
			$result['error'] = $data['error'];
			$result['status'] = $data['status'];
			// print_r($data_ajax['group_values']);
			$result['output'] = $this->load->view('admin/latest_news_popup',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['latest_news_values'] = $data_values['latest_news_values'];
			$this->load->view('admin/latest_news_popup',$data);
		}
		// $this->load->view('admin/latest_news');
	}
	public function get_feedback_full_view()
	{
		if($this->input->post('action') && $this->input->post('value')) {
			$value = $this->input->post('value');
			$data['feedback_form'] = $this->admin_model->get_admin_feedback_full_view($value);
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/feedback_form',$data);
		}
		else {
			redirect(base_url().'main/admin_error');
		}			
	}
	public function feedback_global()
	{
			$admin_feedback_form = $this->admin_model->get_admin_feedback_form();
			$this->config->set_item('feedback_data',$admin_feedback_form);
	}	
	
	// To get latest news content
	public function latest_news_content()
	{
		if($this->input->post('action') && $this->input->post('value')) {
			$value = $this->input->post('value');
			$data['latest_news_details'] = $this->admin_model->get_latest_news_details($value);
			$data['mode'] = $this->input->post('action');
			$this->load->view('admin/latest_news_popup',$data);
		}
		else if($this->input->post('action') && $this->input->post('action') == "add") {
			$data['mode'] = $this->input->post('action');
			$data['latest_news_details'] = array();
			$this->load->view('admin/latest_news_popup',$data);
		}
	}	
	public function site_log()
	{		
		$this->load->view('admin/site_log');
	}
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
