<?php require '../header/header.php'; ?>

<main>
    <section class="form-card signup-form-section">
        <h2>Sign Up</h2>
        <div class="error-msg-wrapper">
            <p class="error-msg" style="color: red;">
                <?php
                if(isset($_GET['error'])){
                    $message = $_GET['error'];

                    if($message === "emptyinput"){
                        echo "(Enter All Fields!)";
                    }

                    if($message === "invalidName"){
                        echo "(Invalid Name!)";
                    }

                    if($message === "invalidusername"){
                        echo "(Invalid User Name)";
                    }

                    if($message === "invalidphone"){
                        echo "(Invalid Phone Number!)";
                    }

                    if($message === "invaliddob"){
                        echo "(Invalid Date Of Birth!)";
                    }

                    if($message === "invalidemail"){
                        echo "(Invalid email!)";
                    }

                    if($message === "passwordsdontmatch"){
                        echo "(Passwords Do Not Match!)";
                    }

                    if($message === "useroremailtaken"){
                        echo "(Username or Email already exits)";
                    }
                }
                ?>
            </p>
        </div>
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