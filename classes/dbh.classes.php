<?php

class Dbh{
    protected function connect(){
        try{
            $username = "root";
            $password = "#Palaentologist33@sql";
            $pdo = new PDO('mysql:host=localhost;dbname=ooploginsystem', $username, $password);
            return $pdo;
        }catch(PDOException $e){
            die("Connection failed: " . $e->getMessage());
        }
    }
}