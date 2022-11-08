<?php
    @session_start();
    //Redirects to index if user is not set
    if(!isset($_SESSION['login_user']) and !strpos($_SERVER['REQUEST_URI'], 'ndex.php')){header("location: ../Index.php"); }

    function printLoginFailure(){
        if(@$_SESSION['login_failure'] == 'true'){
            echo '<a class="failure">Failed to login      </a>';
            $_SESSION['login_failure'] = 'false';
        }
    }

    function printVocabSets(){
        $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
        /*$query1 = mysqli_query($connection, "SELECT setID FROM sets WHERE userFK like (select userID from `user` where mail = '".$_SESSION['login_user']."' )");
        $result1 = mysqli_num_rows($query1);*/

         $query2 = mysqli_query($connection, "SELECT setName FROM sets WHERE userFK like (select userID from `user` where mail like '".$_SESSION['login_user']."' )");
            //print_r($query2);
         $result2 = mysqli_fetch_all($query2);
         $i = 1;
         foreach ($result2 as $res) {
             $result = $res[0];
             echo '<div class="vocab col-sm-11">';
             echo '<p style="float:left;">' . $i . '.    ' . $result . '</p>';
             echo '<div class="symbols" style="float:right;">';
             echo '<a class="edit" title="Edit" href="editvocabulary.php?set=' . $result . '">';
             echo '<img src="../assets/img/Edit.png"></a>';
                echo '<a class="learn" title="Learn" href="learn.php?set=' . $result . '">';
                echo '<img src="../assets/img/Play.png"></a></div></div>';
                $i = $i + 1;
         }
            //$cookie_name = "set".$i;
            //$cookie_value = $result;
            //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
?>