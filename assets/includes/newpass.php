<?php
/**
 * Created by PhpStorm.
 * User: Drake
 * Date: 07.05.2017
 * Time: 15:14
 */
if (!empty($_POST["submit"])) {
    if (!empty($_POST["oldpw"]) && !empty($_POST["newpw"] && !empty($_POST["renewpw"]))) {
        $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
        $oldpw = sha1($_POST['oldpw']); // Password Encryption, If you like you can also leave sha1.
        $newpw = sha1($_POST['newpw']); // Password Encryption, If you like you can also leave sha1.
        $oldpw = mysqli_real_escape_string($connection, $oldpw); // Password Encryption, If you like you can also leave sha1.
        $newpw = mysqli_real_escape_string($connection, $newpw); // Password Encryption, If you like you can also leave sha1.
        $result = mysqli_query($connection, "SELECT * FROM user WHERE pw like'" . $oldpw . "'");
        $data = mysqli_num_rows($result);
        if ($data == 1) {
            $query = mysqli_query($connection, "UPDATE `user` set `pw`='" . $newpw . "' where  pw like '" . $oldpw . "'"); // Insert query
            if ($query) {
                echo "You have Successfully changed your password";
                header('Location: ../../pages/dashboard.php'); // Redirecting To Home Page
            }
        }
        mysqli_close($connection);
        header('Location: ../../pages/settings.php');
    }
}
?>
