<?php

include 'header.php';

include '../../api_routes/curl_api.php';

$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hdPromotion/getHdPromotionByHd_SerId?hd_id='.$user_data["hdId"].'&ser_id='.$_GET["ser_id"], false);
$response = json_decode($make_call, true);

apcu_store("message", $response["message"]);

$status = $response["status"];
$promotion = $response["data"];

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Promotion
                            <small>
                                <b style="color:<?php echo (apcu_fetch("action_status") == "ok") ? 'green' : 'red' ?>;">
                                    <?php
                                    echo apcu_fetch("message");
                                    apcu_delete("message");
                                    ?>
                                </b>
                            </small>
                        </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>

                        <form action="../../api_routes/panel_routes/add_promotion_route.php" method="POST"
                              id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <input type="hidden" name="hd_id" value="<?php echo $user_data["hdId"]; ?>">
                            <input type="hidden" name="ser_id" value="<?php echo $_GET["ser_id"]; ?>">

                            <input type="hidden" name="promo_id" value="<?php echo ($promotion==0)?"":$promotion["hdPromoId"] ?>">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" class="form-control col-md-7 col-xs-12"
                                           name="ser_name" readonly
                                           value="<?php echo $_GET["ser_name"]; ?>"
                                           required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Discount
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"
                                           name="promo_discount"
                                           value="<?php echo ($promotion==0)?"":$promotion["hdPromoDiscount"] ?>">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duration
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12"
                                           name="promo_duration"
                                           value="<?php echo ($promotion==0)?"":$promotion["hdPromoDuration"] ?>">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="promotion_add" class="<?php echo ($promotion==0)?"btn btn-success":"btn btn-primary" ?>">
                                        <?php echo ($promotion==0)?"Add":"Update" ?>
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
