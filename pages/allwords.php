<?php
/**
 * Created by PhpStorm.
 * User: Laura
 * Date: 08.05.2017
 * Time: 20:41
 */

$connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..

$query = "SELECT word1 FROM words";
$result = mysqli_query($connection, $query) or die ("no query");

$result_array = array();
while($row = mysqli_fetch_assoc($result)) {
    $result_array[] = $row;
}

$a = $result_array;
print_r($a);


$query2 = "SELECT word2 FROM words";
$result2 = mysqli_query($connection, $query2) or die ("no query");

$result_array2 = array();
while($row2 = mysqli_fetch_assoc($result2)) {
    $result_array2[] = $row2;
}

$a2 = $result_array2;
print_r($a2);