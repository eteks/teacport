<?php
//Local server or Testing server
if($_SERVER['SERVER_ADDR'] === '::1' || $_SERVER['SERVER_ADDR'] === '127.0.0.1' || $_SERVER['SERVER_ADDR'] === '172.31.47.215'){
	$config = Array(
	    'protocol' => 'smtp',
	    'smtp_host' => 'ssl://smtp.gmail.com',
	    'smtp_port' => 465,
	    'smtp_user' => 'mail2teachersrecruit@gmail.com',
	    'smtp_pass' => 's.narendiran05',
	    'mailtype'  => 'html', 
	    'charset'   => 'iso-8859-1',
	    'wordwrap'  => TRUE,
	    'newline'  => "\r\n"
	);
}else{
	//Live server
	$config = Array(
	    'protocol' => 'smtp',
	    'smtp_host' => 'ssl://sg2plcpnl0088.prod.sin2.secureserver.net',
	    'smtp_port' => 465,
	    'smtp_user' => 'support@teachersrecruit.com',
	    'smtp_pass' => 'J_g6x7s5?JG4',
	    'mailtype'  => 'html', 
	    'charset'   => 'iso-8859-1',
	    'wordwrap'  => TRUE,
	    'newline'  => "\r\n"
	);
}

?>