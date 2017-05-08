<?php
/**
* Created by PhpStorm.
* User: Laura
* Date: 07.05.2017
* Time: 15:03
*/

//Code zum ein set anlege


/*Führt Code aus nachdem der Erfassen-Button bet�tigt wurde.*/
if(!empty($_POST["newWords"])){
  if($_POST['wordOne'] != "" and $_POST['wordTwo'] != "" ){
    insertIntoDB($_POST['wordOne'], $_POST['wordTwo'] );
  }
}

/*F�hrt Code aus nachdem der Delete-Button bet�tigt wurde.*/
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
  $query = mysqli_query($connection, "insert into words( word1, word2) values ('".$wordOne."', '".$wordTwo."')");
  if ($query) {
    echo "Words Successfully added.....";
  } else {
    echo "Error....!!";
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