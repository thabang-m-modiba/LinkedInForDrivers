<?php
require 'header/header.php';

$isLoggedIn = isset($_SESSION['username']);
?>

<main>

    <?php if ($isLoggedIn): ?>

        <div class="session-bar">
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <div class="session-actions">
                <a href="includes/logout.inc.php">Logout</a>
                <form id="deleteAccountForm" action="includes/deleteAccount.inc.php" method="post">
                    <button type="submit" name="submit" class="btn btn-danger-outline">Delete account</button>
                </form>
            </div>
        </div>

        <form class="post-form" action="includes/post.inc.php" method="post">
            <input type="text" name="title" placeholder="Title" class="post-form-title" required>
            <input type="text" maxlength="500" name="content" placeholder="Enter text" class="post-form-content" required>
            <button type="submit" class="btn btn-primary" name="submit">Post</button>
        </form>

    <?php else: ?>

        <div class="guest-panel">
            <h2>Welcome to our website</h2>
            <p>Log in to see what your network is sharing.</p>
            <p><a href="login/login.php" class="btn btn-primary">Login</a></p>
            <p class="form-footnote">Don't have an account? <a href="signup/signup.php">Sign up</a></p>
        </div>

    <?php endif; ?>

    

</main>

<?php require 'footer/footer.php'; ?>