<?php

// Connect to the database
require "../../resources/config.php";

// Get the selected accommodation from the POST request
$selected_accommodation = $_POST['selectedAccommodation'];

// Get the price for the selected accommodation from the database
$sql = "SELECT price FROM accommodations WHERE accomodation_id='$selected_accommodation'";
$result = $con->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $price = $row['price'];
} else {
    $price = 0;
}
// Return the price
echo $price;
// Close the connection
$con->close();

?>
