<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index_login()
	{
			$this->load->view('admin/login');
    }
}