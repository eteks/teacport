<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/Crypto.php');  

error_reporting(0);  

// $workingKey = ''; //Working Key should be provided here.
$encResponse= $encResp; //This is the response sent by the CCAvenue Server
$rcvdString=decrypt($encResponse,$workingKey); //Crypto Decryption used as per the specified working key.
$order_status="";
$decryptValues=explode('&', $rcvdString);
$dataSize=sizeof($decryptValues);
$response_data = array();

for($i = 0; $i < $dataSize; $i++) 
{   
    $information=explode('=',$decryptValues[$i]);
    $response_data[$information[0]] = $information[1];
    // echo '<tr><td>'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>';
}

$response_data['csrf_token'] = $response_data['merchant_param4'];

// echo "<pre>";
// print_r($response_data);
// echo "</pre>";

// $plan_options = explode('#',$response_data['merchant_param5']);
// print_r($plan_options);

echo form_open('provider/subscription','name="ccavenue_res_form"');
echo form_hidden($response_data);
echo form_close();
?>
<script type="text/javascript">
    document.ccavenue_res_form.submit();
</script>
