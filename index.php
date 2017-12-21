<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php
    include "dbconnect.php";
    session_start();
    
    //check if cookie exist
    if ((!isset($_SESSION['login_user'])) && (isset($_COOKIE['login_user']))) {
        $_SESSION["login_user"] = unserialize($_COOKIE['login_user']);
    }
    
    if (!isset($_SESSION["number_of_items"])) {
        $_SESSION["number_of_items"] = 0;
    }


    // items display based on pagenumber 
    if (!isset($_GET["pageNumber"])) {
        $_GET["pageNumber"] = 1;
        $sql = "SELECT * FROM products limit 0, 6";  //where status = 2; INCLUDE LATER
    } else {
        $sql = "SELECT * FROM products limit " . (intval($_GET["pageNumber"]) - 1) * 6 . ", 6"; //where status = 2; INCLUDE LATER
    }
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
        <?php include 'Pages-Header.php';?>

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
                <div class="pagination-wrapper ">
                    <ul class="pagination pagination-lg">
                        <?php
                        $sql = "SELECT count(*) FROM products";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        
                        //this to get number of pages based on the displayed products number
                        $NumberOfPages = ceil($row['count(*)']/6);
                        
                        //to get prev/next pages
                        $currentpage = $_GET["pageNumber"];
                        if ($currentpage == 1) {
                            $nextpage = $currentpage + 1;
                            $prevpage = $NumberOfPages;
                        } else if ($currentpage == $NumberOfPages) {
                            $nextpage = 1;
                            $prevpage = $currentpage - 1;
                        } else {
                            $nextpage = $currentpage + 1;
                            $prevpage = $currentpage - 1;
                        }
                        ////The dynamic pagging navigator 
                        echo '<li><a href="index.php?pageNumber=' . $prevpage . '">Previous</a></li>';
                        for ($x = 1; $x <= $NumberOfPages; $x++) {
                         if ($currentpage == $x) {
                            echo '<li class="active"><a href="index.php?pageNumber='.$x.'">'.$x.'</a></li>';
                        } else
                            echo '<li><a href="index.php?pageNumber='.$x.'">'.$x.'</a></li>';
                            } 
                        echo '<li><a href="index.php?pageNumber=' . $nextpage . '">Next</a></li>';
                        ?>
                    </ul>
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