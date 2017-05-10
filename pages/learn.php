<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 26.03.2017
 * Time: 17:53
 */
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
        include  'C:\xampp\htdocs\LangWiz\pages\allwords.php';

        $arrayOne = getArray1();
        $arrayTwo = getArray2();

        $result = count($arrayOne);

        if (isset($_SESSION['i'])) {
            $counter = $_SESSION['i'];
            $counter = (int)$counter;
        }

        if (isset($_GET['result'])==TRUE) {

            $temp3 = $_SESSION['i'];
            $temp3 = (int)$temp3;

            $counter++;
            $_SESSION['i'] = $counter;

            if($temp3+1 == $result) {
                $_SESSION['i'] = 0;
            }
        }

    ?>

    <h1 class="col-sm-10" style="background-color: gray; color:white; font-size: 45px; height: 50vh; text-align: center; line-height: 50vh; border-radius: 25px;" onclick="replaceword(this,'<?php  $i = $_SESSION["i"]; $temp = $arrayOne[$i]; print_r($temp['word1']) ?>','<?php $i = $_SESSION["i"]; $temp2 = $arrayTwo[$i]; print_r($temp2['word2']) ?>');"><?php $i = $_SESSION["i"]; $temp = $arrayOne[$i]; print_r($temp['word1']) ?></h1>

    <div class="col-sm-1"></div>
    <div class="col-sm-12" style="min-height:20px"></div>

    <div class="col-sm-2"></div>
    <div class="col-sm-8">

        <div>
            <div class="col-sm-3"></div>
            <a href="learn.php?result=true" title="Correct" >
                <img class="col-sm-3" src="../assets/img/Correct.png" name="add" value="add" style="background-color:green; border-radius: 25px;"/></a>
            </a>

        </div>
        <div class="col-sm-1"></div>
        <div>
            <a href="learn.php?result=false" title="Wrong">
                <img class="col-sm-3" src="../assets/img/Wrong.png" style="background-color:red; border-radius: 25px;"/></a>
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