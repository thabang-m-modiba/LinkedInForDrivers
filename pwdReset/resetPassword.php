<?php

require "../header/header.php";

?>

<main>
    <h2>Reset Password</h2>
    <form action="../includes/newPassword.inc.php<?php echo "?email=" . $_GET['email']; ?>" method="post">
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" id="new_password" required>
        <button type="submit" name="submit">Reset Password</button>
    </form>
</main>

<?php require '../footer/footer.php'; ?>