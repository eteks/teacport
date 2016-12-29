<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

//array to get course type 
define('COURSE_TYPE',serialize(array("UG"=>"Under Graduate",
        "PG"=>"Post Graduate")));

// Nationality
define('NATIONALITY',serialize(array("indian"=>"Indian",
            "other"=>"Others")));
// Religion
define('RELIGION',serialize(array("hindu"=>"Hindu","muslim"=>"Muslim","christian"=>"Christian","others"=>"Others")));

// Community
define('COMMUNAL',serialize(array("st"=>"Scheduled Tribe (ST)","sc"=>"Scheduled Caste (SC)","sca"=>"Scheduled Caste-Arunthathiar (SCA)","mbc"=>"Most Backward Class (MBC)","dc"=>"Denotified Community (DC)","bc"=>"Backward Class (BC)","bcm"=>"Backward Class-Muslim (BCM)","others"=>"Others")));

//array to get status
define('STATUS',serialize(array("0"=>"Active",
        "1"=>"Inactive")));

// Define seeker upload path
define('SEEKER_UPLOAD','uploads/jobseeker/');

define('PAYUMERCHANTKEY', 'OwGF14'); 
define('PAYUMERCHANTSALT', 'RjWAdXh0');
define('PAYUBASEURL', 'https://test.payu.in');
define('PAYUSUCCESSURL', APP_URL.'provider/paymentreply'); 
define('PAYUFAILUREURL', APP_URL.'provider/paymentreply');
define('PAYUCANCELURL', APP_URL.'provider/paymentreply');

if($_SERVER['SERVER_ADDR'] === '::1' || $_SERVER['SERVER_ADDR'] === '127.0.0.1'){
	//local settings
	define("FACEBOOKAPPID", "1434580023238776"); //facebook app id
	define("FACEBOOKAPPSECRET", "372ac9b0b9e96d105d1b27da18a06e66"); //facebook secret id
}
else{
	//server settings
	define("FACEBOOKAPPID", "1328481350548849"); //facebook app id
	define("FACEBOOKAPPSECRET", "6455b91fc9ee69b60f10914c3e0ecb06"); //facebook secret id
}
define("FACEBOOKGRAPHVERSION", "v2.5");//facebook graph version
define("FACEBOOKLOGINURL", APP_URL."login/facebookverify");//facebook login url
define("FACEBOOKSEEKERLOGINURL", APP_URL."login/seeker/facebookverify");
if($_SERVER['SERVER_ADDR'] === '::1' || $_SERVER['SERVER_ADDR'] === '127.0.0.1'){
	//local settings
	define("GOOGLECLIENTID",'917333063130-hrjho3c5b53ati7uepe7dsto6jjsk345.apps.googleusercontent.com');//google client id
	define("GOOGLECLIENTSECRET",'7pgkz0KpxuUVSLgaymVsYNcG');//google client secret
	define("GOOGLEDEVELOPERKEY",'AIzaSyBFL_IJd2SpUhmXCJMJ1mZg5Gy6NckvjI8');
}
else{
	// server settings
	define("GOOGLECLIENTID",'544080576755-0ch4mllq7fi0d6umo0tp2s73k2jebeha.apps.googleusercontent.com');//google client id
	define("GOOGLECLIENTSECRET",'MkyykL90dEedMBOkrCm7CbCT');//google client secret
	define("GOOGLEDEVELOPERKEY",'AIzaSyCRbJU5BMQMEMlQSfXQbv_GQRlBVWYewmU');
}
define("GOOGLEREDIRECTURL",APP_URL."login/google");//google redirect urlt
define("GOOGLESEEKERREDIRECTURL",APP_URL."login/seeker/google");//google redirect urlt
define("GOOGLEAPPNAME", "Login to Teacher Recruit");
/* End of file constants.php */
/* Location: ./application/config/constants.php */