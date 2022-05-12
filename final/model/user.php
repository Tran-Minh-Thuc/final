<?php
    return[
        'GetByCusID' => function($conn,$CusMail) {
            $query ="SELECT * FROM `khachhang` WHERE `email` = \"".$CusMail."\"";
            $result = mysqli_query($conn,$query);
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[] = $row;
            }
            return $data;
        },
        'GetByCusIDvsPW' => function($conn,$CusMail,$PW) {
            $query ="SELECT * FROM `khachhang` WHERE `email` = \"".$CusMail."\" AND `password` = \"".$PW."\"";
            $result = mysqli_query($conn,$query);
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[] = $row;
            }
            return $data;
        },
        'AddCus' => function($conn, $Cus){
            $query = "INSERT INTO `khachhang`(`fullname`,`email`,`password`,`phonenumber`,`address`,`gender`) VALUES(\"".$Cus[0]."\",\"".$Cus[1]."\",\"".$Cus[2]."\",\"".$Cus[3]."\",\"".$Cus[4]."\",\"".$Cus[5]."\")";
            $result = mysqli_query($conn, $query);
            if($result){return true;}
            else{return false;}
        },
    ]
?>