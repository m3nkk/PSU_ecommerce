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

        if (isset($_SESSION["login_user"])) {
            header("location: index.php");
        }
        ?>


        <!-- Page Title -->
        <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Forgot Password</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="basic-login">
                            <form role="form" method="POST" action="ForgetMyPassword.php" onsubmit="return validate_forgot();">
                                <div class="form-group">
                                    <?php if ((isset($_GET['success_message']))) {
                                        echo '<div class="alert alert-success" style="size: 10px">Please check your email to reset password!</div>';
                                     } 
                                     if ((isset($_GET['error_message']))) {
                                         if($_GET['error_message']=="error"){
                                        echo '<div class="alert alert-danger" style="size: 10px">Problem in Sending Password Recovery Email</div>';
                                         }
                                         else if($_GET['error_message']=="error2"){
                                        echo '<div class="alert alert-danger" style="size: 10px">ID is not resigtered</div>';
                                         }
                                     }
                                     
                                     ?>
                                    <label for="restore-email"><i class="icon-envelope"></i> <b>Enter Your ID</b></label>
                                    <input class="form-control" id="UserID" type="text" name="UserID" placeholder="Enter Your ID" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn pull-right" onkeypress="">Reset Password</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
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
        <script>
    function validate_forgot() {
        if ((document.getElementById("UserID").value == "")) {
            alert('ID is required!');
            return false;
        }else if(document.getElementById("UserID").value.toString().length!=9){
            alert('Invalid input!');
            return false;
        }
        return true
    }
</script>
    </body>
</html>