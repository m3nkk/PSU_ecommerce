<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php
    session_start(); 
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
                                                if (isset($_SESSION["number_of_items"])){
                                                    echo '<li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="page-shopping-cart.php"><b>' . $_SESSION["number_of_items"]. ' items</b></a></li>';
                                                }else{
                                                    echo '<li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="page-shopping-cart.php"><b> 0 items</b></a></li>';
                                                }
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
                                                if (isset($_SESSION["login_user"])){
			        		echo '<li>Welcome <b>'.$_SESSION["login_user"].'</b></li>'; 
                                                }
                                                else{
                                                  echo '<li><a href="page-login.php">Login</a></li>'; 
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
	    					<img src="img/product3.jpg" alt="Item Name">
	    				</div>
	    				<div class="colors">
							<span class="color-white"></span>
							<span class="color-black"></span>
							<span class="color-blue"></span>
							<span class="color-orange"></span>
							<span class="color-green"></span>
						</div>
	    			</div>
	    			<!-- End Product Image & Available Colors -->
	    			<!-- Product Summary & Options -->
	    			<div class="col-sm-6 product-details">
	    				<h4>LOREM IPSUM DOLOR</h4>
	    				<div class="price">
							<span class="price-was">$959.99</span> $999.99
						</div>
						<h5>Quick Overview</h5>
	    				<p>
	    					Morbi eleifend congue elit nec sagittis. Praesent aliquam lobortis tellus, nec consequat massa ornare vitae. Ut fermentum justo vel venenatis eleifend. Fusce id magna eros.
	    				</p>
						<table class="shop-item-selections">
							<!-- Color Selector -->
							<tr>
								<td><b>Color:</b></td>
								<td>
									<div class="dropdown choose-item-color">
										<a class="btn btn-sm btn-grey" data-toggle="dropdown" href="#"><span class="color-orange"></span> Orange <b class="caret"></b></a>
										<ul class="dropdown-menu" role="menu">
											<li role="menuitem"><a href="#"><span class="color-white"></span> White</a></li>
											<li role="menuitem"><a href="#"><span class="color-black"></span> Black</a></li>
											<li role="menuitem"><a href="#"><span class="color-blue"></span> Blue</a></li>
											<li role="menuitem"><a href="#"><span class="color-orange"></span> Orange</a></li>
											<li role="menuitem"><a href="#"><span class="color-green"></span> Green</a></li>
										</ul>
									</div>
								</td>
							</tr>
							<!-- Size Selector -->
							<tr>
								<td><b>Size:</b></td>
								<td>
									<div class="dropdown">
										<a class="btn btn-sm btn-grey" data-toggle="dropdown" href="#">XXL <b class="caret"></b></a>
										<ul class="dropdown-menu" role="menu">
											<li role="menuitem"><a href="#">XS</a></li>
											<li role="menuitem"><a href="#">S</a></li>
											<li role="menuitem"><a href="#">M</a></li>
											<li role="menuitem"><a href="#">L</a></li>
											<li role="menuitem"><a href="#">XXL</a></li>
										</ul>
									</div>
								</td>
							</tr>
							<!-- Quantity -->
							<tr>
								<td><b>Quantity:</b></td>
								<td>
									<input type="text" class="form-control input-sm input-micro" value="1">
								</td>
							</tr>
							<!-- Add to Cart Button -->
							<tr>
								<td>&nbsp;</td>
								<td>
									<a href="#" class="btn btn"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
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
								<li><a href="#tab2" data-toggle="tab">Specification</a></li>
							</ul>
							<!-- Tab Content (Full Description) -->
							<div class="tab-content product-detail-info">
								<div class="tab-pane active" id="tab1">
									<h4>Product Description</h4>
									<p>
										Donec hendrerit massa metus, a ultrices elit iaculis eu. Pellentesque ullamcorper augue lacus. Phasellus et est quis diam iaculis fringilla id nec sapien. Sed tempor ornare felis, non vulputate dolor. Etiam ornare diam vitae ligula malesuada tempor. Vestibulum nec odio vel libero ullamcorper euismod et in sapien. Suspendisse potenti.
									</p>
									<h4>Product Highlights</h4>
									<ul>
										<li>Nullam dictum augue nec iaculis rhoncus. Aenean lobortis fringilla orci, vitae varius purus eleifend vitae.</li>
										<li>Nunc ornare, dolor a ultrices ultricies, magna dolor convallis enim, sed volutpat quam sem sed tellus.</li>
										<li>Aliquam malesuada cursus urna a rutrum. Ut ultricies facilisis suscipit.</li>
										<li>Duis a magna iaculis, aliquam metus in, luctus eros.</li>
										<li>Aenean nisi nibh, imperdiet sit amet eleifend et, gravida vitae sem.</li>
										<li>Donec quis nisi congue, ultricies massa ut, bibendum velit.</li>
									</ul>
									<h4>Usage Information</h4>
									<p>
										Donec hendrerit massa metus, a ultrices elit iaculis eu. Pellentesque ullamcorper augue lacus. Phasellus et est quis diam iaculis fringilla id nec sapien. Sed tempor ornare felis, non vulputate dolor. Etiam ornare diam vitae ligula malesuada tempor. Vestibulum nec odio vel libero ullamcorper euismod et in sapien. Suspendisse potenti.
									</p>
								</div>
								<!-- Tab Content (Specification) -->
								<div class="tab-pane" id="tab2">
									<table>
										<tr>
											<td>Total sensor Pixels (megapixels)</td>
											<td>Approx. 16.7</td>
										</tr>
										<tr>
											<td>Effective Pixels (megapixels)</td>
											<td>Approx. 16.1</td>
										</tr>
										<tr>
											<td>Automatic White Balance</td>
											<td>YES</td>
										</tr>
										<tr>
											<td>White balance: preset selection</td>
											<td>Daylight, Shade, Cloudy, Incandescent, Fluorescent, Flash</td>
										</tr>
										<tr>
											<td>White balance: custom setting</td>
											<td>YES</td>
										</tr>
										<tr>
											<td>White balance: types of color temperature</td>
											<td>YES (G7 to M7,15-step) (A7 to B7,15-step)</td>
										</tr>
										<tr>
											<td>White balance bracketing</td>
											<td>NO</td>
										</tr>
										<tr>
											<td>ISO Sensitivity Setting</td>
											<td>ISO100 - 25600 equivalent</td>
										</tr>
									</table>
								</div>
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

    </body>
</html>