<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 26.03.2017
 * Time: 17:53
 */
session_start();
$_SESSION['refresh'] = false;
?>

<!DOCTYPE html>
<html xmlns:height="http://www.w3.org/1999/xhtml">
<head>
    <title>Learning</title>
    <?php include '../assets/includes/headReferences.php';  ?>
</head>

<body class="page learn">
<?php
include '../assets/includes/menuLeft.php';
?>


<div class="content col-sm-11">
    <div style="min-height:20px"></div>
    <div>
        <table style="margin-right:auto; margin-left: auto">
            <tr>
                <td class="language">
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
                    $language1 = mysqli_query($connection, "select language1 from `sets` where setName like '".$_SESSION['set']."'");
                    $language1 = mysqli_fetch_all($language1);
                    foreach ($language1 as $lang) {
                        $language = $lang[0];
                        echo '<a href="learn.php?language=' . $language . '" title="' . $language . '" >'.$language.'</a>';
                        $_SESSION['language'] = $language;
                    }
                    mysqli_close($connection);
                    ?>
                </td>
                <td style="width: 10vw"></td>
                <td class="language">
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
                    $language2 = mysqli_query($connection, "select language2 from `sets` where setName like '".$_SESSION['set']."'");
                    $language2 = mysqli_fetch_all($language2);
                    foreach ($language2 as $lang) {
                        $language = $lang[0];
                        echo '<a href="learn.php?language=' . $language . '" title="' . $language . '">'.$language.'</a>';
                        $_SESSION['language2'] = $language;
                    }
                    mysqli_close($connection);
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="col-sm-12" style="min-height:20px"></div>
<div class="col-sm-1"></div>

<?php
include 'allwords.php';

$arrayOne = getArray1();
$arrayTwo = getArray2();

$result = count($arrayOne);

if (isset($_SESSION['i'])) {
    $counter = $_SESSION['i'];
    $counter = (int)$counter;
}

if (!empty($result)) {

    $temp3 = $_SESSION['i'];
    $temp3 = (int)$temp3;

    $counter++;
    $_SESSION['i'] = $counter;

    if($temp3+1 == $result) {
        $_SESSION['i'] = 0;
    }
    $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
    $language1 = mysqli_query($connection, "select language1 from `sets` where setName like '".$_SESSION['set']."'");
    $language1 = mysqli_fetch_all($language1);
    $language2 = mysqli_query($connection, "select language2 from `sets` where setName like '".$_SESSION['set']."'");
    $language2 = mysqli_fetch_all($language2);
    $i = $_SESSION["i"]; $temp  = $arrayOne[$i]; //print_r($temp['word1']);
    $i = $_SESSION["i"]; $temp2 = $arrayTwo[$i]; //print_r($temp2['word2']);
    $i = $_SESSION["i"]; $temp3 = $arrayOne[$i]; //print_r($temp3['word1']);
    $i = $_SESSION["i"]; $temp4 = $arrayTwo[$i]; //print_r($temp4['word2']);
    if ($_GET['language'] = implode($language1)){
        echo '<h1 class="col-sm-10 wordbox" onclick="'.replaceword(print_r($temp['word1']) , print_r($temp2['word2']) , print_r($temp3['word1'])).'</h1>';
    } elseif ($_GET['language'] == $language2){
        echo '<h1 class="col-sm-10 wordbox" onclick="'.replaceword2(print_r($temp2['word2']) , print_r($temp['word1']) , print_r($temp4['word2'])).'</h1>';
    } else {
        if ($_SESSION['refresh'] = false){
            header("Refresh:0; Location learn.php?" . $_SESSION['language']."");
            $_SESSION['refresh'] = TRUE;
        }
    }
    mysqli_close($connection);
}
?>
<!--<h1 class="col-sm-10 wordbox" onclick="replaceword(this,'--//<php // $i = $_SESSION["i"]; $temp = $arrayOne[$i]; print_r($temp['word1']) ?>//','<php //$i = $_SESSION["i"]; $temp2 = $arrayTwo[$i]; print_r($temp2['word2']) ?>//');"><php //$i = $_SESSION["i"]; $temp = $arrayOne[$i]; print_r($temp['word1']) ?></h1>-->
<div class="col-sm-1"></div>
<div class="col-sm-12 min-height-20"></div>

<div class="col-sm-2"></div>
<div class="col-sm-8">

    <div>
        <div class="col-sm-3"></div>
        <a href="learn.php?result=true" title="Correct" >
            <img class="col-sm-3 correct" src="../assets/img/Correct.png" name="add" value="add"/></a>

    </div>
    <div class="col-sm-1"></div>
    <div>
        <a href="learn.php?result=false" title="Wrong">
            <img class="col-sm-3 wrong" src="../assets/img/Wrong.png"/></a>
    </div>
</div>

<script>
    /*function replaceword(that, word, oword) {
     that.textContent = that.textContent == oword ? word : oword;
     }
     */
    function refresh(){

    }
</script>
</div>
</body>
</html>