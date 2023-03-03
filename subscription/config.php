<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/

// Database Configuration 

// PayPal Configuration
define('PAYPAL_EMAIL', 'christiangartin@shiplines.com'); 
define('RETURN_URL', 'https://3e42-202-175-242-179.ap.ngrok.io/barkomatic-new/subscription/success.php'); 
define('CANCEL_URL', 'https://3e42-202-175-242-179.ap.ngrok.io/barkomatic-new/modules/purchaseAvail/cancel.php'); 
define('NOTIFY_URL', 'https://3e42-202-175-242-179.ap.ngrok.io/barkomatic-new/modules/purchaseAvail/notify.php'); 
define('CURRENCY', 'PHP'); 
define('SANDBOX', TRUE); // TRUE or FALSE 
define('LOCAL_CERTIFICATE', FALSE); // TRUE or FALSE

if (SANDBOX === TRUE){
	$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
}else{
	$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
}
// PayPal IPN Data Validate URL
define('PAYPAL_URL', $paypal_url);