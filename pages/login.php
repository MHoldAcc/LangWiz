<?php
    session_start();
	if (!empty($_POST['submit'])) {
		if (empty($_POST['mail']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
		} else {
			// Define $username and $password
			$mail=$_POST['mail'];
			$password=sha1($_POST['password']);
			// Establishing Connection with Server by passing server_name, user_id, password and database as a parameter
			$connection = mysqli_connect("localhost", "root", "", "langwizz");
			// To protect MySQL injection for Security purpose
            $mail = stripslashes($mail);
			$password = stripslashes($password);
            //$mail = mysqli_real_escape_string($connection, $mail);
			$password = mysqli_real_escape_string($connection, $password);
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($connection, "select * from user where pw like '".$password."' AND mail like '".$mail."'");
			$rows = mysqli_num_rows($query);
				if ($rows == 1) {
				    $cookie_name = "mail";
				    $cookie_value = $mail;
				    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
					$_SESSION['login_user']=$mail; // Initializing Session
                    header("location: dashboard.php"); // Redirecting To Other Page
				} else {
					$error = "Username or Password is invalid";
					echo $error;
                    $_SESSION['login_failure'] = 'true';
					header("location: ../index.php");
				}
			mysqli_close($connection); // Closing Connection
		}
	}
?>