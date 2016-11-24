<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Other_module extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}
	public function site_visit_tracking()
	{
		$this->load->view('admin/site_visit_tracking');
	}
	public function feedback_form()
	{
		$this->load->view('admin/feedback_form');
	}
		
}
/* End of file Job_Srovider.php */ 
/* Location: ./application/controllers/Job_Seeker.php */
