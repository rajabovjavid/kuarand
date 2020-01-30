<?php

include 'header.php';
include "check_hd_status.php";

include '../../api_routes/curl_api.php';

// filter employee by hd _route
$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hdGallery/getHdGalleryByHd?hd_id=' . $user_data["hdId"], false);
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
                        <h2>Gallery
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
                            <a href="add_hd_photo.php">
                                <button class="btn btn-success btn-xs"> Add new</button>
                            </a>
                        </div>
                    </div>
                    <div class="x_content">


                        <!-- Div İçerik Başlangıç -->

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Priority</th>
                                <th>Photo</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php

                            foreach ( $response["data"] as $hdGallery ) { ?>


                                <tr>
                                    <td><?php echo $hdGallery["hdGalleryId"] ?></td>
                                    <td><?php echo $hdGallery["hdPhotoPriority"] ?></td>
                                    <td>
                                        <img src="data:image/jpeg;base64,<?php echo $hdGallery["hdPhoto"]?>" height="200" width="200" class="img-thumnail" />
                                    </td>
                                    <td>
                                        <center>
                                            <a href="gallery_update.php?gallery_id=<?php echo $hdGallery["hdGalleryId"]; ?>">
                                                <button class="btn btn-primary btn-xs">Edit</button>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="../../api_routes/panel_routes/delete_gallery_route.php?gallery_id=<?php echo $hdGallery["hdGalleryId"]?>">
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
