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
        
echo '<div class="mainmenu-wrapper">
            <div class="container">
                <div class="menuextras">
                    <div class="extras">
                        <ul>';
    
if ((isset($_SESSION['login_user']))) {
    echo ' <li> <a href="page-account.php"><b><span class="glyphicon glyphicon-user"></span> Account</b></a></li>';
    echo '<li class="shopping-cart-items" id="number_of_items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="page-shopping-cart.php"><b>' . $_SESSION["number_of_items"] . ' items</b></a></li>';
    echo '<li>Welcome <b>' . $_SESSION["login_user"]['firstname'] . '</b></li> <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>';
} else {
    echo '<li> <a href="page-register.php"><b><span class="glyphicon glyphicon-new-window"></span> Register</b></a></li>';
    echo '<li><a href="page-login.php"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>';
}

echo'
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
                            <a href="page-shopping-cart.php">Buy</a>
                        </li>
                        <li>
                            <a href="sell.php">Sell</a>
                        </li>
                        <li>
                            <a href="myProducts.php">My Products</a>
                        </li>';
                       if ((isset($_SESSION['login_user']))) {
                        if ($_SESSION["login_user"]["role"]=='admin'){
                            echo    '<li>
                            <a href="admin-ProductRequests.php">Product Requests</a>
                                    </li>';
                        }
}
if(basename($_SERVER['PHP_SELF'])=="index.php"||basename($_SERVER['PHP_SELF'])=="search-results-page.php"){
    echo              '<li> <form class="navbar-form" role="search" action="search-results-page.php" method="GET">
                                <input type="text" class="form-control" placeholder="Search items" name="keyword" required>
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </form>
                       </li>';
}
                   echo '
                       </ul>
                </nav>
            </div>
        </div>';
?>

