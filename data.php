<?php 
// Include the database config file 
include_once 'modules/config.php'; 
 
if(!empty($_POST["srch_ship_sched"])){ 
    // Fetch state data based on the specific country 
    $shipname=$_POST['srch_ship_sched'];
    $query = "SELECT * FROM tbl_ship_schedule WHERE ship_reside='$shipname'"; 
    $result = $con->query($query); 
     
    // Generate HTML of state options list 
  if (!empty($result) && $result->num_rows > 0) {
        echo '<option value="">Select Port</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="">OKAY</option>'; 
        } 
    }else{ 
        echo '<option value="">Port not available</option>'; 
    } 
    }
?>