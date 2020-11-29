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
    $codi=  generate_string(6);
    afegirCodiRecuperar($codi, $_REQUEST["email"]);

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
    $mail->Body    = 'Has sol·licitat el canvi de contrasenya. Clica <a href="https://dawjavi.insjoaquimmir.cat/nmartos/M07/UF1%20DESENVOLUPAMENT%20WEB%20EN%20ENTORN%20SERVIDOR/UF1-A8-Password%20Recovery%20/changepassword.php?codi='.$codi.'">aqui </a>per canviar la contrasenya';
    $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
    echo "Si l'usuari existeix, rebràs la nova password al teu correu.";
    echo "<br></br><a href=publica.php>ENRERE</a> Si clica es tornara a la pagina publica y no es desaran els canvis.";
?>