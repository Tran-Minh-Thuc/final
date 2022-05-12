<?php
    session_start();
    // $idCustomer = $_SESSION['customerID'];
    $IDCus = $_POST["IDCus"];
    $res = "";
    require_once('../connect.php');
    if(isset($_SESSION['CusID'])){
        if(isset($_SESSION['cart'])){
            $total = 0;
            for($i=0;$i<count($_SESSION['cart']);$i++) {
                $total += $_SESSION['cart'][$i][2];
            }
            ['AddOrder' => $func] = require '../model/order.php';
            $Order = $func($conn,array($IDCus,$total,3));
            if($Order != -1){
                ['AddDetail' => $func2] = require '../model/order.php';
                ['DecreaseVegetable' => $func3] = require '../model/order.php';
                for($i=0;$i<count($_SESSION['cart']);$i++) {
                    $Order2 = $func2($conn,array($Order,$_SESSION['cart'][$i][0],$_SESSION['cart'][$i][1],$_SESSION['cart'][$i][2],$_SESSION['cart'][$i][4]));
                    $Decrease = $func3($conn,$_SESSION['cart'][$i][0],$_SESSION['cart'][$i][1]);
                }
                $res .= "<script>alert('Bạn đã mua hàng thành công !');location.reload();</script>";
                $_SESSION['cart'] = array();
            } else {
                $res .= "<script>alert('Đã có lỗi trong quá trình xác nhận đơn hàng, vui lòng thử lại !');</script>";
            }
        }
    } else {
        $res .= "<script>alert('Vui lòng đăng nhập tài khoản để mua hàng !');</script>";
    }
    require_once('../close.php');
    echo $res;
    