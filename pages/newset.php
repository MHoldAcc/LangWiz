<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 26.03.2017
 * Time: 17:53
 */
 ?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../assets/css/default.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="page dashboard">
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
        <div class="container">
            <div class="placeholder"></div>
                <div class="vocab col-sm-11">
                    <h5>New Set</h5>
                    <div class="symbols" style="float:right;">
                        <img src="../assets/img/Edit.png"></a>
                    <img src="../assets/img/Play.png"></a></div>
                </div>

            <br><br><br><br>
            <form method="post" action="../assets/includes/connectDatabase.php" accept-charset="utf-8">
                Set name:
                <input type="text" name="setName" placeholder="Example Set"/><br>
                Language One:
                <input type="text" name="languageOne" placeholder="Example: german"/><br>
                Language Two:
                <input type="text" name="languageTwo" placeholder="Example: english"/><br>
                <input type="submit" value=" Ok " name="newSet" class="newLanguages"/>
            </form>

        </div>
    </div>
</body>
</html>