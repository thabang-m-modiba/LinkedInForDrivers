<?php

session_start();

if (isset($_POST["update"])) {

    $id = $_POST["id"];
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);

    $username = $_SESSION["username"];

    include "../classes/dbh.classes.php";
    include "../classes/post.classes.php";
    include "../classes/post.ctrl.classes.php";

    $post = new PostContr(
        $username,
        $title,
        $content,
        $id
    );

    $post->updatePostUser();

    header("location: ../posts.php?success=updated");
    exit();
}