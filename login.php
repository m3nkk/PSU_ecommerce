<?php

include "dbconnect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // username and password sent from form 
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "SELECT * FROM `users` WHERE studentid = '$myusername' and password = '$mypassword'";
    $result = $conn->query($sql);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['login_user'] = array('id' => $row['studentid'], 'firstname' => $row['firstname'], 'lastname' => $row['lastname'], 'role' => $row['role']);
        if (isset($_POST['RememberMe'])) {
            setcookie('login_user', serialize($_SESSION['login_user']), time() + (86400 * 30), "/");
        }
        
    } else {
        $message = "Your id or password is invalid";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh: 1.5; URL=page-login.php"); 

    }
}
?>