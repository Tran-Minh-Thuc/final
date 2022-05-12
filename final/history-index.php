<?php
session_start();
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
    <link rel="stylesheet" href="./css/styleCart2.css" />
    <link rel="stylesheet" href="./css/styles.css" />


</head>
<body style="margin:0">
    <!-- navbar -->
    <?php include 'navbar-SC.php' ?>
    <!-- end of navbar-->
    <!-- page hero -->
    <section class="page-hero">
        <div class="section-center">
            <h3 class="page-hero-title">Trang chủ / Lịch sử mua hàng</h3>
        </div>
    </section>  
<div style="margin-top:50px;margin-left:60px;" class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr >
                            <th class=" element-cart-detail" scope="col">#</th>
                            <th class=" element-cart-detail" scope="col">Date</th>
                            <th class=" element-cart-detail" scope="col" class="text-center">Total</th>
                            <th class=" element-cart-detail" scope="col" class="text-right">Tình trạng</th>
                            <th class=" element-cart-detail" scope="col" class="text-right">Detail</th>
                        </tr>
                        <!-- <tr>
                                        <td>".$Order[$i]['OrderID']."</td>
                                        <td>".$Order[$i]['Date']."</td>
                                        <td class="text-center">".number_format(intval($Order[$i]['Total']), 0, '', '.')." VND</td>
                                        <td class="text-right"><button class="btn btn-sm btn-danger"><a style="color:white;" href="detail.php?id="><i class="fas fa-calendar-week"></i></a></button></td>
                                    </tr> -->
                    </thead>
                    <tbody>
                    <?php

                            require_once('connect.php');
                            if(isset($_SESSION['Email'])){
                                  ['GetAllOrder' => $func] = require 'model/order.php';
                                  $Order = $func($conn,$_SESSION['CusID']);
                                  for($i=0;$i<count($Order);$i++) {              
                                    echo "
                                    <tr class=\"element-cart-details\">
                                        <td class=\"element-cart-detail\">".$Order[$i]['orderid']."</td>
                                        <td class=\"element-cart-detail\">".$Order[$i]['orderdate']."</td>
                                        <td class=\"element-cart-detail text-center\">".number_format(intval($Order[$i]['ordertotal']), 0, '', '.')." VND</td>
                                        <td class=\"element-cart-detail\">".$Order[$i]['statusname']."</td>
                                        <td class=\"element-cart-detail text-right\"><button class=\"btn btn-sm btn-danger\"><a style=\"color:white;\" href=\"detail-cart.php?id=".$Order[$i]['orderid']."\"><i class=\"fas fa-calendar-week\"></i></a></button></td>
                                    </tr>
                                    ";
                                }
                              }
                              require_once('close.php');
                              ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <!-- sidebar -->
    <!-- end of sidebar -->
    <!-- cart -->
    <?php include 'cart.php' ?>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- app.js -->
<script src="./js/app.js"></script>
</body>
</html>