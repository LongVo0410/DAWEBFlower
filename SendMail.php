<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include './PHPMailer/src/Exception.php';
include './PHPMailer/src/PHPMailer.php';
include './PHPMailer/src/SMTP.php';
include './PHPMailer/src/POP3.php';
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                         
    $mail->Host       = 'smtp.gmail.com';                  
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'longvo0410000@gmail.com';                   
    $mail->Password   = 'ummobicewoyzgguk';                             
    $mail->SMTPSecure = 'tls';           
    $mail->Port       = 587;                                   
    $mail->CharSet = 'UTF-8'; 
    $mail->setFrom('longvo0410000@gmail.com', 'Website flower');
    $mail->addAddress('longspin0110@gmail.com', 'Long');   
  
    $mail->isHTML(true);                                
    $mail->Subject = 'OTP đăng ký website Long';
    $mail->Body    = 'OTP của bạn là ';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}