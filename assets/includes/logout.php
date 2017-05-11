<?php
	session_start();
	session_destroy(); // Destroying All Sessions
    echo "You are being logged out.";
    header("Refresh: 0; URL=../index.php"); // Redirecting To Home Page
?>