<?php
    @session_start();
    //Redirects to index if user is not set
    if(!isset($_SESSION['login_user']) and !strpos($_SERVER['REQUEST_URI'], 'ndex.php')){header("location: ../Index.php"); }

    function printLoginFailure(){
        if(@$_SESSION['login_failure'] == 'true'){
            echo '<a class="failure">Failed to login      </a>';
            $_SESSION['login_failure'] = 'false';
        }
    }
?>