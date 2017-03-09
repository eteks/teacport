<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/Crypto.php'); 	

error_reporting(0);

$data = array(
			'merchant_id'     => $merchant_id,
			'order_id'		  => $order_id,
			'currency'		  => $currency,
			'amount'		  => '1.00',
			// 'amount'		  => $amount,
			'redirect_url'	  => $redirect_url,
			'cancel_url'      => $cancel_url,
			'language'		  => $language,
			'billing_name'    => $billing_name,
			'billing_email'	  => $billing_email,
			'billing_tel'	  => $billing_tel,
			'billing_address' => $billing_address,
			'billing_city'    => $billing_city,
			'billing_state'   => $billing_state,
			'billing_country' => $billing_country,
			'merchant_param1' => ucfirst($plan_option),
			'merchant_param2' => $merchant_param2,
			'merchant_param3' => $merchant_param3,
			'merchant_param4' => $merchant_param4,
			'merchant_param5' => $merchant_param5
		);

$merchant_data='';
// $working_key= ''; //Shared by CCAVENUES
// $access_code= ''; //Shared by CCAVENUES

foreach ($data as $key => $value){
	$merchant_data.=$key.'='.urlencode($value).'&';
}

$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
echo form_open($action,'name="ccavenue_req_form"');
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
echo form_close();
?>
<script type="text/javascript">
    document.ccavenue_req_form.submit();
</script>

