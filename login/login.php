<?php require '../header/header.php'; ?>

<section class="login-form-section">
    <h2>Login</h2>
    <form action="../includes/login.inc.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit" name="submit">Login</button>
    </form>
</section>

<section class="password-reset-link">
    <p><a href="#">Forgot Password?</a></p>
</section>

<section class="register-link">
    <p>Don't have an account? <a href="../signup/signup.php">Register here</a></p>
</section>
<?php require '../footer/footer.php'; ?>