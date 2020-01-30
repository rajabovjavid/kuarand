<?php

ob_start();
session_start();

include "../api_routes/curl_api.php";

if (isset($_SESSION["auth"])) {
    if ($_SESSION["auth"] == 1 || $_SESSION["auth"] == 2) {
        header("Location:../nedmin/production/logout.php");
        exit;
    }
}

if (isset($_SESSION["email"])) {
    $get_data = callAPI('GET', 'http://localhost/rest_api_slim/public/api/customer/getName?cus_email=' . $_SESSION["email"], false);
    $response1 = json_decode($get_data, true);
    $customer = apcu_fetch("user_data");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>KuaRand</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Kuaför Randevu Sitesi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap-4.1.2/bootstrap.min.css">
    <link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
    <link href="../plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">

    <?php if($comes_from == "index") { ?>
        <link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
        <link rel="stylesheet" type="text/css" href="../styles/responsive.css">
    <?php } ?>

    <?php if($comes_from == "list_hairdressers" || $comes_from == "hd_info" || $comes_from == "search_hairdressers_result" || $comes_from != "index") { ?>
        <link rel="stylesheet" type="text/css" href="../styles/rooms.css">
        <link rel="stylesheet" type="text/css" href="../styles/rooms_responsive.css">
    <?php } ?>

    <link rel="stylesheet" type="text/css" href="../styles/dropdown_menu.css">

    <link href="../nedmin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../nedmin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../nedmin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../nedmin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../nedmin/build/css/custom.min.css" rel="stylesheet">
</head>
<body>

<div class="super_container">

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo">
                            <a href="index.php">
                                <div>KuaRandevu</div>
                                <div>Sıralarda zaman kaybetmeyin</div>
                            </a>
                        </div>
                        <nav class="main_nav">
                            <ul class="d-flex flex-row align-items-center justify-content-start">

                                <li class="<?php if($comes_from=="index") echo "active"; ?>"><a href="index.php">Homepage</a></li>

                                <li class="<?php if($comes_from=="list_hairdressers") echo "active"; ?>"><a href="list_hairdressers.php">Hairdressers</a></li>



                            </ul>
                        </nav>

                        <div class="header_extra d-flex flex-row align-items-center justify-content-start ml-auto">
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <div class="book_button trans_200"><a href="signin.php">Sign In/Up</a></div>
                            <?php } else { ?>
                                <div class="dropdown">
                                    <button class="dropbtn"><?php echo $customer["customerName"] ?></button>
                                    <div class="dropdown-content">
                                        <a href="#">Bilgilerim</a>
                                        <a href="#">Randevularım</a>
                                        <a href="signout_action.php">Sign Out</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <small>
                            <?php
                            echo apcu_fetch("message");
                            apcu_delete("message")
                            ?>
                        </small>


                        <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
