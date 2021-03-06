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
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/productInfo.js"></script>
        <script src="js/admin-productRequests.js"></script>
        <style >
            .desc{

                width  :500px;
                font-size: 12px;

            }
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Navigation & Logo-->
        <?php include 'Pages-Header.php'; ?>
		<?php
        if ($_SESSION["login_user"]["role"]!='admin') {
            header("location: page-login.php");
        }
        ?>
        <div class="row">
            <div class="col-md-8">
                <h2>Pending Requests</h2>
                <div class="table-responsive">
                    <table  class="shopping-cart" id ="pendingRequests">
                        <?php
                        $sql = "select * from products where status =1";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            ?>

                            <tr id="ProductRowID<?php echo $row["id"] ?>">

                                <td class="image"><img src="<?php echo $row["image_link"]; ?>"
                                                       alt="Item Name"></td>
                                <td>
                                    <div class="cart-item-title">
                                        <a
                                            href="page-product-details.php?product_id=<?php echo $row["id"] ?>"><?php echo $row["name"]; ?></a>
                                    </div>
                                    <div class="desc" id="desc<?php echo $row["id"] ?>" ondblclick="changeDescription(<?php echo $row["id"] ?>)"><?php echo $row["description"]; ?></div>

                                </td>

                                <td>

                                    <div class="feature">
                                        Product ID: <b><?php echo $row["id"] ?></b>
                                    </div>
                                    <div class="feature">
                                        Category: <b><?php echo $row["category"]; ?></b>
                                    </div>
                                    <div class="feature">
                                        Condition: <b><?php echo $row["pCondition"]; ?></b>
                                    </div>
                                    <div class="feature">
                                        Seller ID: <b><?php echo $row["FR_studentid"]; ?></b>
                                    </div>
                                    <div class="feature">
                                        Price: <b><?php echo $row["price"] . 'SAR' ?></b>
                                    </div>

                                </td>

                                <td>
                                    <div class="btn-group btn-group-lg">
                                        <button type="button" class="btn btn-success"
                                                onclick="acceptRequest(<?php echo $row["id"] ?>)">Accept</button>
                                        <button type="button" class="btn btn-danger"
                                                onclick="rejectRequest(<?php echo $row["id"] ?>)">Reject</button>

                                </td>


                            </tr>
<?php } ?>



                    </table>
                </div>

            </div>

            <div class="col-md-3">
                <h2>Transcript:</h2>
                <div class="table-responsive">
                    <table  class="table table-condensed table-bordered">

                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Product ID</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="transcript">













                        </tbody>


                    </table>

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
        <script src="js/productInfo.js"></script>

    </body>
</html>
