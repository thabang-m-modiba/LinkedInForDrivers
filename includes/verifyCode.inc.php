<?php

require "../classes/dbh.classes.php";
require "../classes/resetPassword.classes.php";

$email = $_GET["email"];
$code = $_POST["code"];
$db = new Dbh();

$stmt = $db->connect()->prepare("SELECT * FROM users WHERE user_email = ? AND reset_code = ? AND reset_expires > NOW();");

$stmt->execute(array($email, $code));
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user){
    session_start();
    $_SESSION["email"] = $email;
    header("location: ../resetPassword.php?email=".$email);
}else{
    header("location: ../verifyCode.php?error=invalidcode");
}