<?php
session_start();
    $res = "";
    require_once('../connect.php');
    $IDProduct = $_POST["IDProduct"];
    ['Amount' => $func] = require '../model/order.php';
    $Pro = $func($conn,$IDProduct);
    $res = "";
    $amount2 = 1;
    $index = -1 ;
    if(isset($_SESSION['cart'])){
        if(count($_SESSION['cart']) != 0) {
            for($i=0;$i<count($_SESSION['cart']);$i++) {
                if($_SESSION['cart'][$i][0] == $Pro[0]['productid']) {
                    $index = $i;
                    $amount2 += $_SESSION['cart'][$i][1];
                }
            }   
            if($index == -1) {
                if($Pro[0]['quantity'] != 0){
                    array_push($_SESSION['cart'],array($Pro[0]['productid'],1,$Pro[0]['productcost'],$Pro[0]['productname'],$Pro[0]['productcost'],$Pro[0]['productimage']));
                    $res .= "<script>alert('Sản Phẩm đã được thêm vào giỏ !');</script>";
                } else{
                    $res .= "<script>alert('Sản phẩm hiện tại đã hết hàng, vui lòng chọn sản phẩm khác !');</script>";
                }
            } else {
                if($Pro[0]['quantity'] - $amount2 > 0) {
                    $_SESSION['cart'][$index][1] = $amount2;
                    $_SESSION['cart'][$index][2] = $amount2 * $Pro[0]['productcost'];
                    $res .= "<script>alert('Sản Phẩm đã được thêm vào giỏ !');</script>";
                } else {
                    $res .= "<script>alert('Sản phẩm hiện tại đã hết hàng, vui lòng chọn sản phẩm khác !');</script>";
                }
            }
        } else {
            if($Pro[0]['quantity'] != 0){
                $_SESSION['cart'] = array();
                array_push($_SESSION['cart'],array($IDProduct,1,$Pro[0]['productcost'],$Pro[0]['productname'],$Pro[0]['productcost'],$Pro[0]['productimage']));
                $res .= "<script>alert('Sản Phẩm đã được thêm vào giỏ !');</script>";
            } else {
                $res .= "<script>alert('Sản phẩm hiện tại đã hết hàng, vui lòng chọn sản phẩm khác !');</script>";
            }
        }
    } else {
        if($Pro[0]['quantity'] != 0){
            $_SESSION['cart'] = array();
            array_push($_SESSION['cart'],array($IDProduct,1,$Pro[0]['productcost'],$Pro[0]['productname'],$Pro[0]['productcost'],$Pro[0]['productimage']));
            $res .= "<script>alert('Sản Phẩm đã được thêm vào giỏ !');</script>";
        } else {
            $res .= "<script>alert('Sản phẩm hiện tại đã hết hàng, vui lòng chọn sản phẩm khác !');</script>";
        }
    }
    require_once('../close.php');
    echo $res;
    // $_SESSION['cart'] = array();