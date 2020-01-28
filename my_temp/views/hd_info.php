<?php

include "auth_check.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>KuaRand</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Major - 5* Hotel template project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
    <link href="../plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../styles/rooms.css">
    <link rel="stylesheet" type="text/css" href="../styles/rooms_responsive.css">
    <link rel="stylesheet" type="text/css" href="../styles/dropdown_menu.css">


    <!-- Bootstrap -->
    <link href="../nedmin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../nedmin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../nedmin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../nedmin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../nedmin/build/css/custom.min.css" rel="stylesheet">
</head>
<body>

<div class="super_container">

    <?php include "header.php";?>

    <!-- Rooms -->
    <!--<a href="./../../index.php"></a>-->
    <div class="rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>E-commerce page design</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="product-image">
                                    <img src="images/prod-1.jpg" alt="..." />
                                </div>
                                <div class="product_gallery">
                                    <a>
                                        <img src="images/prod-2.jpg" alt="..." />
                                    </a>
                                    <a>
                                        <img src="images/prod-3.jpg" alt="..." />
                                    </a>
                                    <a>
                                        <img src="images/prod-4.jpg" alt="..." />
                                    </a>
                                    <a>
                                        <img src="images/prod-5.jpg" alt="..." />
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                                <h3 class="prod_title">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>

                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
                                <br />

                                <div class="">
                                    <h2>Available Colors</h2>
                                    <ul class="list-inline prod_color">
                                        <li>
                                            <p>Green</p>
                                            <div class="color bg-green"></div>
                                        </li>
                                        <li>
                                            <p>Blue</p>
                                            <div class="color bg-blue"></div>
                                        </li>
                                        <li>
                                            <p>Red</p>
                                            <div class="color bg-red"></div>
                                        </li>
                                        <li>
                                            <p>Orange</p>
                                            <div class="color bg-orange"></div>
                                        </li>

                                    </ul>
                                </div>
                                <br />

                                <div class="">
                                    <h2>Size <small>Please select one</small></h2>
                                    <ul class="list-inline prod_size">
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs">Small</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs">Medium</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs">Large</button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs">Xtra-Large</button>
                                        </li>
                                    </ul>
                                </div>
                                <br />

                                <div class="">
                                    <div class="product_price">
                                        <h1 class="price">Ksh80.00</h1>
                                        <span class="price-tax">Ex Tax: Ksh80.00</span>
                                        <br>
                                    </div>
                                </div>

                                <div class="">
                                    <button type="button" class="btn btn-default btn-lg">Add to Cart</button>
                                    <button type="button" class="btn btn-default btn-lg">Add to Wishlist</button>
                                </div>

                                <div class="product_social">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-envelope-square"></i></a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-rss-square"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>


                            <div class="col-md-12">

                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Home</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                        </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                                                synth. Cosby sweater eu banh mi, qui irure terr.</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                                booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                                photo booth letterpress, commodo enim craft beer mlkshk </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>


</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap-4.1.2/popper.js"></script>
<script src="../styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="../plugins/greensock/TweenMax.min.js"></script>
<script src="../plugins/greensock/TimelineMax.min.js"></script>
<script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../plugins/greensock/animation.gsap.min.js"></script>
<script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/progressbar/progressbar.min.js"></script>
<script src="../plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="../js/rooms.js"></script>


<!-- jQuery -->
<script src="../nedmin/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../nedmin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../nedmin/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../nedmin/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="../nedmin/build/js/custom.min.js"></script>
</body>
</html>

