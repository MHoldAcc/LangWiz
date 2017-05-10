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
    <title>Add vocabulary set</title>
    <?php include '../assets/includes/headReferences.php';  ?>
</head>

<body class="page dashboard">
<?php include '../assets/includes/menuLeft.php'; ?>
<div class="content col-sm-11">
        <div class="container">
            <div class="placeholder"></div>
            <h1>New Vocabulary Set</h1>
            <h3>Create new set</h3>
            <form method="post" action="../assets/includes/connectDatabase.php" accept-charset="utf-8">
                <div class="col-sm-3">
                    Set name:<br/>
                    Language One:<br/>
                    Language Two:
                </div>
                <div>
                    <input type="text" name="setName" placeholder="Example Set" class="col-sm-5"/><br>
                    <input type="text" name="languageOne" placeholder="Example: german" class="col-sm-5"/><br>
                    <input type="text" name="languageTwo" placeholder="Example: english" class="col-sm-5"/><br>
                </div>
                <br>
                <div class="col-sm-3"></div>
                <input type="submit" value=" Ok " name="newSet" class="newLanguages col-sm-5"/>
            </form>
            <br>
            <br>
            <br>
        </div>
    </div>
</body>
</html>