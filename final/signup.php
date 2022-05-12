<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../final/css/style-sign-in.css">
</head>

<body>
    <div id="Result" class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign Up</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="id-form-signup" method="POST" action="">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="full-name-signup" id="full-name-signup" class="form-control" placeholder="Họ và tên">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email-signup" id="email-signup" class="form-control" placeholder="Email">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password-signup" id="password-signup" class="form-control" placeholder="Mật khẩu">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" name="phone-number-signup" id="phone-number-signup" class="form-control" placeholder="Số điện thoại">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-address-book"></i></span>
                            </div>
                            <input type="text" name="address-signup" id="address-signup" class="form-control" placeholder="Địa chỉ">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                            </div>
                            <select type="text" name="sex-signup" id="sex-signup" class="form-control" >
                                <option selected >Giới tính</option>
                                <option  value="Nam" class="company-btn">Nam</option>
                                <option value="Nữ" class="company-btn">Nữ</option>
                            </select>
                        </div>
                        <!-- <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div> -->
                        <div class="form-group">
                            <input type="submit" value="đăng ký" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        đã có tài khoản?<a href="signin.php">đăng nhập</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="../final/index.php">quay về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            //submit login
            $("#id-form-signup").submit(function(event) {
                event.preventDefault(); //prevent default action 
                var post_url = $(this).attr("action"); //get form action url
                if ($("#full-name-signup").val() && $("#email-signup").val() && $("#password-signup").val() && $("#phone-number-signup").val() && $("#address-signup").val()  && $("#sex-signup").val()) {
                    $.post("control/SignInSignUp.php", {
                        NameCus: $("#full-name-signup").val(),
                        EmailSignUpCus: $("#email-signup").val(),
                        PasswordSignUpCus: $("#password-signup").val(),
                        PhoneNumberCus: $("#phone-number-signup").val(),
                        AddressCus: $("#address-signup").val(),
                        SexCus: $("#sex-signup").val(),
                    }, function(data) {
                        $("#Result").html(data);
                    });
                }
            });

        });
    </script>
</body>

</html>