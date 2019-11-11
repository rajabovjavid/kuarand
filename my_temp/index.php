<?php

ob_start();
session_start();

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
    $sign_url = "views/user_views/signin.php";
    include "header.php";
    ?>

    <!-- Menu -->

    <!--<div class="menu">
        <div class="background_image" style="background-image:url(images/menu.jpg)"></div>
        <div class="menu_content d-flex flex-column align-items-center justify-content-center">
            <ul class="menu_nav_list text-center">
                <li><a href="index.php">Anasayfa</a></li>
                <li><a href="">Salonlar</a></li>
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
                                    <form action="#" id="search_form" class="search_form">
                                        <div class="d-flex flex-lg-row flex-column align-items-center justify-content-start">
                                            <ul class="search_form_list d-flex flex-row align-items-center justify-content-start flex-wrap">
                                                <li class="search_dropdown d-flex flex-row align-items-center justify-content-start">
                                                    <span>Check in</span>
                                                    <i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
                                                    <ul>
                                                        <li>Check in item 1</li>
                                                        <li>Check in item 2</li>
                                                        <li>Check in item 3</li>
                                                        <li>Check in item 4</li>
                                                        <li>Check in item 5</li>
                                                    </ul>
                                                </li>
                                                <li class="search_dropdown d-flex flex-row align-items-center justify-content-start">
                                                    <span>Check out</span>
                                                    <i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
                                                    <ul>
                                                        <li>Check out item 1</li>
                                                        <li>Check out item 2</li>
                                                        <li>Check out item 3</li>
                                                        <li>Check out item 4</li>
                                                        <li>Check out item 5</li>
                                                    </ul>
                                                </li>
                                                <li class="search_dropdown d-flex flex-row align-items-center justify-content-start">
                                                    <span>Guests</span>
                                                    <i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
                                                    <ul>
                                                        <li>1</li>
                                                        <li>2</li>
                                                        <li>3</li>
                                                        <li>4</li>
                                                        <li>5</li>
                                                    </ul>
                                                </li>
                                                <li class="search_dropdown d-flex flex-row align-items-center justify-content-start">
                                                    <span>Children</span>
                                                    <i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
                                                    <ul>
                                                        <li>1</li>
                                                        <li>2</li>
                                                        <li>3</li>
                                                        <li>4</li>
                                                        <li>5</li>
                                                    </ul>
                                                </li>
                                                <li class="search_dropdown d-flex flex-row align-items-center justify-content-start">
                                                    <span>Rooms</span>
                                                    <i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
                                                    <ul>
                                                        <li>1</li>
                                                        <li>2</li>
                                                        <li>3</li>
                                                        <li>4</li>
                                                        <li>5</li>
                                                    </ul>
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