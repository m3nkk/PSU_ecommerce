<?php


include 'dbconnect.php';

if (isset($_POST)) {
    session_start();
    
   
    
    $studentid =  $_SESSION["login_user"]["id"];
    $password = $_POST['reg_password'];
    $firstName = $_POST['reg_firstName'];
    $lastName = $_POST['reg_lastName'];
    $email = $studentid . "@psu.edu.sa";
    $phone = $_POST['reg_phone'];
    
   
    
    $sql = "UPDATE users SET firstname ='".$firstName."',lastname = '".$lastName."', number ='".$phone."'  WHERE studentid='". $studentid."'";
   
    $result = mysqli_query($conn, $sql);
    
    if($result){
      
    }else echo "failed to update";
   
} else {
    
   
}

?>