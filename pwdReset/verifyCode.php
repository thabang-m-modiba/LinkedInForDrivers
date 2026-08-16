<?php
require '../header/header.php';
require '../includes/verifyCode.inc.php';
?>

<main>
    <section class="form-card">
        <h2>Verify Code</h2>
        <p class="form-footnote" style="margin-top: -8px; margin-bottom: 18px;">
            Enter the verification code we sent to your email.
        </p>
        <form action="../includes/verifyCode.inc.php<?php echo "?email=" . urlencode($_GET['email']); ?>" method="post">
            <div class="field">
                <label for="code">Verification Code</label>
                <input type="text" name="code" id="code" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Verify Code</button>
        </form>
    </section>
</main>

<?php require '../footer/footer.php'; ?>