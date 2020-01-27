<?php

include 'header.php';

include '../../api_routes/curl_api.php';

$user_data = apcu_fetch("user_data");

// filter reservation by hd id _route
$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/reservation/filterReservationsWithHd?hd_id=' . $user_data["hdId"], false);
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];



//Belirli veriyi seçme işlemi
$urunsor = $db->prepare("SELECT * FROM urun order by urun_id DESC");
$urunsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of Reservations<small>,

                                <?php

                                if ($_GET['durum'] == "ok") { ?>

                                    <b style="color:green;">İşlem Başarılı...</b>

                                <?php } elseif ($_GET['durum'] == "no") { ?>

                                    <b style="color:red;">İşlem Başarısız...</b>

                                <?php }

                                ?>


                            </small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <!-- Div İçerik Başlangıç -->

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Reservation Date</th>
                                <th>Service Name</th>
                                <th>Service Price</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php

                            foreach ( $response["data"] as $reservation ) { ?>


                                <tr>
                                    <td><?php echo $reservation['reservationId'] ?></td>
                                    <td><?php echo $reservation['customerName'] ?></td>
                                    <td><?php echo $reservation['customerPhone'] ?></td>
                                    <td><?php echo $reservation['reservationDate'] ?></td>
                                    <td><?php echo $reservation['serName'] ?></td>
                                    <td><?php echo $reservation['serPrice'] ?></td>
                                    <td>
                                        <center><?php
                                            $today = date("Y-m-d H:i:s");
                                            if ($reservation['reservationDate'] > $today){ ?>

                                                <button class="btn btn-success btn-xs" disabled>Active</button>

                                                <!--

                                                success -> yeşil
                                                warning -> turuncu
                                                danger -> kırmızı
                                                default -> beyaz
                                                primary -> mavi buton

                                                btn-xs -> ufak buton

                                              -->

                                            <?php } else { ?>

                                                <button class="btn btn-danger btn-xs" disabled>Passive</button>


                                            <?php } ?>
                                        </center>


                                    </td>

                                    <td>
                                        <center>
                                            <a href="../../api_routes/panel_routes/delete_reservation_route.php?res_id=<?php echo $reservation['reservationId']; ?>&urunsil=ok">
                                                <button class="btn btn-danger btn-xs">Reject</button>
                                            </a></center>
                                    </td>
                                </tr>


                            <?php }

                            ?>


                            </tbody>
                        </table>

                        <!-- Div İçerik Bitişi -->


                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
