<?php
require "resources/config.php";

if(isset($_POST['action']) && $_POST['action'] == 'getShipsched') {
$acton = $_POST['shipname'];
$port = $con->query("SELECT route_id, concat(`departure_from`,'[',`departure_port`,']') as `route` FROM routes");
   $stmt = $con->prepare("SELECT sched.schedule_id,
   sched.departure_date,
   sched.arrival_time,
   so.ship_name,
   fer.name,
   sched.route_id_from,
   sched.route_id_to
FROM schedules sched
JOIN ferries fer ON sched.ferry_id = fer.ferry_id
JOIN ship_owners so ON sched.owner_id=so.owner_id
WHERE sched.owner_id=?");
    $stmt->bind_param('s',$acton);
    $stmt->execute();
    $result = $stmt->get_result();
    $routes = array_column($port->fetch_all(MYSQLI_ASSOC),'route','route_id');
 $output='
 	<div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="2500">
 		<div class="carousel-inner">';
    while ($row = $result->fetch_assoc()) {
       $date = date('d', strtotime($row['departure_date']));
         $month = date('M', strtotime($row['departure_date']));
         $year = date('Y', strtotime($row['departure_date']));
        $output.='
        <div class="item active">
		<div class="carousel-col">
        <div class="date-card">
  <div class="day">'.$date.'</div>
  <div>
     <div class="month">'.$month.'</div>
    <div class="year">'.$year.'</div>
<div class="year">
  <p>From : <b>'.$routes[$row["route_id_from"]].'</b> <i class="fa fa-arrow-right" aria-hidden="true"></i></p>
    <p>To : <b>'.$routes[$row["route_id_to"]].'</b></p>
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

			
