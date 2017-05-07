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
    <title>Settings</title>
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
            <div class="vocab">
                <h2>Settings</h2>
                <div class="symbols">
                    <a class="edit" title="Edit">
                        <img src="../assets/img/placeholder.png">
                    </a>
                    <a class="learn" title="Learn">
                        <img src="../assets/img/placeholder.png">
                    </a>
                </div>

                <div class="chpw">
                    <br><br>
                    <h3>Chance Password</h3>
                    <form method="post" action="#" accept-charset="utf-8">
                        Old password:
                        <input type="password" name="oldpw" placeholder="Old password"/><br>
                        New password:
                        <input type="password" name="newpw" placeholder="New password"/><br>
                        Re-enter new password:
                        <input type="password" name="renewpw" placeholder="Re-enter new password"/><br>
                        <input type="submit" value="Enter" name="submit" class="chancepw"/>
                    </form>
                </div>

            </div>
        </div>
    </div>


</body>
</html>