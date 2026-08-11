<?php

class ResetPassword extends Dbh{
    
    protected function checkUser($email){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_email = ?;");
        if(!$stmt->execute(array($email))){
            $stmt = null;
            exit();
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    protected function saveCode($email, $code, $expires){
        $stmt = $this->connect()->prepare("UPDATE users SET reset_code = ?, reset_expires = ? WHERE user_email = ?;");

        if(!$stmt->execute(array($code, $expires, $email))){
            $stmt = null;
            exit();
        }
    }

    protected function verifyCodeDB($email, $code){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_email = ? AND reset_code = ? AND reset_expires > NOW();");

        if(!$stmt->execute(array($email, $code))){
            $stmt = null;
            exit();
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    protected function updatePassword($email, $password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connect()->prepare("UPDATE users SET user_password = ?, reset_code = NULL, reset_expires = NULL WHERE user_email = ?;");

        if(!$stmt->execute(array($hashedPassword, $email))){
            $stmt = null;
            exit();
        }
    }
}