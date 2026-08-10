<?php

class Login extends Dbh {
    protected function getUser($username, $password){
        $stmt = $this->connect()->prepare('SELECT user_password FROM users WHERE username = ? OR user_email = ?;');

        if(!$stmt->execute(array($username, $password))){
            $stmt = null;
            header("location: ../login/login.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../login/login.php?error=usernotfound");
            exit();
        }

        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]["user_password"]);

        if($checkPassword == false){
            $stmt = null;
            header("location: ../login/login.php?error=wrongpassword");
            exit();
        }elseif($checkPassword == true){
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR user_email = ? AND user_password = ?;');

            if(!$stmt->execute(array($username, $password, $hashedPassword[0]["user_password"]))){
                $stmt = null;
                header("location: ../login/login.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../login/login.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["username"] = $user[0]["username"];
        }
    }
}