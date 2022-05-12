<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About || Comfy Store</title>
    <!-- normalize  -->
    <link rel="stylesheet" href="./css/normalize.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- main css -->
    <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>
    <!-- navbar -->
    <?php include 'navbar-SC.php' ?>
    <!-- end of navbar-->
    <!-- page hero -->
    <section class="page-hero">
        <div class="section-center">
            <h3 class="page-hero-title">Trang chủ / Về chúng tôi</h3>
        </div>
    </section>
    <!-- about -->
    <section class="section section-center">
        <div class="title">
            <span></span>
            <h2>our history</h2>
            <span></span>
        </div>
        <p class="about-text">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat
            accusantium sapiente tempora sed dolore esse deserunt eaque excepturi,
            delectus error accusamus vel eligendi, omnis beatae. Quisquam, dicta.
            Eos quod quisquam esse recusandae vitae neque dolore, obcaecati incidunt
            sequi blanditiis est exercitationem molestiae delectus saepe odio
            eligendi modi porro eaque in libero minus unde sapiente consectetur
            architecto. Ullam rerum, nemo iste ex, eaque perspiciatis nisi, eum
            totam velit saepe sed quos similique amet. Ex, voluptate accusamus
            nesciunt totam vitae esse iste.
        </p>
    </section>
    <!-- sidebar -->
    <?php include 'slidebar-overlay.php' ?>
    <!-- end of sidebar -->
    <!-- cart -->
    <?php include 'cart.php' ?>
    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- app.js -->
    <script src="./js/app.js"></script>
</body>

</html>