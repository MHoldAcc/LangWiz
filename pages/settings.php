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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="page dashboard">
<?php
include '../assets/includes/menuLeft.php';
?>
<div class="content col-sm-11">
        <div class="container">
            <div class="placeholder"></div>
            <h1>Settings</h1>
            <div class="chpw">

                <h3>Change Password</h3>
                <form method="post" action="newpass.php" accept-charset="utf-8">
                    <div class="col-sm-3">
                        Old password:<br/>
                        New password:<br/>
                        Re-enter new password: <br/>
                    </div>
                    <div >
                        <input type="password" name="oldpw" placeholder="Old password" class="col-sm-5"/><br>
                        <input type="password" name="newpw" placeholder="New password" class="col-sm-5"/><br>
                        <input type="password" name="renewpw" placeholder="Re-enter new password" class="col-sm-5"/><br>
                    </div>
                    <br/>
                    <div class="col-sm-3"></div>
                    <input type="submit" value="Enter" name="submit" class="changepw col-sm-5"/>
                </form>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</body>
</html>