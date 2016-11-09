<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_seeker extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('ajax_model'); 
        $this->load->library('form_validation'); 
        session_start();
    }

	public function index()
	{
		$CI =& get_instance();
		$CI->load->library('Facebook/autoload');
		$fb = new Facebook\Facebook([
		  	'app_id' => FACEBOOKAPPID,
		  	'app_secret' => FACEBOOKAPPSECRET,
		  	'default_graph_version' => FACEBOOKGRAPHVERSION,
	  	]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email'];
		$fbloginUrl = $helper->getLoginUrl(FACEBOOKLOGINURL, $permissions);
		$data['fbloginurl'] = $fbloginUrl;
		$this->load->view('job-seekers-login',$data);
	}
	public function signup()
	{
		$CI =& get_instance();
		$CI->load->library('Facebook/autoload');
		$fb = new Facebook\Facebook([
		  	'app_id' => FACEBOOKAPPID,
		  	'app_secret' => FACEBOOKAPPSECRET,
		  	'default_graph_version' => FACEBOOKGRAPHVERSION,
	  	]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email'];
		$fbloginUrl = $helper->getLoginUrl(FACEBOOKLOGINURL, $permissions);
		$data['fbloginurl'] = $fbloginUrl;
		$this->load->view('register-job-seekers.php',$data);
	}
	public function register_job_seeker()
	{
		$data = $this->ajax_model->get_registeration_status_seeker();
		echo $data;
	}
	public function login_job_seeker()
    {   
        $data = $this->ajax_model->get_login_status_seeker();
        echo $data;
    }
}
