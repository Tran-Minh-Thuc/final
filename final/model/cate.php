<?php
return[
    'GetAll' => function($conn) {
        $query ="SELECT * FROM `danhmuc`";
        $result = mysqli_query($conn,$query);
        $data = array();
        while($row = mysqli_fetch_array($result)){
            $data[] = $row;
        }
        return $data;
    },
]
?>