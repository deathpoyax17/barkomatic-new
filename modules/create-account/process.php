<?php
require "../../resources/config.php";
require "../library/PHPMailer/src/Exception.php";
require "../library/PHPMailer/src/PHPMailer.php";
require "../library/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//* post passenger & ship owner form
if(isset($_POST['action']) && $_POST['action'] == 'passenger_form') {
    passenger_register($con);
} 
if(isset($_POST['action']) && $_POST['action'] == 'shipping_form') {
    ship_register($con);
}

//* passenger register
function passenger_register($con) {
     error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $fname = check_input($_POST['fname']);
    $lname = check_input($_POST['lname']);
    $gender = $_POST['gender'];
    $token = bin2hex(random_bytes(50));
    $dob = date('Y-m-d',strtotime($_POST['dob']));
    $email = check_input($_POST['email']);
    $uname = check_input($_POST['uname']);
    $add = check_input($_POST['address']);
    $phone = check_input($_POST['phone']);
    $pass = sha1($_POST['password']);
    $cpass = sha1($_POST['confirm_password']);
    $timestamp = date("Y-m-d H:i:s");
    if($pass != $cpass){
        echo 'Password did not match!';
        exit();
    }else{
        $q1 = $con->prepare("SELECT 
                                tpd.email,
                                tpa.username
                                FROM tbl_passenger tbl_p
                                INNER JOIN passengers p ON tbl_p.alt_passenger_id = p.alt_passenger_id 
                                WHERE tpd.email=? OR tpa.username=?");
         echo $con -> error;
        $q1->bind_param('ss', $email,$uname);
        $q1->execute();
        $result = $q1->get_result();
        $row = $result->fetch_array();
        if($row!=NULL){
            echo 'Error';
        }
        else{
            
            $q3 = $con->prepare("INSERT INTO tbl_passenger (username,password) VALUES (?,?)");
            $q3->bind_param('sss', $uname,$pass);
             echo $con -> error;
            $q3->execute();

            $q2 = $con->prepare("INSERT INTO passengers (name,address,contact_info,email,dob,token) VALUES (?,?,?,?,?,?)");
            $q2->bind_param('ssssss', $fname,$add,$phone,$email,$dob,$token);
             echo $con -> error;
            $q2->execute();

          
            // $q4 = $con->prepare("INSERT INTO tbl_passenger_reset_password (token_expire) VALUES (?)");
            //  echo $con -> error;
            // $q4->bind_param('s', $timestamp);
            // $q4->execute();
            // ==========================================================================for email ===========
            //  try{
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
            //    $mail = new PHPMailer();
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                // $mail->SMTPDebug = 3;
        //         $mail->isSMTP();
        //         $mail->SMTPAuth = false;
        //         $mail->SMTPAutoTLS = false;
        //         $mail->Host = "localhost";
        //         $mail->Username = 'barkomatic@barkomatic.xyz';
        //         $mail->Password = 'barkomatic@barkomatic';
        //         $mail->Port = 25;
        //         $mail->setFrom('barkomatic@barkomatic.xyz', 'Barkomatic Support');
        //         $mail->addAddress($email);
        //         $mail->isHTML(true);
        //         $mail->Subject = 'Barkomatic Login Token';
        //         $mail->Body = "
        // <!DOCTYPE html>
        // <html lang='en'>
        // <head>
        //     <meta charset='UTF-8'>
        //     <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        //     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        //     <title>Reset Password</title>
        //     <!-- Latest compiled and minified CSS -->
        //     <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css?version=request-reset-password' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
        // </head>
        // <body>
        //     <div class='container m-auto'>
        //         <div class='row'>
        //             <div class='col-sm-12'>
        //                 <p>We have recieved a request to reset the password for your Barkomatic account: <span style='color:#007bff;font-weight:700;'>$eml_pssngr<span></p>
        //                 <br>
        //                 <p>If you submitted this request, please click the button below to proceed.<br> This button will be active for 5 minutes. If you do not wish to reset your password, please disregard this notice.</p> <br>
        //                 <p><a style='color:#fff;background-color:#337ab7;border:1px solid #2e6da4;text-decoration:none;padding:6px 12px;font-size:14px;font-weight:400;text-align:center;' href='http://barkomatic.xyz/email_verify.php?email=$email&token=$token' class='btn btn-primary'>Verify Email</a></p><br>
        //                 <p>This message was generated by barkomatic.xyz</p>
        //             </div>
        //         </div>
        //     </div>
        // </body>
        // </html>";
        // $mail->send();
         echo 'Registered Successfully.';
    // }catch(Exception $e){
        //echo "Reset password link could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     echo 'Could not sent the reset password request.';
    // }
            //===========================================================================end of email=========
           
            // $s1->close();
            $q1->close();
            $q2->close();
            $q3->close();
            // $q4->close();
        }  ////else
    }
}


//* ship owner register
function ship_register($con) {
    $scn = check_input($_POST['scn']);
    $email = check_input($_POST['email-shipping']);
    $uname = check_input($_POST['uname-shipping']);
    $oname = check_input($_POST['name-shipping']);
    $oaddres = check_input($_POST['shippingAddress']);
    $pass = check_input(sha1($_POST['pass']));
    $cpass = check_input(sha1($_POST['cpass']));
    $timestamp = date("Y-m-d H:i:s");

    if($pass != $cpass){
        echo 'Password did not match!';
        exit();
    }else{
        $q1 = $con->prepare("SELECT *
                                FROM tbl_ship_onwer_account tsoa
                                JOIN ship_owners so ON tsoa.alt_owner_id=so.alt_owner_id
                                WHERE so.email=? OR so.ship_name=? OR tsoa.username=?");
        $q1->bind_param('sss',$email,$scn,$uname);
        $q1->execute();
        $res = $q1->get_result();
        $r = $res->fetch_array(MYSQLI_ASSOC);
        if($r!=NULL){
            echo 'already exist! Please try another.';
        } else {
            $q3 = $con->prepare("INSERT INTO tbl_ship_onwer_account (username,password) VALUES (?,?)");
            $q3->bind_param('ss', $uname,$pass);
            $q3->execute();

            $owner_id1 = mysqli_insert_id($con);

            $q2 = $con->prepare("INSERT INTO ship_owners (ship_name,name,email,address,alt_owner_id) VALUES (?,?,?,?,?)");
            $q2->bind_param('sssss', $scn,$oname,$email,$oaddres,$owner_id1);
            $q2->execute();

            // $q4 = $con->prepare("INSERT INTO tbl_ship_reset_password (token_expire) VALUES (?)");
            // $q4->bind_param('s', $timestamp);
            // $q4->execute();
            try {
                echo 'Registered Successfully.';
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
           
            $q1->close();
            $q2->close();
            $q3->close();
            // $q4->close();
        }
    }
}

//* sanitize inputted
function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}