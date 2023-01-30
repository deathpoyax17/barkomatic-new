<?php 
// Include the database config file 
include_once 'config.php';
session_start();
 
if(!empty($_POST["port_name"])){ 
    // Fetch state data based on the specific country 
    $locname=$_POST['port_name'];
    // $shipName = $_SESSION['owner_id'];
    $query = "SELECT * routes WHERE departure_from='$locname'"; 
    $result = $con->query($query); 
     
    // Generate HTML of state options list 
  if (!empty($result) && $result->num_rows > 0) {
        echo '<option value="">Select Port</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['route_id'].'">'.$row['departure_port'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Port not available</option>'; 
    } 
    }
    
    if(!empty($_POST["locato"])){ 
    // Fetch state data based on the specific country 
    $locnames=$_POST['locato'];
    //  $shipName = $_SESSION['owner_id'];
    $query = "SELECT * routes WHERE departure_from='$locnames'";  
    $result = $con->query($query); 
     
    // Generate HTML of state options list 
  if (!empty($result) && $result->num_rows > 0) {
        echo '<option value="">Select Port</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['route_id'].'">'.$row['departure_port'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Port not available</option>'; 
    } 
    }
?>