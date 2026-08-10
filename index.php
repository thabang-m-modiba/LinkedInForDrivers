<?php require 'header/header.php'; ?>

<main>
    <p>Hello, World</p>
    <?php
    if (isset($_SESSION["username"])) {
        echo "<p>Welcome, " . $_SESSION["username"] . "!</p>";
        echo "<p><a href='includes/logout.inc.php'>Logout</a></p>";
    } else {
        echo "<p>You are not logged in.</p>";
        echo "<p><a href='login/login.php'>Login</a> or <a href='signup/signup.php'>Sign Up</a></p>";
    }
    ?>
</main>

<?php require 'footer/footer.php'; ?>