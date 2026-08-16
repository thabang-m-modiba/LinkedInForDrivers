<?php

session_start();

require "../classes/dbh.classes.php";
require "../classes/resetPassword.classes.php";

$email = $_GET["email"];
$newPassword = $_POST["new_password"];

$db = new Dbh();
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$stmt = $db->connect()->prepare("UPDATE users SET user_password = ?, reset_code = NULL, reset_expires = NULL WHERE user_email = ?;");

$stmt->execute(array($hashedPassword, $email));

unset($_SESSION["email"]);
header("location: ../login/login.php?success=passwordreset");
exit();