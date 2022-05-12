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
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="id-form-login" method="POST" action="">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="email-login" id="email-login" class="form-control" placeholder="email">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password-login" id="password-login" class="form-control" placeholder="mật khẩu">
                        </div>
                        <!-- <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div> -->
                        <div class="form-group">
                            <input type="submit" value="đăng nhập" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        chưa có tài khoản?<a href="signup.php">đăng ký</a>
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
			$("#id-form-login").submit(function(event) {
                event.preventDefault(); //prevent default action 
                var post_url = $(this).attr("action"); //get form action url
				if ($("#email-login").val() && $("#password-login").val()){
					$.post("control/SignInSignUp.php", {
						EmailLoginCus: $("#email-login").val(),
						PasswordLoginCus: $("#password-login").val(),
					} 
                    , function(data) {
						$("#Result").html(data);
					});
				}
            });

		});
    </script>
</body>

</html>