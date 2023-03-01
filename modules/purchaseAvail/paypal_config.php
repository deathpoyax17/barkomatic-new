<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/

// Database Configuration 
define("DB_HOST", "localhost");
define("DB_ROOT", "u846678508_barkomatic");
define("DB_PASS", "Deathpoyax9876");
define("DB_NAME", "u846678508_barkomatic");
   
    $con = mysqli_connect(DB_HOST, DB_ROOT, DB_PASS, DB_NAME);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

// PayPal Configuration
define('PAYPAL_EMAIL', 'geraldliam@businesstesting.com'); 
define('RETURN_URL', 'https://5930-202-175-242-179.ap.ngrok.io/TestSite/return.php'); 
define('CANCEL_URL', 'https://5930-202-175-242-179.ap.ngrok.io/TestSite/cancel.php'); 
define('NOTIFY_URL', 'https://5930-202-175-242-179.ap.ngrok.io/TestSite/notify.php'); 
define('CURRENCY', 'USD'); 
define('SANDBOX', TRUE); // TRUE or FALSE 
define('LOCAL_CERTIFICATE', FALSE); // TRUE or FALSE

if (SANDBOX === TRUE){
	$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
}else{
	$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
}
// PayPal IPN Data Validate URL
define('PAYPAL_URL', $paypal_url);