<?php
session_start();
if(isset($_POST['id'])&&isset($_POST['number_of_items'])&&(isset($_POST['total']))&&isset($_POST['price'])){
    if (isset($_SESSION["shopping_cart"][$_POST["id"]])) {
    $_SESSION["number_of_items"]--;
    unset($_SESSION["shopping_cart"][$_POST['id']]); 
    }
    $total=$_POST['total']-$_POST['price'];
    header('Content-Type: text/xml');
        echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        echo ('<response>');
        echo ('<Total>'.$total.'</Total>');
        echo ('<code>'.$_SESSION["number_of_items"].'</code>');
        echo ('</response>');
}

?>
