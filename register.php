<?php

include "dbconnect.php";

$studentid=$_POST['register-studentid'];
$password=$_POST['register-password'];
$firstName=$_POST['register-firstName'];
$lastName=$_POST['register-lastName'];
$email=$_POST['register-email'];


$sql = "INSERT INTO users VALUES ('$studentid','$firstName','$lastName','student','$email','$password')";

$result = mysqli_query($conn, $sql);
// if successfully insert data into database, displays message "Successful".
if($result){
    echo "Successful";
    echo "<BR>";
    echo "<h3><a href='index.php'>Back to main page</a></h3>";
}
else {
    echo "Error Encountered";
}
?>

<?php
// close connection
mysqli_close($conn);
?>