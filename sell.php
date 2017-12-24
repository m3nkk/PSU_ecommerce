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
        <?php include 'Pages-Header.php';
        if (!isset($_SESSION["login_user"])) {
            header("location: page-login.php");
        }
        ?>

        <!-- Page Title -->
        <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>List a product</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container" style="margin: 0 30%;">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="basic-login">
                            <form role="form" method="post" action="listProduct.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="product-name"><i class="icon-user"></i> <b>Name</b></label>
                                    <input class="form-control" id="prod_name" name="prod_name" type="text" placeholder="" onchange="getIdRequest()" required>
                                </div>
                                <div class="form-group">
                                    <label for="product-desc"><i class="icon-lock"></i> <b>Description</b></label>
                                    <input class="form-control" id="prod_desc" name="prod_desc" type="text" placeholder="" required>
                                </div> 
                                <div class="form-group">
                                    <label for="product-short-desc"><i class="icon-lock"></i> <b>Short Description</b></label>
                                    <input class="form-control" id="prod_short-desc" name="prod_short-desc" type="text" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="product-price"><i class="icon-lock"></i> <b>Price</b></label>
                                    <input class="form-control" id="prod_price" name="prod_price" type="number" step="0.01" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="product-Image"><i class="icon-lock"></i> <b>Image</b></label>
                                    <input class="form-control" type="file" name="image" required>
                                </div>
                                <div class="form-group">
                                    <label for="product-condition"><i class="icon-lock"></i> <b>Condition</b></label>
                                    <select class="form-control" id="condition" name="condition">
            								<option value="new">New</option>
            								<option value="used">Used</option>
							   	   </select>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="category" value="Book" checked> Book<br>
                                    <input type="radio" name="category" value="Code"> Code<br>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn pull-right">List</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include 'Pages-Footer.php';?>

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