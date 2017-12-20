<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>mPurpose - Multipurpose Feature Rich Bootstrap Template</title>
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
                            <li>
                                <div class="dropdown choose-country">
                                    <a class="#" data-toggle="dropdown" href="#"><img src="img/flags/sa.png" alt="Saudi Arabia"> KSA</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li role="menuitem"><a href="#"><img src="img/flags/us.png" alt="United States"> US</a></li>
                                    </ul>
                                </div>
                            </li>
                            <?php
                            include "dbconnect.php";
                            session_start();
                            if ((!isset($_SESSION['login_user'])) && (isset($_COOKIE['login_user']))) {
                                $_SESSION["login_user"] = unserialize($_COOKIE['login_user']);
                            }

                            if (!isset($_SESSION["login_user"])) {
                                header("location: page-login.php");
                            }
                            ?>



                            <?php
                            if ((isset($_SESSION['login_user']))) {
                                echo '<li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="page-shopping-cart.php"><b>' . $_SESSION["number_of_items"] . ' items</b></a></li>';
                                echo '<li>Welcome <b>' . $_SESSION["login_user"]['firstname'] . '</b></li> <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>';
                            } else {
                                echo '<li> <a href="page-register.php"><b><span class="glyphicon glyphicon-new-window"></span> Register</b></a></li>';
                                echo '<li><a href="page-login.php"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>';


                                if ((!isset($_SESSION['login_user'])) && (isset($_COOKIE['login_user']))) {
                                    $_SESSION["login_user"] = unserialize($_COOKIE['login_user']);
                                }

                                if (!isset($_SESSION["number_of_items"])) {
                                    $_SESSION["number_of_items"] = 0;
                                }
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
                            <a href="myProducts.php">My Products</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <!-- Shopping Cart Items -->
                <table class="shopping-cart">
<?php
$studentID = $_SESSION["login_user"]["id"];
$sql = "select * from products where FR_studentid='" . $studentID . "' and status =1";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    ?>

                        <tr id="ProductRowID<?php echo $row["id"] ?>" >

                            <td class="image"><a href="page-product-details.php?product_id=<?php echo $row["id"] ?>"><img src="<?php echo $row["image_link"]; ?>" alt="Item Name"></a></td>

                            <td>
                                <div class="cart-item-title"><a href="page-product-details.php?product_id=<?php echo $row["id"] ?>"><?php echo $row["name"]; ?></a></div>
                                <div class="feature">Category: <b><?php echo $row["category"]; ?></b></div>
                                <div class="feature">Condition: <b><?php echo $row["pCondition"]; ?></b></div>

                            </td>

                            <!-- Shopping Cart Item Price -->
                            <td class="price" id="ProductPriceID<?php echo $row["id"] ?>"><?php echo $row["price"] . 'SAR' ?></td>



                            </td>
                        </tr>


<?php }
?>


                </table>

            </div>

            <div class="col-md-5">
                <!-- Shopping Cart Items -->
                <table class="shopping-cart">
<?php
$studentID = $_SESSION["login_user"]["id"];
$sql = "select * from products where FR_studentid='" . $studentID . "' and status =2";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    ?>

                        <tr id="ProductRowID<?php echo $row["id"] ?>" >

                            <td class="image"><a href="page-product-details.php?product_id=<?php echo $row["id"] ?>"><img src="<?php echo $row["image_link"]; ?>" alt="Item Name"></a></td>

                            <td>
                                <div class="cart-item-title"><a href="page-product-details.php?product_id=<?php echo $row["id"] ?>"><?php echo $row["name"]; ?></a></div>
                                <div class="feature">Category: <b><?php echo $row["category"]; ?></b></div>
                                <div class="feature">Condition: <b><?php echo $row["pCondition"]; ?></b></div>

                            </td>

                            <!-- Shopping Cart Item Price -->
                            <td class="price" id="ProductPriceID<?php echo $row["id"] ?>"><?php echo $row["price"] . 'SAR' ?></td>



                            </td>
                        </tr>


<?php }
?>


                </table>

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

    </body>
</html>