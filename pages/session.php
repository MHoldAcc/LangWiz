<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "Passw0rd", "langwizz");
// Selecting Database
//$db = mysql_select_db("langwizz", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query("select mail from user where mail like'$user_check'", $connection);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['mail'];
if(!isset($login_session)){
	mysqli_close($connection); // Closing Connection
//	header('Location: ../index.php'); // Redirecting To Home Page
}
?>