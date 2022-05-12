<?php
return[
    'GetAll' => function($conn) {
        $query ="SELECT * FROM `sanpham`";
        $result = mysqli_query($conn,$query);
        $data = array();
        while($row = mysqli_fetch_array($result)){
            $data[] = $row;
        }
        return $data;
    },
    'SearchProducts' => function($conn,$Name,$Cate, $MinCost, $MaxCost) {
        $condition1 = " = ";
        if (empty($Cate)) {
            $condition1 = " <> ";
            $Cate = 0;
        }
        $query = "SELECT * FROM `sanpham` WHERE (sanpham.categoryid".$condition1.$Cate." AND (sanpham.productcost BETWEEN $MinCost AND $MaxCost) AND sanpham.productname LIKE '%".$Name."%')";
        $result = mysqli_query($conn,$query);
        $data = array();
        while($row = mysqli_fetch_array($result)){
            $data[] = $row;
        }
        return $data;
    },
    'GetProductDetail' => function($conn, $ProductID){
        $query ="SELECT * FROM `sanpham` INNER JOIN `trangthai` ON sanpham.statusid = trangthai.statusid WHERE sanpham.productid = $ProductID";
        $result = mysqli_query($conn, $query);
        $data  = array();
        while($row = mysqli_fetch_array($result)){
            $data[] = $row;
        }
        return $data;
    },
]
?>