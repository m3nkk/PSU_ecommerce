<?php

include "dbconnect.php";


if (isset($_POST['member_password']) && isset($_COOKIE['CanReset']) && isset($_POST['member_id'])) {
    $sql = "UPDATE `users` SET `password` = '" . $_POST["member_password"] . "' WHERE `studentid` = '" . $_POST['member_id'] . "'";
    $result = mysqli_query($conn, $sql);
    unset($_COOKIE['CanReset']);
    setcookie("CanReset", null, -1, '/');
    header("location: index.php");
}
?>