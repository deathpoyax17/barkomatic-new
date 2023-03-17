<?php
include("../config.php");
// Prepare SQL statement
$sql = "SELECT * FROM payment_info WHERE txn_id = ?";
$stmt = $con->prepare($sql);
// Bind parameters
$stmt->bind_param("s", $_GET['tx']);
// Execute statement
$stmt->execute();
// Check if transaction exists in database
$result = $stmt->get_result();
if ($result->num_rows > 0) {
        // If transaction exists, update status in tickets table
    $updateSql = "UPDATE tickets SET status = 'completed' WHERE ticket_id = ?";
    $updateStmt = $con->prepare($updateSql);
    // Bind parameters
    $updateStmt->bind_param("s", $_GET['item_name']);
    // Execute statement
    if ($updateStmt->execute() === TRUE) {
        $stat = "Thank you!";
    } else {
            $stat = "Error updating ticket status: " . $con->error;
    }
} else {
         $stat =  "Transaction not recorded";
}

?>

<html>
<head>
<title>Payment Confirmed</title>
</head>
<body>
    <div style="width:700px; margin:50 auto;">
        <h1><?php echo $stat; ?>.<br /></h1>
    </div>

<br /><br />


</body>
</html>