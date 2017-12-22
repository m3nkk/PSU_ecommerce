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
        <script src="register.js"></script>
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Navigation & Logo-->
        <?php
        include 'Pages-Header.php';
        if (isset($_SESSION["login_user"])) {
            header("location: index.php");
        }
        ?>
        <!-- Page Title -->
        <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Register</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">


	    	<div class="container" style="margin: 0 30%;">
				<div class="row">
					<div class="col-sm-7">
						<div class="basic-login">
							<form role="form" method="post" action="register.php">
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Student ID</b></label>
                                                                <input class="form-control" id="reg_studentid" name="reg_studentid" type="number" placeholder="PSU ID Here" onchange="getIdRequest()"  required>
                                                                        <p id ="idMessage"></p> 
									
								</div>
								<div class="form-group">
		        				 	<label for="register"><i class="icon-lock"></i> <b>Password</b></label>
									<input class="form-control" id="reg_password" name="reg_password" type="password" placeholder="Password" required>
								</div> 
								<div class="form-group">
		        				 	<label for="register"><i class="icon-lock"></i> <b>First Name</b></label>
									<input class="form-control" id="reg_firstName" name="reg_firstName" type="text" placeholder="First Name" required>
								</div>
								<div class="form-group">
		        				 	<label for="register"><i class="icon-lock"></i> <b>Last Name</b></label>
									<input class="form-control" id="reg_lastName" name="reg_lastName" type="text" placeholder="Last Name" required>
								</div>
								<div class="form-group">
		        				 	<label for="register"><i class="icon-lock"></i> <b>Phone Number</b></label>
									<input class="form-control" id="reg_phone" name="reg_phone" type="number" placeholder="966*********" onchange="getPhoneRequest()" required>
									<p id ="phoneMessage"></p> 
								</div>
								<div class="form-group">
		        				 	<label for="register"><i class="icon-lock"></i> <b>Email</b></label>
									<input class="form-control" id="reg_email" name="reg_email" type="email" placeholder="" disabled>
									 
								</div>
								<div class="form-group">
                                 <button type="submit" class="btn pull-right" id="submitBtn" disabled>Register</button>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
					<div></div>
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

    </body>
    <script src="register.js"></script>
</html>