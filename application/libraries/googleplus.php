<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Googleplus {
	
	public function __construct() {
		
		require APPPATH .'libraries/google-login-api/apiClient.php';
		require APPPATH .'libraries/google-login-api/contrib/apiOauth2Service.php';
		
	}
	
	public function initial_settings($redirecturi){
		
		$this->client = new apiClient();
		$this->client->setApplicationName(GOOGLEAPPNAME);
		$this->client->setClientId(GOOGLECLIENTID);
		$this->client->setClientSecret(GOOGLECLIENTSECRET);
		$this->client->setRedirectUri($redirecturi);
		$this->client->setDeveloperKey(GOOGLEDEVELOPERKEY);
		$this->client->setScopes(array('email','profile'));
		$this->client->setAccessType('online');
		$this->client->setApprovalPrompt('auto');
		$this->oauth2 = new apiOauth2Service($this->client);
	}
	
	public function loginURL() {
        return $this->client->createAuthUrl();
    }
	
	public function getAuthenticate() {
        return $this->client->authenticate();
    }
	
	public function getAccessToken() {
        return $this->client->getAccessToken();
    }
	
	public function setAccessToken() {
        return $this->client->setAccessToken();
    }
	
	public function revokeToken() {
        return $this->client->revokeToken();
    }
	
	public function getUserInfo() {
        return $this->oauth2->userinfo->get();
    }
	
}
?>