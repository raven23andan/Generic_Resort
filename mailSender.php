<?php
require 'PHPMailer-master/PHPMailerAutoload.php'; 

$mail = new PHPMailer;

//$mail->SMTPDebug = 1;                               // Enable verbose debug output
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->isSMTP();   

// $mail->SMTPDebug  = 1;   

                  
 // Set mailer to use SMTP
$mail->Host = 'smtp.hostinger.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'generic-resort@genericresort.online';                 // SMTP username
$mail->Password = 'Generic-Resort2024';                           // SMTP password, password in api key 
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;           

 
$mail->setFrom('generic-resort@genericresort.online', 'Generic Resort');
//$mail->addAddress('example@example.com');               // Name is optional
// $mail->addReplyTo('genericresort2024@gmail.com', 'Generic Resort');

$mail->isHTML(true);                                 

$mail->Subject = 'Generic Resort-OTP';
// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';


?>