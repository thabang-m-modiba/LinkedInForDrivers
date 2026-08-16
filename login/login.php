<?php require '../header/header.php'; ?>

<main>
    <section class="form-card login-form-section">
        <h2>Login</h2>
        <form action="../includes/login.inc.php" method="post">
            <div class="field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>

        <p class="form-footnote password-reset-link">
            <a href="../pwdReset/forgotPassword.php">Forgot password?</a>
        </p>

        <p class="form-footnote register-link">
            Don't have an account? <a href="../signup/signup.php">Register here</a>
        </p>
    </section>
</main>

<?php require '../footer/footer.php'; ?>