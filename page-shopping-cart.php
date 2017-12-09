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
        <?php 
        session_start();
        include "dbconnect.php";
        $sql="";
        if (isset($_SESSION["number_of_items"])) {
            $number_of_items = $_SESSION["number_of_items"];
            $sql = "select * from products where ";
            for ($i = 0; $i < $number_of_items - 1; $i++) {
                $sql = $sql . " id = " . $_SESSION["shopping_cart"][$i] . " or ";
            }
            $sql = $sql . " id = " . $_SESSION["shopping_cart"][$number_of_items - 1];


            $result = $conn->query($sql);
            $sql=$sql." ";
        }
        
        ?>
        
        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
					<div class="extras">
						<ul>
							<li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="page-shopping-cart.php"><b>0 items</b></a></li>
							<li>
								<div class="dropdown choose-country">
									<a class="#" data-toggle="dropdown" href="#"><img src="img/flags/sa.png" alt="Saudi Arabia"> KSA</a>
									<ul class="dropdown-menu" role="menu">
										<li role="menuitem"><a href="#"><img src="img/flags/us.png" alt="United States"> US</a></li>
									</ul>
								</div>
							</li>
			        		<li><a href="page-login.html">Login</a></li>
			        	</ul>
					</div>
		        </div>
		        <nav id="mainmenu" class="mainmenu">
					<ul>
						<li class="logo-wrapper"><a href="index.php"><img src="img/psu_logo.png" alt="PSU"></a></li>
						<li class="active">
							<a href="index.html">Home</a>
						</li>
						<li>
							<a href="#">Buy</a>
						</li>
						<li>
							<a href="#">Sell</a>
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
						<h1>Shopping Cart</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
                                    
					<div class="col-md-12">
						<!-- Action Buttons -->
						<div class="pull-right">
							<a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> UPDATE</a>
							<a href="#" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- Shopping Cart Items -->
						<table class="shopping-cart">
                                                        <?php
                                                        $total = 0;
                                                        $quantity =0;
                                                        $result = $conn->query($sql);
                                                        if (isset($_SESSION["number_of_items"])) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $quantity = substr_count($sql, "id = ".$row["id"]." ");
                                                                $total = $quantity * $row["price"] + $total;
                                                                ?>
							<!-- Shopping Cart Item -->
							<tr>
								<!-- Shopping Cart Item Image -->
								<td class="image"><a href="page-product-details.html"><img src="<?php echo $row["image_link"]; ?>" alt="Item Name"></a></td>
								<!-- Shopping Cart Item Description & Features -->
								<td>
									<div class="cart-item-title"><a href="page-product-details.html"><?php echo $row["name"]; ?></a></div>
									
								</td>
								<!-- Shopping Cart Item Quantity -->
								<td class="quantity">
									<input class="form-control input-sm input-micro" type="text" value="<?php $quantity ?>">
								</td>
								<!-- Shopping Cart Item Price -->
								<td class="price"><?php echo $row["price"]; ?></td>
								<!-- Shopping Cart Item Actions -->
								<td class="actions">
									<a href="#" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-pencil"></i></a>
									<a href="#" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-trash"></i></a>
								</td>
							</tr>
                                                         <?php }
    } ?>
							<!-- End Shopping Cart Item -->
							
						</table>
						<!-- End Shopping Cart Items -->
					</div>
				</div>
				<div class="row">
					<!-- Promotion Code -->
					<div class="col-md-4  col-md-offset-0 col-sm-6 col-sm-offset-6">
						<div class="cart-promo-code">
							<h6><i class="glyphicon glyphicon-gift"></i> Have a promotion code?</h6>
							<div class="input-group">
								<input class="form-control input-sm" id="appendedInputButton" type="text" value="">
								<span class="input-group-btn">
									<button class="btn btn-sm btn-grey" type="button">Apply</button>
								</span>
							</div>
						</div>
					</div>
					<!-- Shipment Options -->
					<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
						<div class="cart-shippment-options">
							<h6><i class="glyphicon glyphicon-plane"></i> Shippment options</h6>
							<div class="input-append">
								<select class="form-control input-sm">
									<option value="1">Standard - FREE</option>
									<option value="2">Next day delivery - $10.00</option>
								</select>
							</div>
						</div>
					</div>
					
					<!-- Shopping Cart Totals -->
					<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
						<table class="cart-totals">
							<tr>
								<td><b>Shipping</b></td>
								<td>Free</td>
							</tr>
							<tr>
								<td><b>Discount</b></td>
								<td>- $18.00</td>
							</tr>
							<tr class="cart-grand-total">
								<td><b>Total</b></td>
								<td><b>$163.55</b></td>
							</tr>
						</table>
						<!-- Action Buttons -->
						<div class="pull-right">
							<a href="#" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> UPDATE</a>
							<a href="#" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT</a>
						</div>
					</div>
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

    </body>
</html>