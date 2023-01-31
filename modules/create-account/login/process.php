<?php
require "../../config.php";
require "../../library/PHPMailer/src/Exception.php";
require "../../library/PHPMailer/src/PHPMailer.php";
require "../../library/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/* login post action */
if(isset($_POST['action']) && $_POST['action'] == 'passenger_form') {
    session_start();
    passengerLogin($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'login_showner_form') {
    session_start();
    shipLogin($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'staff_login_form') {
    session_start();
    staff_login($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'signout_frm') {
    session_start();
    signoutUser();
}
/* request reset password post action */
if(isset($_POST['action']) && $_POST['action'] == 'passenger_reset_request_form') {
    requestResetPasswordPassenger($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'sownr_reset_request_form') {
    requestResetPasswordShpOwnr($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'stf_reset_request_form') {
    requestResetPasswordShpStf($con);
}
/* change password post action */
if(isset($_POST['action']) && $_POST['action'] == 'pssngr_chng_pwd_frm') {
    changePasswordPssngr($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'shpownr_chng_pwd_frm') {
    changePasswordShOwnr($con);
}

if(isset($_POST['action']) && $_POST['action'] == 'stf_chng_pwd_frm') {
    changePasswordStf($con);
}
//
////
/////
//* passenger login & session
// function passengerLogin($con) {
//     $uname = $_POST['username-passenger'];
//     $hash_password = sha1($_POST['password-passenger']);
//     $q1 = $con->prepare("SELECT * FROM tbl_passenger_account WHERE username=? AND password=?");
//     $q1->bind_param('ss', $uname,$hash_password);
//     $q1->execute();
//     $r = $q1->fetch();
//     $q1->close();

//     if($r != NULL) {
//         passengerSession($con, $uname);
//     }else{
//         echo 'Login failed! Please check your username and password!';
//     }
// }


//* ship login & session
function shipLogin($con) {
/// SHIP LOGIN ===========================================================================

    $uname_sp_ownr = $_POST['username_sh_owner'];
    $hash_password_sh_ownr = sha1($_POST['password_sh_owner']);
    $stmt = $con->prepare("SELECT * FROM tbl_ship_onwer_account WHERE username=? AND password=?");
    $stmt->bind_param('ss', $uname_sp_ownr,$hash_password_sh_ownr);
    $stmt->execute();
    $ownr = $stmt->fetch();
    $stmt->close();

    if($ownr != NULL) {

        shipSession($con, $uname_sp_ownr);    

    }else if($ownr == NULL){

       // ADMIN LOGIN ======================================================================

    $uname_sp_admin = $_POST['username_sh_owner'];
    $hash_password_sh_admin = $_POST['password_sh_owner'];
    $stmt = $con->prepare("SELECT * FROM admin WHERE username=? AND password=?");
    $stmt->bind_param('ss', $uname_sp_admin,$hash_password_sh_admin);
    $stmt->execute();
    $admin = $stmt->fetch();
    $stmt->close();
        if ($admin != NULL) {
            adminSession($con,$uname_sp_admin);
        }

        else if($admin == NULL){
            //////STAFFF LOGIN ==============================================================
            $uname_stff = $_POST['username_sh_owner'];
            $hash_password_stff = sha1($_POST['password_sh_owner']);
            $stmt = $con->prepare("SELECT * FROM tbl_staff_account WHERE username=? AND password=?");
            $stmt->bind_param('ss', $uname_stff,$hash_password_stff);
            $stmt->execute();
            $stff = $stmt->fetch();
            $stmt->close();
            if($stff != NULL) {
                staff_session($con, $uname_stff);

            }else if($stff == NULL){

                ////PASSENGER ===========================================================
                $uname = $_POST['username_sh_owner'];
                $hash_password = sha1($_POST['password_sh_owner']);
                $q1 = $con->prepare("SELECT * FROM tbl_passenger WHERE username=? AND password=?");
                $q1->bind_param('ss', $uname,$hash_password);
                $q1->execute();
                $r = $q1->fetch();
                $q1->close();
            
                if($r != NULL) {
                    passengerSession($con, $uname);
                }else{
                    echo 'Login failed! Please check your username and password!';
                }
            }
        }
    }
    else {
        echo 'Login Failed! Please check your username and password';
    }

}
function shipSession($c, $u_ownr) {
    $sql_slct_ownr = "SELECT 
                        tbl_soa.alt_owner_id,
                        tbl_soa.username,
                        tbl_o.name,
                        tbl_o.plan_id,
                        tbl_o.stats,
                        tbl_o.ship_name,
                        tbl_o.address,
                        tbl_o.email,
                        tbl_o.ship_logo
                        FROM tbl_ship_onwer_account tbl_soa
                        INNER JOIN ship_owners tbl_o ON tbl_soa.alt_owner_id = tbl_o.alt_owner_id
                        WHERE tbl_soa.username=?";
    
    if($stmt_onwr = mysqli_prepare($c, $sql_slct_ownr)) {
        echo $c->error;
        mysqli_stmt_bind_param($stmt_onwr, 's', $bpn_onwr);
        $bpn_onwr = $u_ownr;
        if(mysqli_stmt_execute($stmt_onwr)) {
            mysqli_stmt_store_result($stmt_onwr);
            if(mysqli_stmt_num_rows($stmt_onwr) == 1) {
                mysqli_stmt_bind_result($stmt_onwr, $id_ownr,$sn,$em_ownr,$shpl,$username_ownr,$stats,$sub_id,$o_name,$o_address);
                if(mysqli_stmt_fetch($stmt_onwr)) {
                    if($id_ownr != '' && $sn != '' && $username_ownr != '' && $o_name !='') {
                    
                            $_SESSION['alt_owner_id'] = $id_ownr;
                            $_SESSION['name'] = $sn; 
                            $_SESSION['plan_id'] = $sub_id;
                            $_SESSION['stats'] = $stats;
                            $_SESSION['ship_name']=$o_name;
                            $_SESSION['address']=$o_address;
                            $_SESSION['email'] = $em_ownr;
                            $_SESSION['ship_logo'] = $shpl;
                            
                         
                                
                           
                                    echo "Shipping Owner Login Successfully!";
                        
                             
                          
                          
                               
                    }
                   
                    
                }
              
                
             
            }
      
           
        }
        mysqli_stmt_close($stmt_onwr);
    } 
    else{
        echo "something went wrong";
    }
 
}
// admin session
function adminSession($c, $u_admin) {
    $sql_slct_admin = "SELECT tbl_ad.admin_id,
                       tbl_ad.username,
                       tbl_ad.password
                        FROM admin tbl_ad WHERE tbl_ad.username=?";
    
    if($stmt_admin = mysqli_prepare($c, $sql_slct_admin)) {
        mysqli_stmt_bind_param($stmt_admin, 's', $bpn_admin);
        $bpn_admin = $u_admin;
        if(mysqli_stmt_execute($stmt_admin)) {
            mysqli_stmt_store_result($stmt_admin);
            if(mysqli_stmt_num_rows($stmt_admin) == 1) {
                mysqli_stmt_bind_result($stmt_admin,$id_admin,$em_admin,$username_admin);
                if(mysqli_stmt_fetch($stmt_admin)) {
                    if($id_admin != '' && $em_admin != '' && $username_admin != '') {
                        $_SESSION['admin_id'] = $id_admin; 
                        $_SESSION['email'] = $em_admin;
                        $_SESSION['username'] = $username_admin;
                        echo "Admin Login Successfully!";
                    }
                }
            }
        }
        mysqli_stmt_close($stmt_admin);
    } 
}

//* staff login & session
// function staff_login($con) {
//     $uname_stff = $_POST['username_staff'];
//     $hash_password_stff = sha1($_POST['psswd_staff']);
//     $stmt = $con->prepare("SELECT * FROM tbl_staff_account WHERE username=? AND password=?");
//     $stmt->bind_param('ss', $uname_stff,$hash_password_stff);
//     $stmt->execute();
//     $stff = $stmt->fetch();
//     $stmt->close();
//     if($stff != NULL) {
//         staff_session($con, $uname_stff);
//     }else{
//         echo 'Login failed! Please check your username and password!';
//     }
// }

function staff_session($c, $u_stff) {
    $sql_slct_ownr = "SELECT 
                        s.staff_id,
                        s.name,
                        s.email,
                        s.owner_id,
                        tbl_sa.username
                        FROM tbl_staff_account tbl_sa
                        JOIN staff s ON tbl_sa.alt_staff_id = s.alt_staff_id
                        WHERE tbl_sa.username=?";
    
    if($stmt_stff = mysqli_prepare($c, $sql_slct_ownr)) {
        mysqli_stmt_bind_param($stmt_stff, 's', $bpn_stff);
        $bpn_stff = $u_stff;
        if(mysqli_stmt_execute($stmt_stff)) {
            mysqli_stmt_store_result($stmt_stff);
            if(mysqli_stmt_num_rows($stmt_stff) == 1) {
                mysqli_stmt_bind_result($stmt_stff, $id_stff,$name,$em_stff,$stff_ship_reside,$username_stff);
                if(mysqli_stmt_fetch($stmt_stff)) {
                    if($id_stff !='') {
                        $_SESSION['staff_id'] = $id_stff;
                        $_SESSION['email'] = $em_stff;
                        $_SESSION['owner_id'] = $stff_ship_reside;
                        $_SESSION['username'] = $username_stff;
                        echo "Staff Login";
                    } 
                }
            }
        }
        mysqli_stmt_close($stmt_stff);
    } 
}

///PASSENGER SESSION ================================
function passengerSession($c, $u) {
    $sql = "SELECT 
            tbl_pd.id,
            tbl_pd.first_name,
            tbl_pd.lastname,
            tbl_pd.gender,
            tbl_pd.dob,
            tbl_pd.email,
            tbl_pa.username,
            tbl_pa.verified
            FROM tbl_passenger_detail tbl_pd
            INNER JOIN tbl_passenger_account tbl_pa ON tbl_pa.id = tbl_pd.id
            WHERE tbl_pa.username = ? AND tbl_pa.verified = 1";
            
    if($stmt = mysqli_prepare($c, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $bind_param_uname);
        $bind_param_uname = $u;
        if(mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id,$first_name,$lastname,$gender,$dob,$email,$username,$verified);
                if(mysqli_stmt_fetch($stmt)) {
                    if($id != '' && $first_name != '' && $lastname != '' && $gender != '' && $dob != '' && $email != '' && $username != '' && $verified !=NULL) {
                        $_SESSION['id'] = $id;
                        $_SESSION['first_name'] = $first_name; 
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['gender'] = $gender;
                        $_SESSION['verified'] = $verified;
                        $_SESSION['dob'] = $dob;
                        $_SESSION['email'] = $email;
                        $_SESSION['username'] = $username;
                        echo "Sign in Successfully!";
                    }
                    else{
                        echo "Login failed!";
                    }
                }
            }
            else{
                 echo "Verify Your email";
            }
        }
        mysqli_stmt_close($stmt);
    }else{
        echo 'Login failed!';
    }
}
//* request reset password - passenger
function requestResetPasswordPassenger($c) {
    $em = $_POST['passenger_email_forgot'];
    $stmt_s = $c->prepare("SELECT * FROM tbl_passenger_detail WHERE email=?");
    $stmt_s->bind_param('s', $em);
    $stmt_s->execute();
    $result = $stmt_s->fetch();
   
    $stmt_s->close();

    $num = 0;

    if($result != NULL){
        $token = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str_shuf = str_shuffle($token);
        $sub = substr($str_shuf,0,62);
        $t = $sub;

        $sql_updt = "UPDATE tbl_passenger_reset_password tbl_prp
                INNER JOIN tbl_passenger_detail tbl_pd ON tbl_prp.id = tbl_pd.id
                SET tbl_prp.token=?,tbl_prp.token_expire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE tbl_pd.email=?";

        $stmt_u = $c->prepare($sql_updt);
        $stmt_u->bind_param('ss',$t,$em);
        $stmt_u->execute();
        $stmt_u->close();
        $num = 1;
    }else{
        echo 'No account found with that email address.';
    }

    if($num != NULL) {
        sendResetPasswordLinkPassenger($t,$em);
    }
}

//* request reset password - ship onwer
function requestResetPasswordShpOwnr($c) {
    $em = $_POST['sownr_email_forgot'];
    $stmt_s = $c->prepare("SELECT 
            tbl_pd.id,
            tbl_pd.first_name,
            tbl_pd.lastname,
            tbl_pd.gender,
            tbl_pd.dob,
            tbl_pd.email,
            tbl_pa.username,
            tbl_pa.verified,
            tbl_pa.token
            FROM tbl_passenger_detail tbl_pd
            INNER JOIN tbl_passenger_account tbl_pa ON tbl_pa.id = tbl_pd.id
            WHERE tbl_pd.email = ?");
    $stmt_s->bind_param('s', $em);
    $stmt_s->execute();
    $result = $stmt_s->fetch();
    $stmt_s->close();

    $num = 0;

    if($result != NULL){
    $stmt = $c->prepare("SELECT 
            tbl_pd.id,
            tbl_pd.first_name,
            tbl_pd.lastname,
            tbl_pd.gender,
            tbl_pd.dob,
            tbl_pd.email,
            tbl_pa.username,
            tbl_pa.verified,
            tbl_pa.token
            FROM tbl_passenger_detail tbl_pd
            INNER JOIN tbl_passenger_account tbl_pa ON tbl_pa.id = tbl_pd.id
            WHERE tbl_pd.email = ? ");
    $stmt->bind_param('s',$em);
    $stmt->execute();
    $results = $stmt->get_result();
    $rows = $results->fetch_assoc();
    $tok = $rows['token'];
    //  =====================================================email ====================
      try{
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
               $mail = new PHPMailer();
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                // $mail->SMTPDebug = 3;
                $mail->isSMTP();
                $mail->SMTPAuth = false;
                $mail->SMTPAutoTLS = false;
                $mail->Host = "localhost";
                $mail->Username = 'barkomatic@barkomatic.xyz';
                $mail->Password = 'barkomatic@barkomatic';
                $mail->Port = 25;
                $mail->setFrom('barkomatic@barkomatic.xyz', 'Barkomatic Support');
                $mail->addAddress($em);
                $mail->isHTML(true);
                $mail->Subject = 'Verifying your Account';
                $mail->Body = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Reset Password</title>
            <!-- Latest compiled and minified CSS -->
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css?version=request-reset-password' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
        </head>
        <body>
            <div class='container m-auto'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <p>We have recieved a request to reset the password for your Barkomatic account: <span style='color:#007bff;font-weight:700;'>$em<span></p>
                        <br>
                        <p>If you submitted this request, please click the button below to proceed.<br> This button will be active for 5 minutes. If you do not wish to reset your password, please disregard this notice.</p> <br>
                        <p><a style='color:#fff;background-color:#337ab7;border:1px solid #2e6da4;text-decoration:none;padding:6px 12px;font-size:14px;font-weight:400;text-align:center;' href='http://barkomatic.xyz/email_verify.php?email=$em&token=$tok' class='btn btn-primary'>Verify Email</a></p><br>
                        <p>This message was generated by barkomatic.xyz</p>
                    </div>
                </div>
            </div>
        </body>
        </html>";
        $mail->send();
        echo "Email Sent.";
    }catch(Exception $e){
        //echo "Reset password link could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo 'Could not sent the reset password request.';
    }
    // ===========================================end of it============================
    }else{
        echo 'No account found with that email address.';
    }

    if($num != NULL) {
        sendResetPasswordLinkShOwnr($t,$em);
    }
}

//* request reset password - ship staff
function requestResetPasswordShpStf($c) {
    $em = $_POST['stf_email_forgot'];
    $stmt_s = $c->prepare("SELECT * FROM tbl_staff_detail WHERE email=?");
    $stmt_s->bind_param('s', $em);
    $stmt_s->execute();
    $result = $stmt_s->fetch();
    $stmt_s->close();
    $num = 0;
    //* request reset password - ship staff
    
    if($result != NULL){
        $token = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str_shuf = str_shuffle($token);
        $sub = substr($str_shuf,0,62);
        $t = $sub;
        $sql_updt = "UPDATE tbl_staff_reset_password tbl_stfrp
                    INNER JOIN tbl_staff_detail tbl_stfdl ON tbl_stfdl.id = tbl_stfrp.id
                    SET tbl_stfrp.token=?,tbl_stfrp.token_expire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE tbl_stfdl.email=?";
        $stmt_u = $c->prepare($sql_updt);
        $stmt_u->bind_param("ss",$t,$em);
        $stmt_u->execute();
        $stmt_u->close();
        $num = 1;
    }
    else{
        
            $stmt_s = $c->prepare("SELECT * FROM tbl_ship_detail WHERE email=?");
            $stmt_s->bind_param('s', $em);
            $stmt_s->execute();
            $result = $stmt_s->fetch();
            $stmt_s->close();
            $num = 0;
             //* request reset password - ship staff
              if($result != NULL){
                    $token = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $str_shuf = str_shuffle($token);
                    $sub = substr($str_shuf,0,62);
                    $t = $sub;
            
                    $sql_updt = "UPDATE tbl_ship_reset_password tbl_shrp
                                INNER JOIN tbl_ship_detail tbl_shd ON tbl_shrp.id = tbl_shd.id
                                SET tbl_shrp.token=?,tbl_shrp.token_expire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE tbl_shd.email=?";
            
                    $stmt_u = $c->prepare($sql_updt);
                    $stmt_u->bind_param("ss",$t,$em);
                    $stmt_u->execute();
                    $stmt_u->close();
                    $num = 1;
                    
                    
                             }else{
                                    $stmt_s = $c->prepare("SELECT * FROM tbl_passenger_detail WHERE email=?");
                                    $stmt_s->bind_param('s', $em);
                                    $stmt_s->execute();
                                    $result = $stmt_s->fetch();
                                    $stmt_s->close();
                                      if($result != NULL){
                                            $token = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                                            $str_shuf = str_shuffle($token);
                                            $sub = substr($str_shuf,0,62);
                                            $t = $sub;
                                    
                                            $sql_updt = "UPDATE tbl_passenger_reset_password tbl_prp
                                                    INNER JOIN tbl_passenger_detail tbl_pd ON tbl_prp.id = tbl_pd.id
                                                    SET tbl_prp.token=?,tbl_prp.token_expire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE tbl_pd.email=?";
                                    
                                            $stmt_u = $c->prepare($sql_updt);
                                            $stmt_u->bind_param('ss',$t,$em);
                                            $stmt_u->execute();
                                            $stmt_u->close();
                                            $num = 1;
                                         }else{ 
                                              echo 'No account found with that email address.';
                                          }
                                          if($num != NULL) {
                                        sendResetPasswordLinkPassenger($t,$em);
    }                       
}
                           if($num != NULL) {
                            sendResetPasswordLinkShOwnr($t,$em);
    }
}
                if($num == 1) {
                    sendResetPasswordLinkStf($t,$em);
    }
}

//* send reset password link - passenger
function sendResetPasswordLinkPassenger($tkn_pssgnr, $eml_pssngr) {
    try{
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
               $mail = new PHPMailer();
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                // $mail->SMTPDebug = 3;
                $mail->isSMTP();
                $mail->SMTPAuth = false;
                $mail->SMTPAutoTLS = false;
                $mail->Host = "localhost";
                $mail->Username = 'barkomatic@barkomatic.xyz';
                $mail->Password = 'barkomatic@barkomatic';
                $mail->Port = 25;
                $mail->setFrom('barkomatic@barkomatic.xyz', 'Barkomatic Support');
                $mail->addAddress($eml_pssngr);
                $mail->isHTML(true);
                $mail->Subject = 'Barkomatic Account Password Reset';
                $mail->Body = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Reset Password</title>
            <!-- Latest compiled and minified CSS -->
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css?version=request-reset-password' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
        </head>
        <body>
            <div class='container m-auto'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <p>We have recieved a request to reset the password for your Barkomatic account: <span style='color:#007bff;font-weight:700;'>$eml_pssngr<span></p>
                        <br>
                        <p>If you submitted this request, please click the button below to proceed.<br> This button will be active for 5 minutes. If you do not wish to reset your password, please disregard this notice.</p> <br>
                        <p><a style='color:#fff;background-color:#337ab7;border:1px solid #2e6da4;text-decoration:none;padding:6px 12px;font-size:14px;font-weight:400;text-align:center;' href='http://barkomatic.xyz/reset-password.php?email=$eml_pssngr&token=$tkn_pssgnr' class='btn btn-primary'>Reset Password</a></p><br>
                        <p>This message was generated by barkomatic.xyz</p>
                    </div>
                </div>
            </div>
        </body>
        </html>";
        $mail->send();
        echo "Email Sent.";
    }catch(Exception $e){
        //echo "Reset password link could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo 'Could not sent the reset password request.';
    }
}

//* send reset password link - ship owner
function sendResetPasswordLinkShOwnr($tkn_shownr, $eml_shownr) {
    // $mail = new PHPMailer(true);
    try{
                 $mail = new PHPMailer();
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                // $mail->SMTPDebug = 3;
                $mail->isSMTP();
                $mail->SMTPAuth = false;
                $mail->SMTPAutoTLS = false;
                $mail->Host = "localhost";
                $mail->Username = 'barkomatic@barkomatic.xyz';
                $mail->Password = 'barkomatic@barkomatic';
                $mail->Port = 25;
                $mail->setFrom('barkomatic@barkomatic.xyz', 'Barkomatic Support');
                $mail->addAddress($eml_shownr);

                $mail->isHTML(true);
                $mail->Subject = 'Barkomatic Account Password Reset';
                $mail->Body = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Reset Password</title>
            <!-- Latest compiled and minified CSS -->
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css?version=request-reset-password' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
        </head>
        <body>
            <div class='container m-auto'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <p>We have recieved a request to reset the password for your Barkomatic account: <span style='color:#007bff;font-weight:700;'>$eml_shownr<span></p>
                        <br>
                        <p>If you submitted this request, please click the button below to proceed.<br> This button will be active for 5 minutes. If you do not wish to reset your password, please disregard this notice.</p> <br>
                        <p><a style='color:#fff;background-color:#337ab7;border:1px solid #2e6da4;text-decoration:none;padding:6px 12px;font-size:14px;font-weight:400;text-align:center;' href='http://barkomatic.xyz/reset-password.php?email_shpownr=$eml_shownr&token_shpownr=$tkn_shownr' class='btn btn-primary'>Reset Password</a></p><br>
                         <p>This message was generated by barkomatic.xyz</p>
                    </div>
                </div>
            </div>
        </body>
        </html>";
        $mail->send();
        echo "Email Sent.";
    }catch(Exception $e){
        //echo "Reset password link could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo 'Could not sent the reset password request.';
    }
}

//* send reset password link - staff
function sendResetPasswordLinkStf($tkn_stf, $eml_stf) {
    // $mail = new PHPMailer(true);
    try{
                 $mail = new PHPMailer();
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                // $mail->SMTPDebug = 3;
                $mail->isSMTP();
                $mail->SMTPAuth = false;
                $mail->SMTPAutoTLS = false;
                $mail->Host = "localhost";
                $mail->Username = 'barkomatic@barkomatic.xyz';
                $mail->Password = 'barkomatic@barkomatic';
                $mail->Port = 25;
                $mail->setFrom('barkomatic@barkomatic.xyz', 'Barkomatic Support');
                $mail->addAddress($eml_stf);

        $mail->isHTML(true);
        $mail->Subject = 'Barkomatic Account Password Reset';
        $mail->Body = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Reset Password</title>
            <!-- Latest compiled and minified CSS -->
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css?version=request-reset-password' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
        </head>
        <body>
            <div class='container m-auto'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <p>We have recieved a request to reset the password for your Barkomatic account: <span style='color:#007bff;font-weight:700;'>$eml_stf<span></p>
                        <br>
                        <p>If you submitted this request, please click the button below to proceed.<br> This button will be active for 5 minutes. If you do not wish to reset your password, please disregard this notice.</p> <br>
                        <p><a style='color:#fff;background-color:#337ab7;border:1px solid #2e6da4;text-decoration:none;padding:6px 12px;font-size:14px;font-weight:400;text-align:center;' href='http://barkomatic.xyz/reset-password.php?email_stf=$eml_stf&token_stf=$tkn_stf' class='btn btn-primary'>Reset Password</a></p><br>
                         <p>This message was generated by barkomatic.xyz</p>
                    </div>
                </div>
            </div>
        </body>
        </html>";
        $mail->send();
        echo "Email Sent.";
    }catch(Exception $e){
        //echo "Reset password link could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo 'Could not sent the reset password request.';
    }
}

//* change password - passenger
function changePasswordPssngr($c) {
    $email = checkInput($_POST['pssngr_em_url_prm']);
    $token = checkInput($_POST['pssngr_tkn_url_prm']);
    $nw_pss = sha1($_POST['pssngr_nw_pwd']);
    $cnw_pss = sha1($_POST['pssngr_rpt_pwd']);

    $sql_slct = "SELECT
            tbl_pssngr_rp.id,
            tbl_pssngr_rp.token,
            tbl_pssngr_rp.token_expire,
            tbl_pssngr_dl.email
            FROM tbl_passenger_reset_password tbl_pssngr_rp
            INNER JOIN tbl_passenger_detail tbl_pssngr_dl ON tbl_pssngr_rp.id = tbl_pssngr_dl.id
            WHERE tbl_pssngr_dl.email=? AND tbl_pssngr_rp.token=? AND tbl_pssngr_rp.token<>'' AND tbl_pssngr_rp.token_expire > NOW()";
    
    $sql_upt = "UPDATE tbl_passenger_account tbl_pssngr_acc
            JOIN tbl_passenger_reset_password tbl_rp ON tbl_pssngr_acc.id = tbl_rp.id
            INNER JOIN tbl_passenger_detail tbl_pd ON tbl_pssngr_acc.id = tbl_pd.id
            SET tbl_pssngr_acc.password=?,tbl_rp.token='',tbl_rp.token_expire=''
            WHERE tbl_pd.email=?";

    $stmt1 = $c->prepare($sql_slct);
    $stmt1->bind_param('ss', $email,$token);
    $stmt1->execute();
    $rslt = $stmt1->fetch();
    $stmt1->close();

    if($rslt != null) {
        if($nw_pss == $cnw_pss){
            $stmt2 = $c->prepare($sql_upt);
            $stmt2->bind_param('ss', $nw_pss,$email);
            $stmt2->execute();
            echo "Your password has been changed successfully.";
        }else{
            echo 'Password did not match.';
        }
        $stmt2->close();
    } else {
        echo "Invalid email and token.";
    }
}

//* change password - ship owner
function changePasswordShOwnr($c) {
    $email_shpownr = checkInput($_POST['shpownr_em_url_prm']);
    $token_shpownr = checkInput($_POST['shpownr_tkn_url_prm']);
    $nw_pss_shpownr = sha1($_POST['shpownr_nw_pwd']);
    $cnw_pss_shpownr = sha1($_POST['shpownr_rpt_pwd']);

    $sql_slct = "SELECT
            tbl_shpownr_rp.id,
            tbl_shpownr_rp.token,
            tbl_shpownr_rp.token_expire,
            tbl_shpownr_dl.email
            FROM tbl_ship_reset_password tbl_shpownr_rp
            INNER JOIN tbl_ship_detail tbl_shpownr_dl ON tbl_shpownr_rp.id = tbl_shpownr_dl.id
            WHERE tbl_shpownr_dl.email=? AND tbl_shpownr_rp.token=? AND tbl_shpownr_rp.token<>'' AND tbl_shpownr_rp.token_expire > NOW()";
    
    $sql_upt_shownr = "UPDATE tbl_ship_account tbl_shpownr_acc
            INNER JOIN tbl_ship_reset_password tbl_rp ON tbl_shpownr_acc.id = tbl_rp.id
            INNER JOIN tbl_ship_detail tbl_pd ON tbl_shpownr_acc.id = tbl_pd.id
            SET tbl_shpownr_acc.password=?,tbl_rp.token='',tbl_rp.token_expire=''
            WHERE tbl_pd.email=?";

    $stmt1 = $c->prepare($sql_slct);
    $stmt1->bind_param('ss', $email_shpownr,$token_shpownr);
    $stmt1->execute();
    $rslt = $stmt1->fetch();
    $stmt1->close();

    if($rslt != null) {
        if($nw_pss_shpownr == $cnw_pss_shpownr){
            $stmt2 = $c->prepare($sql_upt_shownr);
            $stmt2->bind_param('ss', $nw_pss_shpownr,$email_shpownr);
            $stmt2->execute();
            echo "Your password has been changed successfully.";
        }else{
            echo 'Password did not match.';
        }
        $stmt2->close();
    } else {
        echo "Invalid email and token.";
    }
}

//* change password - ship staff
function changePasswordStf($c) {
    $email_stf = checkInput($_POST['stf_em_url_prm']);
    $token_stf = checkInput($_POST['stf_tkn_url_prm']);
    $nw_pss_stf = sha1($_POST['stf_nw_pwd']);
    $cnw_pss_stf = sha1($_POST['stf_rpt_pwd']);

    $sql_slct = "SELECT
            tbl_stf_rp.id,
            tbl_stf_rp.token,
            tbl_stf_rp.token_expire,
            tbl_stf_dl.email
            FROM tbl_staff_reset_password tbl_stf_rp
            INNER JOIN tbl_staff_detail tbl_stf_dl ON tbl_stf_rp.id = tbl_stf_dl.id
            WHERE tbl_stf_dl.email=? AND tbl_stf_rp.token=? AND tbl_stf_rp.token<>'' AND tbl_stf_rp.token_expire > NOW()";
    
    $sql_upt_shownr = "UPDATE tbl_staff_account tbl_stf_acc
            INNER JOIN tbl_staff_reset_password tbl_rp ON tbl_stf_acc.id = tbl_rp.id
            INNER JOIN tbl_staff_detail tbl_pd ON tbl_stf_acc.id = tbl_pd.id
            SET tbl_stf_acc.password=?,tbl_rp.token='',tbl_rp.token_expire=''
            WHERE tbl_pd.email=?";

    $stmt1 = $c->prepare($sql_slct);
    $stmt1->bind_param('ss', $email_stf,$token_stf);
    $stmt1->execute();
    $rslt = $stmt1->fetch();
    $stmt1->close();

    if($rslt != null) {
        if($nw_pss_stf == $cnw_pss_stf){
            $stmt2 = $c->prepare($sql_upt_shownr);
            $stmt2->bind_param('ss', $nw_pss_stf,$email_stf);
            $stmt2->execute();
            echo "Your password has been changed successfully.";
        }else{
            echo 'Password did not match.';
        }
        $stmt2->close();
    } else {
        echo "Invalid email and token.";
    }
}

//* sanitize data
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//* signout users
function signoutUser() {
    if(session_destroy()){
        echo "Signout successfully!";
    }
}
