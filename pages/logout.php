<?php
	session_start();
	session_destroy(); // Destroying All Sessions
    header("Refresh: 3; Location: ../index.php"); // Redirecting To Home Page
?>