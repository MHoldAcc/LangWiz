<?php
include_once("registerJS.php")
?>
<!DOCTYPE html>
<html>
<head>
    <title>LangWiz Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../assets/css/default.css">
	
	<!-- Include JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--	<script type="text/javascript" src="../assets/js/registrationJS.js"></script>-->
	
</head>

<body class="loginPage register">
<div class="centeredForm">
    <img src="../assets/img/placeholder.png">
    <form method="post" action="../index.php" accept-charset="utf-8">
        <input type="email" name="mail" placeholder="E-Mail"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="password" name="reEnterPassword" placeholder="Re-enter password"/>
        <input type="submit" value="Register" name="register" class="login"/>
    </form>
    <a href="../index.php">Login</a>
</div>
</body>
</html>