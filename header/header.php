<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>

    <link rel="stylesheet" href="style/style.css">
    <script src="scriptJS/script.js" defer></script>
    <link rel="stylesheet" href="../style/style.css">
    <script src="../scriptJS/script.js" defer></script>
</head>
<body>

<header>
    <nav>
        <div class="logo">
            LinkedInForDrivers
        </div>

        <button type="button" id="navToggle" class="nav-toggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="navMenus">
            <span class="material-symbols-outlined">menu</span>
        </button>

        <ul class="nav-menus" id="navMenus">
            <li><a <?php if(isset($_SESSION['username'])) { echo "href='../index.php'"; }else { echo "href='index.php'"; } ?>>
                <span class="material-symbols-outlined">home</span>
                <span>Home</span>
            </a></li>
            <li><a href="#">
                <span class="material-symbols-outlined">groups</span>
                <span>Networks</span>
            </a></li>
            <li><a href="#">
                <span class="material-symbols-outlined">work</span>
                <span>Jobs</span>
            </a></li>
            <li><a href="#">
                <span class="material-symbols-outlined">chat</span>
                <span>Messages</span>
            </a></li>
            <li><a href="#">
                <span class="material-symbols-outlined">notifications</span>
                <span>Notifications</span>
            </a></li>
            <li><a href="profile/profile.php">
                <span class="material-symbols-outlined">person</span>
                <span>Profile</span>
            </a></li>
        </ul>
    </nav>
    <hr>
</header>