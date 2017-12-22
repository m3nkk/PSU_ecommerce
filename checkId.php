<?php
include 'dbconnect.php';


$num=0;


if (isset($_POST["id"])){
    
    $id = $_POST["id"];
    //ID too long or too short
    if (strlen($id) !=9){
        header('Content-Type: text/xml');
        echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        echo ('<response>');
       echo '<message>Incorrect ID</message>';
        echo '<code>3</code>';
       
        echo '</response>';
    }else {
    
     
    $sql = "SELECT * FROM users where studentid='".$id."'";
    // $sql = "SELECT * FROM users where studentid= '"214110111"'";
    $result = $conn->query($sql);
    $num = $result->num_rows;
   // if theres already a row in DB with that ID
    if ($num > 0) {
        
        header('Content-Type: text/xml');
        echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        echo ('<response>');
       echo '<message>ID is already registered !</message>';
        echo '<code>2</code>';
        
        echo '</response>';
        
        
    } else {
        // ID is available
        header('Content-Type: text/xml');
        echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        echo ('<response>');
        //echo '<message> "<i class="glyphicon glyphicon-check"></i>" </message>';
        echo '<message> ID is available </message>';
        echo '<code>1</code>';
        
        echo '</response>';
    }
   }
    
}else {
    header('Content-Type: text/xml');
    echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
    echo ('<response>');
    //echo '<message>Query Error</message>';
    echo '<message>0</message>';
    echo '</response>';
}


?>