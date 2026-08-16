<?php require '../header/header.php'; ?>

<main>
    <section class="form-card">
        <h2>Reset Password</h2>
        <form action="../includes/newPassword.inc.php?email=<?php echo urlencode($_GET['email'] ?? ''); ?>" method="post">
            <div class="field">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </section>
</main>

<?php require '../footer/footer.php'; ?>