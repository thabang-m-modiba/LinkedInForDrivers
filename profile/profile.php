<?php 
require_once '../header/header.php';
include '../classes/dbh.classes.php';
?>

<main>

    <div class="alert alert-success">Profile updated.</div>

    <div class="profile-header">
        <div class="avatar avatar-lg">T</div>
        <div>
            <h2>Thabang Mamoloko</h2>
            <p class="post-time">@thabang</p>
            <p>Computer science student. Building things for people who need them.</p>
        </div>
    </div>

    <div class="profile-tabs">
        <button type="button" class="active" data-tab="tab-info">Info</button>
        <button type="button" data-tab="tab-posts">Posts (0)</button>
        <button type="button" data-tab="tab-edit">Edit Profile</button>
    </div>

    <!-- Basic info -->
    <div id="tab-info" class="profile-panel active">
        <div class="field"><label>Name</label><p><?php 
            $dbh = new Dbh();
            $stmt = $dbh->connect()->prepare("SELECT user_name FROM users WHERE username = ?;");
            $stmt->execute(array($_SESSION['username']));
            echo $stmt->fetch(PDO::FETCH_ASSOC)['user_name'];
         ?></p></div>
        <div class="field"><label>Username</label><p>
            <?php
                $dbh = new Dbh();
                $stmt = $dbh->connect()->prepare("SELECT username FROM users WHERE username = ?;");
                $stmt->execute(array($_SESSION['username']));
                echo $stmt->fetch(PDO::FETCH_ASSOC)['username'];
            ?>
        </p></div>
        <div class="field"><label>Email</label><p>
            <?php
                $dbh = new Dbh();
                $stmt = $dbh->connect()->prepare("SELECT user_email FROM users WHERE username = ?;");
                $stmt->execute(array($_SESSION['username']));
                echo $stmt->fetch(PDO::FETCH_ASSOC)['user_email']; 
            ?>
        </p></div>
        <div class="field"><label>Phone</label><p>
            <?php 
                $dbh = new Dbh();
                $stmt = $dbh->connect()->prepare("SELECT phone FROM users WHERE username = ?;");
                $stmt->execute(array($_SESSION['username']));
                echo $stmt->fetch(PDO::FETCH_ASSOC)['phone'];
            ?>
        </p></div>
        <div class="field"><label>Date of Birth</label><p>
            <?php
                $dbh = new Dbh();
                $stmt = $dbh->connect()->prepare("SELECT dop FROM users WHERE username = ?;");
                $stmt->execute(array($_SESSION['username']));
                echo $stmt->fetch(PDO::FETCH_ASSOC)['dop'];
            ?>
        </p></div>
    </div>

    <!-- User's posts -->
    <div id="tab-posts" class="profile-panel">
        <div class="feed">
            <article class="post-card">
                <div class="post-head">
                    <div class="avatar">T</div>
                    <div class="post-meta">
                        <div class="post-author">Thabang Mamoloko</div>
                        <div class="post-time">Aug 18, 2026 at 3:42 PM</div>
                    </div>
                    <form class="post-delete-form">
                        <button type="submit" class="post-delete" aria-label="Delete post">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </form>
                </div>
                <p class="post-body">Just shipped a new feature on the site. Excited to keep building this out.</p>
            </article>

            <article class="post-card">
                <div class="post-head">
                    <div class="avatar">T</div>
                    <div class="post-meta">
                        <div class="post-author">Thabang Mamoloko</div>
                        <div class="post-time">Aug 12, 2026 at 9:10 AM</div>
                    </div>
                    <form class="post-delete-form">
                        <button type="submit" class="post-delete" aria-label="Delete post">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </form>
                </div>
                <p class="post-body">Working through some assembly assignments this week. Stack frames are finally clicking.</p>
            </article>
        </div>

        <!-- Empty state, shown instead of the feed above when there are no posts -->
        <!--
        <div class="empty-state">
            <span class="material-symbols-outlined">forum</span>
            <p>You haven't posted anything yet.</p>
        </div>
        -->
    </div>

    <!-- Edit profile form -->
    <div id="tab-edit" class="profile-panel">
        <section class="form-card" style="margin: 0;">
            <form>
                <div class="field">
                    <label for="name">Name(s)</label>
                    <input type="text" id="name" name="name" value="Thabang Mamoloko" required>
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="thabang@example.com" required>
                </div>

                <div class="field">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="+27 71 234 5678">
                </div>

                <div class="field">
                    <label for="bio">Bio</label>
                    <input type="text" id="bio" name="bio" maxlength="255" value="Computer science student. Building things for people who need them.">
                </div>

                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </section>
    </div>

</main>

<?php require_once '../footer/footer.php'; ?>