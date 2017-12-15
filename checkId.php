<?php
include 'dbconnect.php';


$num=0;


if (isset($_POST["id"])){
    
    $id = $_POST["id"];
    if (strlen($id) !=9){
        header('Content-Type: text/xml');
        echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        echo ('<response>');
        // echo '<message>'.$id.' already registered </message>';
        echo '<message>2</message>';
        echo '<code>'.strlen($id).'</code>';
        echo '</response>';
    }else {
    
     
    $sql = "SELECT * FROM users where studentid='".$id."'";
    // $sql = "SELECT * FROM users where studentid= '"214110111"'";
    $result = $conn->query($sql);
    $num = $result->num_rows;
    if ($num > 0) {
        
        header('Content-Type: text/xml');
        echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        echo ('<response>');
       // echo '<message>'.$id.' already registered </message>';
        echo '<message>2</message>';
        
        echo '</response>';
        
        
    } else {
        
        header('Content-Type: text/xml');
        echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
        echo ('<response>');
        //echo '<message> "<i class="glyphicon glyphicon-check"></i>" </message>';
        //echo '<message>'.$id.' is available </message>';
        echo '<message>1</message>';
        
        echo '</response>';
    }
   }
    
}else {
    header('Content-Type: text/xml');
    echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
    echo ('<response>');
    echo '<message>Query Error</message>';
    echo '</response>';
}


?>