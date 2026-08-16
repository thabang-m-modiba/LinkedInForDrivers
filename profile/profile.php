<?php
require '../header/header.php';

if (!isset($_SESSION['username'])) {
    header('Location: ../login/login.php');
    exit();
}

require '../includes/dbh.inc.php';

$userId = $_SESSION['user_id'];

$userStmt = $pdo->prepare('SELECT name, username, email, phone, dob, bio FROM users WHERE id = :id');
$userStmt->execute([':id' => $userId]);
$user = $userStmt->fetch(PDO::FETCH_ASSOC);

$postsStmt = $pdo->prepare(
    'SELECT id, content, created_at FROM posts WHERE user_id = :id ORDER BY created_at DESC'
);
$postsStmt->execute([':id' => $userId]);
$myPosts = $postsStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main>

    <?php if (isset($_GET['success']) && $_GET['success'] === 'updated'): ?>
        <div class="alert alert-success">Profile updated.</div>
    <?php elseif (isset($_GET['error']) && $_GET['error'] === 'required'): ?>
        <div class="alert alert-error">Name and email are required.</div>
    <?php elseif (isset($_GET['error']) && $_GET['error'] === 'email'): ?>
        <div class="alert alert-error">Enter a valid email address.</div>
    <?php endif; ?>

    <div class="profile-header">
        <div class="avatar avatar-lg"><?php echo strtoupper(substr($user['name'] ?: $user['username'], 0, 1)); ?></div>
        <div>
            <h2><?php echo htmlspecialchars($user['name'] ?: $user['username']); ?></h2>
            <p class="post-time">@<?php echo htmlspecialchars($user['username']); ?></p>
            <?php if (!empty($user['bio'])): ?>
                <p><?php echo htmlspecialchars($user['bio']); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="profile-tabs">
        <button type="button" class="active" data-tab="tab-info">Info</button>
        <button type="button" data-tab="tab-posts">Posts (<?php echo count($myPosts); ?>)</button>
        <button type="button" data-tab="tab-edit">Edit Profile</button>
    </div>

    <!-- Basic info -->
    <div id="tab-info" class="profile-panel active">
        <div class="field"><label>Name</label><p><?php echo htmlspecialchars($user['name']); ?></p></div>
        <div class="field"><label>Username</label><p><?php echo htmlspecialchars($user['username']); ?></p></div>
        <div class="field"><label>Email</label><p><?php echo htmlspecialchars($user['email']); ?></p></div>
        <div class="field"><label>Phone</label><p><?php echo htmlspecialchars($user['phone']); ?></p></div>
        <div class="field"><label>Date of Birth</label><p><?php echo htmlspecialchars($user['dob']); ?></p></div>
    </div>

    <!-- User's posts -->
    <div id="tab-posts" class="profile-panel">
        <?php if (empty($myPosts)): ?>
            <div class="empty-state">
                <span class="material-symbols-outlined">forum</span>
                <p>You haven't posted anything yet.</p>
            </div>
        <?php else: ?>
            <div class="feed">
                <?php foreach ($myPosts as $post): ?>
                    <article class="post-card">
                        <div class="post-head">
                            <div class="avatar"><?php echo strtoupper(substr($user['name'] ?: $user['username'], 0, 1)); ?></div>
                            <div class="post-meta">
                                <div class="post-author"><?php echo htmlspecialchars($user['name'] ?: $user['username']); ?></div>
                                <div class="post-time"><?php echo date('M j, Y \a\t g:i A', strtotime($post['created_at'])); ?></div>
                            </div>
                            <form class="post-delete-form" action="includes/posts.inc.php" method="post">
                                <input type="hidden" name="post_id" value="<?php echo (int) $post['id']; ?>">
                                <button type="submit" name="delete_post" class="post-delete" aria-label="Delete post">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>
                        </div>
                        <p class="post-body"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Edit profile form -->
    <div id="tab-edit" class="profile-panel">
        <section class="form-card" style="margin: 0;">
            <form action="includes/updateProfile.inc.php" method="post">
                <div class="field">
                    <label for="name">Name(s)</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>

                <div class="field">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
                </div>

                <div class="field">
                    <label for="bio">Bio</label>
                    <input type="text" id="bio" name="bio" maxlength="255" value="<?php echo htmlspecialchars($user['bio'] ?? ''); ?>">
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </section>
    </div>

</main>

<?php require '../footer/footer.php'; ?>