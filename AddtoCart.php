<?php
session_start();
if (isset($_POST['id']) && isset($_POST['number_of_items'])) {
    if (!isset($_SESSION["shopping_cart"][$_POST["id"]])) {
    $_SESSION["shopping_cart"][$_POST["id"]] = array('product_id' => $_POST["id"], 'quantity' => 1);
    $_SESSION["number_of_items"] ++;
    }
     header('Content-Type: text/xml');
        echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        echo ('<response>');
        echo ('<ID>'.$_POST['id'].'</ID>');
        echo ('<code>'.$_SESSION["number_of_items"].'</code>');
        echo ('</response>');
    }

?>
