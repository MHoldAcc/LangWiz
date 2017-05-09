<?php
	include_once('pages/session.php'); // Includes Login Script

	if(!empty($_SESSION['login_user'])){
		header("location: pages/dashboard.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>LangWiz Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/default.css">
</head>

<body class="loginPage">
    <div class="centeredForm">
        <img src="assets/img/Logo.png">
        <form method="post" action="pages/login.php" accept-charset="utf-8">
            <input type="email" name="mail" placeholder="E-Mail"/>
            <input type="password" name="password" placeholder="Password"/>
            <input type="submit" value="Login" name="submit" class="login"/>
        </form>
        <a href="pages/register.php">Register</a>
    </div>
</body>
</html>