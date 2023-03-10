<?php

require "../../resources/config.php";
require_once "paypal_config.php";

if(isset($_POST['action']) && $_POST['action'] == 'responsecontainer') {
   get_PssngerInfo($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'tripsummary') {
    fetch_resrvation_data($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'paypal') {
    session_start();
    fetch_data_paypal($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'redeemCode') {
    session_start();
    redeemPromoInsert($con);
}
if(isset($_POST['action']) && $_POST['action'] == 'redeemCode_status') {
    session_start();
    redeemPromoInsert_claim($con);
}
//fetch passenger info
function get_PssngerInfo($c){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $passengerId = $_GET['passengersId'];
    $sql_srch_slct = "SELECT 
                    tbl_pssnger_accnt.username,
                    tbl_pssnger_dtls.first_name,
                    tbl_pssnger_dtls.lastname,
                    tbl_pssnger_dtls.gender,
                    tbl_pssnger_dtls.dob,
                    tbl_pssnger_dtls.email,
                    tbl_pssnger_dtls.phone_number,
                    tbl_pssnger_dtls.Address
                    FROM tbl_passenger_account tbl_pssnger_accnt
                    JOIN tbl_passenger_detail tbl_pssnger_dtls ON tbl_pssnger_accnt.id = tbl_pssnger_dtls.id
                    WHERE tbl_pssnger_dtls.id=?";
    $stmt = $c->prepare($sql_srch_slct);
    echo $c -> error;
    $stmt->bind_param('s',$passengerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $output = '
    <div class="container CONTACT-INFO" style="margin-top: 12%">
    <div class=" col-sm-9 border" style="background-color: white ;border-top: 50px;  margin-top: -10%;">
        <div>
            <div class="contactInfo">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Contact Information</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 text-center">
                    <br>
                    <p class="Name" style="font-size: 15px;"><span>Name</span></p>
                    <p class="" style=" font-size: 13px;">'.$row['first_name'].'&nbsp'.$row['lastname'].'</p><br>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3 text-center">
                    <br>
                    <p class="Email" style="font-size: 15px;"><span>Email Adddress</span></p>
                    <p class="" style="font-size: 13px;">'.$row['email'].'</p><br>
                </div>

                <div class="col-sm-1"></div>
                <div class="col-sm-3 text-center">
                    <br>
                    <p class="Phone#" style="font-size: 15px;"><span>Phone Number</span></p>
                    <p class="" style=" font-size: 13px;">'.$row['phone_number'].'</p><br>
                </div>

                <div class="col-sm-1"></div>
                <div class="col-sm-3 text-center">
                    <br>
                    <p class="" style="font-size: 15px;"><span>Address</span></p>
                    <p class="" style="margin: -15px 0px 0px 10px; font-size: 13px;">'.$row['Address'].'</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container PASSENGER_INFO">
    <div class=" col-sm-9 border" style="background-color: white ;border-top: 50px; margin-top: -6%; margin-top: 10%;">
        <div>
            <div class="contactInfo">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Passenger Information</h5>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-3 text-center">
                <br>
                <p class="Name" style="font-size: 15px;"><span>First Name</span></p>
                <p class="" style=" font-size: 13px;">'.$row['first_name'].'</p><br>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-3 text-center">
                <br>
                <p class="Email" style="font-size: 15px;"><span>Last Name</span></p>
                <p class="" style="font-size: 13px;">'.$row['lastname'].'</p><br>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-3 text-center">
                <br>
                <p class="Phone#" style="font-size: 15px;"><span>Gender</span></p>
                <p class="" style=" font-size: 13px;">'.$row['gender'].'</p><br>
            </div>

            <div class="col-sm-1"></div>
            <div class="col-sm-3 text-center">
                <br>
                <p class="" style="font-size: 15px;"><span>Date of Birth</span></p>
                <p class="" style="margin: -15px 0px 0px 10px; font-size: 13px;">'.$row['dob'].'</p>
            </div>
        </div>
       
        </div>
    </div>
</div>
   ';
    echo $output;
    $stmt->close();
}
//fetch reservation data
function fetch_resrvation_data($c){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $reservationNum = $_GET['reservation'];
    $sql_srch_slcts = "SELECT 
                        tbl_pass_reserv.reservation_number,
                        tbl_pass_reserv.ship_name,
                        tbl_pass_reserv.passenger_name,
                        tbl_pass_reserv.location_from,
                        tbl_pass_reserv.location_to,
                        tbl_pass_reserv.depart_date,
                        tbl_pass_reserv.depart_time,
                        tbl_pass_reserv.accomodation,
                        tbl_pass_reserv.reservation_date,
                        tbl_pass_reserv.expiration,
                        tbl_pass_reserv.status,
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
     from tbl_passenger_reservation tbl_pass_reserv
     JOIN tbl_ship_detail tbl_sd ON tbl_pass_reserv.ship_name = tbl_sd.ship_name
     JOIN tbl_ship_schedule tbl_sched 
     JOIN tbl_ship_has_accomodation_type tbl_acctyp
     JOIN tbl_tckt tbl_tcket ON tbl_sd.ship_name = tbl_tcket.tckt_owner
     WHERE tbl_pass_reserv.reservation_number=?";
    $stmt = $c->prepare($sql_srch_slcts);
    echo $c -> error;
    $stmt->bind_param('s',$reservationNum);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    if ($row == null) {
       echo "Error";
    }
    else{
    if($row['accomodation']== "No Aircon"){
            $data = "Normal Seat";
            $aircon = "No";
    }
    else
    {
        $data = $row["seat_type"];
        $aircon = $row["aircon"];
    }
    $output = '
    <div class="container" style="margin-top: 8%;">
    <div class="col-sm- 6">
        <div>
            <fieldset class="scheduler-border" style="border-style: dashed; border-color: black;border-width: 2px;">
                <legend class="scheduler-border" style=" padding: 3px; font-size: 15px;">Summary
                </legend>
                <p class="text-center" style="font-size: 150%; color: black;"> '.$row['location_from'].' <span class="" style="margin: 10px 10px 10px -8px;"><i class="fa fa-arrow-right"></i></span> </i>'.$row['location_to'].'</p>
            </fieldset>
        </div>
    </div>
</div>
<div class="row">
    <div class="depature_portal_accomadation col-sm-4 text-center">
        <h5 class=" text-center" style="margin-top: 20px">Departure Date</h5>
        <p class="">'.$row['depart_date'].'</p>
    </div>
    <div class="depature_portal_accomadation col-sm-4 text-center">
        <h5 class="text-center" style="margin-top: 20px">Departure Time</h5>
        <p class="departure_time">'.$row['depart_time'].'</p>
    </div>
    <div class="depature_portal_accomadation col-sm-4 text-center">
        <h5 class=" text-center" style="margin-top: 20px">shippingline</h5>
        <p class="">'.$row['ship_name'].'</p>
    </div>
</div>
<div class="row">
    <div class="depature_portal_accomadation col-sm-4 text-center">
        <h5 class=" text-center" style="margin-top: 20px">Accomodation</h5>
        <p class="">'.$row['accomodation'].'</p>
    </div>
    <div class="depature_portal_accomadation col-sm-4 text-center">
        <h5 class="seat-type text-center" style="margin-top: 20px">Seat Type</h5>
        <p class="">'.$data.'</p>
    </div>
    <div class="depature_portal_accomadation col-sm-4 text-center">
        <h5 class="Aircon text-center" style="margin-top: 20px">Aircon </h5>
        <p class="">'.$aircon.'</p>
    </div>
    <div class="depature_portal_accomadation col-sm-4 text-center">
        <h5 class=" text-center" style="margin-top: 20px">Port</h5>
        <p><span>'.$row["port_from"].'</span><i class="fa fa-long-arrow-right" style="margin-left: 1px;"></i><span>'.$row["port_to"].'</span></p>
    </div>
</div>
   ';
    echo $output;
    $stmt->close();

}
}

function fetch_data_paypal($c){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $reservationNum = $_GET['reservation'];
    $typofpayment = $_GET['typOfpymnt'];
    $shipName = $_GET['shipName'];
    $myid = $_SESSION['id'];
    $sql_srch_slcts = "SELECT 
                        tbl_pass_reserv.reservation_number,
                        tbl_pass_reserv.ship_name,
                        tbl_pass_reserv.passenger_name,
                        tbl_pass_reserv.location_from,
                        tbl_pass_reserv.location_to,
                        tbl_pass_reserv.depart_date,
                        tbl_pass_reserv.depart_time,
                        tbl_pass_reserv.accomodation,
                        tbl_pass_reserv.reservation_date,
                        tbl_pass_reserv.expiration,
                        tbl_pass_reserv.status,
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
                        tbl_tcket.id as ticket_id,
                        tbl_tcket.tckt_stats,
                        tbl_tcket.tckt_dscnt,
                        tbl_tcket.tckt_owner,
                        tbl_tcket.tckt_price
     from tbl_passenger_reservation tbl_pass_reserv
     JOIN tbl_ship_detail tbl_sd ON tbl_pass_reserv.ship_name = tbl_sd.ship_name
     JOIN tbl_ship_schedule tbl_sched 
     JOIN tbl_ship_has_accomodation_type tbl_acctyp
     JOIN tbl_tckt tbl_tcket ON tbl_sd.ship_name = tbl_tcket.tckt_owner
     WHERE tbl_pass_reserv.reservation_number=?";
    $stmt = $c->prepare($sql_srch_slcts);
    echo $c -> error;
    $stmt->bind_param('s',$reservationNum);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();

    $sql_srch_slcts1 = "SELECT * from tbl_rdeem_promo WHERE psnger_id = $myid";
    $stmt1 = $c->prepare($sql_srch_slcts1);
    echo $c -> error;
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $row1 = $result1->fetch_array();
    if ($row1 == NULL) {
        if($row['accomodation']=="No Aircon"){
            $total_price = $row['tckt_price'];
            $No = "No Aircon";
            }
            else{
            $total_price = $row['price'] + $row['tckt_price'];
            $No = $row['accomodation'];
            }

            $output = '
            <form action="'.PAYPAL_URL.'" method="post" >
                         <!-- Identify your business so that you can collect the payments -->
        
            <input type="hidden" name="business" value="'.PAYPAL_ID.'">
        
                         <!-- Specify a subscriptions button. -->
        
            <input type="hidden" name="cmd" value="_xclick-subscriptions">
        
                        <!-- Specify details about the subscription that buyers will purchase -->
            <input type="hidden" name="ship_name" value="'.$shipName.'">
            <input type="hidden" name="item_name" value="'.$typofpayment.'">
            <input type="hidden" name="item_accomodation" value="'.$No.'">
        
            <input type="hidden" name="item_number" value="'.$row['reservation_number'].'">
            <input type="hidden" name="currency_code" value="'.PAYPAL_CURRENCY.'">
            <input type="hidden" name="a3" id="paypalAmt" value="'.$total_price.'">
            <input type="hidden" name="p3" id="paypalValid" value="1">
            <input type="hidden" name="t3" value="M">
                         <!-- Custom variable user ID -->
            <input type="hidden" name="custom" value="'.$_SESSION['id'].'">
            <input type="hidden" name="ship_name" value="'.$row['ship_name'].'">
            <input type="hidden" name="cancel_return" value="'.PAYPAL_CANCEL_URL.'">
            <input type="hidden" name="return" value="'.PAYPAL_RETURN_URL.'?payer_email='.$_SESSION['email'].'&rsrvtn_id='.$row['reservation_number'].'&pyrtype='.$typofpayment.'">
            <input type="hidden" name="notify_url" value="'.PAYPAL_NOTIFY_URL.'">
            <input type="hidden" value="'.$total_price.'" class="form-control">
            <input style="position:right;" class="btn btn-success" type="submit" value="Proceed to Payment">
            </form>
           ';
            echo $output;
            $stmt->close();
    }
    else if($row1['use_status'] == 1){
        if($row['accomodation']=="No Aircon"){
            $discount =($row['tckt_price'] / 100 ) * $row1['v_discount'];
            $total_price = $row['tckt_price'] - $discount;
            $No = "No Aircon";
            }
            else{
            $total = $row['price'] + $row['tckt_price'];
            $discount =($total / 100 ) * $row1['v_discount'];
            $total_price = $total - $discount;
            $No = $row['accomodation'];
            }
  
    $output = '
    <form action="'.PAYPAL_URL.'" method="post" >
                 <!-- Identify your business so that you can collect the payments -->

    <input type="hidden" name="business" value="'.PAYPAL_ID.'">

                 <!-- Specify a subscriptions button. -->

    <input type="hidden" name="cmd" value="_xclick-subscriptions">

                <!-- Specify details about the subscription that buyers will purchase -->
    <input type="hidden" name="ship_name" value="'.$shipName.'">
    <input type="hidden" name="item_name" value="'.$typofpayment.'">
    <input type="hidden" name="item_accomodation" value="'.$No.'">

    <input type="hidden" name="item_number" value="'.$row['reservation_number'].'">
    <input type="hidden" name="currency_code" value="'.PAYPAL_CURRENCY.'">
    <input type="hidden" name="a3" id="paypalAmt" value="'.$total_price.'">
    <input type="hidden" name="p3" id="paypalValid" value="1">
    <input type="hidden" name="t3" value="M">
                 <!-- Custom variable user ID -->
    <input type="hidden" name="custom" value="'.$_SESSION['id'].'">
    <input type="hidden" name="ship_name" value="'.$row['ship_name'].'">
    <input type="hidden" name="cancel_return" value="'.PAYPAL_CANCEL_URL.'">
    <input type="hidden" name="return" value="'.PAYPAL_RETURN_URL.'?payer_email='.$_SESSION['email'].'&rsrvtn_id='.$row['reservation_number'].'&pyrtype='.$typofpayment.'">
    <input type="hidden" name="notify_url" value="'.PAYPAL_NOTIFY_URL.'">
    <input type="hidden" value="'.$total_price.'" class="form-control">
    <input style="position:right;" class="btn btn-success" type="submit" value="Proceed to Payment">
    </form>
   ';
    echo $output;
    $stmt->close();
}
else{
    if($row['accomodation']=="No Aircon"){
        $total_price = $row['tckt_price'];
        $No = "No Aircon";
        }
        else{
        $total_price = $row['price'] + $row['tckt_price'];
        $No = $row['accomodation'];
        }

        $output = '
        <form action="'.PAYPAL_URL.'" method="post" >
                     <!-- Identify your business so that you can collect the payments -->
    
        <input type="hidden" name="business" value="'.PAYPAL_ID.'">
    
                     <!-- Specify a subscriptions button. -->
    
        <input type="hidden" name="cmd" value="_xclick-subscriptions">
    
                    <!-- Specify details about the subscription that buyers will purchase -->
        <input type="hidden" name="ship_name" value="'.$shipName.'">
        <input type="hidden" name="item_name" value="'.$typofpayment.'">
        <input type="hidden" name="item_accomodation" value="'.$No.'">
    
        <input type="hidden" name="item_number" value="'.$row['reservation_number'].'">
        <input type="hidden" name="currency_code" value="'.PAYPAL_CURRENCY.'">
        <input type="hidden" name="a3" id="paypalAmt" value="'.$total_price.'">
        <input type="hidden" name="p3" id="paypalValid" value="1">
        <input type="hidden" name="t3" value="M">
                     <!-- Custom variable user ID -->
        <input type="hidden" name="custom" value="'.$_SESSION['id'].'">
        <input type="hidden" name="ship_name" value="'.$row['ship_name'].'">
        <input type="hidden" name="cancel_return" value="'.PAYPAL_CANCEL_URL.'">
        <input type="hidden" name="return" value="'.PAYPAL_RETURN_URL.'?payer_email='.$_SESSION['email'].'&rsrvtn_id='.$row['reservation_number'].'&pyrtype='.$typofpayment.'">
        <input type="hidden" name="notify_url" value="'.PAYPAL_NOTIFY_URL.'">
        <input type="hidden" value="'.$total_price.'" class="form-control">
        <input style="position:right;" class="btn btn-success" type="submit" value="Proceed to Payment">
        </form>
       ';
        echo $output;
}
}
//* reservation
function redeemPromoInsert($c) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $promo = $_POST['promo'];
    $id = $_POST['id'];
    $sdlf = $_POST['discount'];
    $pid = $_SESSION['id'];
    $sn = $_SESSION['username'];
  
    $sql_rsrtn = "INSERT INTO tbl_rdeem_promo(rdeem_id,rdeem_promo,v_discount,psnger_id,passnger_name,dates)
                 VALUES (?,?,?,?,?,now())";
    $stmt = $c->prepare($sql_rsrtn);
    echo $c -> error;
    $stmt->bind_param('sssss',$id,$promo,$sdlf,$pid,$sn);
    if($stmt->execute()) {
        $stmt->close();
        echo "success";
    }
    else{
        echo "Not";
    }
}
function redeemPromoInsert_claim($c) {
    $id = $_POST['id'];
    $pid = $_SESSION['id'];
    $status = $_POST['status'];
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $sql_rsrtn = "UPDATE tbl_rdeem_promo set use_status = $status WHERE rdeem_id = $id AND psnger_id = $pid";
    $stmt = $c->prepare($sql_rsrtn);
    echo $c -> error;
    if($stmt->execute()) {
        $stmt->close();
        echo "success";
    }
    else{
        echo "Not";
    }
}
?>