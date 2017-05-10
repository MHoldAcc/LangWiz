<?php
    @session_start();
    //Redirects to index if user is not set
    if(!isset($_SESSION['login_user'])){header("location: ../Index.php"); }
?>