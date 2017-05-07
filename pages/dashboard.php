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
</head>

<body class="page dashboard">
    <div class="menu">
        <div class="buttons">
            <a href="dashboard.php" class="dashboard" title="Dashboard">
                <img src="../assets/img/placeholder.png"/>
            </a>
            <a href="settings.php" class="settings" title="Settings">
                <img src="../assets/img/placeholder.png"/>
            </a>
            <a href="logout.php" class="logout" title="Logout">
                <img src="../assets/img/placeholder.png"/>
            </a>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="placeholder"></div>
            <div class="vocab">
                <p style="float:left;">Vocabulary Set 1</p>
                <div class="symbols" style="float:right;">
                    <a class="edit" title="Edit" href="edit?set=41">
                        <img src="../assets/img/placeholder.png"></a>
                    <a class="learn" title="Learn" href="learn?set=41">
                        <img src="../assets/img/placeholder.png">
                    </a>
                </div>
            </div>
            <div class="vocab">
                <p style="float:left;">Vocabulary Set 2</p>
                <div class="symbols" style="float:right;">
                    <a class="edit" title="Edit" href="edit?set=42">
                        <img src="../assets/img/placeholder.png"></a>
                    <a class="learn" title="Learn" href="learn?set=42">
                        <img src="../assets/img/placeholder.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>