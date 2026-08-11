<?php

class ResetPasswordController extends ResetPassword{
    private $email;

    public function __construct($email){
        $this->email = $email;
    }

    public function sendCode(){
        // Check whether the user exists
        $user = $this->checkUser($this->email);
        if(!$user){
            header("location: ../resetPassword.php?error=nouser");
            exit();
        }

        // Generate a 6-digit verification code
        $code = random_int(100000, 999999);
        // Set the expiry to 15 minutes
        $expires = date("Y-m-d H:i:s", strtotime("+15 minutes"));
        // Save the code and the expiry to the database
        $this->saveCode($this->email, $code, $expires);
        // Return code so email script can send it
        return $code;
    }
}