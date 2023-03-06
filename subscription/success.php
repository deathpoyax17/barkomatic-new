<?php
include_once 'config.php'; 

// Include database connection file 
include_once '../modules/config.php'; 
$payment_id = $statusMsg = ''; 
$status = 'error'; 

if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt'])){ //$_GET['st'] == 'Completed' 
    // Get transaction information from URL  
    $item_number = $_GET['item_number'];   
    $txn_id = $_GET['tx'];  
    $payment_gross = $_GET['amt'];  
    $currency_code = $_GET['cc'];  
    $payment_status = $_GET['st']; 
    $custom = $_GET['cm']; 
     
    // Fetch transaction and subscription info from the database 
    $sqlQ = "SELECT S.*, P.plan_name as plan_name, P.price as plan_amount FROM user_subscriptions as S LEFT JOIN subscription_plans as P On P.plan_id = S.plan_id WHERE S.txn_id = ?"; 
    $stmt = $con->prepare($sqlQ);  
    $stmt->bind_param("i", $db_txn_id); 
    $db_txn_id = $txn_id; 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
     
    if($result->num_rows > 0){ 
      
        // Subscription and transaction details 
        $subscrData = $result->fetch_assoc(); 
         
        $ref_id = $subscrData['id']; 
        $usrid=$subscrData['user_id'];
        $paypal_subscr_id = $subscrData['paypal_subscr_id']; 
        $txn_id = $subscrData['txn_id']; 
        $paid_amount = $subscrData['paid_amount']; 
        $currency_code = $subscrData['currency_code']; 
        $interval = $subscrData['subscr_interval']; 
        $interval_count = $subscrData['subscr_interval_count']; 
        $valid_from = $subscrData['valid_from']; 
        $valid_to = $subscrData['valid_to']; 
        $payment_status = $subscrData['payment_status']; 
         
        $payer_name = $subscrData['payer_name']; 
        $payer_email = $subscrData['payer_email']; 
         
        $plan_name = $subscrData['plan_name']; 
        $plan_amount = $subscrData['plan_amount']; 
         
        $status = 'success'; 
        $statusMsg = 'Your Subscription Payment has been Successful!'; 
        $updating = $con->query("UPDATE `ship_owners` SET `subscription_id`=$ref_id WHERE `owner_id`=$usrid"); 
        $response = array('status' => $status, 'message' => $statusMsg);
        header('Content-Type: application/json');
        echo json_encode($response);
    } else { 
        $statusMsg = "Transaction has been

failed";
$response = array('status' => $status, 'message' => $statusMsg);
header('Content-Type: application/json');
echo json_encode($response);
}
} else {
$statusMsg = "Transaction has been failed";
$response = array('status' => $status, 'message' => $statusMsg);
header('Content-Type: application/json');
echo json_encode($response);
}

?>