<?php require '../header/header.php'; ?>

<main>
    <section class="form-card signup-form-section">
        <h2>Sign Up</h2>
        <form action="../includes/signup.inc.php" method="post">
            <div class="field">
                <label for="name">Name(s)</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="field">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="field">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="field">
                <label for="passwordRepeat">Repeat Password</label>
                <input type="password" id="passwordRepeat" name="passwordRepeat" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        </form>

        <p class="form-footnote login-link-section">
            Already have an account? <a href="../login/login.php">Login here</a>
        </p>
    </section>
</main>

<?php require '../footer/footer.php'; ?>