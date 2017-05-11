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
        <?php include_once '../assets/includes/connectDatabase.php'; ?>
        <div class="editVocabulary">
            <div class="placeholder"></div>
            <h1>Vocabulary Sets</h1>
            <h3>Rename Set</h3>
            <form method="post" action="editvocabulary.php" accept-charset="utf-8" class="col-sm-12">
                <input type="text" class="col-sm-12" name="renamed" placeholder="Rename to" />
                <div class="col-sm-12"></div>
                <input type="submit" value="Rename" name="rename" class="newWords col-sm-12"/>
            </form>
            <?php
            /*Führt Code aus nachdem der Erfassen-Button betätigt wurde.*/
            if(!empty($_POST["rename"])){
                if($_POST['renamed'] != ""){
                    $renamed = $_POST['renamed'];
                    renameSet($renamed);
                }
            }
            ?>
            <br><br>
            <h3>Add new Words</h3>
            <form method="post" action="editvocabulary.php" accept-charset="utf-8">
                <p class="col-sm-3">Word One:</p>
                <input type="text" class="col-sm-9" name="wordOne" placeholder="Example: das Licht" />
                <div class="col-sm-12"></div>
                <p class="col-sm-3">Word Two:</p>
                <input type="text" class="col-sm-9" name="wordTwo" placeholder="Example: light" /><br>
                <div class="col-sm-12"></div>
                <div class="col-sm-3"></div>
                <input type="submit" class="col-sm-9" value=" Ok " name="newWords" class="newWords"/>
            </form>
            <?php
            /*Führt Code aus nachdem der Erfassen-Button betätigt wurde.*/
            if(!empty($_POST["newWords"])){
                if($_POST['wordOne'] != "" and $_POST['wordTwo'] != "" ){
                    insertIntoDB($_POST['wordOne'], $_POST['wordTwo'] );
                }
            }
            ?>
            <br><br><br><br>
            <h3>Delete Words</h3>
            <form method="post" action="editvocabulary.php">
                <?php
                /*Führt Code aus nachdem der Delete-Button betätigt wurde.*/
                if(isset($_POST['delete'])) {
                    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
                    $delete = "delete from words where wordID = ?";
                    deleteFromDB($connection, $delete);
                }
                $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
                $sql = "select * from words WHERE wordID IN (SELECT wordFK from word_set where setFK like (select setID from sets where setName like '". $_SESSION['set'] ."'))";
                createDropdown($connection, $sql);
                if (!empty($_GET['set'])){
                    $_SESSION['set'] = $_GET['set'];
                } elseif (!empty($_SESSION['set'])){

                } else {
                    header("Refresh:0");
                }
                ?>
                <button type="submit" name="delete" class="col-sm-12">Delete</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>