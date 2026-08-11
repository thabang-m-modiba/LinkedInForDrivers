<?php

require "../classes/dbh.classes.php";
require "../classes/resetPassword.classes.php";
require "../classes/resetPassword.ctrl.classes.php";

if(isset($_POST["submit"])){
    $email = $_POST["email"];

    $resetObj = new ResetPasswordController($email);
    $code = $resetObj->sendCode();
    require "../vendor/autoload.php";
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com';
        $mail->Password = 'your_email_password';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('your_email@gmail.com', 'Your Name');
        $mail->addAddress($email);
        $mail->Subject = 'Password Reset Code';
        $mail->Body = 'Your password reset code is: ' . $code." Code expires in 15 minutes.";
        $mail->send();

        header("location: ../verifyCode.php?email=".$email);
    } catch (Exception $e) {    
        header("location: ../resetPassword.php?error=mailerror");
    }
}