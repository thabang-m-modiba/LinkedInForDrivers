<?php require '../header/header.php'; ?>

<main>
    <h2>Forgot Password</h2>
    <form action="../includes/resetPassword.inc.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit" name="submit">Send Reset Code</button>
    </form>
</main>

<?php require '../footer/footer.php'; ?>