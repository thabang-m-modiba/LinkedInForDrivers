<?php

session_start();

if (isset($_POST["delete"])) {

    $id = $_POST["id"];
    $username = $_SESSION["username"];

    include "../classes/dbh.classes.php";
    include "../classes/post.classes.php";
    include "../classes/post.ctrl.classes.php";

    $post = new PostContr(
        $username,
        null,
        null,
        $id
    );

    $post->deletePostUser();

    header("location: ../posts.php?success=deleted");
    exit();
}