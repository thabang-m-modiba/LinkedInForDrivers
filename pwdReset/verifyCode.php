<?php require '../header/header.php';

require '../includes/verifyCode.inc.php'; ?>

<main>
    <h2>Verify Code</h2>
    <form action="../includes/verifyCode.inc.php" method="post">
        <label for="code">Verification Code:</label>
        <input type="text" name="code" id="code" required>
        <button type="submit" name="submit">Verify Code</button>
    </form>
</main>

<?php require '../footer/footer.php'; ?>