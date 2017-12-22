<?php

include "dbconnect.php";
session_start();

$name = $_POST['prod_name'];
$description = $_POST['prod_desc'];
$short_description = $_POST['prod_short-desc'];
$price = $_POST['prod_price'];
$category = $_POST['category'];
$condition = $_POST['condition'];
$sid = $_SESSION["login_user"]['id'];

$img = $_FILES["image"]["name"];
$target_dir = "img/books/";
$target = $target_dir . basename($img);
$imageFileType = pathinfo($target, PATHINFO_EXTENSION);


$copy = $name;

$copy .= ".";
$img = $copy . $imageFileType;
$target = $target_dir . $img;


move_uploaded_file($_FILES['image']['tmp_name'], $target);
//INSERT INTO products VALUES (null,'test','test_desc','short_desc',1500,'img/books/test.png','Book',1)

$sql = "INSERT INTO products VALUES (null,'$name','$description','$short_description',$price,'$target_dir$img','$category',1,'$sid',1,'$condition')";

$result = mysqli_query($conn, $sql);
// if successfully insert data into database, displays message "Successful".
if ($result) {
    header("location: myProducts.php");
} else {
    echo "Error Encountered";
    header("Refresh: 2.5; URL=sell.php");
}
?>

<?php

// close connection
mysqli_close($conn);
?>