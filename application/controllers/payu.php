<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payu extends CI_Controller {
	
	public function index()
	{
		if(isset($_POST)){
			if($_POST['amount'] > 0){
				$posted = array();
				if (!empty($_POST)) {
					foreach ($_POST as $key => $value) {
						$posted[$key] = $value;
					}
				}	
				$formError = 0;
				if (empty($posted['txnid'])) {
					// Generate random transaction id
					$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
				} else {
					$txnid = $posted['txnid'];
				}
				$hash = '';
				// Hash Sequence
				$posted['service_provider'] = 'payu_paisa';
				$posted['key'] = PAYUMERCHANTKEY;
				$posted['furl'] = PAYUFAILUREURL;
				$posted['surl'] = PAYUSUCCESSURL;
				$posted['curl'] = PAYUCANCELURL;
				$posted['txnid'] = $txnid;
				$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
				if (empty($posted['hash']) && sizeof($posted) > 0) {
					if (empty($posted['key']) || empty($posted['txnid']) || empty($posted['amount']) || empty($posted['firstname']) || empty($posted['email']) || empty($posted['phone']) || empty($posted['productinfo']) || empty($posted['surl']) || empty($posted['furl']) || empty($posted['service_provider'])) {
						$formError = 1;
					} else {
						$hashVarsSeq = explode('|', $hashSequence);
						$hash_string = '';
						foreach ($hashVarsSeq as $hash_var) {
							$hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
							$hash_string .= '|';
						}
						$hash_string .= PAYUMERCHANTSALT;
						$posted['hash'] = strtolower(hash('sha512', $hash_string));
						$posted['action'] = PAYUBASEURL. '/_payment';
					}
				} 
				$this->load->view('payu',$posted);
			}
			else{
				//write free payment code
			}
		}
		else{
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
	}
}