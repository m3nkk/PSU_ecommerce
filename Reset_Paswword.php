<?php

include "dbconnect.php";


if (isset($_POST['member_password']) && isset($_COOKIE['Token']) && isset($_POST['member_id'])) {
    $sql = "UPDATE `users` SET `password` = '" . password_hash($_POST["member_password"], PASSWORD_DEFAULT) . "' WHERE `studentid` = '" . $_POST['member_id'] . "'";
    $result = mysqli_query($conn, $sql);
    unset($_COOKIE['Token']);
    setcookie("Token", null, -1, '/');
    header("location: index.php");
}
?>