<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminindex extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_model');
	}
	public function dashboard()
	{	
			$this->load->view('admin/index');
	}
	public function state()
	{	
		$data_values = $this->admin_model->state();
		$data['state_values'] = $data_values['state_values'];
		$data['status'] = $data_values['status'];
		$data['error'] = $data_values['error'];
		if($data['error']==1) {
			echo $data['error'];
		}
		else {
			$this->load->view('admin/state',$data);
		}
	}
	public function district()
	{	
			$this->load->view('admin/district');
	}
	public function institution_types()
	{	
			$this->load->view('admin/institution_types');
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
