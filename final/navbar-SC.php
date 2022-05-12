<nav class="navbar page">
    <div class="nav-center">
        <!-- links -->
        <div>
            <button class="toggle-nav">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-links">
                <li>
                    <a href="index.php" class="nav-link"> trang chủ </a>
                </li>
                <li>
                    <a href="products.php" class="nav-link"> sản phẩm </a>
                </li>
                <li>
                    <a href="about.php" class="nav-link"> chúng tôi</a>
                </li>
                <li>
                <a href="history-index.php" class="nav-link"> lịch sử </a>
                </li>
            </ul>
        </div>
        <!-- logo -->
        <img src="./assets/logo-black.svg" class="nav-logo" alt="logo" />


        <?php if (isset($_SESSION['Email'])) {
            echo "<div class=\"toggle-container\"> <a href=\"logout.php\"> <button class=\"toggle-signIn toggle-signIn2 \"> <i class=\"fas fa-arrow-alt-circle-right\"></i>   </button></a> </div>";
        } else {
            echo "<div class=\"toggle-container\"> <a href=\"signin.php\"> <button class=\"toggle-signIn toggle-signIn2 \"> <i class=\"fas fa-user\"></i> </button></a> </div>";
        } ?>

        <!-- cart icon -->

        <?php
        $AllProducts = 0;
        $Temp = 0;
        if (isset($_SESSION['cart'])) {
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                $Temp += $_SESSION['cart'][$i][1];
            }
            $AllProducts =  number_format(intval($Temp), 0, '', '.');
        }
        if ($AllProducts != 0) {
            echo "<div class=\"toggle-container\"> <button class=\"toggle-cart toggle-cart2\"> <i class=\"fas fa-shopping-cart\"></i> </button> <span class=\"cart-item-count\">$AllProducts</span> </div>";
        } else {
            echo "<div class=\"toggle-container\"> <button class=\"toggle-cart toggle-cart2\"> <i class=\"fas fa-shopping-cart\"></i> </button> <span class=\"cart-item-count\">0</span> </div>";
        }
        ?>
            <!-- <div class="toggle-container">
                <button class="toggle-cart toggle-cart2">
                    <i class="fas fa-shopping-cart"></i>
                </button>
                <span class="cart-item-count">1</span>
            </div> -->
    </div>
</nav>