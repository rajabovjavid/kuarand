<?php

include 'header.php';

include '../../api_routes/curl_api.php';

$user_data = apcu_fetch("user_data");

// filter employee by hd _route
$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hdContact/getHdContactByHdId?hd_id=' . $user_data["hdId"], false);
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
                        <h2>Contacts
                            <small>
                                <?php
                                if ($_GET['durum'] == "ok") { ?>
                                    <b style="color:green;">İşlem Başarılı...</b>
                                <?php } elseif ($_GET['durum'] == "no") { ?>
                                    <b style="color:red;">İşlem Başarısız...</b>
                                <?php }
                                ?>
                            </small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <div align="right">
                            <a href="hd_contact_add.php">
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
                                <th>Contact ID</th>
                                <th>Contact Type</th>
                                <th>Contact</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php

                            foreach ($response["data"] as $contact ) { ?>


                                <tr>
                                    <td><?php echo $contact["hdContactId"] ?></td>
                                    <td><?php echo ($contact["hdContactType"]=='1')?"email":'phone';?></td>
                                    <td><?php echo $contact["hdContact"] ?></td>
                                    <td>
                                        <center>
                                            <a href="hd_contact_update.php?hdContact_id=<?php echo $contact["hdContactId"]; ?>">
                                                <button class="btn btn-primary btn-xs">Update</button>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="../../api_routes/panel_routes/delete_hdContact_route.php?hdContact_id=<?php echo $contact["hdContactId"]; ?>&kullanicisil=ok">
                                                <button class="btn btn-danger btn-xs">Delete</button>
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
