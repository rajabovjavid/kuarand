<?php

$comes_from = "hd_info";
include "header.php";

if (!isset($_GET["hd_id"])) {
    header("Location:index.php");
    exit;
}


$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hairdresser/getAllHdInfo?hd_id=' . $_GET["hd_id"], false);
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if ($status != "ok" || $status == null) {
    header("Location:index.php");
    exit;
}

$hd = $response["data"];

?>


    <div class="rooms">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                    <div class="x_content">

                        <div class="col-md-7 col-sm-7 col-xs-12 mb-5">
                            <div class="product-image">
                                <img src="data:image/jpeg;base64,<?php echo $hd['hdImpPhoto'] ?>" alt="..."/>
                            </div>
                            <div class="product_gallery">
                                <?php foreach ($hd["hdGallery"] as $photo) {
                                    if ($photo["hdPhotoPriority"] == 0) {
                                        ?>
                                        <a>
                                            <img src="data:image/jpeg;base64,<?php echo $photo['hdPhoto'] ?>"
                                                 alt="..."/>
                                        </a>
                                    <?php }
                                } ?>
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                            <h1> <?php echo $hd["hdName"] ?> </h1>

                            <hr>

                            <h2>
                                Address: <?php echo $hd["hdAddressCity"] ?>,<?php echo $hd["hdAddressRegion"] ?>
                                ,<?php echo $hd["hdAddressNeighborhood"] ?>,<?php echo $hd["hdAddressStreet"] ?>
                                ,<?php echo $hd["hdAddressOtherInfo"] ?>.
                            </h2>

                            <hr>
                            <h2>Contacts:</h2>
                            <?php foreach ($hd["hdContacts"] as $contact) { ?>
                                <h2>
                                    <?php echo $contact["hdContact"] ?>
                                </h2>
                            <?php } ?>

                            <hr>
                            <div class="">
                                <div class="product_price">
                                    <h1 class="price">Rate: <?php echo $hd["hdRating"] ?></h1>
                                    <span class="price-tax">Comment Count: <?php echo $hd["hdCommentCount"] ?></span>
                                    <br>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-12 mt-5">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab"
                                                                              role="tab" data-toggle="tab"
                                                                              aria-expanded="true">Services</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab"
                                                                        id="profile-tab" data-toggle="tab"
                                                                        aria-expanded="false">Employees</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab"
                                                                        id="profile-tab2" data-toggle="tab"
                                                                        aria-expanded="false">Work Hours</a>
                                    </li>

                                    <li role="presentation" class=""><a href="#tab_content4" role="tab"
                                                                        id="profile-tab2" data-toggle="tab"
                                                                        aria-expanded="false">Reservation</a>
                                    </li>




                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                                         aria-labelledby="home-tab">

                                        <table id="datatable-responsive"
                                               class="table table-striped table-bordered dt-responsive nowrap"
                                               cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Service Name</th>
                                                <th>Type</th>
                                                <th>Price</th>
                                                <th>Discounted Price</th>
                                                <th>Min Time</th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            <?php

                                            foreach ($hd["hdServices"] as $service) { ?>


                                                <tr>
                                                    <td><?php echo $service["serName"] ?></td>
                                                    <td><?php echo ($service["serType"] == '1') ? "for men" : 'for women'; ?></td>
                                                    <td><?php echo $service["serPrice"] ?></td>
                                                    <td><?php echo $service["discountedPrice"] ?></td>
                                                    <td><?php echo $service["serMinTime"] ?></td>
                                                    <td>
                                                        <form method="POST"
                                                              action="../api_routes/customer_routes/make_reservation_route.php">
                                                            <input type="text" name="reserv_date" value=""
                                                                   placeholder="2020-02-04 12:00:00">
                                                            <input type="hidden" name="hd_id"
                                                                   value="<?php echo $hd["hdId"] ?>">
                                                            <input type="hidden" name="ser_id"
                                                                   value="<?php echo $service["serId"] ?>">
                                                            <input type="hidden" name="cus_id"
                                                                   value="<?php echo apcu_fetch("user_data")["customerId"] ?>">
                                                            <center>
                                                                <button type="submit" class="btn btn-success btn-xs">
                                                                    Make Reservation
                                                                </button>
                                                            </center>
                                                        </form>

                                                    </td>
                                                </tr>


                                            <?php } ?>


                                            </tbody>
                                        </table>


                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                         aria-labelledby="profile-tab">

                                        <table id="datatable-responsive"
                                               class="table table-striped table-bordered dt-responsive nowrap"
                                               cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            <?php

                                            foreach ($hd["hdEmployees"] as $employee) { ?>


                                                <tr>
                                                    <td>
                                                        <img src="data:image/jpeg;base64,<?php echo $employee["employeePhoto"] ?>"
                                                             height="100" width="80" class="img-thumnail"/>
                                                    </td>
                                                    <td><h2><?php echo $employee["employeeName"] ?></h2></td>
                                                </tr>


                                            <?php } ?>


                                            </tbody>
                                        </table>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                                         aria-labelledby="profile-tab">

                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                               cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Start Hour</th>
                                                <th>Finish Hour</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            <?php

                                            foreach ( $hd["hdWorkHours"] as $hdWorkHour ) { ?>


                                                <tr>
                                                    <td><?php

                                                        if ($hdWorkHour['day'] == 0) echo 'Monday';
                                                        elseif ($hdWorkHour['day'] == 1) echo 'Tuesday';
                                                        elseif ($hdWorkHour['day'] == 2) echo 'Wednesday';
                                                        elseif ($hdWorkHour['day'] == 3) echo 'Thursday';
                                                        elseif ($hdWorkHour['day'] == 4) echo 'Friday';
                                                        elseif ($hdWorkHour['day'] == 5) echo 'Saturday';
                                                        elseif ($hdWorkHour['day'] == 6) echo 'Sunday';
                                                        ?>

                                                    </td>
                                                    <td><?php echo $hdWorkHour['startHour'] ?></td>
                                                    <td><?php echo $hdWorkHour['finishHour'] ?></td>
                                                </tr>


                                            <?php }

                                            ?>


                                            </tbody>
                                        </table>








                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4"
                                         aria-labelledby="profile-tab">

                                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                               cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Reservation Date</th>
                                                <th>Start Time</th>
                                                <th>Finish Time</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            <?php

                                            foreach ( $hd["hdReservations"] as $hdReservation ) {
                                                $dateTime = explode(" ", $hdReservation["reservationDate"]);
                                                $endTime = strtotime("+".$hdReservation["serMinTime"]." minutes", strtotime($dateTime[1]));
                                                ?>


                                                <tr>
                                                    <td> <?php echo $dateTime[0] ?> </td>
                                                    <td> <?php echo $dateTime[1] ?></td>
                                                    <td> <?php echo date("H:i:s",$endTime) ?> </td>
                                                </tr>


                                            <?php }

                                            ?>


                                            </tbody>
                                        </table>








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

<script src="../nedmin/vendors/jquery/dist/jquery.min.js"></script>
<script src="../nedmin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../nedmin/vendors/fastclick/lib/fastclick.js"></script>
<script src="../nedmin/vendors/nprogress/nprogress.js"></script>
<script src="../nedmin/build/js/custom.min.js"></script>

</body>
</html>

