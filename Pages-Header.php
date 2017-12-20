<?php

echo '<div class="mainmenu-wrapper">
            <div class="container">
                <div class="menuextras">
                    <div class="extras">
                        <ul>
                            <li>
                                <div class="dropdown choose-country">
                                    <a class="#" data-toggle="dropdown" href="#"><img src="img/flags/sa.png" alt="Saudi Arabia"> KSA</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li role="menuitem"><a href="#"><img src="img/flags/us.png" alt="United States"> US</a></li>
                                    </ul>
                                </div>
                            </li>';

if ((isset($_SESSION['login_user']))) {
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
                            <a href="#">Buy</a>
                        </li>
                        <li>
                            <a href="sell.php">Sell</a>
                        </li>
                        <li>
                            <a href="#">My Products</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>';
?>

