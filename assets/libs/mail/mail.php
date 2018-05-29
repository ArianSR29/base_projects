<?php
 $nombre       = @trim(stripslashes($_POST['tb-nombre']));
 $apellidos       = @trim(stripslashes($_POST['tb-apellidos']));
 $correo       = @trim(stripslashes($_POST['tb-mail']));
 $especialidad       = @trim(stripslashes($_POST['tb-subespecialidad']));
 $telefono     = @trim(stripslashes($_POST['tb-tel']));
 $comentario     = @trim(stripslashes($_POST['tb-comentario']));

require_once('class.smtp.php');
require_once('class.pop3.php');
require_once('class.phpmaileroauthgoogle.php');
require_once('class.phpmailer.php');
require_once('PHPMailerAutoload.php');

    $mail = new PHPMailer;
    $mail->isSMTP();                                         // Set mailer to use SMTP
    $mail->Host = 'ps4.websitehostserver.net';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                  // Enable SMTP authentication
    $mail->Username = 'cirugia.inteligente@salauno.com.mx';                 // SMTP username
    $mail->Password = 'X,SM]q}63sgO';                       // SMTP password
    $mail->SMTPSecure = ssl;                                 // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                       // TCP port to connect to
    $mail -> charSet = "UTF-8";

    $mail->setFrom(utf8_decode($correo),utf8_decode($nombre));
    $mail->addAddress('intoconsultancy.tester@gmail.com');                 // Add a recipient

    $mail->isHTML(true);                                     // Set email format to HTML

    $mail->Subject = utf8_decode($nombre). utf8_decode(" quiere información sobre la renta de quirofanos.");
    $mail->Body    .= utf8_decode("<h3>Salauno renta de quirofanos</h3><br>Información: <br>");
    $mail->Body    .= '<strong>Nombre: </strong>'                 . utf8_decode($nombre) ."<br>";
    $mail->Body    .= '<strong>Apellidos: </strong>'                 . utf8_decode($apellidos) ."<br>";
    $mail->Body    .= '<strong>Correo: </strong>'                 . $correo ."<br>";
    $mail->Body    .= utf8_decode("<strong>Subespecialidad: </strong>")  . utf8_decode($especialidad) ."<br>";    
    $mail->Body    .= utf8_decode("<strong>Teléfono: </strong>")  . utf8_decode($telefono) ."<br>";
    $mail->Body    .= utf8_decode("<strong>Comentario: </strong>")  . utf8_decode($comentario) ."<br>";

    $nombre= utf8_decode($nombre);
    $telefono= utf8_decode($telefono);

    $datos = "$nombre, $apellidos, $correo, $especialidad, $telefono, $comentario";
    echo ($datos);



    if(!$mail->send()) {
        echo $nombre.' tus datos no fueron enviados, intentalo de nuevo por favor.';
        echo 'Mail error: ' . $mail->ErrorInfo;
    }else{
        echo $nombre.'Datos enviados.';        
    }
?>