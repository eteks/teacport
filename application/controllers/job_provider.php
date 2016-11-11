<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_provider extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('ajax_model'); 
        $this->load->library('form_validation'); 
        $this->load->library('session'); 
        $this->load->library('captcha');
        // $this->load->library('image_lib');
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
		$this->load->view('job-providers-login',$data);
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
		$data['captcha'] = $this->captcha->main();
		$this->session->set_userdata('captcha_info', $data['captcha']);
		// print_r($captcha);
		$this->load->view('register-job-providers.php',$data);


	}
	public function register_job_provider()
	{
		$data = $this->ajax_model->get_registeration_status_provider();
		echo $data;		
	}
	    public function login_job_provider()
    {   
        $data = $this->ajax_model->get_login_status_provider();
        echo $data;
    }
}
