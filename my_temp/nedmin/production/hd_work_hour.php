<?php

include 'header.php';

include '../../api_routes/curl_api.php';

$user_data = apcu_fetch("user_data");

// filter hd work hour by hd id _route
$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hdWorkHour/filterHdWorkHourWithHd?hd_id=' . $user_data["hdId"], false);
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
                        <h2>Work Hours<small>,

                                <?php

                                if ($_GET['durum'] == "ok") { ?>

                                    <b style="color:green;">İşlem Başarılı...</b>

                                <?php } elseif ($_GET['durum'] == "no") { ?>

                                    <b style="color:red;">İşlem Başarısız...</b>

                                <?php }

                                ?>


                            </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <div align="right">
                            <a href="add_hd_work_hour.php">
                                <button class="btn btn-success btn-xs">Add new work hour</button>
                            </a>
                        </div>
                    </div>
                    <div class="x_content">
                        <!-- Div İçerik Başlangıç -->

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Day</th>
                                <th>Start Hour</th>
                                <th>Finish Hour</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php

                            foreach ( $response["data"] as $hdWorkHour ) { ?>


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
                                    <td>
                                        <center>
                                            <a href="hd_work_hour_update.php?hd_id=<?php echo $user_data["hdId"]?>
                                                <button class="btn btn-primary btn-xs">Edit</button>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="../../api_routes/panel_routes/delete_hd_work_hour_route.php?hd_id=<?php echo $user_data["hdId"]; ?>&day=<?php echo $hdWorkHour["day"]; ?>&kullanicisil=ok">
                                                <button class="btn btn-danger btn-xs">Delete</button>
                                            </a>
                                        </center>
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
