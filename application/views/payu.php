<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data = array(
        'amount'  			=> $amount,
        'city' 				=> $city,
        'address1' 			=> $address1,
        'address2' 			=> $address2,
        'country' 			=> $country,
        'curl' 				=> $curl,
        'email' 			=> $email,
        'firstname' 		=> $firstname,
        'furl' 				=> $furl,
        'hash' 				=> $hash,
        'key' 				=> $key	,
        'phone' 			=> $phone,
        'productinfo' 		=> $productinfo,
        'service_provider' 	=> $service_provider,
        'state' 			=> $state,
        'surl' 				=> $surl,
        'txnid' 			=> $txnid,
        'udf1' 				=> $udf1,
        'udf2' 				=> $udf2
);
echo form_open($action,'name="payuform"');
echo form_hidden($data);
echo form_close();
?>
<script type="text/javascript">
    document.payuform.submit();
</script>