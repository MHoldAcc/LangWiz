<?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 08.05.2017
 * Time: 20:41
 */
@session_start();
$_SESSION['set'] = (isset($_GET['set']) ? $_GET['set'] : $_SESSION['set']);

function getArray1() {
    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..

    $query = "SELECT word1 FROM words WHERE wordID in (
    SELECT wordFK from word_set where setFK like (
        select setID from sets where setName like '".$_SESSION['set']."'))";
    $result = mysqli_query($connection, $query) or die ("no query");

    $result_array = array();
    while($row = mysqli_fetch_assoc($result)) {
        $result_array[] = $row;
    }

    $a = $result_array;

    //print_r($a);
    return $a;
}

function getArray2 () {
    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..

    $query2 = "SELECT word2 FROM words  WHERE wordID IN (
    SELECT wordFK from word_set where setFK like (
        select setID from sets where setName like '".$_SESSION['set']."'))";
    $result2 = mysqli_query($connection, $query2) or die ("no query");

    $result_array2 = array();
    while($row2 = mysqli_fetch_assoc($result2)) {
        $result_array2[] = $row2;
    }

    $a2 = $result_array2;

    //print_r($a2);
    return $a2;
}

function nextWord1($i, $arrayOne) {
    return $arrayOne[$i];
}

function nextWord2($i, $arrayTwo) {
    return $arrayTwo[$i];
}