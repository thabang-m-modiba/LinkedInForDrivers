<?php require '../header/header.php'; ?>

<section class="login-form-section">
    <h2>Login</h2>
    <form>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</section>

<section class="password-reset-link">
    <p><a href="#">Forgot Password?</a></p>
</section>

<section class="register-link">
    <p>Don't have an account? <a href="../signup/signup.php">Register here</a></p>
</section>
<?php require '../footer/footer.php'; ?>