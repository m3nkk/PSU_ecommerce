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
        <script src="Shopping-Cart.js"></script>
    </head>
    <body>
        <!-- Navigation & Logo-->
        <?php include 'Pages-Header.php';
         if (!isset($_SESSION["login_user"])) {
            header("location: page-login.php");
        }
        
        $sql="";
        if (isset($_SESSION["number_of_items"]) && isset($_SESSION["shopping_cart"]) && ($_SESSION["number_of_items"]!=0)) {
            $sql = "select * from products where ";
            foreach ($_SESSION["shopping_cart"] as $Product){
                $sql = $sql . " id = " . $Product['product_id'] . " or ";
                }
         $sql =chop($sql," or ");
        }
        ?>

        

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
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- Shopping Cart Items -->
						<table class="shopping-cart">
                                                        <?php
                                                        $total = 0;
                                                        if($sql!=""){
                                                        $result = $conn->query($sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                $total +=  $row["price"];
                                                                ?>
							<!-- Shopping Cart Item -->
							<tr id="ProductRowID<?php echo $row["id"] ?>" >
								<!-- Shopping Cart Item Image -->
								<td class="image"><a href="page-product-details.php?product_id=<?php echo $row["id"] ?>"><img src="<?php echo $row["image_link"]; ?>" alt="Item Name"></a></td>
								<!-- Shopping Cart Item Description & Features -->
								<td>
                                                                        <?php
                                                                        $sql2="select * from users where studentid='".$row["FR_studentid"]."'";
                                                                        $result2 = $conn->query($sql2);
                                                                        $row2 = $result2->fetch_assoc();
                                                                        $fullName = $row2['firstname']." ".$row2['lastname'];
                                                                        ?>
									<div class="cart-item-title"><a href="page-product-details.php?product_id=<?php echo $row["id"] ?>"><?php echo $row["name"]; ?></a></div>
                                                                        <div class="feature">Category: <b><?php echo $row["category"]; ?></b></div>
                                                                        <div class="feature">Condition: <b><?php echo $row["pCondition"]; ?></b></div>
									<div class="feature">Seller Name (ID): <b><?php echo $fullName.' ('.$row["FR_studentid"].')'; ?></b></div>
                                                                        <div class="feature">Seller Email: <b><?php echo $row2["email"]; ?></b></div>
                                                                        <div class="feature">Seller Number: <b>+<?php echo $row2["number"]; ?></b></div>
								</td>
								
								<!-- Shopping Cart Item Price -->
								<td class="price" id="ProductPriceID<?php echo $row["id"] ?>"><?php echo $row["price"] .'SAR' ?></td>
								<!-- Shopping Cart Item Actions -->
								<td class="actions">
                                                                        <a onclick="RemoveFromCartRequst(<?php echo $row["id"];echo ",".$_SESSION["number_of_items"]; ?>)" class="btn btn-xs btn-grey"> <i class="glyphicon glyphicon-trash"></i></a>
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
						
					</div>
					<!-- Shipment Options -->
					<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
						
					</div>
					
					<!-- Shopping Cart Totals -->
					<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
						<table class="cart-totals">
							
							<tr>
								<td><b>Discount</b></td>
								<td>- 0 SAR</td>
							</tr>
							<tr class="cart-grand-total">
								<td><b>Total</b></td>
								<td id="Total"><b><?php echo $total ?> SAR</b></td>
							</tr>
						</table>
						<!-- Action Buttons -->
						<div class="pull-right">
							<a href="" class="btn btn-grey"><i class="glyphicon glyphicon-refresh"></i> UPDATE</a>
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
        <script src="Shopping-Cart.js"></script>
    </body>
</html>