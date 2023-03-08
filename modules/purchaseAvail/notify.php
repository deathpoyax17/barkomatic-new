<?php

/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
require_once("../config.php");
require_once("paypal_config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*
Read POST data
reading posted data directly from $_POST causes serialization
issues with array data in POST.
Reading raw POST data from input stream instead.
*/
define("IPN_LOG_FILE", "ipn.log");
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
	$keyval = explode ('=', $keyval);
	if (count($keyval) == 2)
		$myPost[$keyval[0]] = urldecode($keyval[1]);
}

// Build the body of the verification post request, adding the _notify-validate command.
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
	$get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value) {
	if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
		$value = urlencode(stripslashes($value));
	} else {
		$value = urlencode($value);
	}
	$req .= "&$key=$value";
}

/*
Post IPN data back to PayPal using curl to validate the IPN data is genuine
Without this step anyone can fake IPN data
*/
$ch = curl_init(PAYPAL_URL);
if ($ch == FALSE) {
	return FALSE;
}
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSLVERSION, 6);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

/*
This is often required if the server is missing a global cert bundle, or is using an outdated one.
Please download the latest 'cacert.pem' from http://curl.haxx.se/docs/caextract.html
*/
if (LOCAL_CERTIFICATE == TRUE) {
	curl_setopt($ch, CURLOPT_CAINFO, __DIR__ . "/cert/cacert.pem");
}

// Set TCP timeout to 30 seconds
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Connection: Close',
	'User-Agent: PHP-IPN-Verification-Script'
));

$res = curl_exec($ch);

// cURL error
if (curl_errno($ch) != 0){
	curl_close($ch);
	exit;
} else {
	curl_close($ch);
}

/* 
 * Inspect IPN validation result and act accordingly 
 * Split response headers and payload, a better way for strcmp 
 */
