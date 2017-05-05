<?php
if(!empty($_POST["register"]) {
    $connection = mysqli_connect("localhost", "root", "langwizz"); // Establishing connection with server..
//	$db = mysql_select_db("langwizz", $connection); // Selecting Database.
    $email = $_POST['email1'];
    $password = $_POST['password1']; // Password Encryption, If you like you can also leave sha1.
    //$password = sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
    // Check if e-mail address syntax is valid or not
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid Email.......";
    } else {
        $result = mysql_query("SELECT * FROM user WHERE mail like'$email'");
        $data = mysql_num_rows($result);
        if (($data) == 0) {
            $query = mysql_query("insert into user(mail, pw) values ('$email', '$password')"); // Insert query
            if ($query) {
                echo "You have Successfully Registered.....";
                header('Location: ../../index.php'); // Redirecting To Home Page
            } else {
                echo "Error....!!";
            }
        } else {
            echo "This email is already registered, Please try another email...";
        }
    }
    mysql_close($connection);
}
?>