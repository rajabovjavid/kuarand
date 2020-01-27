<?php

include 'header.php';

include "../../api_routes/curl_api.php";

$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hairdresserServices/getHairdresserServiceBySerId?hd_id=' . $user_data["hdId"].'&ser_id='.$_GET["ser_id"], false);
$response = json_decode($make_call, true);
$status = $response["status"];
$hairdresserService = $response["data"];

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Service Info
                            <small>

                                <b style="color:<?php echo (apc_fetch("action_status") == "ok") ? 'green' : 'red' ?>;">
                                    <?php
                                    echo apc_fetch("message");
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
                        <form action="../../api_routes/panel_routes/update_hd_service_route.php" method="POST" id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <input type="hidden" name="hd_id" value="<?php echo $user_data["hdId"]?>">
                            <input type="hidden" name="ser_id" value="<?php echo $hairdresserService["serId"]?>">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="ser_name" readonly
                                           value="<?php echo $hairdresserService["serName"]; ?>" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Type
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" class="form-control col-md-7 col-xs-12"
                                           name="ser_type"
                                           readonly
                                           value="<?php echo ($hairdresserService["serType"]==0)?"for women":"for men"; ?>"
                                           required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Min Time
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" class="form-control col-md-7 col-xs-12"
                                           name="ser_min_time"
                                           value="<?php echo $hairdresserService["serMinTime"]; ?>"
                                           required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Price
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" class="form-control col-md-7 col-xs-12"
                                           name="ser_price"
                                           value="<?php echo $hairdresserService["serPrice"]; ?>"
                                           required="required">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="ser_update" class="btn btn-success">Güncelle
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
