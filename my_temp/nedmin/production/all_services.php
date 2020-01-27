<?php

include 'header.php';

include '../../api_routes/curl_api.php';

$user_data = apcu_fetch("user_data");

// filter employee by hd _route
$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/service/getAllServices', false);
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Services
                            <small>
                                <b style="color:<?php echo (apcu_fetch("action_status") == "ok") ? 'green' : 'red' ?>;">
                                    <?php
                                    echo apcu_fetch("message");
                                    apcu_delete("message");
                                    ?>
                                </b>
                            </small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <div align="right">
                            <a href="add_service.php">
                                <button class="btn btn-success btn-xs"> Yeni Ekle</button>
                            </a>
                        </div>
                    </div>
                    <div class="x_content">


                        <!-- Div İçerik Başlangıç -->

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Service ID</th>
                                <th>Service Name</th>
                                <th>Type</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php

                            foreach ( $response["data"] as $service ) { ?>


                                <tr>
                                    <td><?php echo $service["serId"] ?></td>
                                    <td><?php echo $service["serName"] ?></td>
                                    <td><?php echo ($service["serType"]=='1')?"for men":'for women';?></td>
                                    <td>
                                        <center>
                                            <a href="add_selected_service.php?ser_id=<?php echo $service["serId"]; ?>">
                                                <button class="btn btn-primary btn-xs">Select</button>
                                            </a>
                                        </center>
                                    </td>
                                </tr>


                            <?php } ?>


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
