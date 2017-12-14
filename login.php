<?php
   include "dbconnect.php";
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM `users` WHERE studentid = '$myusername' and password = '$mypassword'";
      $result = $conn->query($sql);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if ($result->num_rows > 0) {
         $row = $result->fetch_assoc(); 
         $_SESSION['login_user'] = $row['firstname'];
         header("location: index.php");
      }else {
         echo $error = "Your Login Name or Password is invalid";
         header("Refresh: 3; URL=page-login.php");
      }
   
   }
?>