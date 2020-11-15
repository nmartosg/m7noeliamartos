<?php

include("funcions.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$pass="";
if(userExists($_REQUEST["email"])){
    $pass=  generate_string(6);
    updatePasswordUser($_REQUEST["email"],$pass);
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;        
        $mail->isSMTP();             
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth = true;
    $mail->Username = 'noeliamartos2001@gmail.com';
    $mail->Password = 'iqrfxopricvspoiz';
    $mail->setFrom('noeliamartos2001@gmail.com', 'Password recovery from my web');
    $mail->addAddress($_REQUEST["email"]);
    $mail->isHTML(true);   
    $mail->Subject = 'Nou password';
    $mail->Body    = "La nova password és <b>$pass</b>";
    $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
    echo "Si l'usuari existeix, rebràs la nova password al teu correu.";
?>