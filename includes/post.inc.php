<?php

session_start();

if(isset($_POST['submit'])){
    $title = trim($_POST["title"]);
    $content = trim($_POST["content"]);
    $username = $_SESSION['username'];

    include "../classes/dbh.classes.php";
    include "../classes/post.classes.php";
    include "../classes/post.ctrl.classes.php";

    $post = new PostCtrl($username, $title, $content);

    $post->createPostUser();

    header("location: ..index.php?success=created");
    exit();
}