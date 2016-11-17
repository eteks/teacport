<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Common extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
         $this->load->helper('url');
        // session_start();
    }

	public function facebookloginurl(){
		/* Load custom facebook library file and return login url(using email permission) */
		$CI =& get_instance();
		$CI->load->library('Facebook/autoload');
		$fb = new Facebook\Facebook([
		  	'app_id' => FACEBOOKAPPID,
		  	'app_secret' => FACEBOOKAPPSECRET,
		  	'default_graph_version' => FACEBOOKGRAPHVERSION,
	  	]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email'];
		return $helper->getLoginUrl(FACEBOOKLOGINURL, $permissions);
	}

	public function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
	{
		/* Generate random password with atleasr one uppercase, atleast one lowercase, atleast one digit, atleast one special character  and return combined password*/
		$sets = array();
		if(strpos($available_sets, 'l') !== false)
			$sets[] = 'abcdefghjkmnpqrstuvwxyz';
		if(strpos($available_sets, 'u') !== false)
			$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
		if(strpos($available_sets, 'd') !== false)
			$sets[] = '23456789';
		if(strpos($available_sets, 's') !== false)
			$sets[] = '!@#$%&*?';
		$all = '';
		$password = '';
		foreach($sets as $set)
		{
			$password .= $set[array_rand(str_split($set))];
			$all .= $set;
		}
		$all = str_split($all);
		for($i = 0; $i < $length - count($sets); $i++)
			$password .= $all[array_rand($all)];
		$password = str_shuffle($password);
		if(!$add_dashes)
			return $password;
		$dash_len = floor(sqrt($length));
		$dash_str = '';
		while(strlen($password) > $dash_len)
		{
			$dash_str .= substr($password, 0, $dash_len) . '-';
			$password = substr($password, $dash_len);
		}
		$dash_str .= $password;
		return $dash_str;
	}
	public function googleloginurl()
	{
		// $index= $this->home('index');
		include_once APPPATH."libraries/google/Google_Client.php";
        include_once APPPATH."libraries/google/contrib/Google_Oauth2Service.php";
        
        // Google Project API Credentials
        $clientId = '881163754380-inbtkd7iqm490en3v2ct4j3m639dd1vs.apps.googleusercontent.com';
        $clientSecret = 'aXDIRy_cJIZw80-uP_oieYA3';
        $redirectUrl = 'http://localhost/teacport/signup/provider';
        // $simple_api_key = 'AIzaSyCTOjoAiuhpE8scnTamgbpo-agSc-CiU_0';
        
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Teacport');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            print_r($userProfile);
            // Preparing data for database insertion
         
        } 
        else {
            $data['status'] = 1;
            $data['glogin_url'] = $gClient->createAuthUrl(); 
        }
        return $data['glogin_url'];
	}
}