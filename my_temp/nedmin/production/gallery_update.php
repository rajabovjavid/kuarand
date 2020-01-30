<?php

include 'header.php';
include "check_hd_status.php";

include "../../api_routes/curl_api.php";

$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hdGallery/getHdGalleryById?hdGallery_id=' . $_GET["gallery_id"], false);
$response = json_decode($make_call, true);
$status = $response["status"];
$hdGallery = $response["data"];

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Gallery Update
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
                    </div>
                    <div class="x_content">
                        <br/>

                        <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
                        <form action="../../api_routes/panel_routes/update_gallery_route.php" method="POST"
                              id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <input type="hidden" name="gallery_id" value="<?php echo $hdGallery["hdGalleryId"]; ?>">

                            <div class="form-group">
                                <img src="data:image/jpeg;base64,<?php echo $hdGallery["hdPhoto"]?>" height="200" width="200" class="img-thumnail" />
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Priority
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="priority"
                                           value="<?php echo $hdGallery["hdPhotoPriority"]; ?>" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="gallery_update" class="btn btn-success">Güncelle
                                    </button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>


        <hr>
        <hr>
        <hr>


    </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
