<?php
session_start();
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
}
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$idPro = $params['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Single Product || Comfy Store</title>
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
    <?php include 'navbar-SC.php' ?>
    <!-- end of navbar-->
    <!-- page hero -->
    <section class="page-hero">
        <div class="section-center">
            <h3 class="page-hero-title">Home / Single Product</h3>
        </div>
    </section>
    <!-- product info -->
    <?php
        require_once('../final/connect.php');
        ['GetProductDetail' => $func] = require '../final/model/product.php';
        $ProductDetail = $func($conn, $idPro);
        for ($i = 0; $i < count($ProductDetail); $i++) {
            $price1 =  number_format(intval($ProductDetail[$i]['productcost']), 0, '', '.');
            echo "
            <section class=\"single-product section\"> 
            <div class=\"section-center single-product-center\"> 
            <img src=\"imgEC/" . $ProductDetail[$i]['productimage'] . "\" class=\"single-product-img img\" alt=\"\" /> 
            <article class=\"single-product-info\"> 
            <div> 
            <h2 class=\"single-product-title\">" . $ProductDetail[$i]['productname'] . "</h2> 
            <p class=\"single-product-company text-slanted\">" . $ProductDetail[$i]['statusname'] . "</p> 
            <span class=\"single-product-price\">$price1 VND</span> 
            <div class=\"single-product-colors\"> <span class=\"product-color\"></span> 
            <span class=\"product-color product-color-red\"></span> 
            </div> 
            <p class=\"single-product-desc\"> " . $ProductDetail[$i]['productdesciption'] . " </p> 
            <button onclick=\"buyProduct(" . $ProductDetail[$i]['productid'] . ")\" class=\"addToCartBtn btn\" data-id=\"id\">add to cart</button> 
            </div> 
            </article> 
            </div> 
            </section>
            ";
        }
    ?>
    <!-- <section class="single-product section">
        <div class="section-center single-product-center">
            <img src="https://dl.airtable.com/.attachments/14ac9e946e1a02eb9ce7d632c83f742f/4fd98e64/product-1.jpeg" class="single-product-img img" alt="" />
            <article class="single-product-info">
                <div>
                    <h2 class="single-product-title">high-back bench</h2>
                    <p class="single-product-company text-slanted">by marcos</p>
                    <span class="single-product-price">$30.00</span>
                    <div class="single-product-colors">
                        <span class="product-color"></span>
                        <span class="product-color product-color-red"></span>
                    </div>
                    <p class="single-product-desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id,
                        modi? Minima libero doloremque necessitatibus! Praesentium
                        recusandae quod nesciunt animi voluptatem!
                    </p>
                    <button class="addToCartBtn btn" data-id="id">add to cart</button>
                </div>
            </article>
        </div>
    </section> -->
    <!-- sidebar -->
    <?php include 'slidebar-overlay.php' ?>
    <!-- end of sidebar -->
    <!-- cart -->
    <?php include 'cart.php' ?>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- app.js -->
    <form id="FormBuyProduct" method="POST" action="">
        <input type="hidden" id="IDProduct" name="IDProduct" value="">
        <button type="submit" id="BtnBuyProduct" style="display:none;"></button>
    </form>
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