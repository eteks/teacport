<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Other_module extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');

	}
	public function site_visit_tracking()
	{
		$this->load->view('admin/site_visit_tracking');
	}
	public function feedback_form()
	{		
		$this->load->view('admin/feedback_form');
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
			redirect(base_url().'admin/admin_error');
		}
			
	}
	public function feedback_global()
	{
			$admin_feedback_form = $this->admin_model->get_admin_feedback_form();
			$this->config->set_item('feedback_data',$admin_feedback_form);
	}
		
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
