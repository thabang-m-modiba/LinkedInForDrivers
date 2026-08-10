<?php require '../header/header.php'; ?>

<section class="signup-form-section">
    <h2>Sign Up</h2>
    <form action="../includes/signup.inc.php" method="post">
        <label for="name">Name(s):</label>
        <input type="text" id="name" name="name" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="passwordRepeat">Repeat Password:</label>
        <input type="password" id="passwordRepeat" name="passwordRepeat" required><br>

        <button type="submit" name="submit">Sign Up</button>
    </form>
</section>

<section class="login-link-section">
    <p>Already have an account? <a href="../login/login.php">Login here</a></p>
</section>

<?php require '../footer/footer.php'; ?>