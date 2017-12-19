<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php
    include "dbconnect.php";
    session_start();
    if (!isset($_SESSION["number_of_items"])) {
        $_SESSION["number_of_items"] = 0;
    }
    if ((!isset($_SESSION['login_user'])) && (isset($_COOKIE['login_user']))) {
        $_SESSION["login_user"] = unserialize($_COOKIE['login_user']);
    }
    if (isset($_GET["product_id"])) {
            $sql = "select * from products where id='".$_GET["product_id"]."'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $ProductID = $row["id"];
            $imglink = $row["image_link"];
            $ProductPrice=$row["price"];
            $ProductName=$row["name"];
            $ProductDesc=$row["description"];
            $ProductShortDesc=$row["short_description"];
            $ProductCategory=$row["category"];
            
    }else{
        header("location: index.php");
    }
     if ( isset($_GET["product_id"]) && isset($_GET["query_type"]) && isset($_GET["Quantity"]) ){
        if ($_GET["query_type"] == 'add_to_cart') {
            if (!isset($_SESSION["shopping_cart"][$_GET["product_id"]])) {
                $_SESSION["shopping_cart"][$_GET["product_id"]] = array('product_id' => $_GET["product_id"], 'quantity' => $_GET["Quantity"]);
            } else {
                $_SESSION["shopping_cart"][$_GET["product_id"]]["quantity"] += $_GET["Quantity"];
            }
            $_SESSION["number_of_items"] +=$_GET["Quantity"];
        }
    }
    ?>
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
        <div class="mainmenu-wrapper">
            <div class="container">
                <div class="menuextras">
                    <div class="extras">
                        <ul>
                            <?php
                            echo '<li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="page-shopping-cart.php"><b>' . $_SESSION["number_of_items"] . ' items</b></a></li>';
                            ?>	
                            <li>
                                <div class="dropdown choose-country">
                                    <a class="#" data-toggle="dropdown" href="#"><img src="img/flags/sa.png" alt="Saudi Arabia"> KSA</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li role="menuitem"><a href="#"><img src="img/flags/us.png" alt="United States"> US</a></li>
                                    </ul>
                                </div>
                            </li>
<?php
if (isset($_SESSION["login_user"])) {
    echo '<li>Welcome <b>' . $_SESSION["login_user"]['firstname'] . '</b></li> <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>';
} else {
    echo '<li><a href="page-login.php"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>';
}
?>
                        </ul>
                    </div>
                </div>
                <nav id="mainmenu" class="mainmenu">
                    <ul>
                        <li class="logo-wrapper"><a href="index.php"><img src="img/psu_logo.png" alt="PSU"></a></li>
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="#">Buy</a>
                        </li>
                        <li>
                             <a href="sell.php">Sell</a>
                        </li>
                        <li>
                            <a href="#">My Products</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

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
                           $<?php echo $ProductPrice ?>
                        </div>
                        <h5>Quick Overview</h5>
                        <p>
                            <?php echo $ProductShortDesc ?>
                        </p>
                        <table class="shop-item-selections">
               
                            <!-- Quantity -->
                            <tr>
                                <td><b>Quantity:</b></td>
                                <td>
                                    <input type="number" class="form-control input-sm input-micro" value="1" id="Quantity" min="1">
                                </td>
                            </tr>
                            <!-- Add to Cart Button -->
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    
                                    <a class="btn btn" onclick="AddToCart()">
                                       <i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
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
        <div class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-footer col-md-3 col-xs-6">
                        <h3>Navigate</h3>
                        <ul class="no-list-style footer-navigate-section">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>

                    <div class="col-footer col-md-4 col-xs-6">
                        <h3>Contacts</h3>
                        <p class="contact-us-details">
                            <b>Address:</b> Riyadh, Saudi Arabia<br/>
                            <b>Phone:</b> +966 55 2020770<br/>
                            <b>Email:</b> <a href="mailto:m3n991@gmail.com">m3n991@gmail.com</a>
                        </p>
                    </div>
                    <div class="col-footer col-md-2 col-xs-6">
                        <h3>Stay Connected</h3>
                        <ul class="footer-stay-connected no-list-style">
                            <li><a href="#" class="facebook"></a></li>
                            <li><a href="#" class="twitter"></a></li>
                            <li><a href="#" class="googleplus"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-copyright">&copy; PSU Events, Web Project</div>
                    </div>
                </div>
            </div>
        </div>

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
        <script>
            function AddToCart() {window.location.href = "page-product-details.php?product_id="+"<?php echo $ProductID ?>"+"&Quantity="+document.getElementById("Quantity").value+"&query_type=add_to_cart"};
        </script>
    </body>
</html>