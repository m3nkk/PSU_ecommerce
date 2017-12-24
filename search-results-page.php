<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->


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

        if (!isset($_GET["keyword"])) {
            header("location: index.php");
        }
        $sql = "SELECT * FROM products WHERE status=2 AND (products.name LIKE '%" . $_GET["keyword"] . "%' OR products.description LIKE '%" . $_GET["keyword"] . "%' OR products.short_description LIKE '%" . $_GET["keyword"] . "%')";
        $result = $conn->query($sql);
        ?>


        <!-- Page Title -->
        <div class="section section-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Search Results</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-sm-4 ellipsis">
                                <div class="shop-item">
                                    <div class="image">
                                        <a href="page-product-details.php?product_id=<?php echo $row["id"] ?>"><img src="<?php echo $row["image_link"] ?>" alt="Item Name" style="height:80%;width:80%;"></a>
                                    </div>
                                    <div class="title">
                                        <h3><a href="page-product-details.php?product_id=<?php echo $row["id"] ?>"><?php echo $row["name"] ?></a></h3>
                                    </div>
                                    <div class="price">
                                        SAR&nbsp;<?php echo $row["price"] ?> 
                                    </div>
                                    <div class="description ellipsis">
                                        <p class= "ellipsis"><?php echo $row["short_description"] ?></p>
                                    </div>

                                    <div class="actions">

                                        <a href="page-product-details.php?product_id=<?php echo $row["id"] ?>"class='btn'><i class='icon-shopping-cart icon-white'></i> Product Info</a>


                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>
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
                    } else if (document.getElementById("UserID").value.toString().length != 9) {
                        alert('Invalid input!');
                        return false;
                    }
                    return true
                }
            </script>
    </body>
</html>