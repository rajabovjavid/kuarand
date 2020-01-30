

<?php
$comes_from = "list_hairdressers";
include "header.php";

$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hairdresser/getActiveHairdressers', false);
$response = json_decode($make_call, true);
$status = $response["status"];

if ($status != "ok" or $status == null) {
    header("Location:index.php");
    exit;
}

$hds = $response["data"];

?>

<div class="rooms">
    <div class="container">
        <div class="row rooms_row">

            <?php

            foreach ( $hds as $hd ) { ?>
                <!-- Room -->
                <div class="col-lg-4">
                    <div class="rooms_item">
                        <div class="rooms_image">
                            <img src="data:image/jpeg;base64,<?php echo $hd['hdPhoto']?>" alt="https://unsplash.com/@yuni_ladyday2">
                        </div>
                        <div class="rooms_title_container text-center">
                            <div class="rooms_title"><h1><?php echo $hd["hdName"] ?></h1></div>
                            <div class="rooms_price">Average Rating: <?php echo $hd["hdRating"] ?></div>
                        </div>
                        <div class="rooms_list">
                            <ul>
                                <li class="d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>City:</div>
                                    </div>
                                    <div> <?php echo $hd["hdAddressCity"] ?> </div>
                                </li>
                                <li class="d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>Region:</div>
                                    </div>
                                    <div> <?php echo $hd["hdAddressRegion"] ?> </div>
                                </li>
                            </ul>
                        </div>
                        <div class="button rooms_button ml-auto mr-auto"><a href="hd_info.php?hd_id=<?php echo $hd["hdId"];?>">See details</a></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include "footer.php" ?>


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
</body>
</html>

