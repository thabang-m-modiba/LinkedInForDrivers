<?php

if(isset($_POST["submit"])) {

    $name = $_POST["name"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    // Instantiate Signup Controller
    require_once '../classes/dbh.classes.php';
    require_once '../classes/signup.classes.php';
    require_once '../classes/signup.classes.ctrl.php';

    // Call the signupUser method to handle the signup process
    $signupCtrl = new SignupCtrl($name, $username, $phone, $dob, $email, $password, $passwordRepeat);
    $signupCtrl->signupUser();

    // Redirect to a success page or display a success message
    header("location: ../signup/signup.php?error=none");

    createUser($conn, $name, $username, $phone, $dob, $email, $password);
} else {
    header("location: ../signup/signup.php?error=invalidaccess");
    exit();
}