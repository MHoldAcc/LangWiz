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
    <?php include '../assets/includes/headReferences.php';  ?>
</head>
<body class="page dashboard">
<?php include '../assets/includes/menuLeft.php'; ?>
<div class="content col-sm-11">
    <div class="container">
        <div class="placeholder"></div>
        <body class="page dashboard">
        <?php
        include_once '../assets/includes/connectDatabase.php';

        //Definition der Variable $conn
        //$conn = mysqli_connect("localhost", "nypadmin", "!30nyp48", "langwizz");
        //mysqli_query($conn, "SET NAMES 'utf8'");

        //if (!$conn) {
        //    die("FEHLER, keine Verbindung zur Datenbank m&ouml;glich: " . mysqli_connect_error());
        //}
        ?>
        <div class="editVocabulary">
            <div class="placeholder"></div>
            <h1>Vocabulary Sets</h1>
            <h3>Add new Words</h3>
            <form method="post" action="editvocabulary.php" accept-charset="utf-8">
                <input type="text" class="form-control" name="wordOne" placeholder="Example: das Licht" /><br>
                Word Two:
                <input type="text" class="form-control" name="wordTwo" placeholder="Example: light" /><br>
                <input type="submit" value=" Ok " name="newWords" class="newWords"/>
            </form>
            <?php
            /*Führt Code aus nachdem der Erfassen-Button betätigt wurde.*/
            if(!empty($_POST["newWords"])){
                if($_POST['wordOne'] != "" and $_POST['wordTwo'] != "" ){
                    insertIntoDB($_POST['wordOne'], $_POST['wordTwo'] );
                }
            }
            ?>
            <br><br>
            <h3>Delete Words</h3>
            <form method="post" action="editvocabulary.php">
                <br>
                <button type="submit" name="delete">Delete</button>
                <?php
                /*Führt Code aus nachdem der Delete-Button betätigt wurde.*/
                if(isset($_POST['delete'])) {
                    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
                    $delete = "delete from words where wordID = ?";
                    deleteFromDB($connection, $delete);
                }
                $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
                $sql = "select * from words ";
                createDropdown($connection, $sql);
                ?>
            </form>
        </div>
    </div>
</div>
</body>
</html>