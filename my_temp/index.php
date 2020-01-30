<?php

ob_start();
session_start();

?>

<?php



include './api_routes/curl_api.php';

$user_data = apcu_fetch("user_data");

// filter employee by hd _route
$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/service/getAllServices', false);
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>KuaRand</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Kuaför Randevu Sitesi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/dropdown_menu.css">
</head>
<body>

<div class="super_container">


    <?php
    $comes_from_page = "index";
    $sign_url = "views/signin.php";
    $signout_url = "actions/customer_actions/signout_action.php";
    include "header.php";
    #include "actions/customer_actions/signout_action.php"
    ?>

    <!-- Menu -->

    <!--<div class="menu">
        <div class="background_image" style="background-image:url(images/menu.jpg)"></div>
        <div class="menu_content d-flex flex-column align-items-center justify-content-center">
            <ul class="menu_nav_list text-center">
                <li><a href="index.php">Home</a></li>
                <li><a href="">Hairdressers</a></li>
                <li><a href="">Hakkımızda</a></li>
                <li><a href="">İletişim</a></li>
            </ul>
            <div class="menu_review"><a href="views/user_views/signin.php">Sign In/Up</a></div>
        </div>
    </div>-->

    <!-- Home -->

    <div class="home">
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/hairdresser.jpg" data-speed="0.8"></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content text-center">
                            <div class="home_title"><h1>Luxury & Compfort</h1></div>
                            <div class="home_text">In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search_box">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="search_box_container d-flex flex-row align-items-center justify-content-start">
                                <div class="search_form_container">
                                    <form action="api_routes/customer_routes/search_hairdressers_results_route.php" id="search_form" class="search_form" method="POST">
                                        <div class="d-flex flex-lg-row flex-column align-items-center justify-content-start">
                                            <ul class="search_form_list d-flex flex-row align-items-center justify-content-start flex-wrap">

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="hd_name"
                                                           value=""
                                                           class="form-control col-md-7 col-xs-12" placeholder="Hairdresser Name">
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="city"
                                                           value="" required="required"
                                                           class="form-control col-md-7 col-xs-12" placeholder="City">
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="region"
                                                           value="" required="required"
                                                           class="form-control col-md-7 col-xs-12" placeholder="Region">
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select id="heard" class="form-control" name="ser_name" required="">
                                                    <?php
                                                    foreach ( $response["data"] as $service ) { ?>
                                                        <option value=<?php echo $service["serName"] ?>> <?php echo $service["serName"] ?> </option>
                                                    <?php } ?>
                                                </select>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select id="heard" class="form-control" name="hd_type" required="">
                                                        <option value=0>For Woman</option>
                                                        <option value=1>For Man</option>
                                                    </select>
                                                </div>

                                                </li>
                                            </ul>
                                            <button class="search_button">search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"?>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/custom.js"></script>
</body>
</html>