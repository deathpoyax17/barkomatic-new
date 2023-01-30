<?php
require "../../resources/config.php";
//* insert records
if(isset($_POST['action']) && $_POST['action'] == 'add_port_loc_form') {
    session_start();
    add_port_location($con);
}
if(isset($_POST["action"]) && $_POST["action"] == "add_ticket_form") {
    session_start();
    create_ticket($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'add_sched_form') {
    session_start();
    add_schedule($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'add_accomm_form') {
    session_start();
    add_accomodation_type($con);
}
//* fetch records
if(isset($_POST['action']) && $_POST['action'] == 'fetch_added_loc') {
    session_start();
    fetch_port_location($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'fetch_depart_detail') {
     session_start();
    fetch_depart_detail($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'fetch_accomm_detail') {
     session_start();
    fetch_accomm_detail($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'num_sched_data') {
    session_start();
    fetch_num_sched($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'num_port_data') {
    session_start();
    fetch_num_port($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'active_reservation_data') {
    session_start();
    active_reservation($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'fetch_reservation_list') {
    session_start();
    reservation_data($con);
}

//* signout
if($_POST["action"] == "ship_stff_signout") {
    session_start();
    sign_out();
}
function sign_out() {
    session_destroy();
    echo "Signout Successfully!";
}

//* edit-delete - port location
if(isset($_POST['action']) && $_POST['action'] == 'edit_port_form') {
    session_start();
    edit_port_form($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'port_edit_id_form') {
    port_edit_id_form($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'delete_location') {
    session_start();
    delete_location($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'delete_vessel') {
    session_start();
    delete_vessel($con);
}

//* delete - reservation
if(isset($_POST['action']) && $_POST['action'] == 'delete_reservation') {
    session_start();
    delete_reservation($con);
}

//* edit-delete - ship schedule
if(isset($_POST['action']) && $_POST['action'] == 'edit_ship_sched_form') {
    session_start();
    edit_ship_sched_form($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'ship_sched_edit_id_form') {
    ship_sched_edit_id_form($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'delete_sched_ship') {
    session_start();
    delete_sched_ship($con);
}

//* edit-delete - ship accom
if(isset($_POST['action']) && $_POST['action'] == 'edit_accom_form') {
    session_start();
    edit_accom_form($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'accom_edit_id_form') {
    accom_edit_id_form($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'vessel_edit_id_form') {
    vessel_edit_id_form($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'delete_accom') {
    session_start();
    delete_accom($con);
}
if(isset($_POST["action"]) && $_POST["action"] == "fetch_ticket_detail") {
    session_start();
    fetch_ticket_details($con);
}

//* reservation details
function reservation_data($c) {
    $stmt = $c->prepare("SELECT * FROM tbl_passenger_reservation WHERE ship_name=?");
    $stmt->bind_param('s',$_SESSION['stff_ship_reside']);
    $stmt->execute();
    $result = $stmt->get_result();
    $output = '
        <table class="table table-bordered table-sm mb-0">
            <thead>
                <tr>
                    <th>Reservation No.</th>
                    <th>Passenger Name</th>
                    <th>Route</th>
                    <th>Date/Time</th>
                    <th>Accomodation</th>
                    <th>Reservation Date</th>
                    <th>Expiration</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="port-location-data-content">';
    while ($row = $result->fetch_assoc()) {
        $output .= '
            <tr>
                <td>'.$row["reservation_number"].'</td>
                <td>'.$row["passenger_name"].'</td>
                <td>'.$row["location_from"].' to '.$row["location_to"].'</td>
                <td>'.$row["depart_date"].' '.$row["depart_time"].'</td>
                <td>'.$row["accomodation"].'</td>
                <td>'.$row["reservation_date"].'</td>
                <td>'.$row["expiration"].'</td>
                <td>'.$row["status"].'</td>
                <td class="text-center">
                    <button type="button" name="delete" id="'.$row["id"].'" class="button small red delete_reservation_btn">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                </td>
            </tr>';
    }
    $output .= '</tbody>';
    $output .= '</table';
    echo $output;
}

//* fetch total number of schedules
function fetch_num_sched($c) {
    $counter = 0;
    $sql_slct = "SELECT * FROM tbl_ship_schedule tbl_schds
                 INNER JOIN tbl_ship_belong tbl_sb ON tbl_schds.id = tbl_sb.id
                 WHERE tbl_sb.ship=?";
    $stmt = $c->prepare($sql_slct);
    $stmt->bind_param('s', $_SESSION['stff_ship_reside']);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $counter++;
    }
    $output = '
    <div class="flex items-center justify-between">
        <div class="widget-label">
            <h3>Active Schedules</h3>
            <h1>'.$counter.'</h1>
        </div>
        <span class="icon widget-icon text-red-500"><i class="mdi mdi-calendar-multiple-check mdi-48px"></i></span>
    </div>';
    echo $output;
    $stmt->close();
}

//* fetch total number of ports
function fetch_num_port($c) {
    $counter = 0;
    $sql_slct = "SELECT * FROM tbl_ship_port tbl_sp
                 INNER JOIN tbl_ship_belong tbl_sb ON tbl_sp.id = tbl_sb.id
                 WHERE tbl_sb.ship=?";
    $stmt = $c->prepare($sql_slct);
    $stmt->bind_param('s', $_SESSION['stff_ship_reside']);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $counter++;
    }
    $output = '
    <div class="flex items-center justify-between">
        <div class="widget-label">
            <h3>No. of Ports</h3>
            <h1>'.$counter.'</h1>
        </div>
        <span class="icon widget-icon text-blue-500"><i class="mdi mdi-anchor mdi-48px"></i></span>
    </div>';
    echo $output;
    $stmt->close();
}

function fetch_ticket_details($c) {
    $ssr = $_SESSION['owner_id'];
    $sql_slct = "SELECT * from ferries WHERE owner_id=?";
     $stmt = $c->prepare($sql_slct);
     echo $c->error;
     $stmt->bind_param('s',$ssr);
     $stmt->execute();
     $result = $stmt->get_result();
    $output = '
    <table class="table table-bordered m-0">
    <thead>
        <tr><th>Vessel Name</th>
            <th>Seat Capacity</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody id="port-location-data-content">';
    while($row = $result->fetch_assoc()) {
        $output .= '
        <tr>
            <td>'.$row['name'].'</td>
            <td>'.$row['capacity'].'</td>
            <td class="text-center">
                <button type="button" name="edit_vessel_btn" class="button small green update_vessel_btn" id="'.$row["ferry_id"].'" data-toggle="modal" data-target="#exampleModal23">
                    <span class="icon"><i class="mdi mdi-pencil"></i></span>
                </button>
                <button type="button" name="rl_vessel_delete" class="button small red delete_vessel_btn" id="'.$row["ferry_id"].'">
                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button>
            </td>
        <tr>';
    } 
    $output .= '</tbody>';
    $output .= '</table';
    echo $output;
    $stmt->close();


    
}
//* total active reservation
function active_reservation($c) {
    $counter = 0;
    $sql_slct = "SELECT * FROM tbl_passenger_reservation WHERE ship_name=?";
    $stmt = $c->prepare($sql_slct);
    $stmt->bind_param('s', $_SESSION['stff_ship_reside']);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()) {
        $counter++;
    }
    $output = '
    <div class="flex items-center justify-between">
        <div class="widget-label">
            <h3>Active Reservation</h3>
            <h1>'.$counter.'</h1>
        </div>
        <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
    </div>';
    echo $output;
    $stmt->close();
}

//* add port location
function add_port_location($c) {
    $lf = check_input($_POST['location_from']);
    $p1 = check_input($_POST['port_1']);
    $lt = check_input($_POST['location_to']);
    $p2 = check_input($_POST['port_2']);
    $ves= check_input($_POST['vessel']);
    $ship_belong = $_SESSION['owner_id'];
    
  $q1 = $c->prepare("SELECT * 
                    from routes r
                    JOIN ferries f ON r.ferry_id = f.ferry_id
                    WHERE r.departure_from=? AND r.departure_port=? AND r.arrival_from=? AND r.arrival_port=? AND f.owner_id=? ");
        $q1->bind_param('sssss', $lf, $p1, $lt, $p2, $ship_belong);
        echo $c->error;
        $q1->execute();
        $result = $q1->get_result();
       $row = $result->fetch_array(MYSQLI_ASSOC);
        
        if($row!=NULL){
            echo "Already Exist";
        }else{
        $stmt_tsp = $c->prepare("INSERT INTO routes (departure_from,departure_port,arrival_from,arrival_port,ferry_id) VALUES (?,?,?,?,?)");
        $stmt_tsp->bind_param('sssss', $lf,$p1,$lt,$p2,$ves);
        $stmt_tsp->execute();
        if($stmt_tsp){
            echo 'Added Successfully.';
            $stmt_tsp->close();
    }    
  }
}
//* ship port fetch data
function fetch_port_location($c) {
    $ship_name = $_SESSION['owner_id'];
    $stmt = $c->prepare("SELECT
                        r.route_id,
                        r.departure_from,
                        r.departure_port,
                        r.arrival_from,
                        r.arrival_port,
                        f.owner_id,
                        f.name
                        FROM routes r
                        JOIN ferries f ON r.ferry_id = f.ferry_id
                        WHERE f.owner_id=?"); 
    $stmt->bind_param('s',$ship_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $output = '
        <table class="table table-bordered table-sm mb-0">
            <thead>
                <tr>
                    <th>Vessel</th>
                    <th>Location From</th>
                    <th>Port</th>
                    <th>Location To</th>
                    <th>Port</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="port-location-data-content">';
    while ($row = $result->fetch_assoc()) {
        $output .= '
            <tr>
                <td>'.$row["name"].'</td>
                <td>'.$row["departure_from"].'</td>
                <td>'.$row["departure_port"].'</td>
                <td>'.$row["arrival_from"].'</td>
                <td>'.$row["arrival_port"].'</td>
                <td class="text-center">
                    <button type="button" name="update" id="'.$row["route_id"].'" class="button small green update_loc_btn" data-toggle="modal" data-target="#exampleModal">
                        <span class="icon"><i class="mdi mdi-pencil"></i></span>
                    </button>
                    <button type="button" name="delete" id="'.$row["route_id"].'" class="button small red delete_loc_btn">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                </td>
            </tr>';
    }
    $output .= '</tbody>';
    $output .= '</table';
    echo $output;
    $stmt->close();
}

//* ship schedule fetch data
//  <button type="button" name="update" id="'.$row["id"].'" class="button small green update_ship_sched_btn" data-toggle="modal" data-target="#exampleModal">
                    //     <span class="icon"><i class="mdi mdi-pencil"></i></span>
                    // </button>
function fetch_depart_detail($c) {
       $ship_name = $_SESSION['stff_ship_reside'];
    $stmt = $c->prepare("SELECT * FROM tbl_ship_schedule WHERE ship_reside=?"); 
    $stmt->bind_param('s',$ship_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $output = '
        <table class="table table-bordered table-sm mb-0">
            <thead>
                <tr>
                    <th>Depart Date</th>
                    <th>Depart Time</th>
                    <th>Location From</th>
                    <th>Port</th>
                    <th>Location To</th>
                    <th>Port</th>
                    <th>Ship Reside</th>
                    <th>Vessel</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="port-location-data-content">';
    while ($row = $result->fetch_assoc()) {
        $output .= '
            <tr>
                <td>'.$row["depart_date"].'</td>
                <td>'.$row["depart_time"].'</td>
                <td>'.$row["location_from"].'</td>
                <td>'.$row["port_from"].'</td>
                <td>'.$row["location_to"].'</td>
                <td>'.$row["port_to"].'</td>
                <td>'.$row["ship_reside"].'</td>
                <td>'.$row["vessel"].'</td>
                <td class="text-center">
                   
                    <button type="button" name="delete_sched" id="'.$row["id"].'" class="button small red delete_ship_sched_btn">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                </td>
            </tr>';
    }
    $output .= '</tbody>';
    $output .= '</table';
    echo $output;
}

//* add schedule for booking
function add_schedule($c) {
    $d = date('Y-m-d', strtotime($_POST['event-start-date']));
    $t = date('h:i A', strtotime($_POST['ship_depart_time']));
    $slf= check_input($_POST['sched_loc_from']);
    $spf = check_input($_POST['sched_port_from']);
    $slt = check_input($_POST['sched_loc_to']);
    $spt = check_input($_POST['sched_port_to']);
    $vessel = check_input($_POST['vessel']);
    $ship_belong = check_input($_POST['ship']);
    
      $qz = $c->prepare("SELECT
                        tss.id,
                        tss.ship_reside,
                        tss.depart_date,
                        tss.depart_time,
                        tss.location_from,
                        tss.port_from,
                        tss.location_to,
                        tss.port_to,
                        tss.vessel
                        FROM tbl_ship_schedule tss
                        JOIN tbl_ship_belong sb ON tss.id = sb.id
                        WHERE  tss.ship_reside=? AND tss.depart_date=? AND tss.depart_time=? AND tss.location_from=? AND tss.port_from=? AND  tss.location_to=? AND tss.port_to=? AND tss.vessel=? AND sb.ship=? ");
        $qz->bind_param('sssssssss', $ship_belong, $d, $t, $slf, $spf , $slt, $spt, $vessel, $ship_belong);
        echo $c->error;
        $qz->execute();
        $result = $qz->get_result();
       $row = $result->fetch_array(MYSQLI_ASSOC);
        if($row!=NULL){
            echo "Already Exist";
        }
        else{
      $qz1 = $c->prepare("SELECT
                        tss.id,
                        tss.ship_reside,
                        tss.depart_date,
                        tss.vessel
                        FROM tbl_ship_schedule tss
                        LEFT JOIN tbl_ship_belong sb ON tss.id = sb.id
                        WHERE  tss.ship_reside=? AND tss.depart_date=? AND tss.vessel=?");
        $qz1->bind_param('sss', $ship_belong,$d, $vessel);
        echo $c->error;
        $qz1->execute();
        $result3 = $qz1->get_result();
       $row3 = $result3->fetch_array(MYSQLI_ASSOC);
        if($row3!=NULL){
            echo "Vessel is on sheduled";
        }
        else{
    $stmt = $c->prepare("INSERT INTO tbl_ship_schedule (ship_reside,depart_date,depart_time,location_from,port_from,location_to,port_to,vessel) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssss', $ship_belong,$d,$t,$slf,$spf,$slt,$spt,$vessel);
    if($stmt->execute()){
    $lastid= $c ->insert_id;
    $stmt_sb = $c->prepare("INSERT INTO tbl_ship_belong (id,ship) VALUES (?,?)");
    $stmt_sb->bind_param('ss', $lastid, $ship_belong);
    $stmt_sb->execute();
    $stmt_sb->close();

    echo 'Schedule added successfully!';
        }
           $stmt->close();
            }
        }
}
//* fetch accommodation type
function fetch_accomm_detail($c) {
    
     $ship_name = $_SESSION['stff_ship_reside'];
    $stmt = $c->prepare("SELECT * FROM tbl_ship_has_accomodation_type WHERE ship_reside=? "); 
    $stmt->bind_param('s', $ship_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $output = '
        <table class="table table-bordered table-sm mb-0">
            <thead>
                <tr>
                    <th>Accomodation Name</th>
                    <th>Seat Type</th>
                    <th>Aircon</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="port-location-data-content">';
    while ($row = $result->fetch_assoc()) {
        $output .= '
            <tr>
                <td>'.$row["accomodation_name"].'</td>
                <td>'.$row["seat_type"].'</td>
                <td>'.$row["aircon"].'</td>
                <td>₱ '.$row["price"].'</td>
                <td class="text-center">
                    <button type="button" name="update" id="'.$row["id"].'" class="button small green update_accom_btn" data-toggle="modal" data-target="#exampleModal">
                        <span class="icon"><i class="mdi mdi-pencil"></i></span>
                    </button>
                    <button type="button" name="delete_accom" id="'.$row["id"].'" class="button small red delete_accom_btn">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                </td>
            </tr>';
    }
    $output .= '</tbody>';
    $output .= '</table';
    echo $output;
}

//* add ship accommodation type
function add_accomodation_type($c) {
      $accomm_names = $_POST['accomodation_name'];
    $accomm_name = check_input($_POST['accomodation_name']);
    $seat_typ = check_input($_POST['accomm_seat_typ']);
    $aircon = check_input($_POST['accomm_aircon']);
    $price = check_input($_POST['accomm_typ_price']);
    $ship_belong = $_POST['ship'];
    
  $q1 = $c->prepare("SELECT accomodation_name FROM tbl_ship_has_accomodation_type WHERE accomodation_name=?");
        $q1->bind_param('s', $accomm_names);
        $q1->execute();
        $result = $q1->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);
        
        if(isset($row['accomodation_name']) == $accomm_names){
            echo "Accomodation Name Already Exist!";
        }

   
else{
    
    $stmt = $c->prepare("INSERT INTO tbl_ship_has_accomodation_type (accomodation_name,seat_type,aircon,price,ship_reside) VALUES (?,?,?,?,?)");
    $stmt->bind_param('sssss', $accomm_name,$seat_typ,$aircon,$price,$ship_belong);
    if($stmt->execute()){
    $lastid= $c ->insert_id;
    $stmt_sb = $c->prepare("INSERT INTO tbl_ship_belong (id,ship) VALUES (?,?)");
    $stmt_sb->bind_param('ss', $lastid,$ship_belong);
    $stmt_sb->execute();
    $stmt_sb->close();
    echo "Added Succesfully";
    $q1->close();
}
 $stmt->close();
}
}

//* edit-delete - port location
function edit_port_form($con) {
    if(isset($_SESSION['edit_loc_id']) && $_SESSION['edit_loc_id'] != '') {
        $ship_name = $_SESSION['stff_ship_reside'];
        $edit_loc_id = $_SESSION['edit_loc_id']; 
        $edit_location_from = check_input($_POST['edit_location_from']);
        $edit_port_from = check_input($_POST['edit_port_from']);
        $edit_location_to = check_input($_POST['edit_location_to']);
        $edit_port_to = check_input($_POST['edit_port_to']);

        $sql_updt = "UPDATE tbl_ship_port tbl_sp
                    INNER JOIN tbl_ship_belong tbl_sb ON tbl_sp.id=tbl_sb.id
                    SET tbl_sp.location_from=?,tbl_sp.port_from=?,tbl_sp.location_to=?,tbl_sp.port_to=?
                    WHERE tbl_sp.id=? AND tbl_sb.ship=?";

        $stmt = $con->prepare($sql_updt);
        $stmt->bind_param('ssssis',$edit_location_from,$edit_port_from,$edit_location_to,$edit_port_to,$edit_loc_id,$ship_name);
        $stmt->execute();
        $stmt->close();
        unset($_SESSION['edit_loc_id']);
        echo "Updated successfully!";
    }else{
        echo "session edit id is empty!";
    }
} 
function port_edit_id_form($con) {
    if(session_start()) {
        $edit_id = $_POST['edit_loc_id'];
        $_SESSION['edit_loc_id'] = $edit_id;
        echo "Assigned id for edit! " . $edit_id;
    }else{
        echo "session for edit id was not set!";
    }
}
function delete_location($con) {
    $delete_id = $_POST['delete_loc_id'];
    $ship_name = $_SESSION['stff_ship_reside'];
    
    $sql_dlt = "DELETE tbl_ship_port,tbl_add_ship_loc_belong FROM tbl_add_ship_loc_belong 
                INNER JOIN tbl_ship_port ON tbl_add_ship_loc_belong.id = tbl_ship_port.id
                WHERE tbl_ship_port.id=? AND tbl_add_ship_loc_belong.ship=?";

    $stmt = $con->prepare($sql_dlt);
    $stmt->bind_param('is',$delete_id,$ship_name);
    $stmt->execute();
    $stmt->close();
    echo "Deleted Successfully!";
}
function delete_vessel($con) {
    $delete_id = $_POST['delete_loc_id'];
    $ship_name = $_SESSION['stff_ship_reside'];
    
    $sql_dlt = "DELETE FROM tbl_tckt 
                WHERE id=? AND tckt_owner=?";
    $stmt = $con->prepare($sql_dlt);
    $stmt->bind_param('is',$delete_id,$ship_name);
    $stmt->execute();
    $stmt->close();
    echo "Deleted Successfully!";
}

//* delete - reservation
function delete_reservation($con) {
    $delete_id = $_POST['delete_resrv_id'];
    $ship_name = $_SESSION['stff_ship_reside'];
    
    $sql_dlt = "DELETE tbl_passenger_reservation FROM tbl_passenger_detail 
                INNER JOIN tbl_passenger_reservation ON tbl_passenger_detail.id = tbl_passenger_reservation.id
                WHERE tbl_passenger_detail.id=? AND tbl_passenger_reservation.ship_name=?";

    $stmt = $con->prepare($sql_dlt);
    $stmt->bind_param('is',$delete_id,$ship_name);
    $stmt->execute();
    $stmt->close();
    echo "Deleted Successfully!";
}

//* edit-delete - ship schedule
function edit_ship_sched_form($con) {
    if(isset($_SESSION['edit_ship_sched_id']) && $_SESSION['edit_ship_sched_id'] != '') {
        $ship_name = $_SESSION['stff_ship_reside'];
        $edit_loc_id = $_SESSION['edit_ship_sched_id']; 
        $edit_ship_sched_date = date('Y-m-d',strtotime($_POST['edit_ship_sched_date']));
        $edit_ship_sched_dt = date('h:i A',strtotime($_POST['edit_ship_sched_dt']));
        $edit_ship_sched_from = check_input($_POST['edit_ship_sched_from']);
        $edit_ship_sched_port_from = check_input($_POST['edit_ship_sched_port_from']);
        $edit_ship_sched_to = check_input($_POST['edit_ship_sched_to']);
        $edit_ship_sched_port_to = check_input($_POST['edit_ship_sched_port_to']);

        $sql_updt = "UPDATE tbl_ship_schedule tbl_sp
                    INNER JOIN tbl_ship_belong tbl_sb ON tbl_sp.id=tbl_sb.id
                    SET tbl_sp.depart_date=?,tbl_sp.depart_time=?,tbl_sp.location_from=?,tbl_sp.port_from=?,tbl_sp.location_to=?,tbl_sp.port_to=?
                    WHERE tbl_sp.id=? AND tbl_sb.ship=?";

        $stmt = $con->prepare($sql_updt);
        $stmt->bind_param('ssssssis',$edit_ship_sched_date,$edit_ship_sched_dt,$edit_ship_sched_from,$edit_ship_sched_port_from,$edit_ship_sched_to,$edit_ship_sched_port_to,$edit_loc_id,$ship_name);
        $stmt->execute();
        $stmt->close();
        unset($_SESSION['edit_ship_sched_id']);
        echo "Updated successfully!";
    }else{
        echo "session edit id is empty!";
    }
}
function ship_sched_edit_id_form($con) {
    if(session_start()) {
        $edit_id = $_POST['edit_ship_sched_id'];
        $_SESSION['edit_ship_sched_id'] = $edit_id;
        echo "Assigned id for edit! " . $edit_id;
    }else{
        echo "session for edit id was not set!";
    }
}

// create ticket ===========================================================================================================================================================
function create_ticket($con) {
    
     $vsl_name = check_input($_POST['vessel_name']);
    //   $tckt_price = check_input($_POST['ticket_price']);
    $tckt_qnty = check_input($_POST['ticket_quantity']);
    // $tckt_stats = check_input($_POST['ticket_status']);
    $tckt_owner = $_SESSION['owner_id'];
    // $timestamp = date("Y-m-d H:i:s");
       $q1 = $con->prepare("SELECT name FROM ferries WHERE name=?");
        $q1->bind_param('s', $vsl_name);
        $q1->execute();
        $result = $q1->get_result();
        $row = $result->fetch_array();
        
        if($row!=NULL){
            echo "Vessel Name Already Exist!";
        }else{
     
        $stmt_insrt_sd = $con->prepare("INSERT INTO ferries (name,capacity,owner_id) VALUES (?,?,?)");
        $stmt_insrt_sd->bind_param('sss', $vsl_name, $tckt_qnty,$tckt_owner);
        $stmt_insrt_sd->execute();
        $stmt_insrt_sd->close();
        echo 'Successfully Generate Ticket';
        }
}

function delete_sched_ship($con) {
    $delete_id = $_POST['delete_ship_sched_id'];
    $ship_name = $_SESSION['stff_ship_reside'];
    $sql_dlt = "DELETE tbl_ship_schedule,tbl_ship_belong FROM tbl_ship_belong 
                INNER JOIN tbl_ship_schedule ON tbl_ship_belong.id = tbl_ship_schedule.id
                WHERE tbl_ship_schedule.id=? AND tbl_ship_belong.ship=?";

    $stmt = $con->prepare($sql_dlt);
    $stmt->bind_param('is',$delete_id,$ship_name);
    $stmt->execute();
    $stmt->close();
    echo "Deleted Successfully!";
}

//* edit-delete - ship accom
function edit_accom_form($con) {
    if(isset($_SESSION['edit_accom_id']) && $_SESSION['edit_accom_id'] != '') {
        $ship_name = $_SESSION['stff_ship_reside'];
        $edit_loc_id = $_SESSION['edit_accom_id']; 
        $edit_accom_name = $_POST['edit_accom_name'];
        $edit_accom_st = $_POST['edit_accom_st'];
        $edit_accom_aircon = $_POST['edit_accom_aircon'];
        $edit_accom_price = $_POST['edit_accom_price'];

        $sql_updt = "UPDATE tbl_ship_has_accomodation_type tbl_sp
                        INNER JOIN tbl_ship_belong tbl_sb ON tbl_sp.id=tbl_sb.id
                        SET tbl_sp.accomodation_name=?,tbl_sp.seat_type=?,tbl_sp.aircon=?,tbl_sp.price=?
                        WHERE tbl_sp.id=? AND tbl_sb.ship=?";

        $stmt = $con->prepare($sql_updt);
          echo $con->error;
        $stmt->bind_param('ssssis',$edit_accom_name,$edit_accom_st,$edit_accom_aircon,$edit_accom_price,$edit_loc_id,$ship_name);
        $stmt->execute();
        $stmt->close();
        unset($_SESSION['edit_accom_id']);
        echo "Updated successfully!";
    }else{
        echo "session edit id is empty!";
    }
}
function accom_edit_id_form($con) {
    if(session_start()) {
        $edit_id = $_POST['edit_accom_id'];
        $_SESSION['edit_accom_id'] = $edit_id;
        
        $stmt = "SELECT * FROM tbl_ship_has_accomodation_type WHERE id=?";
        $stmt = $con->prepare($stmt);
        $stmt->bind_param('s', $edit_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);
             echo json_encode($row); 
    }else{
        echo "session for edit id was not set!";
    }
}
function delete_accom($con) {
    $delete_id = $_POST['delete_accom_id'];
    $ship_name = $_SESSION['stff_ship_reside'];
    
    $sql_dlt = "DELETE tbl_ship_has_accomodation_type,
                tbl_ship_belong 
                FROM tbl_ship_belong 
                INNER JOIN tbl_ship_has_accomodation_type ON tbl_ship_belong.id = tbl_ship_has_accomodation_type.id
                WHERE tbl_ship_has_accomodation_type.id=? AND tbl_ship_belong.ship=?";

    $stmt = $con->prepare($sql_dlt);
    $stmt->bind_param('is',$delete_id,$ship_name);
    $stmt->execute();
    $stmt->close();
    echo "Deleted Successfully!";
}
function vessel_edit_id_form($con) {
    if(session_start()) {
        $edit_id = $_POST['edit_loc_id'];
        $_SESSION['edit_loc_id'] = $edit_id;
        
       $stmt = "SELECT * FROM tbl_tckt WHERE id=?";
        $stmt = $con->prepare($stmt);
        $stmt->bind_param('s', $edit_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array(MYSQLI_ASSOC);
            echo json_encode($row); 
    }else{
        echo "session for edit id was not set!";
    }
}
// sanitize data 
function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}