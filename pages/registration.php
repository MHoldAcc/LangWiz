<?php
if(!empty($_POST["register"])){
    if(!empty($_POST["mail"]) && !empty($_POST["password"] && !empty($_POST["name"]))) {
        $connection = mysqli_connect("localhost", "root", "", "langwizz"); // Establishing connection with server..
        $name = $_POST['name'];
        $email = $_POST['mail'];
        $password = sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
        // Check if e-mail address syntax is valid or not
        $email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid Email.......";
        } else {
            $result = mysqli_query($connection, "SELECT * FROM user WHERE mail like'".$email."'");
            $data = mysqli_num_rows($result);
            if ($data < 0) {
                $query = mysqli_query($connection, "insert into user( name, mail, pw) values ('".$name."', '".$email."', '".$password."')"); // Insert query
                if ($query) {
                    echo "You have Successfully Registered.....";
                    header('Location: ../index.php'); // Redirecting To Home Page
                } else {
                    echo "Error....!!";
                }
            } else {
                echo "This email is already registered, Please try another email...";
                header('Refresh: 3; Location:../index.php');
            }
        }
        mysqli_close($connection);
    }
}
?>