<?php

class signupController extends Signup{
    private $name;
    private $email;
    private $password;
    private $confirmPassword;

    public function __construct($name, $email, $password, $confirmPassword){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

    public function signupUser(){
        if($this->emptyInput() == false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }

        if($this->nameInvalid() == false){
            header("location: ../signup.php?error=invalidname");
            exit();
        }

        if($this->emailInvalid() == false){
            header("location: ../signup.php?error=invalidemail");
            exit();
        }

        if($this->passwordMatch() == false){
            header("location: ../signup.php?error=passwordsdontmatch");
            exit();
        }

        $this->setUser($this->name, $this->email, $this->password);
    }

    private function emptyInput(){
        $result;
        if(empty($this->name) || empty($this->email) || empty($this->password) || empty($this->confirmPassword)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    private function nameInvalid(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->name)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    private function emailInvalid(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    private function passwordMatch(){
        $result;
        if($this->password !== $this->confirmPassword){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

}