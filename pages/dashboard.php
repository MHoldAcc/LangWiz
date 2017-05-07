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
        <div class="container">
            <div class="placeholder"></div>
            <div class="vocab">
                <?php
                $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
                $query1 = mysqli_query($connection, "SELECT setID FROM sets WHERE userFK like (select userID from `user` where mail like '".$_COOKIE['mail']."' )");
                $result1 = mysqli_num_rows($query1);
                for ($i = 1; $i <= $result1;$i++) {
                    $query2 = mysqli_query($connection, "SELECT setName FROM sets WHERE userFK like (select userID from `user` where mail like '".$_COOKIE['mail']."' )");
                    $result2 = mysqli_fetch_row($query2);
                    foreach ($result2 as $result) {
                        echo '<p style="float:left;">' . $i . '.    ' . $result . '</p>';
                    }
                }
                ?>
                --><div class="symbols" style="float:right;">
                    <a class="edit" title="Edit" href="edit?set=41">
                        <img src="../assets/img/Edit.png"></a>
                    <a class="learn" title="Learn" href="learn.php?set=41">
                        <img src="../assets/img/Play.png">
                    </a>
                </div>
            </div>
            <div class="vocab">
                <p style="float:left;">Vocabulary Set 2</p>
                <div class="symbols" style="float:right;">
                    <a class="edit" title="Edit" href="edit?set=42">
                        <img src="../assets/img/Edit.png"></a>
                    <a class="learn" title="Learn" href="learn.php?set=42">
                        <img src="../assets/img/Play.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>