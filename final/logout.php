<?php
session_start();
unset($_SESSION['CusID']);
unset($_SESSION['Email']);
echo "<script>window.location.replace((window.location.href).split('/').slice(0, -1).join('/') + '/index.php');</script>";