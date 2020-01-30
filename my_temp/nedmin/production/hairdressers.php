<?php

include 'header.php';

include "check_admin_auth.php";

include "../../api_routes/curl_api.php";

//Belirli veriyi seçme işlemi
$urunsor = $db->prepare("SELECT * FROM urun order by urun_id DESC");
$urunsor->execute();


$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hairdresser/getAllHairdressers', false);
$response = json_decode($make_call, true);
$status = $response["status"];

if ($status != "ok" or $status == null) {
    header("Location:index.php");
    exit;
}

$hds = $response["data"];

?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Hairdressers
                            <small>

                            </small>
                        </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <!-- Div İçerik Başlangıç -->

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Created At</th>
                                <th>Rating</th>
                                <th>Comment Count</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php

                            foreach ( $hds as $hd ) { ?>


                                <tr>
                                    <td width="20"><?php echo $hd["hdId"] ?></td>
                                    <td><?php echo $hd["hdEmail"] ?></td>
                                    <td><?php echo $hd["hdName"] ?></td>
                                    <td><?php echo ($hd["hdType"]==0)?"Women HD":"Men HD" ?></td>
                                    <td><?php echo $hd['hdCreatedAt'] ?></td>
                                    <td><?php echo $hd['hdRating'] ?></td>
                                    <td><?php echo $hd['hdCommentCount'] ?></td>
                                    <td>
                                        <?php
                                        if ($hd['hdStatus'] == "0") echo 'Kayıt oluşturulmuş';
                                        elseif ($hd['hdStatus'] == "-1") echo 'Kayıt reddedilmiş';
                                        elseif ($hd['hdStatus'] == "1") echo 'Panel yetkili';
                                        elseif ($hd['hdStatus'] == "2") echo 'Aktivolma bekleniyor';
                                        elseif ($hd['hdStatus'] == "-2") echo 'Aktivolma reddedilmiş';
                                        elseif ($hd['hdStatus'] == "3") echo 'Aktiv durumda';
                                        ?>
                                    </td>


                                    <td>
                                        <center><a href="hd_status_edit.php?hd_id=<?php echo $hd['hdId']; ?>">
                                                <button class="btn btn-primary btn-xs">Status Edit</button>
                                            </a></center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="../../api_routes/panel_routes/delete_hd_route.php?hd_email=<?php echo $hd['hdEmail']; ?>">
                                                <button class="btn btn-danger btn-xs">Sil</button>
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
