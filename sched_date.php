<?php 
   define("DB_HOST", "server143.web-hosting.com");
   define("DB_ROOT", "barkicek_barkomatic");
   define("DB_PASS", "barkomatic@barkomatic");
   define("DB_NAME", "barkicek_barkomatic");
   
    $con = mysqli_connect(DB_HOST, DB_ROOT, DB_PASS, DB_NAME);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
$sql = "SELECT depart_date FROM tbl_ship_schedule";

$results = $con->query($sql);

// Move $data declaration up for zero result.
$data = array();

foreach($results as $result)
{
    $data[] = $result['depart_date'];
    // $arraydata = implode(',',$checkDates);
    // echo $arraydata;
   
} 

// Send headers first before sending any data
header('Content-Type: application/json');
echo json_encode($data);


?>



