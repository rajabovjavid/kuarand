<?php

include 'header.php';
include "check_hd_status.php";

include '../../api_routes/curl_api.php';

$user_data = apcu_fetch("user_data");

// filter employee by hd _route
$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hdAddress/getHdAddressById?hd_id=' . $user_data["hdId"], false);
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];
$hdAddress = $response["data"];

?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Hairdresser Address
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
                            <form action="../../api_routes/panel_routes/update_hdAddress_route.php" method="POST" id="demo-form2"
                                  data-parsley-validate
                                  class="form-horizontal form-label-left">
                                <input type="hidden" name="hdId" value="<?php echo $user_data['hdId']?>">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="hdAddressCity"
                                               value="<?php echo $hdAddress['hdAddressCity'] ?>" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Region
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="hdAddressRegion"
                                               value="<?php echo $hdAddress['hdAddressRegion'] ?>" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Neighborhood
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="hdAddressNeighboor"
                                               value="<?php echo $hdAddress['hdAddressNeighborhood'] ?>" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Street
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="hdAddressStreet"
                                               value="<?php echo $hdAddress['hdAddressStreet'] ?>" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Other
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="hdAddressOtherInfo"
                                               value="<?php echo $hdAddress['hdAddressOtherInfo'] ?>" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="updateHairdresserAddress" class="btn btn-success">Güncelle
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