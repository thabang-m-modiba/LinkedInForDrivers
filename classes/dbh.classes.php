<?php

class Dbh{
    public function connect(){
        try{
            $username = "root";
            $password = "";
            $pdo = new PDO('mysql:host=localhost;dbname=ooploginsystem', $username, $password);
            return $pdo;
        }catch(PDOException $e){
            die("Connection failed: " . $e->getMessage());
        }
    }
}