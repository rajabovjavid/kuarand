<?php
ob_start();
session_start();

include '../netting/baglan.php';
include 'fonksiyon.php';

if (!isset($_SESSION["email"])) {
    Header("Location:login.php");
    exit;
}

if (!$_SESSION["auth"] == 1 && !$_SESSION["auth"] == 2) {
    apcu_store("message", "panel kullanıcısı değilsiniz");
    Header("Location:login.php");
    exit;
}

$user_data = apcu_fetch("user_data");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kuarand Panel</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- Dropzone.js -->

    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">


    <!-- Dropzone.js -->

    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
    <!-- Ck Editör -->
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="" class="site_title"><i class="fa fa-paw"></i> <span>Kuarand Panel</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <!--                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">-->
                    </div>
                    <div class="profile_info">
                        <h2><?php echo ($_SESSION["auth"] == 1) ? $user_data['adminName'] : $user_data['hdName'] ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <?php if ($_SESSION["auth"] == 2) { ?>
                                <li><a href="index.php"><i class="fa fa-home"></i> Main Page </a></li>

                                <li><a href="hd_info.php"><i class="fa fa-info"></i> Hairdresser Info </a></li>
                                <?php if ($user_data["hdStatus"] != 0 && $user_data["hdStatus"] != -1) { ?>
                                    <li><a href="hd_address.php"><i class="fa fa-info"></i> Hairdresser Address </a>
                                    </li>

                                    <li><a href="hd_gallery.php"><i class="fa fa-user"></i> Gallery </a></li>

                                    <li><a href="employees.php"><i class="fa fa-user"></i> Employees </a></li>

                                    <li><a href="hd_reservations.php"><i class="fa fa-shopping-basket"></i> Reservations
                                        </a></li>

                                    <li><a href="hd_work_hour.php"><i class="fa fa-info"></i> Hairdresser Work Hour </a>
                                    </li>

                                    <li><a href="services.php"><i class="fa fa-user"></i> Services </a></li>

                                    <!--                                <li><a href="urun.php"><i class="fa fa-shopping-basket"></i> Ürünler </a></li>-->

                                    <!--                                <li><a href="menu.php"><i class="fa fa-list"></i> Menüler </a></li>-->

                                    <!--                                <li><a href="kategori.php"><i class="fa fa-list"></i> Kategoriler </a></li>-->

                                    <!--                                <li><a href="slider.php"><i class="fa fa-image"></i> Slider </a></li>-->

                                    <!--                                <li><a href="yorum.php"><i class="fa fa-comments"></i> Yorumlar </a></li>-->

                                    <!--                                <li><a href="banka.php"><i class="fa fa-bank"></i> Bankalar </a></li>-->

                                    <li><a href="hd_contacts.php"><i class="fa fa-info"></i> Hairdresser Contacts </a>
                                    </li>
                                <?php } ?>


                            <?php } elseif ($_SESSION["auth"] == 1) { ?>

                                <li><a href="index.php"><i class="fa fa-home"></i> Main Page </a></li>

                                <li><a href="admin_info.php"><i class="fa fa-info"></i> Admin Info </a></li>
                                <?php if ($user_data["adminType"] == 1) { ?>
                                    <li><a href="admins.php"><i class="fa fa-info"></i> Admins </a></li>
                                <?php } ?>
                                <li><a href="hairdressers.php"><i class="fa fa-info"></i> Hairdressers </a></li>

                                <!--                                <li><a href=""><i class="fa fa-info"></i> Reservations </a></li>-->

                            <?php } ?>
                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
<!--                <div class="sidebar-footer hidden-small">-->
<!--                    <a data-toggle="tooltip" data-placement="top" title="Settings">-->
<!--                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>-->
<!--                    </a>-->
<!--                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">-->
<!--                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>-->
<!--                    </a>-->
<!--                    <a data-toggle="tooltip" data-placement="top" title="Lock">-->
<!--                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>-->
<!--                    </a>-->
<!--                    <a data-toggle="tooltip" data-placement="top" title="Logout">-->
<!--                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>-->
<!--                    </a>-->
<!--                </div>-->
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Safe Exit</a>
                            </a>
                        </li>

<!--                        <li role="presentation" class="dropdown">-->
<!--                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"-->
<!--                               aria-expanded="false">-->
<!--                                <i class="fa fa-envelope-o"></i>-->
<!--                                <span class="badge bg-green">6</span>-->
<!--                            </a>-->
<!--                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">-->
<!--                                <li>-->
<!--                                    <a>-->
<!--                                        <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>-->
<!--                                        <span>-->
<!--                    <span>John Smith</span>-->
<!--                    <span class="time">3 mins ago</span>-->
<!--                  </span>-->
<!--                                        <span class="message">-->
<!--                    Film festivals used to be do-or-die moments for movie makers. They were where...-->
<!--                  </span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a>-->
<!--                                        <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>-->
<!--                                        <span>-->
<!--                    <span>John Smith</span>-->
<!--                    <span class="time">3 mins ago</span>-->
<!--                  </span>-->
<!--                                        <span class="message">-->
<!--                    Film festivals used to be do-or-die moments for movie makers. They were where...-->
<!--                  </span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a>-->
<!--                                        <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>-->
<!--                                        <span>-->
<!--                    <span>John Smith</span>-->
<!--                    <span class="time">3 mins ago</span>-->
<!--                  </span>-->
<!--                                        <span class="message">-->
<!--                    Film festivals used to be do-or-die moments for movie makers. They were where...-->
<!--                  </span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a>-->
<!--                                        <span class="image"><img src="images/img.jpg" alt="Profile Image"/></span>-->
<!--                                        <span>-->
<!--                    <span>John Smith</span>-->
<!--                    <span class="time">3 mins ago</span>-->
<!--                  </span>-->
<!--                                        <span class="message">-->
<!--                    Film festivals used to be do-or-die moments for movie makers. They were where...-->
<!--                  </span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <div class="text-center">-->
<!--                                        <a>-->
<!--                                            <strong>See All Alerts</strong>-->
<!--                                            <i class="fa fa-angle-right"></i>-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->