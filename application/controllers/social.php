<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social extends CI_Controller {
	public function __construct(){
		parent::__construct();
		session_start();
		$this->load->library(array('twconnect'));
		$this->load->library(array('linkedin/http_class','linkedin/oauth_client_class'));
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
			print_r($profile);
			// $check1 = mysqli_query($connection,"select * from stork_users where social_id='".$profile['id']."' and user_status = '1'");
			// $check = mysqli_num_rows($check1);
			// if ($check == 0) { // if new user . Insert a new record		
// 			
				// $query = "INSERT INTO stork_users (social_id,username,password,first_name,last_name,user_type,user_email,user_dob,line1,line2,user_mobile,user_access_type,user_status) VALUES ('".$profile['id']."','".$profile['email']."','".$profile['first_name']."','".$profile['first_name']."','".$profile['last_name']."','fb','".$profile['email']."','fb','fb','fb','fb','2','1')";
				// mysqli_query($connection,$query);
				// $user_id = mysqli_insert_id($connection);
				// $_SESSION['login_status'] = 1;
				// $_SESSION['user_id'] = $user_id;
			// } else {   // If Returned user . update the user record	
				// $user_id_data= mysqli_fetch_array($check1);
				// $query = "UPDATE stork_users SET first_name='$ffname', user_email='$femail' where Fuid='$fuid'";
				// mysqli_query($connection,$query);
				// $_SESSION['login_status'] = 1;
				// $_SESSION['user_id'] = $user_id_data['user_id'];
			// }
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
		
		$this->session->set_userdata('login',true);
		
		$arr = array(
			'id' => $user_profile->id,
			'name' => $user_profile->name,
			'screen_name' => $user_profile->screen_name,
			'location' => $user_profile->location,
			'description' => $user_profile->description,
			'profile_image_url' => $user_profile->profile_image_url,
		);
		
		$this->session->set_userdata('user_profile',$arr);
		
		print_r($arr);
		
	}
	public function twitterfailure() {
		if($this->session->userdata('login') == true){
			redirect('welcome/profile');
		}
		
		echo '<p>Twitter connect failed</p>';
		echo '<p><a href="' . base_url() . 'welcome/logout">Try again!</a></p>';
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
			$_SESSION['loggedin_user_id'] = $user_id;
			$_SESSION['user'] = $user;
		} else {
		 	 $_SESSION["err_msg"] = $client->error;
		}
	}
	
}