<?php 
// Include the database config file 
include_once 'config.php';
session_start();
 
if(!empty($_POST["port_name"])){ 
    // Fetch state data based on the specific country 
    $locname=$_POST['port_name'];
    // $shipName = $_SESSION['owner_id'];
    $query = "SELECT * from routes WHERE route_id='$locname'"; 
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
    $locname=$_POST['locato'];
    //  $shipName = $_SESSION['owner_id'];
    $query = "SELECT * from routes WHERE route_id='$locname'";  
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

    if(!empty($_POST["vesselAccom"])){ 
        // Fetch state data based on the specific country 
        $accom=$_POST['vesselAccom'];
        //  $shipName = $_SESSION['owner_id'];
        $query = "SELECT * from accommodations where ferry_id='$accom'";  
        $result = $con->query($query); 
         
        // Generate HTML of state options list 
      if (!empty($result) && $result->num_rows > 0) { 
            while($row = $result->fetch_assoc()){  
                echo '<option value="'.$row['accomodation_id'].'">'.$row['acomm_name']."->(P".$row['price'].")".'</option>'; 
            } 
        }else{ 
            echo '<option value="">Accommodation not Available</option>'; 
        } 
        }
?>