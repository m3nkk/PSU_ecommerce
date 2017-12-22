<?php

include "dbconnect.php";

$studentid = $_POST['reg_studentid'];
$password = $_POST['reg_password'];
$firstName = $_POST['reg_firstName'];
$lastName = $_POST['reg_lastName'];
$email = $_POST['reg_email'];
$phone = $_POST['reg_phone'];


$sql = "INSERT INTO users VALUES ('$studentid','$firstName','$lastName','student','$email','$password','$phone')";

$result = mysqli_query($conn, $sql);
// if successfully insert data into database, displays message "Successful".
if ($result) {
    
  //  echo "Successful";
  //   echo "<BR>";
  //  echo "<h3><a href='index.php'>Back to main page</a></h3>";
    session_start();
    $_SESSION['login_user'] = array('id' => $studentid, 'firstname' => $firstName, 'lastname' => $lastName, 'role' => 'student');
    header('Location: index.php');
} else {
    echo "Error Encountered";
    header("Refresh: 2.5; URL=page-register.php");
}
?>

<?php

// close connection
mysqli_close($conn);
?>