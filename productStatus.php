<?php

include "dbconnect.php";

$statusValue = $_POST['status'];
$id = $_POST['id'];



$sql = "update products set status = $statusValue where id = '$id'";

$result = mysqli_query($conn, $sql);

if ($result) {
	header('Content-Type: text/xml');
	echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
	
	echo '<id>'.$id.'</id>';

} else {
    echo "Error Encountered";
    header("Refresh: 2.5; URL=myProducts.php");
}
?>

<?php

// close connection
mysqli_close($conn);
?>