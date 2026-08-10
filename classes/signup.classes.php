<?php

class Signup extends Dbh{
    
    protected function setUser($name, $username, $phone, $dob, $email, $password){
        $stmt = $this->connect()->prepare('INSERT INTO users (user_name, username, phone, dop, user_email, user_password) VALUES (?, ?, ?, ?, ?, ?);');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if(!$stmt->execute(array($name, $username, $phone, $dob, $email, $hashedPassword))){
            $stmt = null;
            header("location: ../signup/signup.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR user_email = ?;');
        if(!$stmt->execute(array($username, $email))){
            $stmt = null;
            header("location: ../signup/signup.php?error=stmtfailed");
            exit();
        }
        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;
    }
}