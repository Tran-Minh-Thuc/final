<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || Comfy Store</title>
    <!-- normalize  -->
    <link rel="stylesheet" href="./css/normalize.css" />
    <!-- font awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- main css -->
    <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>

    <!-- navbar -->
    <?php include 'navbar-SC.php' ?>
    <!-- end of navbar-->
    <!-- page hero -->
    <section class="page-hero">
        <div class="section-center">
            <h3 class="page-hero-title">Trang chủ / Sản Phẩm</h3>
        </div>
    </section>
    <!-- products -->
    <section class="products">
        <!-- filters -->
        <form action="" method="POST" id="form-search-product">
            <div class="filters">
                <div class="filters-container">
                    <!-- search -->
                    <input type="text" class="search-input" name="Search-name-product" id="Search-name-product" onkeyup="search()" placeholder="Tìm kiếm..." />
                    <!-- categories -->
                    <h5>Tên sản phẩm </h5>
                    <select name="type-product" onchange="search()" id="type-product" class="Type-search form-control">
                        <option value="0" class="company-btn">Tất cả</option>
                        <?php
                        require_once('../final/connect.php');
                        ['GetAll' => $func] = require '../final/model/cate.php';
                        $Cate = $func($conn);

                        $res = "";
                        for ($i = 0; $i < count($Cate); $i++) {
                            $res .= "
                            <option  value=\"" . $Cate[$i]['categoryid'] . "\" class=\"company-btn\">" . $Cate[$i]['categoryname'] . "</option>
                            ";
                        }
                        echo $res;
                        ?>
                    </select>
                    <!-- price -->
                    <h5>Giá (VND)</h5>
                    <div class="min-max">
                        <div class="min">
                            <label>Min:</label><span id="min-value" ></span>
                        </div>
                        <div class="max">
                            <label>Max:</label><span id="max-value" ></span>
                        </div>
                    </div>

                    <div class="min-max-range">
                        <input type="range" min="0" max="99999" class="range" value="0" onchange="search()" id="min-price">
                        <input type="range" min="1" max="100000" class="range" value="100000" onchange="search()" id="max-price">
                    </div>
                </div>
                <input type="submit" name="submit" value="Submit Form" id="btnSubmitSearch" style="visibility: hidden; opacity: 0;" />
            </div>
        </form>
        <!-- products -->
        <div id="result" class="products-container">
            <!-- single product -->
            <!-- single product -->
            <?php
            ['GetAll' => $func] = require '../final/model/product.php';
            $data = $func($conn);
            require_once('../final/close.php');
            $res = "";
            for ($i = 0; $i < count($data); $i++) {
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
    <script>
        var minSlider = document.getElementById('min-price');
        var maxSlider = document.getElementById('max-price');

        var outputMin = document.getElementById('min-value');
        var outputMax = document.getElementById('max-value');

        outputMin.innerHTML = minSlider.value;
        outputMax.innerHTML = maxSlider.value;

        minSlider.oninput = function() {
            outputMin.innerHTML = this.value;
        }

        maxSlider.oninput = function() {
            outputMax.innerHTML = this.value;
        }
    </script>
    <script>
        //search product 
        function search() {
            document.getElementById("btnSubmitSearch").click();
        }
        $(document).ready(function() {
            //submit form
            $("#form-search-product").submit(function(event) {
                event.preventDefault(); //prevent default action 
                var post_url = $(this).attr("action"); //get form action url
                // var request_method = $(this).attr("method"); //get form GET/POST method
                // var form_data = $(this).serialize(); //Encode form elements for submission
                // console.log(form_data);
                $.post("control/searchProduct.php", {
                    txtSearch: $("#Search-name-product").val(),
                    IdType: $("#type-product").val(),
                    IdCostMin:$("#min-price").val(),
                    IdCostMax:$("#max-price").val(),
                }, function(data) {
                    $("#result").html(data);
                });
            });
        });
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
    <script src="./js/app.js"></script>
</body>

</html>