<?php
session_start();
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
    $url = "https://";   
} else  {
        $url = "http://";
    }
    $url.= $_SERVER['HTTP_HOST'];  
    $url.= $_SERVER['REQUEST_URI'];   
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $idOrder = $params['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- main css -->
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/styleCart2.css" />

</head>
<body  style="margin:0">
    <!-- navbar -->
    <?php include 'navbar-SC.php' ?>
    <!-- end of navbar-->
    <!-- page hero -->
    <section class="page-hero">
        <div class="section-center">
            <h3 class="page-hero-title">Trang chủ / Chi tiết đơn hàng</h3>
        </div>
    </section>
<div style="margin-top:50px;margin-left:60px;" class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-right">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require_once('connect.php');
                        if(isset($_SESSION['Email'])){
                                ['GetOrderDetail' => $func] = require 'model/order.php';
                                $Order = $func($conn,$idOrder,$_SESSION['CusID']);
                                for($i=0;$i<count($Order);$i++) {   
                                echo "
                                    <tr>
                                       <td class=\"element-cart-detail\">".$Order[$i]['orderid']."</td>
                                       <td class=\"element-cart-detail\"><img style=\" width: 50px; height: 50px;\" src=\"imgEC/".$Order[$i]['productimage']."\" /> </td>
                                       <td class=\"element-cart-detail\">".$Order[$i]['productname']."</td>
                                       <td class=\"element-cart-detail text-center\">".number_format(intval($Order[$i]['productcost']), 0, '', '.')."VND</td>
                                        <td style=\"float: right;\" class=\" element-cart-detail text-right\">
                                        <input disabled style=\"width:90px;text-align:center;\" class=\" form-control\" type=\"text\" 
                                        value=\"".$Order[$i]['orderamount']."\" /></td>
                                        <td></td>
                                    </tr>
                                    ";
                                }
                            }

                    ?>
                        <tr>
                        </tr>
                        <?php
                        require_once('connect.php');
                        $Total = 0;
                        if(isset($_SESSION['Email'])){
                                ['GetOrderDetail' => $func] = require 'model/order.php';
                                $Order = $func($conn,$idOrder,$_SESSION['CusID']);
                                $Temp = 0;
                                for($i=0;$i<count($Order);$i++) {
                                    $Total += $Order[$i]['productcost'] * $Order[$i]['orderamount'];
                                    $Temp += $Order[$i]['orderamount'];
                                }
                                echo "
                                    <tr>
                                        <td></td>
                                        <td></td>                                    
            
                                        <td><strong>Total</strong></td>
                                        <td style=\"margin: 0px 1px 0px 76px;\" class=\"text-center\"><strong style=\"margin: -1px 0px 0px 76px;\">".number_format(intval($Total),0,'','.')." VND</strong></td>
                                        <td style=\"float: right;margin: 0px 140px 0px 0px;\" class=\"text-right\"><strong>".$Temp."</strong></td>
                                    </tr>
                                    ";
                            }
                        require_once('close.php');
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'cart.php' ?>
    <!-- footer -->
    <?php include 'footer.php' ?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="./js/app.js"></script>
</body>
</html>