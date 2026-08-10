<?php

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once '../classes/dbh.classes.php';
    require_once '../classes/login.classes.php';
    require_once '../classes/login.ctrl.classes.php';

    $login = new LoginCtrl($username, $password);

    $login->loginUser();

    header("location: ../index.php?error=none");
} else {
    header("location: ../login/login.php?error=accessforbidden");
}