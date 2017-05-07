<?php
	session_start();
	session_destroy(); // Destroying All Sessions
    echo "You are being loged out.";
    header("Refresh: 3; URL=../index.php"); // Redirecting To Home Page
?>