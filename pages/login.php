<?php
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit'])) {
		if (empty($_POST['mail']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
		} else {
			// Define $username and $password
			$username=$_POST['mail'];
			$password=$_POST['password'];
			// Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
			$connection = mysqli_connect("localhost", "root", "", "langwizz");
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($connection, $username);
			$password = mysqli_real_escape_string($connection, $password);
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($connection, "select * from user where pw like'$password' AND mail like'$username'");
			$rows = mysqli_num_rows($query);
				if ($rows == 1) {
					$_SESSION['login_user']=$username; // Initializing Session
					header("location: dashboard.php"); // Redirecting To Other Page
				} else {
					$error = "Username or Password is invalid";
					echo $error;
					header("location: ../index.php");
				}
			mysqli_close($connection); // Closing Connection
		}
	}
?>