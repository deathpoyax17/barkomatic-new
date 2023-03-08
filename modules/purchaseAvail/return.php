<?php
require "../library/PHPMailer/src/Exception.php";
require "../library/PHPMailer/src/PHPMailer.php";
require "../library/PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try {
    $mail = new PHPMailer();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false;
    $mail->Host = "smtp.hostinger.com";
    $mail->Username = 'support@barkomatic.online';
    $mail->Password = 'Deathpoyax@9876';
    $mail->Port = 587; // or 465
    $mail->setFrom('support@barkomatic.online', 'Confirmation');
    $mail->addAddress("manugasewinjames@gmail.com");
    $mail->isHTML(true);
    $mail->Subject = 'Confirmation';
    $mail->Body = "
    <!DOCTYPE html>
    <head>
    <style>
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            }
    </style>
    </head>
    <body>
        <div class='container m-auto'>
            <div class='row'>
                <div class='col-sm-12'>
                    <h4></h4><br>
                    <p>Hello Thank you for making your reservation in our shipping line. <br>Your <b>Payment</b> will be handled in the ticket office.</p>
                    <p>Your ticket reservation is valid until: <b></b></p>
                    <p>If you find it necessary to cancel or change plans, please inform us by email <span style='color:#007bff;font-weight:700;'><span></p>
                    <br><br>
                    <p>Again, thank you for choosing us. We look forward to having you as our guest.</p>
                    <p>Best regards,<br><span>Reservation Office</span></p>
                </div>
            </div>
        </div>
    </body>
    </html>";
    $mail->send();
    echo "Your reservation is submitted, In a while you will recieve an email confirmation for your reservation.";
}catch(Exception $e){
    echo "Could not sent the reservation confirmation. Mailer Error: {$mail->ErrorInfo}";
}
?>

<html>
<head>
<title>Payment Confirmed</title>
</head>
<body>
    <div style="width:700px; margin:50 auto;">
        <h1>Your paymeny has been received successfully.<br /> Thank you!</h1>
    </div>

<br /><br />


</body>
</html>