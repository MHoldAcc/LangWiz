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
    <title>Edit Voci</title>
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
        <body class="page dashboard">
        <?php
        //include '../includes/connectDatabase.php';

        //Definition der Variable $conn
        //$conn = mysqli_connect("localhost", "nypadmin", "!30nyp48", "langwizz");
        //mysqli_query($conn, "SET NAMES 'utf8'");

        //if (!$conn) {
        //    die("FEHLER, keine Verbindung zur Datenbank m&ouml;glich: " . mysqli_connect_error());
        //}
        ?>
        <div class="editVocabulary">
            <br><br>
            <h3>Add a new Set</h3>
            <!--<form method="post" action="editvocabulary.php" accept-charset="utf-8">-->
            <form method="post" action="../assets/includes/connectDatabase.php" accept-charset="utf-8">
                Set name:
                <input type="text" name="setName" placeholder="Set 1"/><br>
                Language One:
                <input type="text" name="languageOne" placeholder="Example: Deutsch"/><br>
                Language Two:
                <input type="text" name="languageTwo" placeholder="Example: Englisch"/><br>
                <input type="submit" value=" Ok " name="newSet" class="newLanguages"/>
            </form>
            <br><br>
            <h3>Add new Words</h3>
            <!--<form method="post" action="editvocabulary.php" accept-charset="utf-8">-->
            <form method="post" action="../assets/includes/connectDatabase.php" accept-charset="utf-8">
                Word One:
                <input type="text" class="form-control" name="wordOne" placeholder="Example: das Licht" /><br>
                Word Two:
                <input type="text" class="form-control" name="wordTwo" placeholder="Example: light" /><br>
                <input type="submit" value=" Ok " name="newWords" class="newWords"/>
            </form>
            <?php
            /* $error= "";
            /*Führt Code aus nachdem der Erfassen-Button betätigt wurde.*
            if(!empty($_POST["newWords"]))
            {
            if($_POST['wordOne'] != "" and $_POST['wordTwo'] != "" )
            {
            insertIntoDB($_POST['wordOne'], $_POST['wordTwo'] );
            }
            }*/
            ?>
            <br><br>
            <h3>Delete Words</h3>
            <!--<form method="post" action="editvocabulary.php">-->
            <form action="../assets/includes/connectDatabase.php" method="post">
                <?php
                /*$sql = "select * from words";
                $result = mysqli_query($conn, $sql);

                /*Führt Code aus nachdem der Delete-Button betätigt wurde.*
                if(!empty($_POST['delete'])) {
                  $delete = "delete from words where wordID = ?";
                  deleteFromDB($conn, $delete);
                }
                $sql = "select * from words ";
                createDropdown($conn, $sql);*/
                ?>
                <br>
                <button type="submit" name="delete">Delete</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>