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
    <title>Dashboard</title>
    <?php include '../assets/includes/headReferences.php';  ?>
</head>

<body class="page dashboard">
<?php
include '../assets/includes/menuLeft.php';
?>
<div class="content col-sm-11">
        <div class="container">
            <div class="placeholder"></div>
            <h1>Vocabulary Sets</h1>
            <div class="placeholder"></div>
                <?php printVocabSets(); ?>
        </div>
    </div>
</body>
</html>