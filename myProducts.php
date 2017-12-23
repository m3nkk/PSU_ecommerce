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
        <script src="productStatus.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Navigation & Logo-->
        <?php
        include 'Pages-Header.php';

        if (!isset($_SESSION["login_user"])) {
            header("location: page-login.php");
        }
        ?>



        <div class="row">
            <div class="col-md-5" style="margin:20px;">
            	 <h2>Pending... <a href="sell.php">Add more?</a></h2> 
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
                                <div class="feature">Status: <b id="pStatus<?php echo $row["id"] ?>"><?php echo "Pending"; ?></b></div>  
                            </td>

                            <!-- Shopping Cart Item Price -->
                            <td class="price" id="ProductPriceID<?php echo $row["id"] ?>"><?php echo $row["price"] . 'SAR' ?></td>



                            </td>
                        </tr>


                    <?php }
                    ?>


                </table>

            </div>
            <div class="col-md-1" style="margin-bottom:700px">
            
            </div>

            <div class="col-md-5" style="margin:20px;">
                <!-- Shopping Cart Items -->
                <table class="shopping-cart">
                		<h2>Accepted</h2>
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
                                <div class="feature">Product ID: <b id="statusID<?php echo $row["id"] ?>"><?php echo $row["id"]; ?></b></div>
                                <div class="feature">Category: <b><?php echo $row["category"]; ?></b></div>
                                <div class="feature">Condition: <b><?php echo $row["pCondition"]; ?></b></div>
                                <div class="feature">Status: <b id="aStatus<?php echo $row["id"] ?>"><?php echo "Accepted"; ?></b></div>
                                
                                <select class="form-control" id="statuslist" name="statuslist" onchange="getStatusRequest(<?php echo $row["id"];?>)">
        								<option value="2">Accepted</option>
        								<option value="3">Sold</option>
							   </select>

                            </td>

                            <!-- Shopping Cart Item Price -->
                            <td class="price" id="ProductPriceID<?php echo $row["id"] ?>"><?php echo $row["price"] . 'SAR' ?></td>



                            </td>
                        </tr>
                        
                         


                    <?php }
                    ?>
                    <tr>
                    		<div>
            					<a href="" class="btn btn-grey btn-block"><i class="glyphicon glyphicon-refresh"></i>UPDATE</a>
            				</div>
                    </tr>


                </table>

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
        <script src="productStatus.js"></script>

    </body>
</html>