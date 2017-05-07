<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 26.03.2017
 * Time: 17:53
 */
?>

<!DOCTYPE html>
<html xmlns:height="http://www.w3.org/1999/xhtml">
<head>
    <title>Learning</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../assets/css/default.css">
</head>

<body class="page learn">
<div class="menu">
    <div class="buttons">
        <a href="dashboard.php" class="dashboard" title="Dashboard">
            <img src="../assets/img/Home.png"/>
        </a>
        <a href="settings.php" class="settings" title="Settings">
            <img src="../assets/img/Settings.png"/>
        </a>
        <a href="logout.php" class="logout" title="Logout">
            <img src="../assets/img/Logout.png"/>
        </a>
    </div>
</div>
<div class="content">
    <div style="height:80vh;text-align: center; line-height: 80vh; background-color: white;" onclick="replaceword(this,'Kuchen','Cake');">Kuchen</div>
    <script>
        function replaceword(that, word, oword) {
            that.textContent = that.textContent == oword ? word : oword;
        }
    </script>
    <div style="background-color: aquamarine">
        <a href="learn.php?result=true" title="Correct" >
            <img  src="../assets/img/Correct.png" style="height:60px" /></a>
        <a href="learn.php?result=false" title="Wrong">
            <img src="../assets/img/Wrong.png" style="height:60px"/></a>
    </div>
</div>
</body>
</html>