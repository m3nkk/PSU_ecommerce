<?php
include "dbconnect.php";
session_start();
if(isset($_GET['id'])&&isset($_GET['number_of_items'])&&(isset($_GET['total']))&&isset($_GET['price'])){
    $_SESSION["number_of_items"]--;
    $NumberOfItems=$_SESSION["number_of_items"];
    $NewTotal= $_GET['total']-$_GET['price'];
    unset($_SESSION["shopping_cart"][$_GET['id']]); 
    header('Content-Type: text/xml');
        echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        echo ('<response>');
        echo ('<Total>'.$NewTotal.'</Total>');
        echo ('<code>'.$NumberOfItems.'</code>');
        echo ('</response>');
}
?>
