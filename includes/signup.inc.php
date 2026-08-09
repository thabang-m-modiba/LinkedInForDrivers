<?php
if(isset($_POST['submit'])) {
    include_once 'dbh.inc.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm']);

    // Instantiate the signup controller
    include_once '../classes/dbh.classes.php';
    include_once '../classes/signup.classes.php';
    include_once '../classes/signup.ctrl.classes.php';
    
    $signupController = new signupController($name, $email, $password, $confirmPassword);

    // Call the signupUser method to handle the signup process
    $signupController->signupUser();

    // Redirect to a success page or display a success message
    header("Location: ../signup/success.php?error=none");


} else {
    header("Location: ../signup/signup.php");
    exit();
}