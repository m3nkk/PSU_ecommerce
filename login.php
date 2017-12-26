<?php

include "dbconnect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // username and password sent from form 
    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM `users` WHERE studentid = '$myusername'";
    $result = $conn->query($sql);
    $Valid = TRUE;
    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // if password matches hash in the DB
        if(password_verify($mypassword, $row['password'])) {
            $_SESSION['login_user'] = array('id' => $row['studentid'], 'firstname' => $row['firstname'], 'lastname' => $row['lastname'], 'role' => $row['role']);
            if (isset($_POST['RememberMe'])) {
                setcookie('login_user', serialize($_SESSION['login_user']), time() + (86400 * 30), "/");
            }
            header("location: index.php");
        } else {
            $Valid = FALSE;
        }
    } else {
        $Valid = FALSE;
        
    }
    
    if(!$Valid){
        header("location: page-login.php?message=invalid");
    }
}
?>