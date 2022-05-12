<?php
    session_start();
    $res = "";
    require_once('../connect.php');
    if(isset($_POST["EmailLoginCus"])){
        $EmailLoginCus = $_POST["EmailLoginCus"];
        $PasswordLoginCus = $_POST["PasswordLoginCus"];
        ['GetByCusIDvsPW' => $func] = require '../model/user.php';
        $Cus = $func($conn,$EmailLoginCus,$PasswordLoginCus);
        if(!empty($Cus)) {
            $_SESSION['CusID']=$Cus[0][0];
            $_SESSION['Email']=$Cus[0][2];
            echo "<script>window.location.replace((window.location.href).split('/').slice(0, -1).join('/') + '/index.php');</script>";
        } else {
            echo "<script>alert('Không tìm thấy tài khoản !');window.location.replace((window.location.href).split('/').slice(0, -1).join('/') + '/signin.php');</script>";
        }
    } else if(isset($_POST["EmailSignUpCus"])) {
        $NameCus = $_POST["NameCus"];
        $EmailSignUpCus = $_POST["EmailSignUpCus"];
        $PasswordSignUpCus = $_POST["PasswordSignUpCus"];
        $PhoneNumberCus = $_POST["PhoneNumberCus"];
        $AddressCus = $_POST["AddressCus"];
        $SexCus = $_POST["SexCus"];
        ['AddCus' => $func] = require '../model/user.php';
        $Cus = $func($conn,array($NameCus,$EmailSignUpCus,$PasswordSignUpCus,$PhoneNumberCus,$AddressCus,$SexCus));
        if($Cus) {
            echo "<script>alert('Success !');window.location.replace((window.location.href).split('/').slice(0, -1).join('/') + '/signin.php');</script>";
        } else {
            echo "<script>alert('Failed !');</script>";
        }
    }
    require_once('../close.php');
    ?>