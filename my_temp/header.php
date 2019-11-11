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

                            <?php if($comes_from_page == "index") { ?>
                                <li class="active"><a href="">Anasayfa</a></li>
                            <?php } else { ?>
                                <li><a href=<?php echo $index_url ?>>Anasayfa</a></li>
                            <?php } ?>

                            <?php if($comes_from_page == "list_hairdressers") { ?>
                            <li class="active"><a href="">Salonlar</a></li>
                            <?php } else { ?>
                            <li><a href="views/hairdresser_views/list_hairdressers.php">Salonlar</a></li>
                            <?php } ?>

                            <li><a href="">Hakkımızda</a></li>
                            <li><a href="">İletişim</a></li>
                        </ul>
                    </nav>

                    <div class="header_extra d-flex flex-row align-items-center justify-content-start ml-auto">
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <div class="book_button trans_200"><a href=<?php echo $sign_url ?>>Sign In/Up</a></div>
                        <?php } else { ?>
                            <div class="dropdown">
                                <button class="dropbtn">Hesabım</button>
                                <div class="dropdown-content">
                                    <a href="#">Bilgilerim</a>
                                    <a href="#">Randevularım</a>
                                    <a href="actions/user_actions/signout_action.php">Sign Out</a>
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