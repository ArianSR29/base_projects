<?php    

    $nombre = ($_GET['tb-name']);
    $correo = ($_GET['tb-mail']);
    $telefono = ($_GET['tb-tel']);
    $fecha = ($_GET['tb-fecha']);

    require_once('class.smtp.php');
    require_once('class.pop3.php');
    require_once('class.phpmaileroauthgoogle.php');
    require_once('class.phpmailer.php');
    require_once('PHPMailerAutoload.php');

    $mail = new PHPMailer;
    $mail->SMTPDebug  = 0;
    $mail->isSMTP();                                         // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                  // Enable SMTP authentication
    $mail->Username = 'intoconsultancy.tester@gmail.com';                 // SMTP username
    $mail->Password = 'INTOtester29';                       // SMTP password
    $mail->SMTPSecure = ssl;                                 // Enable TLS encryption, 'ssl' also accepted
    $mail->Port = 465;                                       // TCP port to connect to
    $mail -> charSet = "UTF-8";


    $mail->setFrom(utf8_decode($correo),utf8_decode($nombre));
    $mail->addAddress('intoconsultancy.tester@gmail.com');                 // Add a recipient
    $mail->isHTML(true);
    
    // Set email format to HTML
    $mail->Subject = utf8_decode($nombre). utf8_decode(" quiere conectar con HC Medical");

    $mail->Body .= ("<div style='width: 550px; margin: 0 auto; text-align: center; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif'>");
        $mail->Body .= ("<span style='font-size: 30px;'>HC Medical - Información de landig page</span>");
        $mail->Body .= ("<div style='font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; margin-top: 20px; text-align: left;'>");
            $mail->Body .= ("<span style='font-size: 24px;'>Datos de formulario: </span>");
            $mail->Body .= ("<ul>");
                $mail->Body .= ("<li style='font-size: 17px; font-weight: bolder;'>Nombre: <span style='font-weight: normal;'>" . utf8_decode($nombre) . "</span></li>");
                $mail->Body .= ("<li style='font-size: 17px; font-weight: bolder;'>Correo electronico: <span style='font-weight: normal;'>" . utf8_decode($correo) . "</span></li>");
                $mail->Body .= ("<li style='font-size: 17px; font-weight: bolder;'>Teléfono: <span style='font-weight: normal;'>" . utf8_decode($telefono) . "</span></li>");
                $mail->Body .= ("<li style='font-size: 17px; font-weight: bolder;'>Fecha preferente para una cita: <span style='font-weight: normal;'>" . utf8_decode($fecha) . "</span></li>");
            $mail->Body .= ("</ul>");
        $mail->Body .= ("</div>");
        $mail->Body .= ("<div style='margin-top: 150px;'>");
            $mail->Body .= ("<span style='font-size: 17px;'>With love" . "<img src='https://image.ibb.co/iFpiCe/corazon.png' alt='corazon' border='0' style='width: 13px; margin: 0px 5px;'>" . ":</span> ");
            $mail->Body .= ("<img src='https://image.ibb.co/mBVZJK/logo_into.png' alt='logo_into' border='0' style='width: 80px'>");
        $mail->Body .= ("</div>");
    $mail->Body .= ("</div>");


    if(!$mail->send()) {
        echo $nombre.' tus datos no fueron enviados, intentalo de nuevo por favor.';
        echo 'Mail error: ' . $mail->ErrorInfo;
    }
    else{
        echo "<script> window.location.href = '../../../assets/temps/gracias.html'; </script>";
    }
?>
