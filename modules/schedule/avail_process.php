<?php
require "../../resources/config.php";
require "../library/PHPMailer/src/Exception.php";
require "../library/PHPMailer/src/PHPMailer.php";
require "../library/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['action']) && $_POST['action'] == 'search_sched_form') {
    search_available_schedule($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'smmry_cn') {
    summarySubmit($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'DateAction') {
    selectDate($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'returenDateAction') {
    r_selectDate($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'srch_sched_ftr_form') {
    session_start();
    if(isset($_SESSION['first_name']) && $_SESSION['first_name'] != "") {
        go_schedule($con);
    } else {
        echo '<p class="text-center text-danger">Sorry, you need to <a href="http://barkomatic.xyz/signup.php">create an account</a first and sign in as passenger.</p>';
    } 
}

if(isset($_POST['action']) && $_POST['action'] == 'smmry_dptr_slctd_sched_form') {
    session_start();
    reservation($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'sched_sel') {
    sched_sel($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'r_sched_sel') {
    r_sched_sel($con);
}
if (isset($_POST['action']) && $_POST['action'] == 'formdataAction') {
    passengerInfoSubmitreservation($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'sched_des') {
        $output= ' <div class="accordion-item" style="margin-bottom: 25px; border-radius: 10px">
         <div class="depbackground-color" id="flush-headingOne">
             <p class="accordion-header">
             <div class="click">
                 <button class="btn-departure" type="button" data-bs-toggle="collapse"
                     data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                     <span style="color: #fff;">Depature</span><i style="padding-left: 125px;"
                         class="fa fa-chevron-circle-down"></i>
                 </button>
             </div>
             </p>
         </div>
         <div style="text-align:center;" class="container-form-summary bg-white">
        <center><span style="top:50%;text-align:center;"> No departure voyage selected yet. </span></center>
         </div>
     </div>
     ';
     echo $output;
}
function passengerInfoSubmitreservation($c) {
    // Get the form data
    $formData = $_POST['formData'];
    $cpvalidationDefault01 =$_POST['cpvalidationDefault01'];
    $phone =$_POST['phone'];
    $numPassengers1 =$_POST['numPassengers1'];
    $validationDefault01 =$_POST['validationDefault01'];
    $validationDefault03 =$_POST['validationDefault03'];
   
    // Process the form data
    for ($i = 0; $i < $numPassengers1; $i++) {
        $fieldName = $formData['inputFirstName'.$i];
        $inputMiddleName = $formData['inputMiddleName'.$i];
        $inputLastName = $formData['inputLastName'.$i];
        $inputGender = $formData['inputGender'.$i];
        $inputDateofBirth = $formData['inputDateofBirth'.$i];
        $inputType = $formData['inputType'.$i];
        $inputNationality = $formData['inputNationality'.$i];
        $inputEmail = $formData['inputEmail'.$i];
        $inputReturnDiscount = $formData['inputReturnDiscount'.$i];
        $sql_rsrtn = "INSERT INTO passenger_reservation_details (
            contact_person,
            phone_number,
            contactperson_email,
            address,
            firstname,
            middlename,
            lastname,
            gender,
            dateofbirth,
            personType,
            nationality,
            passenger_email,
            discount
          ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $c->prepare($sql_rsrtn);
        $stmt->bind_param('sssssssssssss',
            $cpvalidationDefault01,
            $phone,
            $validationDefault01,
            $validationDefault03,
            $fieldName,
            $inputMiddleName,
            $inputLastName,
            $inputGender,
            $inputDateofBirth,
            $inputType,
            $inputNationality,
            $inputEmail,
            $inputReturnDiscount
        );
        
        if (!$stmt->execute()) {
            // If there is an error, handle it appropriately (e.g. log the error, return an error message to the user, etc.)
            $error = $stmt->error;
            // For example, you can log the error:
            error_log('Error executing INSERT query: ' . $error);
            // And you can return an error message to the user:
            $response = array('success' => false, 'error' => 'There was an error processing your request. Please try again later.');
            echo json_encode($response);
            return;
        }else{
            // for ticket
            // $sumPrice = $_POST['sumPrice'];
            $schedSelected = $_POST['schedSelecteds'];
            $acomSelected = $_POST['acomSelected'];
            $purchasetk = "Purchase";
            $rsrvtn_num = rand(1000000, 9999999);
            // end 
            $sql_rsrtntbl = "INSERT INTO tickets (
            tckt_code,
            schedule_id,
            email_add,
            accomodation_id,
            availability
          ) VALUES (?, ?, ?, ?, ?)";
            $stmts = $c->prepare($sql_rsrtntbl);
            $stmts->bind_param(
                'sssss',
                $rsrvtn_num,
                $schedSelected,
                $validationDefault01,
                $acomSelected,
                $purchasetk
            );
            if (!$stmts->execute()) {
                // If there is an error, handle it appropriately (e.g. log the error, return an error message to the user, etc.)
                $error = $stmts->error;
                // For example, you can log the error:
                error_log('Error executing INSERT query: ' . $error);
                // And you can return an error message to the user:
                $responses = array('success' => false, 'error' => 'There was an error processing your request. Please try again later.');
                echo json_encode($responses);
                return;
            }else{
                if(isset($_POST['r_accom_id_int'])){
                    $r_accom_id_int = $_POST['r_accom_id_int'];
                    $r_sched_id_int = $_POST['r_sched_id_int'];
                    $r_totalPrice_int = $_POST['r_totalPrice_int'];
                }else{
                    echo "error";
                }
              
            }
        }
    }
    
    // If everything was successful, return a success message to the user
    $response = array('success' => true);
    echo json_encode($response);
}

function summarySubmit(){
    // check if all required inputs are set
    if(isset($_POST['sched'], $_POST['acom'], $_POST['totalPrice'])){
        // check if all required inputs are not empty
        if(!empty($_POST['sched']) && !empty($_POST['acom']) && !empty($_POST['totalPrice'])){
            $sched_id  = $_POST['sched'];
            $accom_id  = $_POST['acom'];
            $totalPrice= $_POST['totalPrice'];
            $data      = array('schedSelected'=> $sched_id,'acomSelected'=> $accom_id, 'totalPrice'   => $totalPrice); 
        } else {
            $error = array('message' => 'Please fill in all required fields.');
            $output = json_encode($error);
            echo $output;
            return;
        }
    } else {
        $output = "Required inputs are missing.";
        echo $output;
        return;
    }
    // check if optional inputs are set
    if (isset($_POST['r_sched'], $_POST['r_acom'], $_POST['r_totalPrice'])) {
        // check if optional inputs are not empty
        if(!empty($_POST['r_sched']) && !empty($_POST['r_acom']) && !empty($_POST['r_totalPrice'])){
            // Merge two arrays
            $data = array_merge($data, array('r_sched_id'  => $_POST['r_sched'], 'r_accom_id'=> $_POST['r_acom'], 'r_totalPrice'=> $_POST['r_totalPrice']));
        }
    }
    $output = json_encode($data);
    echo $output;
}

function r_sched_sel($c) {
    if (isset($_POST['schedule_id'])) {
      $schedule_id = $_POST['schedule_id'];
      $accom_selected=$_POST['accommodation_selecteds'];
      $port = $c->query("SELECT route_id, concat(`departure_from`,'[',`departure_port`,']') as `route` FROM routes");
      $stmt_ship_s = $c->prepare("SELECT 
      f.name,
      s.schedule_id,
      f.ferry_id,
      s.departure_date,
      s.arrival_time,
      s.route_id_from,
      s.route_id_to,
      so.ship_name,
      a.acomm_name,
      a.price,
      a.room_type,
      a.aircon 
FROM schedules s 
JOIN ferries f ON s.ferry_id = f.ferry_id 
JOIN accommodations a ON s.ferry_id = a.ferry_id 
LEFT JOIN ship_owners so ON s.owner_id = so.owner_id 
WHERE s.schedule_id=? AND a.accomodation_id=?");
    if($stmt_ship_s === false){
        echo 'Error preparing statement: ' . $c->error;
        return;
    }
    $stmt_ship_s->bind_param('ss', $schedule_id,$accom_selected);
    if($stmt_ship_s->execute() === false){
        echo 'Error executing statement: ' . $stmt_ship_s->error;
        return;
    }
    $row_ship_s = $stmt_ship_s->get_result();
    if($row_ship_s === false){
        echo 'Error retrieving result set: ' . $stmt_ship_s->error;
        return;
    }
    $routes = array_column($port->fetch_all(MYSQLI_ASSOC),'route','route_id');
    while ($row1 = $row_ship_s->fetch_assoc()) { 
        $date = $row1["departure_date"];
        $formatted_date = date("F j, Y", strtotime($date));
        $time = $row1["arrival_time"];
        $formatted_time = date("g:i A", strtotime($time));
        if($row1['aircon']==0){
                $aircon = "N/A";
        }else{
                $aircon = "YES";
        }
            $output = '
            <div class="accordion-item" style="border-radius: 10px;">
                <div class="depbackground-color" id="flush-headingTwo">
                    <p class="accordion-header">
                    <div class="click">
                        <button class="btn-departure" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <span style="color: #fff;">Return</span><i style="padding-left: 145px;"
                                class="fa fa-chevron-circle-down"></i>
                        </button>
                    </div>
                    </p>
                </div>
                <div class="container-form-summary bg-white">
                    <div class="contain-shippinglogo">
                        <div class="shipping-guide" style="margin-left:10px;">
                            <img src="./assets/images/vgshipping.png" alt="vgshipping"
                                style="width:50px; border-radius: 50%;">
                        </div>
                        <div class="shipping-guide" style="margin-right: 50px;">
                        <span style="font-size: 12px;">'.$row1["ship_name"].'</span>
                        <br>
                        <span style="font-size: 12px;">'.$row1["name"].'</span>
                    </div>
                    </div>
                    <div class="contain-depretlocation">
                        <div class="shipping-depret">
                            <i class="fa-solid fa-circle-dot"
                                style="display: flex; margin-left: 18px; padding-top: 15px;"></i>
                            <div class="vertical-dotted-line"></div>
                            <i class="fa-solid fa-anchor" style="display: flex; margin-left: 18px;"></i>
                        </div>
                        <div class="shipping-depret" style="padding-top: 10px; margin-right: 30px;">
                        <span>'.$routes[$row1['route_id_to']].'</span>
                        <div style="padding-bottom: 12px;">
                            <br>
                        </div>
                        <span>'.$routes[$row1['route_id_from']].'</span>
                    </div>
                    </div>
                </div>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="container-form-collapse">
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90;">DEPARTURE DATE</span>
                            <br>
                            <span style="color: #657174;">'.$formatted_date.'&nbsp'.$formatted_time.'</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style=" font-size:14px; color: #988f90; ">ACCOMODATION</span>
                            <br>
                            <span id="r_acomm" style="color: #657174; ">'.$row1['acomm_name'].'</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90; ">SEAT TYPE</span>
                            <br>
                            <span id="r_room_tp" style="color: #657174; ">'.$row1['room_type'].'</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90; ">AIRCON</span>
                            <br>
                            <span id="r_aircn" style="color: #657174; ">'.$aircon.'</span>
                        </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                        <span style=" font-size:14px; color: #988f90; ">PORT</span>
                        <br>
                        <span style="color: #657174; ">Port of '.$routes[$row1['route_id_to']].'</span>
                        <span style="color: #657174; "><i class="fa-solid fa-arrow-right"
                                style="padding-left: 10px; padding-right: 10px;"></i>'.$routes[$row1['route_id_from']]. '</span>
                    </div>
                        <div class="dashed-line"></div>
                        <div class="depaturedetails">
                            <span style="font-size:14px; color: #988f90; ">PRICE</span>
                            <br>
                             <input type="text" id="r_sched" name="r_sched" value="' . $schedule_id . '" hidden>
                            <input type="text" name="r_acom" value="' . $accom_selected . '" hidden>
                            <input type="text" id="r_totalPrice" value="' . $row1['price'] . '" name="r_totalPrice" hidden>
                            <span id="r_prices" style="color: #657174; ">₱ '.$row1['price'].'</span>
                        </div>
                    </div>
                </div>
            </div>
            ';
            echo $output;
        }
    }
}


function sched_sel($c) {
    if (isset($_POST['schedule_id'])) {
      $schedule_id = $_POST['schedule_id'];
      $accom_selected=$_POST['accommodation_selected'];
      $port = $c->query("SELECT route_id, concat(`departure_from`,'[',`departure_port`,']') as `route` FROM routes");
      $stmt_ship_s = $c->prepare("SELECT 
      f.name,
      s.schedule_id,
      f.ferry_id,
      s.departure_date,
      s.arrival_time,
      s.route_id_from,
      s.route_id_to,
      so.ship_name,
      a.acomm_name,
      a.price,
      a.room_type,
      a.aircon 
FROM schedules s 
JOIN ferries f ON s.ferry_id = f.ferry_id 
JOIN accommodations a ON s.ferry_id = a.ferry_id 
LEFT JOIN ship_owners so ON s.owner_id = so.owner_id 
WHERE s.schedule_id=? AND a.accomodation_id=?");
    if($stmt_ship_s === false){
        echo 'Error preparing statement: ' . $c->error;
        return;
    }
    $stmt_ship_s->bind_param('ss', $schedule_id,$accom_selected);
    if($stmt_ship_s->execute() === false){
        echo 'Error executing statement: ' . $stmt_ship_s->error;
        return;
    }
    $row_ship_s = $stmt_ship_s->get_result();
    if($row_ship_s === false){
        echo 'Error retrieving result set: ' . $stmt_ship_s->error;
        return;
    }
    $routes = array_column($port->fetch_all(MYSQLI_ASSOC),'route','route_id');
    while ($row1 = $row_ship_s->fetch_assoc()) { 
        $date = $row1["departure_date"];
        $formatted_date = date("F j, Y", strtotime($date));
        $time = $row1["arrival_time"];
        $formatted_time = date("g:i A", strtotime($time));
        if($row1['aircon']==0){
                $aircon = "N/A";
        }else{
                $aircon = "YES";
        }
            $output = '
            <div class="accordion-item" style="margin-bottom: 25px; border-radius: 10px">
            <div class="depbackground-color" id="flush-headingOne">
                <p class="accordion-header">
                <div class="click">
                    <button class="btn-departure" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <span style="color: #fff;">Depature</span><i style="padding-left: 125px;"
                            class="fa fa-chevron-circle-down"></i>
                    </button>
                </div>
                </p>
            </div>
            <div class="container-form-summary bg-white">
                <div class="contain-shippinglogo">
                    <div class="shipping-guide" style="margin-left:10px;">
                        <img src="./assets/images/vgshipping.png" alt="vgshipping"
                            style="width:50px; border-radius: 50%;">
                    </div>
                    <div class="shipping-guide" style="margin-right: 50px;">
                        <span style="font-size: 12px;">'.$row1["ship_name"].'</span>
                        <br>
                        <span style="font-size: 12px;">'.$row1["name"].'</span>
                    </div>
                </div>
                <div class="contain-depretlocation">
                    <div class="shipping-depret">
                        <i class="fa-solid fa-circle-dot"
                            style="display: flex; margin-left: 18px; padding-top: 15px;"></i>
                        <div class="vertical-dotted-line"></div>
                        <i class="fa-solid fa-anchor" style="display: flex; margin-left: 18px;"></i>
                    </div>
                    <div class="shipping-depret" style="padding-top: 10px; margin-right: 30px;">
                        <span>'.$routes[$row1['route_id_from']].'</span>
                        <div style="padding-bottom: 12px;">
                            <br>
                        </div>
                        <span>'.$routes[$row1['route_id_to']].'</span>
                    </div>
                </div>
            </div>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                data-bs-parent="#accordionFlushExample">
                <div class="container-form-collapse">
                    <div class="dashed-line"></div>
                    <div class="depaturedetails">
                        <span style="font-size:14px; color: #988f90;">DEPARTURE DATE</span>
                        <br>
                        <span style="color: #657174;">'.$formatted_date.'&nbsp'.$formatted_time.'</span>
                    </div>
                    <div class="dashed-line"></div>
                    <div class="depaturedetails">
                        <span style=" font-size:14px; color: #988f90; ">ACCOMODATION</span>
                        <br>
                        <span id="acomm" style="color: #657174; ">'.$row1['acomm_name'].'</span>
                    </div>
                    <div class="dashed-line"></div>
                    <div class="depaturedetails">
                        <span style="font-size:14px; color: #988f90; ">SEAT TYPE</span>
                        <br>
                        <span id="room_tp" style="color: #657174; ">'.$row1['room_type'].'</span>
                    </div>
                    <div class="dashed-line"></div>
                    <div class="depaturedetails">
                        <span style="font-size:14px; color: #988f90; ">AIRCON</span>
                        <br>
                        <span id="aircn" style="color: #657174; ">'.$aircon.'</span>
                    </div>
                    <div class="dashed-line"></div>
                    <div class="depaturedetails">
                        <span style=" font-size:14px; color: #988f90; ">PORT</span>
                        <br>
                        <span style="color: #657174; ">Port of '.$routes[$row1['route_id_from']].'</span>
                        <span style="color: #657174; "><i class="fa-solid fa-arrow-right"
                                style="padding-left: 10px; padding-right: 10px;"></i>'.$routes[$row1['route_id_to']]. '</span>
                    </div>
                    <div class="dashed-line"></div>
                    <div class="depaturedetails">
                        <span style="font-size:14px; color: #988f90; ">PRICE</span>
                        <br>
                            <input type="text" id="sched" name="sched" value="'.$schedule_id.'" hidden>
                            <input type="text" name="acom" value="'.$accom_selected. '" hidden>
                            <input type="text" id="totalPrice" value="'.$row1['price'].'" name="totalPrice" hidden>
                        <span id="prices" style="color: #657174; ">₱ '.$row1['price'].'</span>
                    </div>
                </div>
            </div>
        </div>
            ';
            echo $output;
        }
    }
}


function selectDate($c){
    $getdate = '';
    if(isset($_POST["getDate"])){
        $getdate = htmlentities($_POST["getDate"], ENT_QUOTES, 'UTF-8');
    }
    $stmt_ship_sd = $c->prepare("SELECT 
                                    f.name,
                                    s.schedule_id,
                                    f.ferry_id,
                                    a.acomm_name,
                                    a.price,
                                    a.room_type,
                                    a.aircon,
                                    so.ship_name
                                    from schedules s
                                    JOIN ferries f ON s.ferry_id = f.ferry_id
                                    JOIN accommodations a ON s.ferry_id = a.ferry_id
                                    LEFT JOIN ship_owners so ON s.owner_id = so.owner_id
                                    WHERE s.departure_date=? GROUP BY s.ferry_id"); 
    if($stmt_ship_sd === false){
        echo 'Error preparing statement: ' . $c->error;
        return;
    }
    $stmt_ship_sd->bind_param('s', $getdate);
    if($stmt_ship_sd->execute() === false){
        echo 'Error executing statement: ' . $stmt_ship_sd->error;
        return;
    }
    $row_ship_sd = $stmt_ship_sd->get_result();
    if($row_ship_sd === false){
        echo 'Error retrieving result set: ' . $stmt_ship_sd->error;
        return;
    }

    while ($row1 = $row_ship_sd->fetch_assoc()) { 
        $ferry = $row1['ferry_id'];
        $stmt = $c->prepare("SELECT * FROM accommodations WHERE ferry_id=?"); 
        $stmt->bind_param('s', $ferry);
        $stmt->execute();
        $result = $stmt->get_result();

        $output = '
      
        <div formarrayname="voyageAccommodations" class="ng-untouched ng-pristine ng-valid">
        <div class="itinerary-table booking-table">
            <input type="radio" style="display:none" id="schedule_id" name="schedule_id" value="'.$row1['schedule_id'].'" data-row-id="row1" />
            <input type="text" style="display:none" id="schedules_id" name="schedules_id" value="'.$row1['schedule_id'].'">
            <div class="itinerary-row itinerary-head">
                <div class="itr-col booking-time-container">
                    <div>
                        <div class="departure-time">6:00 AM</div>
                        <!---->
                        <div class="travel-time">2 hours</div>
                        <!---->
                        <!---->
                    </div>
                </div>
                <div class="itr-col itinerary-vessel">
                    <div class="booking-media-left itinerary-shipping-logo">
                        <img alt=""
                            src="https://storage.googleapis.com/barkota-reseller-assets/companies/mark-ocean-fast-ferries-inc.png" />
                        <!---->
                    </div>
                    <div class="itinerary-name">
                        <div class="booking-type booking-td-title">
                            <div>'.$row1['name'].'</div>
                            <!---->
                            <div class="booking-td-meta book-text-muted">
                                '.$row1['ship_name'].'
                            </div>
                            <!---->
                        </div>
                    </div>
                </div>
                <!---->
            </div>
    
            <div class="itinerary-row" id="row_'.$row1['schedule_id'].'">
                <div class="itinerary-col itinerary-select">
                    <div class="form-select">
                        <select name="selectedAccommodation" id="accomodation_form" class="form-control accommodation border ng-untouched ng-pristine ng-valid" data-row-id="'.$row1['schedule_id'].'">';
    
                        // loop over the result set to generate options
                        while ($row = $result->fetch_assoc()) {
                            $acommodations = $row["acomm_name"];
                            $acommodations_id = $row["accomodation_id"];
                            $output .= '<option value="'.$acommodations_id.'">'.$acommodations.'</option>';
                        }
                        $output .= '
                        </select>
                    </div>
                </div>
                <div class="itinerary-col itinerary-price" style="position: relative; overflow: hidden">
                    <div class="booking-td-title text-wrap">
                    <div>
                        <div class="booking-td-title">
                        <span class="price-value" style="margin-right: 20px">
                        ₱<span id="price-'.$row1['schedule_id'].'">'. $row1["price"].'</span>
                      </span>
                      
                        </div>
                        <div class="booking-type booking-td-title">
                        <div class="booking-td-meta" style="margin-right: 5px">
                            <span style="font-weight: 800; color: #ff8c00">
                            Ticket Price
                            </span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="itinerary-col itinerary-select-btn">
                    <button type="button" class="btn btn-info select-button">Select</button>
                </div>
            </div>
        </div>
    </div>
    

        ';
        echo $output;
    }
   

}
//reture selected date


function r_selectDate($c){
    $getdate = '';
    if(isset($_POST["getDate"])){
        $getdate = htmlentities($_POST["getDate"], ENT_QUOTES, 'UTF-8');
    }
    $stmt_ship_sd = $c->prepare("SELECT 
                                    f.name,
                                    s.schedule_id,
                                    f.ferry_id,
                                    a.acomm_name,
                                    a.price,
                                    a.room_type,
                                    a.aircon,
                                    so.ship_name
                                    from schedules s
                                    JOIN ferries f ON s.ferry_id = f.ferry_id
                                    JOIN accommodations a ON s.ferry_id = a.ferry_id
                                    LEFT JOIN ship_owners so ON s.owner_id = so.owner_id
                                    WHERE s.departure_date=? GROUP BY s.ferry_id"); 
    if($stmt_ship_sd === false){
        echo 'Error preparing statement: ' . $c->error;
        return;
    }
    $stmt_ship_sd->bind_param('s', $getdate);
    if($stmt_ship_sd->execute() === false){
        echo 'Error executing statement: ' . $stmt_ship_sd->error;
        return;
    }
    $row_ship_sd = $stmt_ship_sd->get_result();
    if($row_ship_sd === false){
        echo 'Error retrieving result set: ' . $stmt_ship_sd->error;
        return;
    }

    while ($row1 = $row_ship_sd->fetch_assoc()) { 
        $ferry = $row1['ferry_id'];
        $stmt = $c->prepare("SELECT * FROM accommodations WHERE ferry_id=?"); 
        $stmt->bind_param('s', $ferry);
        $stmt->execute();
        $result = $stmt->get_result();

        $output = '
      
        <div formarrayname="voyageAccommodations" class="ng-untouched ng-pristine ng-valid">
            <div class="itinerary-table booking-table">
                <input type="radio" hidden="" id="schedule_id" name="r_schedule_id" value="'.$row1['schedule_id'].'" />
                <div class="itinerary-row itinerary-head">
                    <div class="itr-col booking-time-container">
                        <div>
                            <div class="departure-time">6:00 AM</div>
                            <!---->
                            <div class="travel-time">2 hours</div>
                            <!---->
                            <!---->
                        </div>
                    </div>
                    <div class="itr-col itinerary-vessel">
                        <div class="booking-media-left itinerary-shipping-logo">
                            <img alt=""
                                src="https://storage.googleapis.com/barkota-reseller-assets/companies/mark-ocean-fast-ferries-inc.png" />
                            <!---->
                        </div>
                        <div class="itinerary-name">
                            <div class="booking-type booking-td-title">
                                <div>'.$row1['name'].'</div>
                                <!---->
                                <div class="booking-td-meta book-text-muted">
                                    '.$row1['ship_name'].'
                                </div>
                                <!---->
                            </div>
                        </div>
                    </div>
                    <!---->
                </div>

                     <div class="itinerary-row" id="row_'.$row1['schedule_id'].'">
                            <div class="itinerary-col itinerary-select">
                                <div class="form-select">
                                <select name="r_selectedAccommodation" id="r_accomodation_form" class="form-control accommodation border ng-untouched ng-pristine ng-valid"  data-row-id="'.$row1['schedule_id'].'">';

                        // loop over the result set to generate options
                        while ($row = $result->fetch_assoc()) {
                            $acommodations = $row["acomm_name"];
                            $acommodations_id = $row["accomodation_id"];
                            $output .= '<option value="'.$acommodations_id.'">'.$acommodations.'</option>';
                        }
                        $output .= '
                        </select>
                        </div>
                    </div>
                    <div class="itinerary-col itinerary-price" style="position: relative; overflow: hidden">
                        <div class="booking-td-title text-wrap">
                        <div>
                            <div class="booking-td-title">
                            <span class="price-value" style="margin-right: 20px">
                            ₱<span id="r_price-'.$row1['schedule_id'].'">'. $row1["price"].'</span>
                            </span>
                            </div>
                            <div class="booking-type booking-td-title">
                            <div class="booking-td-meta" style="margin-right: 5px">
                                <span style="font-weight: 800; color: #ff8c00">
                                Ticket Price
                                </span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="itinerary-col itinerary-select-btn">
                    <button type="button" class="btn btn-info select-buttons">Select</button>
                         </div>
                    </div>

                <div class="itinerary-row">
                </div>
            </div>
        </div>

        ';
        echo $output;
    }
   

}
//end


//* search available schedule
function search_available_schedule($c) {
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    if(isset($_POST['srch_ship_sched'])){
        $srch_ss = $_POST['srch_ship_sched'];
        $sslf = $_POST['srch_sched_loc_from'];
        $sslt = $_POST['srch_sched_loc_to'];
        $pE = $_POST['paxCount'];
        $ssld = date('Y-m-d', strtotime($_POST['srch_sched_loc_depart']));
        $rdate = date('Y-m-d', strtotime($_POST['returnDate']));
        $port = $c->query("SELECT route_id, `departure_from` as `route` FROM routes");
        $routes = array();
        while($port_row = $port->fetch_assoc()) {
            $routes[$port_row["route_id"]] = $port_row["route"];
        }
        $sql_slct = "SELECT s.schedule_id,
        s.departure_date,
        s.arrival_time,
        so.ship_name,
        fer.name,
        fer.ferry_id,
        s.route_id_from,
        s.route_id_to
     FROM schedules s
     JOIN ferries fer ON s.ferry_id = fer.ferry_id
     JOIN ship_owners so ON s.owner_id=so.owner_id
     WHERE s.owner_id=? AND s.route_id_from=? AND s.route_id_to=? AND s.departure_date=?";
        $stmt = $c->prepare($sql_slct);
        echo $c -> error;
        $stmt->bind_param("ssss", $srch_ss,$sslf,$sslt,$ssld,);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();
        if(!empty($row)) {
            $data = array(
                "schedule_id" => $row["schedule_id"],
                "departure_date" => $row["departure_date"],
                "return_date" => $rdate,
                "ship_name" => $row["ship_name"],
                "ferry_id" => $row["ferry_id"],
                "name" => $row["name"],
                "paxCount" =>  $pE,
                "route_id_from" => $routes[$row["route_id_from"]],
                "route_id_to" => $routes[$row["route_id_to"]]
            );
            $json = json_encode($data, JSON_PRETTY_PRINT);
            echo $json;
        }else{
            echo "empty1";
        }
    }
    else {
        $sslf = $_POST['srch_sched_loc_from'];
        $sslt = $_POST['srch_sched_loc_to'];
        $ssld = date('Y-m-d', strtotime($_POST['srch_sched_loc_depart']));
        $rdate = date('Y-m-d', strtotime($_POST['returnDate']));
        $pE = $_POST['paxCount'];
        $port = $c->query("SELECT route_id, `departure_from` as `route` FROM routes");
        $routes = array();
        while($port_row = $port->fetch_assoc()) {
            $routes[$port_row["route_id"]] = $port_row["route"];
        }
        $sql_slct = "SELECT s.schedule_id,
                            s.departure_date,
                            s.route_id_from,
                            s.route_id_to,
                            fer.name,
                            so.owner_id,
                            so.ship_name
                     FROM schedules s
                     JOIN ferries fer ON s.ferry_id = fer.ferry_id
                     JOIN ship_owners so ON s.owner_id=so.owner_id 
                     WHERE s.route_id_from=? AND s.route_id_to=? OR s.departure_date=?";
        $stmt = $c->prepare($sql_slct);
        echo $c->error;
        $stmt->bind_param("sss",$sslf,$sslt,$ssld);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();
        if(!empty($row)) {
            $data = array(
                "ship_name" => $row["ship_name"],
                "name" => $row["name"],
                "schedule_id" => $row["schedule_id"],
                "departure_date" => $row["departure_date"],
                "return_date" => $rdate,
                "paxCount" =>  $pE,
                "route_id_from" => $routes[$row["route_id_from"]],
                "route_id_to" => $routes[$row["route_id_to"]]
            );
            $json = json_encode($data, JSON_PRETTY_PRINT);
            echo $json;
        }else{
          "empty2";
        }
}
}
   


// //* search available schedule1
// function search_available_schedule1($c) {
//     // error_reporting(E_ALL);
//     // ini_set('display_errors', 1);
//     // $srch_ss = $_POST['srch_ship_sched'];
//     $sslf = $_POST['srch_sched_loc_from'];
//     $sslt = $_POST['srch_sched_loc_to'];
//     $ssld = date('Y-m-d', strtotime($_POST['srch_sched_loc_depart']));

//     $sql_slct = "SELECT 
//                 tbl_ship_sd.ship_name,
//                 tbl_ship_sd.ship_logo,
//                 tbl_ship_sched.depart_date,
//                 tbl_ship_sched.depart_time,
//                 tbl_ship_sched.location_from,
//                 tbl_ship_sched.port_from,
//                 tbl_ship_sched.location_to,
//                 tbl_ship_sched.port_to,
//                 tbl_ship_acctyp.accomodation_name,
//                 tbl_ship_acctyp.price,
//                 tbl_ship_acctyp.id,
//                 tbl_tcket.tckt_promo,
//                 tbl_tcket.tckt_stats,
//                 tbl_tcket.tckt_dscnt,
//                 tbl_tcket.tckt_owner,
//                 tbl_tcket.tckt_price
//                 FROM tbl_ship_detail tbl_ship_sd
//                 JOIN tbl_ship_schedule tbl_ship_sched
//                 JOIN tbl_ship_has_accomodation_type tbl_ship_acctyp
//                 JOIN tbl_tckt tbl_tcket ON tbl_ship_sd.ship_name = tbl_tcket.tckt_owner
//                 WHERE tbl_ship_sched.depart_date=? AND tbl_ship_sched.location_from=? AND tbl_ship_sched.location_to=?";
//     $stmt = $c->prepare($sql_slct);
//     echo $c -> error;
//     $stmt->bind_param("sss",$ssld,$sslf,$sslt);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $row = $result->fetch_array();
//     if(!empty($row)) {
//         echo '
//         <div>
//         <div class="form-group accomm_type" name="sample_list" >
//                 <select onchange="selectOnChange(this)" name="srch_sched_accomm_type" id="slct_accomm_type" class="form-control select">
//                 <option value="0" data-price="0" data-name="None" >Ordinary</option> 
//          ';
//          $stmt2 = $c->prepare("SELECT * FROM tbl_ship_has_accomodation_type WHERE ship_reside=?"); 
//          $stmt2->bind_param("s", $srch_ss);
//          $stmt2->execute();
//          $result2 = $stmt2->get_result();
//         while($row1 = $result2->fetch_assoc()){
//             echo '<option value="'.$row1["id"].'" data-price="'.$row1["price"].'" data-name="'.$row1["accomodation_name"].'">'.$row1["accomodation_name"].'</option>
//                 ';
//         }
//                 echo ' 
//                 </select>
//                 </div>
//        ';
//     $output = '
                
//                 <div class="row pl-4 border rounded-fill m-auto">
//                 <br>
//                 <div class="col-sm-4">
//                     <div class="form-group text-center">
//                         <input type="text" name="srch_sched_time" value="'.$row["depart_time"].'" class="form-control border-top-0 rounded-0 text-center"  readonly>
//                     </div>
//                 </div>
//                 <div class="col-sm-4 text-center">
//                     <div class="form-group pt-2 text-center">
//                         <img src="data:image/jpeg;base64,'.base64_encode($row["ship_logo"]).'" alt="" width="70">
//                         <input type="text" name="srch_sched_ship_nm" value="'.$row["ship_name"].'" class="bg-light border-0" readonly>
//                     </div>
//                     <div class="form-group">
//                         <input type="text" id="cost"  name="srch_sched_price_display" value="'.$row["tckt_price"].'" class="form-control border-0 p-0 bg-light text-center" readonly>
//                         <input type="hidden" name="srch_sched_price" value="'.$row["tckt_price"].'" class="form-control border-0 p-0 bg-light text-center" readonly>
//                         <small>Ticket Price</small>
//                         <br>
//                         <br>
//                         <input type="text" id="AcommondationPrice"  name="srch_sched_Accom_price" value="" class="form-control border-0 p-0 bg-light text-center" readonly>
//                         <input type="hidden" id="AcommondationPrice" name="srch_sched_Accom_price" value="" class="form-control border-0 p-0 bg-light text-center" readonly>
//                         <small>Accomodation Price</small>
//                         <br>
//                         <br>
//                         <br>
//                         <br>
//                         <input type="text" id="total"  name="srch_sched_price_display" value="P'.$row["tckt_price"].'" class="form-control border-0 p-0 bg-light text-center" readonly>
//                         <input type="hidden" id="total" name="srch_sched_total_price" value="'.$row["tckt_price"].'" class="form-control border-0 p-0 bg-light text-center" readonly>
//                         <small>Total Price</small>
//                     </div>
//                 </div>
//                 <div class="col-sm-4">
//                     <div class="form-group">
//                     </div>
//                     <div class="form-group text-center">
//                         <input type="submit" id="srch_sched_filter_btn" value="GO" class="btn btn-success">
//                     </div>
//                 </div>
//             </div>';
//     echo $output;
// } else {
//     echo '<p class="text-danger text-center lead">No Available Schedules!</p>';
// }
//     $stmt->close();
// }


//* summary departure
function go_schedule($c) {
    $srch_st = $_POST['srch_sched_time'];
    $srch_sat = $_POST['srch_sched_accomm_type'];
    $srch_ssnm = $_POST['srch_sched_ship_nm'];
    $srch_accomprice = $_POST['srch_sched_Accom_price'];
    if ($srch_sat == 0) {
         
        $sql_srch_slct = "SELECT 
        tbl_sd.ship_logo,
        tbl_sd.ship_name,
        tbl_sched.location_from,
        tbl_sched.location_to,
        tbl_sched.depart_date,
        tbl_sched.depart_time,
        tbl_acctyp.accomodation_name,
        tbl_acctyp.seat_type,
        tbl_acctyp.aircon,
        tbl_sched.port_from,
        tbl_sched.port_to,
        tbl_acctyp.price,
        tbl_tcket.tckt_promo,
        tbl_tcket.tckt_stats,
        tbl_tcket.tckt_dscnt,
        tbl_tcket.tckt_owner,
        tbl_tcket.tckt_price
        FROM tbl_ship_detail tbl_sd
        JOIN tbl_ship_schedule tbl_sched
        JOIN tbl_ship_has_accomodation_type tbl_acctyp
        JOIN tbl_tckt tbl_tcket ON tbl_sd.ship_name = tbl_tcket.tckt_owner
        WHERE tbl_sched.depart_time=? AND tbl_sd.ship_name=?";
$stmt = $c->prepare($sql_srch_slct);
$stmt->bind_param('ss', $srch_st,$srch_ssnm);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array();
$output = '
<hr class="mb-0">
<div class="section bg-light pl-5 pr-5 pb-5 pt-3">
<div class="header_title text-center"><h3 class="">Summary</h3></div>
<hr style="border: 1px dotted #eee;">
<div id="smmry_dptr">
<div class="form-group">
    <img src="data:image/jpeg;base64,'.base64_encode($row["ship_logo"]).'" alt="LOGO" width="70"> <span>'.$row["ship_name"].'</span>
    <input type="hidden" name="summry_dptr_shp_name" value="'.$row["ship_name"].'">
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group text-center">
            <p>
                <span>LOCATION</span><br>
                <span>'.$row["location_from"].'</span>
                <span><i class="fa fa-long-arrow-right ml-2 mr-2"></i></span>
                <span>'.$row["location_to"].'</span>
            </p>
            <input type="hidden" name="summry_dptr_loc_from" value="'.$row["location_from"].'">
            <input type="hidden" name="summry_dptr_loc_to" value="'.$row["location_to"].'">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group text-center">
            <p>DEPARTURE DATE<br><span>'.$row["depart_date"].'</span> <span>'.$row["depart_time"].'</span></p>
            <input type="hidden" name="summry_dptr_date" value="'.$row["depart_date"].'">
            <input type="hidden" name="summry_dptr_time" value="'.$row["depart_time"].'">
        </div>
    </div>
</div>
<hr style="border: 1px dotted #eee;">
<div class="row text-center">
    <div class="col-4">
        <div class="form-group">
            <p>ACCOMODATION<br><span>No Aircon</span></p>
            <input type="hidden" name="summry_dptr_accom_name" value="No Aircon">
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <p>SEAT TYPE<br><span>'.$row["seat_type"].'</span></p>
            <input type="hidden" name="summry_dptr_sttyp" value="'.$row["seat_type"].'">
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <p>AIRCON<br><span>No</span></p>
            <input type="hidden" name="summry_dptr_arcn" value="NO">
        </div>
    </div>
</div>
<hr style="border: 1px dotted #eee;">
<div class="form-group">
    <p>
        PORT<br><span>'.$row["port_from"].'</span>
        <span><i class="fa fa-long-arrow-right ml-2 mr-2"></i></span>
        <span>'.$row["port_to"].'</span>
    </p>
    <input type="hidden" name="summry_dptr_port_from" value="'.$row["port_from"].'">
    <input type="hidden" name="summry_dptr_port_to" value="'.$row["port_to"].'">
</div>
<hr style="border: 1px dotted #eee;">
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <p>
               TOTAL PRICE<br><span>₱ '.$row["tckt_price"].'</span>
            </p>
            <input type="hidden" name="summry_dptr_price" value="'.$row["tckt_price"].'">
        </div>
    </div>
    <div class="col-6 text-right">
        <div class="form-group">
            <input type="submit" name="summry_dptr_btn" id="summry_dptr_btn" class="btn btn-success rounded-0" value="AVAIL">
        </div>
    </div>
</div>
<hr style="border: 1px dotted #eee;" class="mt-0">
</div>
</div>';
echo $output;
$stmt->close();

    }
    else{
    //$srch_sp = $_POST['srch_sched_price'];
    $sql_srch_slct = "SELECT 
                    tbl_sd.ship_logo,
                    tbl_sd.ship_name,
                    tbl_sched.location_from,
                    tbl_sched.location_to,
                    tbl_sched.depart_date,
                    tbl_sched.depart_time,
                    tbl_acctyp.accomodation_name,
                    tbl_acctyp.seat_type,
                    tbl_acctyp.aircon,
                    tbl_sched.port_from,
                    tbl_sched.port_to,
                    tbl_acctyp.price,
                    tbl_tcket.tckt_promo,
                    tbl_tcket.tckt_stats,
                    tbl_tcket.tckt_dscnt,
                    tbl_tcket.tckt_owner,
                    tbl_tcket.tckt_price
                    FROM tbl_ship_detail tbl_sd
                    JOIN tbl_ship_schedule tbl_sched
                    JOIN tbl_ship_has_accomodation_type tbl_acctyp
                    JOIN tbl_tckt tbl_tcket ON tbl_sd.ship_name = tbl_tcket.tckt_owner
                    WHERE tbl_sched.depart_time=? AND tbl_acctyp.id=? AND tbl_sd.ship_name=?";
    $stmt = $c->prepare($sql_srch_slct);
    $stmt->bind_param('sss', $srch_st,$srch_sat,$srch_ssnm);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    if ($srch_sat!=0) {
        $total =$row["tckt_price"] + $row["price"] ;
    }
    $output = '
    <hr class="mb-0">
    <div class="section bg-light pl-5 pr-5 pb-5 pt-3">
        <div class="header_title text-center"><h3 class="">Summary</h3></div>
        <hr style="border: 1px dotted #eee;">
        <div id="smmry_dptr">
            <div class="form-group">
                <img src="data:image/jpeg;base64,'.base64_encode($row["ship_logo"]).'" alt="LOGO" width="70"> <span>'.$row["ship_name"].'</span>
                <input type="hidden" name="summry_dptr_shp_name" value="'.$row["ship_name"].'">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group text-center">
                        <p>
                            <span>LOCATION</span><br>
                            <span>'.$row["location_from"].'</span>
                            <span><i class="fa fa-long-arrow-right ml-2 mr-2"></i></span>
                            <span>'.$row["location_to"].'</span>
                        </p>
                        <input type="hidden" name="summry_dptr_loc_from" value="'.$row["location_from"].'">
                        <input type="hidden" name="summry_dptr_loc_to" value="'.$row["location_to"].'">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group text-center">
                        <p>DEPARTURE DATE<br><span>'.$row["depart_date"].'</span> <span>'.$row["depart_time"].'</span></p>
                        <input type="hidden" name="summry_dptr_date" value="'.$row["depart_date"].'">
                        <input type="hidden" name="summry_dptr_time" value="'.$row["depart_time"].'">
                    </div>
                </div>
            </div>
            <hr style="border: 1px dotted #eee;">
            <div class="row text-center">
                <div class="col-4">
                    <div class="form-group">
                        <p>ACCOMODATION<br><span>'.$row["accomodation_name"].'</span></p>
                        <input type="hidden" name="summry_dptr_accom_name" value="'.$row["accomodation_name"].'">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <p>SEAT TYPE<br><span>'.$row["seat_type"].'</span></p>
                        <input type="hidden" name="summry_dptr_sttyp" value="'.$row["seat_type"].'">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <p>AIRCON<br><span>'.$row["aircon"].'</span></p>
                        <input type="hidden" name="summry_dptr_arcn" value="'.$row["aircon"].'">
                    </div>
                </div>
            </div>
            <hr style="border: 1px dotted #eee;">
            <div class="form-group">
                <p>
                    PORT<br><span>'.$row["port_from"].'</span>
                    <span><i class="fa fa-long-arrow-right ml-2 mr-2"></i></span>
                    <span>'.$row["port_to"].'</span>
                </p>
                <input type="hidden" name="summry_dptr_port_from" value="'.$row["port_from"].'">
                <input type="hidden" name="summry_dptr_port_to" value="'.$row["port_to"].'">
            </div>
            <hr style="border: 1px dotted #eee;">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <p>
                            TOTAL PRICE<br><span>₱ '.$total.'</span>
                        </p>
                        <input type="hidden" name="summry_dptr_price" value="'.$total.'">
                    </div>
                </div>
                <div class="col-6 text-right">
                    <div class="form-group">
                        <input type="submit" name="summry_dptr_btn" id="summry_dptr_btn" class="btn btn-success rounded-0" value="AVAIL">
                    </div>
                </div>
            </div>
            <hr style="border: 1px dotted #eee;" class="mt-0">
        </div>
    </div>';
    echo $output;
    $stmt->close();
}
}  

//* reservation
function reservation($c) {
    $sdsn = $_POST['summry_dptr_shp_name'];
    $sdlf = $_POST['summry_dptr_loc_from'];
    $sdlt = $_POST['summry_dptr_loc_to'];
    $sdd = date('Y-m-d',strtotime($_POST['summry_dptr_date']));
    $sdt = $_POST['summry_dptr_time'];
    $sdan = $_POST['summry_dptr_accom_name'];
    $pssgr_name = $_SESSION['first_name']." ".$_SESSION['lastname']; 
    $success = 0;
    $type = 0;
    $rsrvtn_num = rand(1000000,9999999);
    $rsrvtn_date = date('Y-m-d');
    $exp = date('Y-m-d',strtotime($rsrvtn_date. '+2 days'));
    
    $sql_rsrtn = "INSERT INTO tbl_passenger_reservation (reservation_number,ship_name,passenger_name,location_from,location_to,depart_date,depart_time,accomodation,reservation_date,expiration,re_type)
                 VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $c->prepare($sql_rsrtn);
    $stmt->bind_param('sssssssssss',$rsrvtn_num,$sdsn,$pssgr_name,$sdlf,$sdlt,$sdd,$sdt,$sdan,$rsrvtn_date,$exp,$type);
    
    if($stmt->execute()) {
        $stmt->close();
        $success = 1;
    }
    if($success == 1) {
        reservation_confirmation($c,$sdsn,$rsrvtn_num);
    }
}
//* send email reservation confirmation
function reservation_confirmation($c,$sdsn,$rsrvtn_num) {
    $sql_rsrvtn = "SELECT * FROM tbl_passenger_reservation";
    $stmt = $c->prepare($sql_rsrvtn);
    $stmt->execute();
    $stmt->store_result();
    $stmt->fetch();
    $num = $stmt->num_rows();
    if($num > 0) {
        $stmt->close();
        $sql_em = "SELECT 
                    tbl_sd.email,
                    tbl_pr.ship_name,
                    tbl_pr.expiration,
                    tbl_pr.reservation_number
                    FROM tbl_ship_detail tbl_sd
                    JOIN tbl_passenger_reservation tbl_pr ON tbl_sd.ship_name = tbl_pr.ship_name
                    WHERE tbl_sd.ship_name=?";
        $s = $c->prepare($sql_em);
        $s->bind_param('s', $sdsn);
        $s->execute();
        $result = $s->get_result();
        $row = $result->fetch_array();

        if(!empty($row)) {
            $pssngr_id = $_SESSION['id'];
            $avail = 'avail';
            $shipname = $row['ship_name'];
            echo "http://barkomatic.xyz/payment.php?reservetionId=$rsrvtn_num&&userId=$pssngr_id&&typOfpymnt=$avail&&shipName=$shipname";
        } else {
            echo "row is empty! - 2";
        }
    } else {
        echo "row is empty! - 1";
    }

}



