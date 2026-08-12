<?php

require "../classes/dbh.classes.php";
require "../classes/resetPassword.classes.php";
require "../classes/resetPassword.ctrl.classes.php";

if(isset($_POST["submit"])){
    $email = $_POST["email"];

    $resetObj = new ResetPasswordController($email);
    $code = $resetObj->sendCode();
    require_once '../PHPMailer/src/Exception.php';
    require_once '../PHPMailer/src/PHPMailer.php';
    require_once '../PHPMailer/src/SMTP.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'thabangmamoloko8@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('thabangmamoloko8@gmail.com', 'Thabang');
        $mail->addAddress($email);
        $mail->Subject = 'Password Reset Code';
        $mail->Body = 'Your password reset code is: ' . $code." Code expires in 15 minutes.";
        $mail->send();

        header("location: ../pwdReset/verifyCode.php?email=" . $email);
    } catch (Exception $e) {    
        header("location: ../pwdReset/resetPassword.php?error=mailerror");
    }
}