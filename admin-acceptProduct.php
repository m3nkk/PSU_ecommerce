<?php
include 'dbconnect.php';

if (isset($_POST["productId"])) {
    
    $productId = $_POST["productId"];
    $sql = "UPDATE products SET status = '2' WHERE id=" . $productId . "";
    $result = mysqli_query($conn, $sql);
    echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
    echo ('<response>');
    if ($result) {
        echo "<response>success</response>";
    } else
        echo "<response>failed</response>";
} else {
    header('Content-Type: text/xml');
    echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
    echo ('<response>');
    echo '</response>';
}

?>