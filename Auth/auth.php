<?php

class Auth {
  
    public static function isLoggedIn(){
        return isset($_SESSION["is_logged_in"]) and $_SESSION["is_logged_in"];
    }

    public static function login(){
        if (!isset($_SESSION['is_logged_in'])) {
            header("Location: login.php");
        }
    }

}

