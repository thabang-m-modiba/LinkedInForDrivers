<?php
    class Signup extends Dbh{
        
        protected function setUser($name, $email, $password){
            $stmt = $this->connect()->prepare('INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?);');

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            if(!$stmt->execute(array($name, $email, $hashedPassword))){
                $stmt = null;
                header("location: ../signup.php?error=stmtfailed");
                exit();
            }

            $stmt = null;
        }


        protected function checkUser($name, $email){
            $stmt = $this->connect()->prepare('SELECT user_name FROM users WHERE user_name = ? OR user_email = ?;');

            if(!$stmt->execute(array($name, $email))){
                $stmt = null;
                header("location: ../signup.php?error=stmtfailed");
                exit();
            }

            $result;
            if($stmt->rowCount() > 0){
                $result = false;
            }else{
                $result = true;
            }
            return $result;
        }

        private function passwordMatch(){
        $result;
        if($this->checkUser($this->name, $this->email)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
    }