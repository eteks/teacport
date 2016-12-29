<?php
/**
 * twconnect library configuration
 */
if($_SERVER['SERVER_ADDR'] === '::1' || $_SERVER['SERVER_ADDR'] === '127.0.0.1'){
	//local settings
	$config = array(
	  'consumer_key'    => 'WtZZYO7OMHN6a9GdI8QnIHFjT',
	  'consumer_secret' => 'ebFGoz2TSiFtBLJMEB6v2z2GTnGHGNjRy8OpfgZVoX4nSKkbDE',
	  'oauth_callback'  => 'login/twitterverify'
	);
}
else{
	//server settings
	$config = array(
	  'consumer_key'    => 'ZbfIXWjXj1ndM0RXp8x2ADJVV',
	  'consumer_secret' => 'QzY8y80MRSBxVtCIAZfSIqgzLGYmRZjNWTWkFKpJi8VYBIRLHz',
	  'oauth_callback'  => 'login/twitterverify'
	);
}
?>