<?php
    $conn = new mysqli("localhost","root","","caphe");
    mysqli_set_charset($conn,"UTF8");
    if($conn->connect_error){
        die("Fail: " . $conn->connect_error);
    }