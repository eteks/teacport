<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->library(array('linkedin/http_class','linkedin/oauth_client_class','twconnect'));
		$this->load->model('job_provider_model');
		$this->load->model('job_seeker_model');
	}
	
	public function facebook(){
		$CI =& get_instance();
		$CI->load->library('Facebook/autoload');
		$fb = new Facebook\Facebook([
		  	'app_id' => FACEBOOKAPPID,
		  	'app_secret' => FACEBOOKAPPSECRET,
		  	'default_graph_version' => FACEBOOKGRAPHVERSION,
	  	]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email'];
		$loginUrl = $helper->getLoginUrl(FACEBOOKLOGINURL, $permissions);
		redirect($loginUrl);
	}

	public function seekerfacebook(){
		$CI =& get_instance();
		$CI->load->library('Facebook/autoload');
		$fb = new Facebook\Facebook([
		  	'app_id' => FACEBOOKAPPID,
		  	'app_secret' => FACEBOOKAPPSECRET,
		  	'default_graph_version' => FACEBOOKGRAPHVERSION,
	  	]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email'];
		$loginUrl = $helper->getLoginUrl(FACEBOOKSEEKERLOGINURL, $permissions);
		redirect($loginUrl);
	}

	public function facebookverify(){
		$CI =& get_instance();
		$CI->load->library('Facebook/autoload');
		$fb = new Facebook\Facebook([
		  	'app_id' => FACEBOOKAPPID,
		  	'app_secret' => FACEBOOKAPPSECRET,
		  	'default_graph_version' => FACEBOOKGRAPHVERSION,
	  	]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email'];
		try {
			if (isset($_SESSION['facebook_access_token'])) {
				$accessToken = $_SESSION['facebook_access_token'];
			} else {
		  		$accessToken = $helper->getAccessToken();
			}
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		 	// When Graph returns an error
		 	//echo 'Graph returned an error: ' . $e->getMessage();
			redirect('login/seeker');
		  	exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		 	// When validation fails or other local issues
			//echo 'Facebook SDK returned an error: ' . $e->getMessage();
			redirect('login/seeker');
		  	exit;
	 	}
		if (isset($accessToken)) {
			if (isset($_SESSION['facebook_access_token'])) {
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} else {
				$_SESSION['facebook_access_token'] = (string) $accessToken;
				$oAuth2Client = $fb->getOAuth2Client();
				$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
				$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			}
			// getting basic info about user
			try {
				$profile_request = $fb->get('/me?fields=name,first_name,last_name,email,age_range,picture,education,location,hometown,work');
				$profile = $profile_request->getGraphNode()->asArray();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				// When Graph returns an error
				session_destroy();
				//header("Location: ./");
				redirect('login/seeker');
				exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
				// When validation fails or other local issues
				//echo 'Facebook SDK returned an error: ' . $e->getMessage();
				redirect('login/seeker');
				exit;
			}
			$fbdata = array(
				'registrant_email_id' => $profile['email'],
				'registrant_name' => $profile['name'],
				'registrant_logo' => $profile['picture']['url'],
				'registrant_register_type' => 'facebook'
			);
			if($this->job_provider_model->social_authendication_registration($fbdata) === 'inserted')
			{
				$fbdata['user_type'] = 'provider';
				$fbdata['login_type'] = 'facebook';
				$this->session->set_userdata("login_status", TRUE);
				$this->session->set_userdata("login_session",$fbdata);
				redirect('provider/dashboard');
			}
			else{
				$checkvaliduser = $this->job_provider_model->social_valid_provider_login($fbdata);
				if($checkvaliduser['valid_status'] === 'valid'){
					$this->session->set_userdata("login_status", TRUE);
					$this->session->set_userdata("login_session",$checkvaliduser);
					redirect('provider/dashboard');
				}
				else{
					$fb['reg_server_msg'] = 'Your Facebook account does not associate with Teacher recruit!';	
   					$fb['fbloginurl'] = $common->facebookloginurl();
					$this->load->view('job-providers-login',$fb);
				}
			}
		}
	}

	/** Seeker Facebook verificaion functions **/
	public function seekerfacebookverify(){
		$CI =& get_instance();
		$CI->load->library('Facebook/autoload');
		$fb = new Facebook\Facebook([
		  	'app_id' => FACEBOOKAPPID,
		  	'app_secret' => FACEBOOKAPPSECRET,
		  	'default_graph_version' => FACEBOOKGRAPHVERSION,
	  	]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email'];
		try {
			if (isset($_SESSION['facebook_access_token'])) {
				$accessToken = $_SESSION['facebook_access_token'];
			} else {
		  		$accessToken = $helper->getAccessToken();
			}
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		 	// When Graph returns an error
		 	//echo 'Graph returned an error: ' . $e->getMessage();
			redirect('login/seeker');
		  	exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		 	// When validation fails or other local issues
			//echo 'Facebook SDK returned an error: ' . $e->getMessage();
			redirect('login/seeker');
		  	exit;
	 	}
		if (isset($accessToken)) {
			if (isset($_SESSION['facebook_access_token'])) {
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			} else {
				$_SESSION['facebook_access_token'] = (string) $accessToken;
				$oAuth2Client = $fb->getOAuth2Client();
				$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
				$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
				$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			}
			// getting basic info about user
			try {
				$profile_request = $fb->get('/me?fields=name,first_name,last_name,email,age_range,picture,education,location,hometown,work');
				$profile = $profile_request->getGraphNode()->asArray();
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				// When Graph returns an error
				session_destroy();
				//header("Location: ./");
				redirect('login/seeker');
				exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
				// When validation fails or other local issues
				//echo 'Facebook SDK returned an error: ' . $e->getMessage();
				redirect('login/seeker');
				exit;
			}
			$fbdata = array(
				'candidate_email' => $profile['email'],
				'candidate_name' => $profile['name'],
				'candidate_image_path' => $profile['picture']['url'],
				'candidate_registration_type' => 'facebook'
			);
			if($this->job_seeker_model->social_authendication_registration($fbdata) === 'inserted')
			{
				$fbdata['user_type'] = 'seeker';
				$fbdata['login_type'] = 'facebook';
				$this->session->set_userdata("login_status", TRUE);
				$this->session->set_userdata("login_session",$fbdata);
				redirect('seeker/dashboard');
			}else{
				$checkvaliduser = $this->job_seeker_model->social_valid_provider_login($fbdata);
				if($checkvaliduser['valid_status'] === 'valid'){
					$this->session->set_userdata("login_status", TRUE);
					$this->session->set_userdata("login_session",$checkvaliduser);
					redirect('seeker/dashboard');
				}
				else{
					$fb['reg_server_msg'] = 'Your Facebook account does not associate with Teacher recruit!';	
   					$fb['fbloginurl'] = $common->facebookloginurl();
					$this->load->view('job-seekers-login',$fb);
				}
			}
		}
	}
	public function twitter(){
		$ok = $this->twconnect->twredirect('social/twitterverify');
		if (!$ok) {
			echo 'Could not connect to Twitter. Refresh the page or try again later.';
		}
	}
	public function twitterverify() {
		
		
		$ok = $this->twconnect->twprocess_callback();
		
		if ( $ok ) { redirect('social/twittersuccess'); }
			else redirect ('social/twiiterfailure');
			
	}
	public function twittersuccess() {
		
		$this->twconnect->twaccount_verify_credentials();
		
		$user_profile = $this->twconnect->tw_user_info;
		
		$profile = array(
			'id' => $user_profile->id,
			'name' => $user_profile->name,
			'screen_name' => $user_profile->screen_name,
			'location' => $user_profile->location,
			'description' => $user_profile->description,
			'profile_image_url' => $user_profile->profile_image_url,
		);
		
		// print_r($arr);
		$twdata = array(
			'registrant_email_id' => $profile['screen_name'].'@twitter.com',
			'registrant_name' => $profile['name'],
			'registrant_logo' => $profile['profile_image_url'],
			'registrant_register_type' => 'twitter'
		);
		if($this->job_provider_model->social_authendication_registration($twdata) === 'inserted')
		{
			$twdata['user_type'] = 'provider';
			$twdata['login_type'] = 'twitter';
			$this->session->set_userdata("login_status", TRUE);
			$this->session->set_userdata("login_session",$twdata);
			redirect('provider/dashboard');
		}
		else{
			$checkvaliduser = $this->job_provider_model->social_valid_provider_login($twdata);
			if($checkvaliduser['valid_status'] === 'valid'){
				$this->session->set_userdata("login_status", TRUE);
				$this->session->set_userdata("login_session",$checkvaliduser);
				redirect('provider/dashboard');
			}
			else{
				$tw['reg_server_msg'] = 'Your Twitter account does not associate with Teacher recruit!';	
				$tw['fbloginurl'] = $common->facebookloginurl();
				$this->load->view('job-providers-login',$tw);
			}
		}
		
	}
	public function twitterfailure() {
		if($this->session->userdata('login') == true){
			redirect('/');
		}
	}
	public function linkedin() {
		$ci =& get_instance();
		$ci->config->load('linkedin', true);
		$config = $ci->config->item('linkedin');
		if (isset($_GET["oauth_problem"]) && $_GET["oauth_problem"] <> "") {
  			// in case if user cancel the login. redirect back to home page.
  			$_SESSION["err_msg"] = $_GET["oauth_problem"];
  			redirect("login/seeker");
  			exit;
		}
		$client = new oauth_client_class;
		$client->debug = false;
		$client->debug_http = true;
		$client->redirect_uri = $config['callbackURL'];
		$client->client_id = $config['linkedinApiKey'];
		$application_line = __LINE__;
		$client->client_secret = $config['linkedinApiSecret'];
		if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
  			die('Please go to LinkedIn Apps page https://www.linkedin.com/secure/developer?newapp= , '.
			'create an application, and in the line '.$application_line.
			' set the client_id to Consumer key and client_secret with Consumer secret. '.
			'The Callback URL must be '.$client->redirect_uri).' Make sure you enable the '.
			'necessary permissions to execute the API calls your application needs.';
		/* API permissions */
		$client->scope = $config['linkedinScope'];
		if (($success = $client->Initialize())) {
  			if (($success = $client->Process())) {
    			if (strlen($client->authorization_error)) {
      				$client->error = $client->authorization_error;
      				$success = false;
    			} elseif (strlen($client->access_token)) {
      				$success = $client->CallAPI(
					'http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,location,picture-url,public-profile-url,formatted-name)', 
					'GET', array(
						'format'=>'json'
					), array('FailOnAccessError'=>true), $user);
    			}
  			}
  			$success = $client->Finalize($success);
		}
		if ($client->exit){
			//redirect("login/seeker"); exit;
		 }
		if ($success) {
			if(isset($user)){
				$lidata = array(
					'registrant_email_id' => $user->emailAddress,
					'registrant_name' => $user->firstName,
					'registrant_logo' => $user->pictureUrl,
					'registrant_register_type' => 'linkedin'
				);
				if($this->job_provider_model->social_authendication_registration($lidata) === 'inserted')
				{
					$lidata['user_type'] = 'provider';
					$lidata['login_type'] = 'linkedin';
					$this->session->set_userdata("login_status", TRUE);
					$this->session->set_userdata("login_session",$lidata);
					redirect('provider/dashboard');
				}
				else{
					$checkvaliduser = $this->job_provider_model->social_valid_provider_login($lidata);
					if($checkvaliduser['valid_status'] === 'valid'){
						$this->session->set_userdata("login_status", TRUE);
						$this->session->set_userdata("login_session",$checkvaliduser);
						redirect('provider/dashboard');
					}
					else{
						$li['reg_server_msg'] = 'Your Twitter account does not associate with Teacher recruit!';	
						$li['fbloginurl'] = $common->facebookloginurl();
						$this->load->view('job-providers-login',$li);
					}
				}
			}
		} else {
		 redirect("/"); 
		}
	}
	public function google()
	{
		$CI =& get_instance();
		include_once APPPATH."libraries/google/Google_Client.php";
        include_once APPPATH."libraries/google/contrib/Google_Oauth2Service.php"; 
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName(GOOGLEAPPNAME);
        $gClient->setClientId(GOOGLECLIENTID);
        $gClient->setClientSecret(GOOGLECLIENTSECRET);
        $gClient->setRedirectUri(GOOGLEREDIRECTURL);
        $google_oauthV2 = new Google_Oauth2Service($gClient);
        if (isset($_REQUEST['code'])) {
        	$CI =& get_instance();
            $gClient->authenticate();
            $CI->session->set_userdata('token', $gClient->getAccessToken());
            redirect(filter_var($redirectUrl, FILTER_SANITIZE_URL));
        }
        $token = $CI->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }
        if ($gClient->getAccessToken()) {
            $profile = $google_oauthV2->userinfo->get();
            $godata = array(
				'registrant_email_id' => $profile['email'],
				'registrant_name' => $profile['given_name'],
				'registrant_logo' => $profile['picture'],
				'registrant_register_type' => 'google'
			);
			if($this->job_provider_model->social_authendication_registration($godata) === 'inserted')
			{
				$godata['user_type'] = 'provider';
				$godata['login_type'] = 'google';
				$this->session->set_userdata("login_status", TRUE);
				$this->session->set_userdata("login_session",$godata);
				redirect('provider/dashboard');
			}
			else{
				$checkvaliduser = $this->job_provider_model->social_valid_provider_login($godata);
				if($checkvaliduser['valid_status'] === 'valid'){
					$this->session->set_userdata("login_status", TRUE);
					$this->session->set_userdata("login_session",$checkvaliduser);
					redirect('provider/dashboard');
				}
				else{
					$go['reg_server_msg'] = 'Your Google account does not associate with Teacher recruit!';	
					$go['fbloginurl'] = $common->facebookloginurl();
					$this->load->view('job-providers-login',$go);
				}
			}
        } 
        else {
        	redirect($gClient->createAuthUrl());
        }
	}
	
}