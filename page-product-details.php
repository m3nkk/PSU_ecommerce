<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>PSU Store</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/leaflet.css" />
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/leaflet.ie.css" />
        <![endif]-->
        <link rel="stylesheet" href="css/main.css">

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->


        <!-- Navigation & Logo-->
        <?php
        include 'Pages-Header.php';
        if (isset($_GET["product_id"])) {
            $sql = "select * from products where id='" . $_GET["product_id"] . "'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $ProductID = $row["id"];
            $imglink = $row["image_link"];
            $ProductPrice = $row["price"];
            $ProductName = $row["name"];
            $ProductDesc = $row["description"];
            $ProductShortDesc = $row["short_description"];
            $ProductCategory = $row["category"];
        } else {
            header("location: index.php");
        }
        ?>
        <!-- Page Title -->
        <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Product Details</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <!-- Product Image & Available Colors -->
                    <div class="col-sm-6">
                        <div class="product-image-large">
                            <img src="<?php echo $imglink ?>" alt="Item Name" style="height:78%;width:78%;">
                        </div>

                    </div>
                    <!-- End Product Image & Available Colors -->
                    <!-- Product Summary & Options -->
                    <div class="col-sm-6 product-details">
                        <h4><?php echo $ProductName ?></h4>
                        <div class="price">
                            SAR <?php echo $ProductPrice ?>
                        </div>
                        <h5>Quick Overview</h5>
                        <p>
<?php echo $ProductShortDesc ?>
                        </p>
                        <table class="shop-item-selections">

<?php
$sql2 = "select * from users where studentid='" . $row["FR_studentid"] . "'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
$fullName = $row2['firstname'] . " " . $row2['lastname'];
?>
                            <!-- Category -->
                            <tr>
                                <td colspan="2"><b>Category: </b> <?php echo $ProductCategory; ?><br></td>

                            </tr>
                            <!-- Condition -->
                            <tr>
                                <td colspan="2">   <b>Condition: </b> <?php echo $row["pCondition"]; ?><br></td>

                            </tr>
                            <!-- Seller Name -->
                            <tr>
                                <td colspan="2"><b>Seller Name: </b><?php echo $fullName; ?><br></td>
                            </tr>

                            <!-- Seller ID -->
                            <tr>
                                <td colspan="2"> <b>Seller ID: </b><?php echo $row["FR_studentid"]; ?><br></td>

                            </tr>

                            <!-- Add to Cart Button -->
                            <tr>

                                <td>
<?php
if ((isset($_SESSION['login_user']))) {

    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false) {
        if (isset($_SESSION["shopping_cart"][$_GET["product_id"]])) {
            echo '<td id="Cartbutton"><button style="background-color:#02DB6B;" type="button" class="btn btn"><i class="icon-shopping-cart icon-white"></i>In Cart</button></td>';
        } else {
            echo '<td id="Cartbutton"><button type="button" class="btn btn" onclick="AddtoCartRequst(' . $ProductID . ',' . $_SESSION["number_of_items"] . ')"><i class="icon-shopping-cart icon-white"></i>Add to Cart</button></td>';
        }
    } else {
        if (isset($_SESSION["shopping_cart"][$_GET["product_id"]])) {
            echo '<td id="Cartbutton"><button style="background-color:#02DB6B;" type="button" class="btn btn" onclick="RemoveFromCartRequst2(' . $ProductID . ',' . $_SESSION["number_of_items"] . ')" onmouseover="ChangeButton()" onmouseout="ButtonBack()"><i class="icon-shopping-cart icon-white"></i>In Cart</button></td>';
        } else {
            echo '<td id="Cartbutton"><button type="button" class="btn btn" onclick="AddtoCartRequst(' . $ProductID . ',' . $_SESSION["number_of_items"] . ')"><i class="icon-shopping-cart icon-white"></i>Add to Cart</button></td>';
        }
    }
} else {
    echo '<td> <button type="button" class="btn btn" onClick="NotLogInAlert()"><i class="icon-shopping-cart icon-white"></i>Add to Cart</button> </td>';
}
?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- End Product Summary & Options -->

                    <!-- Full Description & Specification -->
                    <div class="col-sm-12">
                        <div class="tabbable">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs product-details-nav">
                                <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>
                                <!-- <li><a href="#tab2" data-toggle="tab">Specification</a></li> -->
                            </ul>
                            <!-- Tab Content (Full Description) -->
                            <div class="tab-content product-detail-info">
                                <div class="tab-pane active" id="tab1">
                                    <h4>Product Description</h4>
                                    <p>
<?php echo $ProductDesc ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <!-- End Full Description & Specification -->
                    </div>
                </div>
            </div>

            <!-- Footer -->
<?php include 'Pages-Footer.php'; ?>

            <!-- Javascripts -->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
            <script src="js/bootstrap.min.js"></script>
            <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
            <script src="js/jquery.fitvids.js"></script>
            <script src="js/jquery.sequence-min.js"></script>
            <script src="js/jquery.bxslider.js"></script>
            <script src="js/main-menu.js"></script>
            <script src="js/template.js"></script>
            <script src="js/Shopping-Cart.js"></script>
    </body>
</html>