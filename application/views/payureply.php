<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data = array(
        'PG_TYPE'  			=> $PG_TYPE,
        'addedon' 			=> $addedon,
        'address1' 			=> $address1,
        'address2' 			=> $address2,
        'amount' 			=> $amount,
		'amount_split' 		=> $amount_split,
        'bank_ref_num' 		=> $bank_ref_num,
        'bankcode' 			=> $bankcode,
        'city' 				=> $city,
        'country' 			=> $country,
        'email' 			=> $email,
        'error' 			=> $error,
        'error_Message' 	=> $error_Message,
        'field1' 			=> $field1,
        'field2' 			=> $field2,
        'field3' 			=> $field3,
        'field4' 			=> $field4,
        'field5' 			=> $field5,
        'field6' 			=> $field6,
        'field7' 			=> $field7,
        'field8' 			=> $field8,
        'field9' 			=> $field9,
        'firstname' 		=> $firstname,
        'hash' 				=> $hash,
        'key' 				=> $key,
        'lastname' 			=> $lastname,
        'mihpayid' 			=> $mihpayid,
        'mode' 				=> $mode,
        'payuMoneyId' 		=> $payuMoneyId,
        'phone' 			=> $phone,
    	'productinfo' 		=> $productinfo,
        'state' 			=> $state,
        'status' 			=> $status,
        'txnid' 			=> $txnid,
        'udf1' 				=> $udf1,
        'udf2' 				=> $udf2,
        'udf3' 				=> $udf3,
        'udf4' 				=> $udf4,
        'udf5' 				=> $udf5,
        'udf6' 				=> $udf6,
        'udf7' 				=> $udf7,
        'udf8' 				=> $udf8,
        'udf9' 				=> $udf9,
        'udf10'				=> $udf10,
        'unmappedstatus' 	=> $unmappedstatus,
        'zipcode' 			=> $zipcode,
        'csrf_token'		=> $udf5
);
echo form_open('provider/subscription','name="payureplyform"');
echo form_hidden($data);
echo form_close();
?>
<script type="text/javascript">
    document.payureplyform.submit();
</script>