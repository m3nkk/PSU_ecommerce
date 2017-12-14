<?php
   include "dbconnect.php";
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM `users` WHERE studentid = '$myusername' and password = '$mypassword'";
      $result = $conn->query($sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['login_user'] = $row['firstname'];
         header("location: index.php");
      }else {
         echo $error = "Your Login Name or Password is invalid";
         header("Refresh: 3.5; URL=page-login.php");
      }
   
   }
?>