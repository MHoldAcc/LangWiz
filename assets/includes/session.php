<?php
session_start(); // Starting Session
// Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
$connection = mysqli_connect("localhost", "root", "", "langwizz");
// Storing Session
if(!empty($_SESSION['login_user'])) {
    $user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
    $ses_sql = mysqli_query("select mail from user where mail like'$user_check'", $connection);
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session = $row['mail'];
    if (empty($login_session)) {
        mysqli_close($connection); // Closing Connection
    }
}
?>