<?php

// Connect to the database
require "../../resources/config.php";

// Get the selected accommodation from the POST request
$selected_accommodation = $_POST['selectedAccommodation'];

// Get the price for the selected accommodation from the database
$sql = "SELECT * FROM accommodations WHERE accomodation_id='$selected_accommodation' AND availability=1";
$result = $con->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $price = $row['price'];
    $accomodation_name = $row['acomm_name'];
    $setType = $row['room_type'];
    if($row['aircon']==0){
        $aircon="N/A";
    }else{
        $aircon="YES";
    }
} else {
    $price = 0;
}

// Encode the values as a JSON string
$data = array('price' => $price, 'accomodation_name' => $accomodation_name, 'room_type' => $setType, 'aircon' => $aircon);
echo json_encode($data);

// Close the connection
$con->close();

?>
