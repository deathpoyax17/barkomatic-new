<?php 
// Include the database config file 
include_once 'config.php';
session_start();
 
if(!empty($_POST["port_name"])){ 
    // Fetch state data based on the specific country 
    $locname=$_POST['port_name'];
    $shipName = $_SESSION['stff_ship_reside'];
    $query = "SELECT 
                    tsp.location_from,
                    tsp.port_from,
                    tsp.location_to,
                    tsp.port_to,
                    tlsb.ship
                    FROM tbl_ship_port tsp
                    INNER JOIN tbl_add_ship_loc_belong tlsb ON tsp.id = tlsb.id WHERE tsp.location_from='$locname' AND tlsb.ship='$shipName'"; 
    $result = $con->query($query); 
     
    // Generate HTML of state options list 
  if (!empty($result) && $result->num_rows > 0) {
        echo '<option value="">Select Port</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['port_from'].'">'.$row['port_from'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Port not available</option>'; 
    } 
    }
    
    if(!empty($_POST["locato"])){ 
    // Fetch state data based on the specific country 
    $locnames=$_POST['locato'];
     $shipName = $_SESSION['stff_ship_reside'];
    $query = "SELECT tsp.location_from,
                    tsp.port_from,
                    tsp.location_to,
                    tsp.port_to,
                    tlsb.ship
                    FROM tbl_ship_port tsp
                    INNER JOIN tbl_add_ship_loc_belong tlsb ON tsp.id = tlsb.id WHERE tsp.location_to='$locnames' AND tlsb.ship='$shipName'"; 
    $result = $con->query($query); 
     
    // Generate HTML of state options list 
  if (!empty($result) && $result->num_rows > 0) {
        echo '<option value="">Select Port</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['port_to'].'">'.$row['port_to'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Port not available</option>'; 
    } 
    }
?>