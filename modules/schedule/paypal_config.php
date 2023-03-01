<?php
   // Product information
   // Subscription price for one month
   //$itemPrice = 25.00;
     
   // PayPal configuration 
   define('PAYPAL_ID', 'christiangartin@shiplines.com'); 
   define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
    
   define('PAYPAL_RETURN_URL', 'https://barkomatic.online/modules/schedule/paypal_success.php'); 
   define('PAYPAL_CANCEL_URL', 'https://barkomatic.online/modules/schedule/paypal_cancel.php'); 
   define('PAYPAL_NOTIFY_URL', 'https://barkomatic.online/modules/schedule/paypal_ipn.php'); 
   define('PAYPAL_CURRENCY', 'PHP'); 
   define('SANDBOX', TRUE); // TRUE or FALSE 
   define('LOCAL_CERTIFICATE', FALSE); // TRUE or FALSE
   
   if (SANDBOX === TRUE){
       $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
   }else{
       $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
   }
   // PayPal IPN Data Validate URL
   define('PAYPAL_URL', $paypal_url);
?>