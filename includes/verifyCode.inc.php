<?php

require "../classes/dbh.classes.php";
require "../classes/resetPassword.classes.php";
require "../classes/resetPassword.ctrl.classes.php";

if(isset($_POST["submit"])){
    $email = $_GET["email"];
    $code = $_POST["code"];
    $db = new Dbh();

    $stmt = $db->connect()->prepare("SELECT * FROM users WHERE user_email = ? AND reset_code = ? AND reset_expires > NOW();");

    $stmt->execute(array($email, $code));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user){
        session_start();
        $_SESSION["email"] = $email;
        header("location: ../pwdReset/resetPassword.php?email=".$email);
    }else{
        header("location: ../pwdReset/verifyCode.php?error=invalidcode");
    }
}

