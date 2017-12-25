<?php

include "dbconnect.php";

$descriptionValue = $_POST['description'];
$descriptionValue = preg_replace("/'/", "\&#39;", $descriptionValue);


$productID = $_POST['pid'];


$sql = "update products set description = '$descriptionValue' where id = '$productID'";

$result = mysqli_query($conn, $sql);

if ($result) {
	header('Content-Type: text/xml');
	echo ('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
	
	echo '<message>1</message>';

} else {
    echo "Error Encountered";
    header("Refresh: 2.5; URL=admin-ProductRequests.php");
}
?>

<?php

// close connection
mysqli_close($conn);
?>