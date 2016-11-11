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
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */