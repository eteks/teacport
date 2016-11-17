<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		require_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";

        // Store values in variables from project created in Google Developer Console
        $client_id = '881163754380-inbtkd7iqm490en3v2ct4j3m639dd1vs.apps.googleusercontent.com';
        $client_secret = 'aXDIRy_cJIZw80-uP_oieYA3';
        $redirect_uri = 'https://www.etekchnoservices.com';
        $simple_api_key = 'AIzaSyCTOjoAiuhpE8scnTamgbpo-agSc-CiU_0';

        // Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("Teacport");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setDeveloperKey($simple_api_key);
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
        $authUrl = $client->createAuthUrl();
        $data['authUrl'] = $authUrl;
		$this->load->view('index',$data);
	}
	public function aboutus()
	{
		require_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";

        // Store values in variables from project created in Google Developer Console
        $client_id = '881163754380-inbtkd7iqm490en3v2ct4j3m639dd1vs.apps.googleusercontent.com';
        $client_secret = 'aXDIRy_cJIZw80-uP_oieYA3';
        $redirect_uri = 'https://www.etekchnoservices.com';
        $simple_api_key = 'AIzaSyCTOjoAiuhpE8scnTamgbpo-agSc-CiU_0';

        // Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("Teacport");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setDeveloperKey($simple_api_key);
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
        $authUrl = $client->createAuthUrl();
        $data['authUrl'] = $authUrl;
		$this->load->view('aboutus',$data);
	}
	public function contactus()
	{
		require_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";

        // Store values in variables from project created in Google Developer Console
        $client_id = '881163754380-inbtkd7iqm490en3v2ct4j3m639dd1vs.apps.googleusercontent.com';
        $client_secret = 'aXDIRy_cJIZw80-uP_oieYA3';
        $redirect_uri = 'https://www.etekchnoservices.com';
        $simple_api_key = 'AIzaSyCTOjoAiuhpE8scnTamgbpo-agSc-CiU_0';

        // Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("Teacport");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setDeveloperKey($simple_api_key);
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
        $authUrl = $client->createAuthUrl();
        $data['authUrl'] = $authUrl;
		$this->load->view('contactus',$data);
	}
	
	
	//Akila Created
	public function pricing(){
		$this->load->view('pricing');
	}
	public function faq(){
		$this->load->view('faq');
	}
	public function allinstitutions(){
		$this->load->view('all-institutions');
	}
	public function vacancies(){
		$this->load->view('vacancies');
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */