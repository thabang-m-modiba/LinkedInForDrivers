<?php require '../header/header.php'; ?>

<main>
    <section class="form-card">
        <h2>Forgot Password</h2>
        <p class="form-footnote" style="margin-top: -8px; margin-bottom: 18px;">
            Enter your email and we'll send you a reset code.
        </p>
        <form action="../includes/resetPassword.inc.php" method="post">
            <div class="field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Send Reset Code</button>
        </form>
    </section>
</main>

<?php require '../footer/footer.php'; ?>