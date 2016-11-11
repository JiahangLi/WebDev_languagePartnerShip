<?php

    require_once("Dao.php");

    function redirectError($location, $errors, $preset = NULL){
        $_SESSION['errors'] = $errors;
        if($preset){
            $_SESSION['preset'] = $preset;
        }
        header("Location: $location");
    }

    function redirctSuccess($location, $username = NULL){
        if($username){
            $_SESSION['user'] = $username;
        }
        header("Location: $location");
    }
?>