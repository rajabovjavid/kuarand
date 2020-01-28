<?php

include "auth_check.php";

if(isset($_SESSION["email"])){
//    include "../api_routes/curl_api.php";

    $get_data = callAPI('GET', 'http://localhost/rest_api_slim/public/api/customer/getName?cus_email='.$_SESSION["email"], false);
    $response = json_decode($get_data, true);
    $customer_name = $response["data"];
}

?>

<!-- Header -->
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

                            <li class=""><a href="index.php">Anasayfa</a></li>

                            <li class=""><a href="list_hairdressers.php">Salonlar</a></li>

                            <li><a href="">Hakkımızda</a></li>
                            <li><a href="">İletişim</a></li>
                        </ul>
                    </nav>

                    <div class="header_extra d-flex flex-row align-items-center justify-content-start ml-auto">
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <div class="book_button trans_200"><a href="signin.php">Sign In/Up</a></div>
                        <?php } else { ?>
                            <div class="dropdown">
                                <button class="dropbtn"><?php echo $customer_name?></button>
                                <div class="dropdown-content">
                                    <a href="#">Bilgilerim</a>
                                    <a href="#">Randevularım</a>
                                    <a href="signout_action.php">Sign Out</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</header>
