<?php

class SignupCtrl extends Signup{
    private $name;
    private $username;
    private $phone;
    private $dob;
    private $email;
    private $password;
    private $passwordRepeat;

    public function __construct($name, $username, $phone, $dob, $email, $password, $passwordRepeat){
        $this->name = $name;
        $this->username = $username;
        $this->phone = $phone;
        $this->dob = $dob;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    }

    public function signupUser(){
        if($this->emptyInput() == false){
            header("location: ../signup/signup.php?error=emptyinput");
            exit();
        }
        if($this->invalidName() == false){
            header("location: ../signup/signup.php?error=invalidName");
            exit();
        }
        if($this->invalidUsername() == false){
            header("location: ../signup/signup.php?error=invalidusername");
            exit();
        }
        if($this->invalidPhone() == false){
            header("location: ../signup/signup.php?error=invalidphone");
            exit();
        }
        if($this->invalidDob() == false){
            header("location: ../signup/signup.php?error=invaliddob");
            exit();
        }
        if($this->invalidDob() == false){
            header("location: ../signup/signup.php?error=invaliddob");
            exit();
        }
        if($this->invalidEmail() == false){
            header("location: ../signup/signup.php?error=invalidemail");
            exit();
        }
        if($this->passwordMatch() == false){
            header("location: ../signup/signup.php?error=passwordsdontmatch");
            exit();
        }
        if($this->checkUser($this->username, $this->email) == false){
            header("location: ../signup/signup.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->name, $this->username, $this->phone, $this->dob, $this->email, $this->password);
    }

    private function emptyInput(){
        $result;
        if(empty($this->name) || empty($this->username) || empty($this->phone) || empty($this->dob) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidName(){
        $result;
        if(!preg_match("/^[a-zA-Z ]*$/", $this->name)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidUsername(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidPhone(){
        $result;
        if(!preg_match("/^[0-9]{10}$/", $this->phone)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidDob(){
        $result;
        if(!preg_match("/^\d{4}-\d{2}-\d{2}$/", $this->dob)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function passwordMatch(){
        $result;
        if($this->password !== $this->passwordRepeat){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
}