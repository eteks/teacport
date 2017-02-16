<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

//This hook 
$hook['pre_controller'][] = array(
        'class'    => 'Common_functions',
        'function' => 'admin_global_config',
        'filename' => 'common_functions.php',
        'filepath' => 'controllers/admin',
        'params' => array()
        );
//it is for global settings like fb,linkedin,twitter,google,paymentgateway,sms gateway and mailsettings	
// $hook['pre_controller'][] = array(
        // 'class'    => 'Common',
        // 'function' => 'settings',
        // 'filename' => 'common.php',
        // 'filepath' => 'controllers',
        // 'params' => array()
        // );

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */