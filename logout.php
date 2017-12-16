<?php

//Remove Cookie
if (isset($_COOKIE['login_user'])) {
    unset($_COOKIE['login_user']);
    setcookie("login_user", null, -1, '/');
}
session_start();
session_unset();
header('location: index.php');
?>
