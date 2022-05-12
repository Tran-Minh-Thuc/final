<?php
return[
    'GetAllOrder' => function($conn,$CusID){
        $query = "SELECT * FROM `donhang`, `trangthai` WHERE donhang.customerid = $CusID AND trangthai.statusid = donhang.statusid";
        $result = mysqli_query($conn,$query);
        $data = array();
        while($row = mysqli_fetch_array($result)){
            $data[] = $row;
        }
        return $data;
    },
    'GetOrderDetail' => function($conn, $OrderID,$CusID){
        $query ="SELECT * FROM `ct_donhang` INNER JOIN `sanpham` ON ct_donhang.productid = sanpham.productid INNER JOIN `donhang` ON ct_donhang.orderid = donhang.orderid WHERE ct_donhang.orderid = $OrderID AND donhang.customerid = $CusID";
        $result = mysqli_query($conn, $query);
        $data  = array();
        while($row = mysqli_fetch_array($result)){
            $data[] = $row;
        }
        return $data;
    },
    'Amount' => function($conn, $idPro) {
        $query ="SELECT * FROM `sanpham` WHERE `productid` = $idPro";
        $result = mysqli_query($conn,$query);
        $data = array();
        while($row = mysqli_fetch_array($result)){
            $data[] = $row;
        }
        return $data;
    },
    'AddOrder' => function($conn, $Order) {
        $queryStr ="INSERT INTO `donhang`(`customerid`, `orderdate`, `ordertotal`,`statusid`) 
        VALUES (".$Order[0].",\"".date("Y-m-d")."\",".$Order[1].",".$Order[2].")";
        $id = -1;
        if (mysqli_query($conn, $queryStr)) {
            $last_id = mysqli_insert_id($conn);
            $id = $last_id;
          }
          return $id;
    },
    'AddDetail' => function($conn, $Detail) {
        $query ="INSERT INTO `ct_donhang`(`orderid`, `productid`, `orderamount`, `producttotal`, `productcost`) 
        VALUES (".$Detail[0].",".$Detail[1].",".$Detail[2].",".$Detail[3].",".$Detail[4].")";
        $result = mysqli_query($conn,$query);
        if(!$result) {
            return false;
        }
        return true;
    },
    'DecreaseVegetable' => function($conn, $ID,$Amount) {
        $query ="UPDATE `sanpham` SET `quantity`= `quantity` - $Amount WHERE `productid` = $ID";
        $result = mysqli_query($conn,$query);
        if(!$result) {
            return false;
        }
        return true;
    },
]
?>