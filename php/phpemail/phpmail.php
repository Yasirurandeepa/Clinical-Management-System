<?php
require 'PHPMailer/PHPMailerAutoload.php';

function sendMail($email, $bodyContent)
{
    $mail = new PHPMailer;
    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'kenway.medical@gmail.com';          // SMTP username
    $mail->Password = 'Kenway@#12';            // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to

    $mail->setFrom('kenway.medical@gmail.com', 'Kenway@Medical');
    $mail->addReplyTo('kenway.medical@gmail.com', 'Kenway@Medical');
    $mail->addAddress($email);   // Add a recipient
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML


    $mail->Subject = 'Kenway Medical account password reset' ;
    $mail->Body = $bodyContent;

    if (!$mail->send()) {
        return true;
    } else {
        return false;
    }
}

?>


		