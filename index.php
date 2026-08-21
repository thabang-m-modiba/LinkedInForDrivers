<?php
require 'header/header.php';
include 'classes/dbh.classes.php';

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
        <div class="error-msg-wrapper">
            <p class="error-msg" style="color: red;">
                <?php
                if(isset($_GET['error'])){
                    $message = $_GET['error'];

                    if($message === "emptyInput"){
                        echo "(Empty Inputs!)";
                    }

                    if($message === "postNotFound"){
                        echo "(Post Do Not Exist!)";
                    }

                    if($message === "unauthorized"){
                        echo "(Illegal Access!)";
                    }

                    if($message === "loggedout"){
                        //echo "Logged Out";
                    }
                }
                ?>
            </p>
        </div>
        <form class="post-form" action="includes/post.inc.php" method="post">
            <input type="text" name="title" placeholder="Title" class="post-form-title" required>
            <input type="text" maxlength="500" name="content" placeholder="Enter text" class="post-form-content" required>
            <button type="submit" class="btn btn-primary" name="submit">Post</button>
        </form>

        <div class="feed">

            <?php 
            $dbh = new Dbh();

            $stmt = $dbh->connect()->query("SELECT * FROM posts;");
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($posts) > 0){
                //$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $postNum = count($posts);
                for($i = $postNum-1; $i >= 0; $i--){
                    $name = $posts[$i]["username"];
                    $title = $posts[$i]["title"];
                    $content = $posts[$i]["content"];
                    $date = $posts[$i]["created_num"];
                    //print_r($posts);
                    echo '
                    <article class="post-card">
                        <div class="post-head">
                            <div class="avatar">'.strtoupper(substr($name, 0, 1)).'</div>
                            <div class="post-meta">
                                <div class="post-author">'.$name.'</div>
                                <div class="post-time">'.$date.'</div>
                            </div>
                            <!--
                            <form class="post-delete-form">
                                <button type="submit" class="post-delete" aria-label="Delete post">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </form>-->
                        </div>
                        <p class="post-body">'.$content.'</p>
                    </article>
                ';
                }
            }else{
                echo "No Posts";
            }

            ?>
        </div>

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