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
	public function latest_news()
	{	
		//Functionality for Both update and save
		if(($this->input->post('action')=='update' && $this->input->post('rid')) || ($this->input->post('action')=='save')){
				if($this->input->post('action')=='update'){
					$id = $this->input->post('rid');
					$validation_rules = array(
		                            array(
		                              'field'   => 'l_news_title',
		                              'label'   => 'Latest News title',
		                              'rules'   => 'trim|required|xss_clean|min_length[15]|max_length[150]|edit_unique[tr_latest_news.latest_news_id.latest_news_title.'.$id.']'
		                              //edit_unique is a custom funciton
		                            ),
		                            array(
		                                 'field'   => 'l_redirect_link',
		                                 'label'   => 'Latest News Link',
		                                 'rules'   => 'trim|required|xss_clean'
		                            ),
		                            array(
		                                 'field'   => 'l_news_status',
		                                 'label'   => 'Latest News Status',
		                                 'rules'   => 'trim|required|xss_clean|'
		                            ),
		                        );
				}
				else{
					$validation_rules = array(
		                            array(
		                              'field'   => 'l_news_title',
		                              'label'   => 'Latest News title',
		                              'rules'   => 'trim|required|xss_clean|min_length[15]|max_length[150]|is_unique[tr_latest_news.latest_news_title]'
		                            ),
		                            array(
		                                 'field'   => 'l_redirect_link',
		                                 'label'   => 'Latest News Link',
		                                 'rules'   => 'trim|required|xss_clean'
		                            ),
		                            array(
		                                 'field'   => 'l_news_status',
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
			// print_r($data_ajax['group_values']);
			$result['output'] = $this->load->view('admin/latest_news',$data_ajax,true);
			echo json_encode($result);
		}
		else {
			$data['latest_news_values'] = $data_values['latest_news_values'];
			$this->load->view('admin/latest_news',$data);
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
	public function site_log()
	{		
		$this->load->view('admin/site_log');
	}	
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
