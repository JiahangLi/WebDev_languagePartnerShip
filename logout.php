<?php
// logout.php
    session_start();
    if(isset($_SESSION['loggedin'])){
         unset($_SESSION['loggedin']);
    }
    session_unset();
    session_destroy();
    header("Location:index.php");
?>