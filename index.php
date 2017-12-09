<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<?php
	include "dbconnect.php";
	$sql = "SELECT * FROM products";
	$result = $conn->query($sql);
	?>
    <head>
    	<style>
    	
    .ellipsis{
text-overflow:ellipsis;
white-space: nowrap;
overflow: hidden;
}
    	
    	
    	
    	</style>
    
    
    
    
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
						<li class="logo-wrapper"><a href="index.html"><img src="img/psu_logo.png" alt="PSU"></a></li>
						<li class="active">
							<a href="index.php">Home</a>
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

        <!-- Homepage Slider -->
        <div class="homepage-slider">
        	<div id="sequence">
				<ul class="sequence-canvas">
					<!-- Slide 1 -->
					<li class="bg4">
						<!-- Slide Title -->
						<h2 class="title">PSU Store</h2>
						<!-- Slide Text -->
						<h3 class="subtitle">Welcome to PSU online store for students!</h3>
						<!-- Slide Image -->
						<img class="slide-img" src="img/homepage-slider/slide1.png" alt="Slide 1" />
					</li>
					<!-- End Slide 1 -->
					<!-- Slide 2 -->
					<li class="bg3">
						<!-- Slide Title -->
						<h2 class="title">Al-Shegri Bookstore</h2>
						<!-- Slide Text -->
						<h3 class="subtitle">ENG 101 & ENG 103 now available!</h3>
						<!-- Slide Image -->
						<img class="slide-img" src="img/homepage-slider/slide2_2.jpg" alt="Slide 2" />
					</li>
					<!-- End Slide 2 -->
					<!-- Slide 3 -->
					<li class="bg1">
						<!-- Slide Title -->
						<h2 class="title">Online codes</h2>
						<!-- Slide Text -->
						<h3 class="subtitle">Due to popular demand, online code section has been added!</h3>
						<!-- Slide Image -->
						<img class="slide-img" src="img/homepage-slider/slide3.png" alt="Slide 3" />
					</li>
					<!-- End Slide 3 -->
				</ul>
				<div class="sequence-pagination-wrapper">
					<ul class="sequence-pagination">
						<li>1</li>
						<li>2</li>
						<li>3</li>
					</ul>
				</div>
			</div>
        </div>
        <!-- End Homepage Slider -->
        
        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Recent items</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<?php
						if ($result->num_rows > 0) {
   							while($row = $result->fetch_assoc()) {
   							    
   					?>
					<div class="col-sm-4 ellipsis">
						<div class="shop-item">
							<div class="image">
								<a href="page-product-details.html"><img src="<?php  echo $row["image_link"]?>" alt="Item Name" style="height:80%;width:80%;"></a>
							</div>
							<div class="title">
								<h3><a href="page-product-details.html"><?php  echo $row["name"]?></a></h3>
							</div>
							<div class="price">
								$<?php  echo $row["price"]?> 
							</div>
							<div class="description ellipsis">
								<p class= "ellipsis"><?php  echo $row["short_description"]?></p>
							</div>
							<div class="actions">
								<a href="page-product-details.html" class="btn"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
							</div>
						</div>
					</div>
					
					<?php 
   							}
						}
					?>
				</div>
				<div class="pagination-wrapper ">
					<ul class="pagination pagination-lg">
						<li class="disabled"><a href="#">Previous</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
						<li><a href="#">8</a></li>
						<li><a href="#">9</a></li>
						<li><a href="#">10</a></li>
						<li><a href="#">Next</a></li>
					</ul>
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