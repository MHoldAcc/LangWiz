<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 26.03.2017
 * Time: 17:53
 */
@session_start();
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
    <div class="col-sm-12" style="min-height:20px"></div>
    <div class="col-sm-1"></div>

    <?php

        include_once '../assets/includes/allwords.php';
        $counter = 0;
        $arrayOne = getArray1();
        $arrayTwo = getArray2();

        $result = count($arrayOne);

        if (isset($_SESSION["i"])) {
            $counter = $_SESSION["i"];
            $counter = (int)$counter;
        }

        if (!empty($result)) {

            $temp3 = @$_SESSION["i"];
            $temp3 = (int)$temp3;
            //$temp3++;
            $counter++;
            $_SESSION["i"] = $counter;

            if($temp3+1 == $result) {
                $_SESSION["i"] = 0;
            }
        }
    ?>

    <h1 class="col-sm-10 wordbox" onclick="replaceword(this,'<?php  $i = $_SESSION["i"]; $temp = $arrayOne[$i]; print_r($temp['word1']) ?>','<?php $i = $_SESSION["i"]; $temp2 = $arrayTwo[$i]; print_r($temp2['word2']) ?>');"><?php $i = $_SESSION["i"]; $temp = $arrayOne[$i]; print_r($temp['word1']) ?></h1>

    <div class="col-sm-1"></div>
    <div class="col-sm-12 min-height-20"></div>

    <div class="col-sm-2"></div>
    <div class="col-sm-8">

        <div>
            <div class="col-sm-3"></div>
            <a href="learn.php?result=true" title="Correct" >
                <img class="col-sm-3 correct" src="../assets/img/Correct.png" name="add" value="add"/></a>
            </a>

        </div>
        <div class="col-sm-1"></div>
        <div>
                <img class="col-sm-3 wrong" src="../assets/img/Wrong.png"/></a>
        </div>
    </div>

    <script>
        function replaceword(that, word, oword) {
            that.textContent = that.textContent == oword ? word : oword;
        }

        function refresh(){

        }
    </script>
</div>
</body>
</html>