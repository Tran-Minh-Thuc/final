<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home || Comfy Store</title>
    <!-- normalize  -->
    <link rel="stylesheet" href="./css/normalize.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- main css -->
    <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>
<div id="Result"></div>
    <!-- navbar -->
    <?php include 'navbar-index.php' ?>
    <!-- hero -->
    <section class="hero">
        <div class="hero-container">
            <h1 class="text-slanted">rest, relax, unwind</h1>
            <h3 class="text-slanted">embrace your choices - we do</h3>
            <a href="./products.php" class="btn hero-btn text-slanted">
                shop now
            </a>
        </div>
    </section>

    <!-- featured products -->
    <section class="section featured">
        <div class="title">
            <span></span>
            <h2>featured</h2>
            <span></span>
        </div>
        <div class="section-center featured-center">

            <!-- single product -->
            <?php

            require_once('../final/connect.php');
            ['GetAll' => $func] = require '../final/model/product.php';
            $data = $func($conn);
            require_once('../final/close.php');
            $res = "";
            for ($i = 0; $i < 3; $i++) {
                $price1 =  number_format(intval($data[$i]['productcost']), 0, '', '.');
                $res .= "<article class=\"product\">
                <div class=\"product-container\"> 
                <img src=\"imgEC/" . $data[$i]['productimage'] . "\" class=\"product-img img\" alt=\"\" /> 
                <div class=\"product-icons\"> 
                <a href=\"single-product.php?id=" . $data[$i]['productid'] . "\" class=\"product-icon\"> 
                <i class=\"fas fa-search\"></i> </a> 
                <button class=\"product-cart-btn product-icon\" onclick=\"buyProduct(" . $data[$i]['productid'] . ")\" data-id=\"1\"> <i class=\"fas fa-shopping-cart\"></i> 
                </button> 
                </div> 
                </div> 
                <footer> 
                <h5 class=\"product-name\">" . $data[$i]['productname'] . "</h5> 
                <span class=\"product-price\">$price1   VND</span> 
                </footer> 
                </article>
                        ";
            }
            echo $res;
            ?>
            <!-- end of single product -->
        </div>
        <a href="products.php"  class="btn"> Tất cả </a>
    </section>
    <!-- sidebar -->
    <?php include 'slidebar-overlay.php' ?>

    <!-- end of sidebar -->
    <!-- cart -->
    <?php include 'cart.php' ?>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <form id="FormBuyProduct" method="POST" action="">
        <input type="hidden" id="IDProduct" name="IDProduct" value="">
        <button type="submit" id="BtnBuyProduct" style="display:none;"></button>
    </form>
    <!-- app.js -->
    <script src="./js/app.js"></script>
    <script>
        function buyProduct(idProduct) {
            $("#IDProduct").val(idProduct);
            $("#BtnBuyProduct").click();
        }
        $("#FormBuyProduct").submit(function(event) {
            event.preventDefault(); //prevent default action 
            var post_url = $(this).attr("action"); //get form action url
            var value = $("#IDProduct").val();
            $.post("./control/cart.php", {
                IDProduct: $("#IDProduct").val()
            }, function(data) {
                $("#Result").html(data);
            });
        });
    </script>
</body>

</html>