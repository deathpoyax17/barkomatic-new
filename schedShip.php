<?php
require "resources/config.php";

if(isset($_POST['shipName'])){
 $ships = $_POST['shipName'];
   $loc_from_arr = array();
   $sql = "SELECT * FROM tbl_ship_port 
            JOIN tbl_add_ship_loc_belong ON tbl_ship_port.id = tbl_add_ship_loc_belong.id WHERE tbl_add_ship_loc_belong.ship ='$ships'";

   $result = mysqli_query($con,$sql);

   while( $row = mysqli_fetch_array($result) ){
      $userid = $row['id'];
      $location_name = $row['location_from'];
      $location_to = $row['location_to'];
      $port_from = $row['port_from'];
      $port_to = $row['port_to'];

      $loc_from_arr[] = array("id" => $userid, "location_name" => $location_name, "location_to" => $location_to, "port_from" => $port_from, "port_to" => $port_to);
   }
}
// encoding array to json format
echo json_encode($loc_from_arr);

    
?>
