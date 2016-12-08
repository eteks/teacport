<?php
/**
 * linked library configuration
 */

$config = array(
  'baseURL'    => APP_URL,
  'callbackURL'    => APP_URL.'login/linkedin',
  'linkedinApiKey'    => '81kkfhb074ezo8',
  'linkedinApiSecret' => 'fbHqfDDHctRWUgrT',
  'linkedinScope'  => 'r_basicprofile r_emailaddress',
  'seekercallbackURL'    => APP_URL.'login/seeker/linkedin'
);

?>