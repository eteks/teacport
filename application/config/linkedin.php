<?php
/**
 * linked library configuration
 */
if($_SERVER['SERVER_ADDR'] === '::1' || $_SERVER['SERVER_ADDR'] === '127.0.0.1'){
	//local settings
	$config = array(
	  'baseURL'    => APP_URL,
	  'callbackURL'    => APP_URL.'login/linkedin',
	  'linkedinApiKey'    => '81kkfhb074ezo8',
	  'linkedinApiSecret' => 'fbHqfDDHctRWUgrT',
	  'linkedinScope'  => 'r_basicprofile r_emailaddress'
	);
}
else{
	//server settings
	$config = array(
	  'baseURL'    => APP_URL,
	  'callbackURL'    => APP_URL.'login/linkedin',
	  'linkedinApiKey'    => '81n1o6at6e35kq',
	  'linkedinApiSecret' => 'NfqbGWLdIPYKfAJC',
	  'linkedinScope'  => 'r_basicprofile r_emailaddress'
	);
}
?>