<?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 07.05.2017
 * Time: 15:03
 */

//Code zum ein set anlege
session_start();

/*Fuehrt Code aus nachdem der Erfassen-Button bet�tigt wurde.*/
if(!empty($_POST["newWords"])){
    if($_POST['wordOne'] != "" and $_POST['wordTwo'] != "" ){
        $wordOne = $_POST['wordOne'];
        $wordTwo = $_POST['wordTwo'];
        insertIntoDB($wordOne, $wordTwo);
    }
}

if(!empty($_POST["newSet"])){
    if($_POST['setName'] != "" and $_POST['languageOne'] != "" and $_POST['languageTwo'] != "" ){
        $setName = $_POST['setName'];
        $languageOne = $_POST['languageOne'];
        $languageTwo = $_POST['languageTwo'];

        $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
        $text = "insert into sets (userFK, setName, languange1, language2) values ((select userID from user where mail = '". $_COOKIE['mail'] . "'), '".$setName."', '".$languageOne."', '".$languageTwo."')";

        $query = mysqli_query($connection, $text);
        if ($query) {
            mysqli_close($connection);
            echo 'success';
            header("location: ../../pages/dashboard.php");
        }
        else
            echo 'An error occured...';
    }
}

/*Fuehrt Code aus nachdem der Delete-Button betaetigt wurde.*/
if(!empty($_POST['delete'])) {
    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
    $delete = "delete from words where wordID = ?";
    deleteFromDB($connection, $delete);
    $sql = "select * from words";
    //$sql = "select * from words ";
    createDropdown($connection, $sql);
}


function insertIntoDB($wordOne, $wordTwo) {
    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
    $query = mysqli_query($connection, "insert into `words`(word1, word2) values ('".$wordOne."', '".$wordTwo."')");
    if ($query) {
        $query2 = mysqli_query($connection, "insert into `word_set` (setFK, wordFK) VALUES ((select setID from sets WHERE setName like '".$_COOKIE['set1']."'),(select wordID from words WHERE word1 like '".$wordOne."' and word2 like '".$wordTwo."'))");
        if ($query2) {
            echo "Words Successfully added.....";
            header("location: ../../pages/dashboard.php");
        } else {
            echo "Error..5..!!";
            mysqli_query($connection, "delete from words where wordID like (select wordID from words WHERE word1 like '".$wordOne."' and word2 like '".$wordTwo."')");
            header("location: ../../pages/editvocabulary.php");
        }
    } else {
        echo "Error....!!";
        mysqli_query($connection, "delete from words where wordID like (select wordID from words WHERE word1 like '".$wordOne."' and word2 like '".$wordTwo."')");
        header("location: ../../pages/editvocabulary.php");
    }
    mysqli_close($connection);
}

/*
* Erstellt ein Dropdown indem es den Inhalt der Datenbank ausliest.
* Das Dropdown DeleteZS wird erstellt und erhält so viele Optionen wie es Datensätze in der DB hat.
* Dieser Funktion muss man keine Parameterwerte mitgeben.
*/
function createDropdown($connection, $sql)
{
    $result = mysqli_query($connection, $sql);
    echo '<select  class="form-control"  name= "deleteFromDB">';

    while ($row = $result->fetch_assoc()) {
        echo '<option value= "' . $row['wordID'] . '">' . "Word one: " . $row['word1'] . " -- Word two: " . $row['word2'] . '</option>';
    }
    echo '</select>';
}

/*
* Löscht den Eintrag in der Datenbank
* Parameterwerte sind die $conn Variable und die Value der delete-Tabelle.
* Diese Funktion hat keinen Returnwert.
*/
function deleteFromDB($connection, $delete)
{
    $sql = $connection->prepare($delete);
    $sql->bind_param("s", $_POST['deleteFromDB']);
    $sql->execute();
    $sql->close();
}