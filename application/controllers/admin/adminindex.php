<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminindex extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function dashboard()
	{	
			$this->load->view('admin/index');
	}
	public function state()
	{	
			$this->load->view('admin/state');
	}
	public function district()
	{	
			$this->load->view('admin/district');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */