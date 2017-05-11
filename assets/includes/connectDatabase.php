<?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 07.05.2017
 * Time: 15:03
 */

@session_start();

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
        $text = "insert into sets (userFK, setName, languange1, language2) values ((select userID from user where mail = '". $_SESSION['login_user'] . "'), '".$setName."', '".$languageOne."', '".$languageTwo."')";

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

function renameSet ($renamed){
    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
    $query = mysqli_query($connection, "UPDATE `sets` set `setName`='" . $renamed . "' where  setName like '" . $_SESSION['set'] . "'");
    if ($query) {
        echo "Set has been renamed";
        header("location: dashboard.php");
    } else {
        echo "ups";
    }
    mysqli_close($connection);
}

function insertIntoDB($wordOne, $wordTwo){
    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
    $query = mysqli_query($connection, "insert into `words`(word1, word2) values ('" . $wordOne . "', '" . $wordTwo . "')");
    if ($query) {
        $query2 = mysqli_query($connection, "insert into `word_set` (setFK, wordFK) VALUES ((select setID from sets WHERE setName like '" . $_SESSION['set'] . "'),(select wordID from words WHERE word1 like '" . $wordOne . "' and word2 like '" . $wordTwo . "'))");
        if ($query2) {
            echo "Words Successfully added.....";
            header("location: editvocabulary.php");
        } else {
            echo "Error..5..!!";
            mysqli_query($connection, "delete from words where wordID like (select wordID from words WHERE word1 like '" . $wordOne . "' and word2 like '" . $wordTwo . "')");
            header("location: editvocabulary.php");
        }
    } else {
        echo "Error....!!";
        mysqli_query($connection, "delete from words where wordID like (select wordID from words WHERE word1 like '" . $wordOne . "' and word2 like '" . $wordTwo . "')");
        header("location: editvocabulary.php");
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