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
</head>
<body>

<div class="super_container">

    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo">
                            <a href="#">
                                <div>KuaRandevu</div>
                                <div>Sıralarda zaman kaybetmeyin</div>
                            </a>
                        </div>
                        <nav class="main_nav">
                            <ul class="d-flex flex-row align-items-center justify-content-start">
                                <li class="active"><a href="index.html">Anasayfa</a></li>
                                <li><a href="">Salonlar</a></li>
                                <li><a href="">Hakkımızda</a></li>
                                <li><a href="">İletişim</a></li>
                            </ul>
                        </nav>

                        <div class="header_extra d-flex flex-row align-items-center justify-content-start ml-auto">
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <div class="book_button trans_200"><a href="views/signin.php">Sign In/Up</a></div>
                            <?php } else { ?>
                                <div class="book_button trans_200"><a href="">Hesabım</a></div>
                                <div class="book_button trans_200"><a href="actions/user_actions/signout_action.php">Sign Out</a></div>
                            <?php } ?>
                        </div>
                        <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

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