$tokens = explode("\r\n\r\n", trim($res));
$res = trim(end($tokens));
if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) { 	
	// assign posted variables to local variables
	if($_POST['item_number']=="Purchase"  || $_POST['item_number']=="Reservation"){
	$item_number = $_POST['item_number'];
	$item_name = $_POST['item_name'];
	$payment_status = $_POST['payment_status'];
	$amount = $_POST['mc_gross'];
	$currency = $_POST['mc_currency'];
	$txn_id = $_POST['txn_id'];
	$receiver_email = $_POST['receiver_email'];
	// $payer_email = $_POST['payer_email'];

	// check that receiver_email is your PayPal business email
	if (strtolower($receiver_email) != strtolower(PAYPAL_EMAIL)) {
		error_log(date('[Y-m-d H:i e] '). "Invalid Business Email: $req" . PHP_EOL, 3, IPN_LOG_FILE);
		exit();
	}

	// check that payment currency is correct
	if (strtolower($currency) != strtolower(CURRENCY)) {
		error_log(date('[Y-m-d H:i e] '). "Invalid Currency: $req" . PHP_EOL, 3, IPN_LOG_FILE);
		exit();
	}

	//Check Unique Transcation ID
	GLOBAL $con;
	// Check Unique Transaction ID
$txn_id = mysqli_real_escape_string($con, $txn_id);
$result = mysqli_query($con, "SELECT * FROM payment_info WHERE txn_id='$txn_id'");
$unique_txn_id = mysqli_num_rows($result);

if (!empty($unique_txn_id)) {
  error_log(date('[Y-m-d H:i e] ') . "Invalid Transaction ID: $req" . PHP_EOL, 3, IPN_LOG_FILE);
  mysqli_close($con);
  exit();
} else {
  // Insert payment info into database
  $item_number = mysqli_real_escape_string($con, $item_number);
  $item_name = mysqli_real_escape_string($con, $item_name);
  $payment_status = mysqli_real_escape_string($con, $payment_status);
  $amount = mysqli_real_escape_string($con, $amount);
  $currency = mysqli_real_escape_string($con, $currency);
  $txn_id = mysqli_real_escape_string($con, $txn_id);
  
  $sql = "INSERT INTO payment_info (item_number, item_name, payment_status, amount, currency, txn_id) 
          VALUES ('$item_number', '$item_name', '$payment_status', '$amount', '$currency', '$txn_id')";

  if (!mysqli_query($con, $sql)) {
    error_log(date('[Y-m-d H:i e] ') . "Error inserting payment info: " . mysqli_error($con) . PHP_EOL, 3, IPN_LOG_FILE);
    mysqli_close($con);
    exit();
		}
	  }
	}
	else
	{
		   // Retrieve transaction data from PayPal 
		   $paypalInfo = $_POST; 
		   $ipn_track_id = $paypalInfo['ipn_track_id']; 
		   $txn_type = $paypalInfo['txn_type']; //subscr_payment or subscr_signup 
			
		   if(!empty($txn_type) && $txn_type == 'subscr_signup'){ 
			   $subscr_id = $paypalInfo['subscr_id']; 
			   $payer_name = trim($paypalInfo['first_name'].' '.$paypalInfo['last_name']); 
			   $payer_email = $paypalInfo['payer_email']; 
			   $item_name = $paypalInfo['item_name']; 
			   $item_number = $paypalInfo['item_number']; 
			   $custom = $paypalInfo['custom']; 
			   $paid_amount = $paypalInfo['mc_amount3']; 
			   $currency_code = $paypalInfo['mc_currency']; 
			   $payment_status = !empty($paypalInfo['payment_status'])?$paypalInfo['payment_status']:''; 
				
			   $period = $paypalInfo['period3']; 
			   $period_arr = explode(' ', $period); 
			   $interval = $period_arr[1]; 
			   $interval_count = $period_arr[0]; 
				
			   $subscr_date = $paypalInfo['subscr_date']; 
			   $dt = new DateTime($subscr_date); 
			   $subscr_date = $dt->format("Y-m-d H:i:s"); 
				
			   $interval_unit_arr = array('D' => 'day', 'W' => 'week', 'M' => 'month', 'Y' => 'year'); 
			   $interval_unit = $interval_unit_arr[$interval]; 
			   $subscr_date_valid_to = date("Y-m-d H:i:s", strtotime(" + $interval_count $interval_unit", strtotime($subscr_date))); 
				
			   $txn_id = ''; 
		   }else{ 
			   $subscr_id = $paypalInfo['subscr_id']; 
			   $payer_name = trim($paypalInfo['first_name'].' '.$paypalInfo['last_name']); 
			   $payer_email = $paypalInfo['payer_email']; 
			   $item_name = $paypalInfo['item_name'];
			   $item_number = $paypalInfo['item_number']; 
			   $custom = $paypalInfo['custom']; 
			   $paid_amount =  !empty($paypalInfo['mc_gross'])?$paypalInfo['mc_gross']:0; 
			   $currency_code = $paypalInfo['mc_currency']; 
			   $payment_status = !empty($paypalInfo['payment_status'])?$paypalInfo['payment_status']:''; 
				
			   $txn_id = !empty($paypalInfo['txn_id'])?$paypalInfo['txn_id']:''; 
			   $subscr_date = !empty($paypalInfo['payment_date'])?$paypalInfo['payment_date']:date("Y-m-d H:i:s"); 
			   $dt = new DateTime($subscr_date); 
			   $subscr_date = $dt->format("Y-m-d H:i:s"); 
		
			   $interval = ''; 
			   $interval_count = 0; 
			   $subscr_date_valid_to = ''; 
		   } 
			
		   if(!empty($ipn_track_id)){ 
			   // Check if transaction data exists with the same TXN ID 
			   $prevPayment = $con->query("SELECT id FROM user_subscriptions WHERE ipn_track_id = '".$ipn_track_id."'"); 
				
			   if($prevPayment->num_rows > 0){ 
				   if($txn_type == 'subscr_signup'){ 
					   $sql = "UPDATE user_subscriptions SET paypal_subscr_id = '".$subscr_id."', subscr_interval = '".$interval."', subscr_interval_count = '".$interval_count."', valid_from = '".$subscr_date."', valid_to = '".$subscr_date_valid_to."' WHERE ipn_track_id = '".$ipn_track_id."'"; 
					   $update = $con->query($sql); 
				   }elseif($txn_type == 'subscr_payment'){ 
					   $sql = "UPDATE user_subscriptions SET txn_id = '".$txn_id."', payment_status = '".$payment_status."' WHERE ipn_track_id = '".$ipn_track_id."'"; 
					   $update = $con->query($sql); 
				   } 
			   }else{ 
				   if($txn_type == 'subscr_payment' || $txn_type == 'subscr_signup'){ 
					   // Insert transaction data into the database 
					   $sql = "INSERT INTO user_subscriptions(user_id,plan_id,paypal_subscr_id,txn_id,subscr_interval,subscr_interval_count,valid_from,valid_to,paid_amount,currency_code,payer_name,payer_email,payment_status,ipn_track_id) VALUES('".$custom."','".$item_number."','".$subscr_id."','".$txn_id."','".$interval."','".$interval_count."','".$subscr_date."','".$subscr_date_valid_to."','".$paid_amount."','".$currency_code."','".$payer_name."','".$payer_email."','".$payment_status."','".$ipn_track_id."')"; 
					   $insert = $con->query($sql); 
						
					   // Update subscription id in the users table 
					   if($insert && !empty($custom)){ 
						   $subscription_id = $con->insert_id; 
						   $update = $con->query("UPDATE ship_owners SET subscription_id = {$subscription_id} WHERE id = {$custom}"); 
					   } 
				   } 
			   } 
		   } 
	}
// if (mysqli_error($con)) {
// 	error_log(date('[Y-m-d H:i e] ') . "MySQL error: " . mysqli_error($con) . PHP_EOL, 3, IPN_LOG_FILE);
//   }
mysqli_close($con);
	
} else if (strcmp($res, "INVALID") == 0) {
	//Log invalid IPN messages for investigation
	error_log(date('[Y-m-d H:i e] '). "Invalid IPN: $req" . PHP_EOL, 3, IPN_LOG_FILE);
}
?>