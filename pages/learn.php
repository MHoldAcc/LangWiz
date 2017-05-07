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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script
</head>

<body class="page learn">
<div class="menu col-sm-1">
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
<div class="content col-sm-11">
    <div class="col-sm-12" style="min-height:20px"></div>
    <div class="col-sm-1"></div>

    <h1 class="col-sm-10" style="background-color: gray; color:white; font-size: 45px; height: 50vh; text-align: center; line-height: 50vh; border-radius: 25px;" onclick="replaceword(this,'Kuchen','Cake');">Kuchen</h1>

    <div class="col-sm-1"></div>
    <div class="col-sm-12" style="min-height:20px"></div>

    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div>
            <div class="col-sm-3"></div>
            <a href="learn.php?result=true" title="Correct">
                <img class="col-sm-3" src="../assets/img/Correct.png" style="background-color:green; border-radius: 25px;"/>
            </a>

        </div>
        <div class="col-sm-1"></div>
        <div>
            <a href="learn.php?result=false" title="Wrong">
                <img class="col-sm-3" src="../assets/img/Wrong.png" style="background-color:red; border-radius: 25px;"/></a>
        </div>
    </div>

    <script>
        function replaceword(that, word, oword) {
            that.textContent = that.textContent == oword ? word : oword;
        }
    </script>
</div>
</body>
</html>