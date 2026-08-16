<?php
require 'header/header.php';

$isLoggedIn = isset($_SESSION['username']);

/*if ($isLoggedIn) {
    require 'includes/dbh.inc.php';

    $stmt = $pdo->prepare(
        'SELECT posts.id, posts.content, posts.created_at, users.name, users.username
         FROM posts
         INNER JOIN users ON users.id = posts.user_id
         ORDER BY posts.created_at DESC
         LIMIT 50'
    );
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}*/
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

        <?php if (isset($_GET['error']) && $_GET['error'] === 'empty'): ?>
            <div class="alert alert-error">Your post can't be empty.</div>
        <?php elseif (isset($_GET['error']) && $_GET['error'] === 'toolong'): ?>
            <div class="alert alert-error">Posts are limited to 500 characters.</div>
        <?php elseif (isset($_GET['success'])): ?>
            <div class="alert alert-success">
                <?php echo $_GET['success'] === 'deleted' ? 'Post deleted.' : 'Post shared.'; ?>
            </div>
        <?php endif; ?>

        <!-- Post composer -->
        <form class="composer" action="includes/posts.inc.php" method="post">
            <div class="composer-top">
                <div class="avatar"><?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?></div>
                <textarea
                    id="postContent"
                    name="content"
                    maxlength="500"
                    placeholder="Share something with your network..."
                    required></textarea>
            </div>
            <div class="composer-footer">
                <span class="char-count"><span id="charCount">500</span> characters left</span>
                <button type="submit" name="create_post" id="postSubmit" class="btn btn-primary" disabled>Post</button>
            </div>
        </form>

        <!-- Posts feed -->
        <?php if (empty($posts)): ?>
            <div class="empty-state">
                <span class="material-symbols-outlined">forum</span>
                <p>No posts yet. Be the first to share something.</p>
            </div>
        <?php else: ?>
            <div class="feed">
                <?php foreach ($posts as $post): ?>
                    <article class="post-card">
                        <div class="post-head">
                            <div class="avatar"><?php echo strtoupper(substr($post['name'] ?: $post['username'], 0, 1)); ?></div>
                            <div class="post-meta">
                                <div class="post-author"><?php echo htmlspecialchars($post['name'] ?: $post['username']); ?></div>
                                <div class="post-time"><?php echo date('M j, Y \a\t g:i A', strtotime($post['created_at'])); ?></div>
                            </div>
                            <?php if ($post['username'] === $_SESSION['username']): ?>
                                <form class="post-delete-form" action="includes/posts.inc.php" method="post">
                                    <input type="hidden" name="post_id" value="<?php echo (int) $post['id']; ?>">
                                    <button type="submit" name="delete_post" class="post-delete" aria-label="Delete post">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                        <p class="post-body"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    <?php else: ?>

        <div class="guest-panel">
            <h2>Welcome to Our Website</h2>
            <p>Log in to see what your network is sharing.</p>
            <p><a href="login/login.php" class="btn btn-primary">Login</a></p>
            <p class="form-footnote">Don't have an account? <a href="signup/signup.php">Sign up</a></p>
        </div>

    <?php endif; ?>

</main>

<?php require 'footer/footer.php'; ?>