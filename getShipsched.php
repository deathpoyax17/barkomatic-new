<?php
require "resources/config.php";
if(isset($_POST['action']) && $_POST['action'] == 'getShipsched') {
$acton = $_POST['shipname'];
   $stmt = $con->prepare("SELECT * FROM tbl_ship_schedule WHERE ship_reside=?");
    $stmt->bind_param('s',$acton);
    $stmt->execute();
    $result = $stmt->get_result();
 $output='
 	<div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">
 		<div class="carousel-inner">';
    while ($row = $result->fetch_assoc()) {
       $date = date('d', strtotime($row['depart_date']));
         $month = date('M', strtotime($row['depart_date']));
         $year = date('Y', strtotime($row['depart_date']));
        $output.='
        <div class="item active">
		<div class="carousel-col">
        <div class="date-card">
  <div class="day">'.$date.'</div>
  <div>
     <div class="month">'.$month.'</div>
    <div class="year">'.$year.'</div>
<div class="year">
  <p>From : <b>'.$row['location_from'].'('.$row['port_from'].')</b>  <i class="fa fa-arrow-right" aria-hidden="true"></i></p>
    <p>To : <b>'.$row['location_to'].'('.$row['port_to'].')</b></p>
</div>
  </div>
</div>
  		</div>
	</div>          ';
    }
    $output.='
    	</div>
    	<div class="left carousel-control">
					<a href="#carousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
				</div>
				<div class="right carousel-control">
					<a href="#carousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			';
  
}
  echo $output;
?>

			
