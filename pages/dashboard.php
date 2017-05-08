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
<?php
include '../assets/includes/menuLeft.php';
?>
<div class="content col-sm-11">
        <div class="container">
            <div class="placeholder"></div>
                <?php
                $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
                $query1 = mysqli_query($connection, "SELECT setID FROM sets WHERE userFK like (select userID from `user` where mail like '".$_COOKIE['mail']."' )");
                $result1 = mysqli_num_rows($query1);
                for ($i = 1; $i <= $result1;$i++) {
                    $query2 = mysqli_query($connection, "SELECT setName FROM sets WHERE userFK like (select userID from `user` where mail like '".$_COOKIE['mail']."' )");
                    $result2 = mysqli_fetch_row($query2);
                    foreach ($result2 as $result) {
                        echo '<div class="vocab col-sm-11">';
                        echo '<p style="float:left;">' . $i . '.    ' . $result . '</p>';
                        echo '<div class="symbols" style="float:right;">';
                        echo '<a class="edit" title="Edit" href="editvocabulary.php?set=' . $result . '">';
                        echo '<img src="../assets/img/Edit.png"></a>';
                        echo '<a class="learn" title="Learn" href="learn.php?set=' . $result . '">';
                        echo '<img src="../assets/img/Play.png"></a></div></div>';
                    }
                }
                ?>
        </div>
    </div>
</body>
</html>