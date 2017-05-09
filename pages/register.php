<?php
//include("registration.php")
?>
<!DOCTYPE html>
<html>
<head>
    <title>LangWiz Login</title>
    <?php include '../assets/includes/headReferences.php';  ?>
</head>
<body class="loginPage register">
<div class="centeredForm">
    <img src="../assets/img/Logo.png">
    <form method="post" action="registration.php" accept-charset="utf-8">
        <input type="text" name="name" placeholder="Username"/>
        <input type="email" name="mail" placeholder="E-Mail"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="password" name="reEnterPassword" placeholder="Re-enter password"/>
        <input type="submit" value="Register" name="register" class="login"/>
    </form>
    <a href="../index.php">Login</a>
</div>
</body>
</html>