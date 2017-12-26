<?php

include "dbconnect.php";

$studentid = $_POST['reg_studentid'];
$password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);
$firstName = $_POST['reg_firstName'];
$lastName = $_POST['reg_lastName'];
$email = $studentid . "@psu.edu.sa";
$phone = $_POST['reg_phone'];


$sql = "INSERT INTO users VALUES ('$studentid','$firstName','$lastName','student','$email','$password','$phone')";

$result = mysqli_query($conn, $sql);
// if successfully insert data into database, displays message "Successful".
if ($result) {
    
    session_start();
    $_SESSION['login_user'] = array('id' => $studentid, 'firstname' => $firstName, 'lastname' => $lastName, 'role' => 'student');
    header('Location: index.php');
} else {
    echo "Error Encountered";
    header("Refresh: 2.5; URL=page-register.php");
}
?>

<?php


mysqli_close($conn);
?>