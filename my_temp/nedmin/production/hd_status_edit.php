<?php

include 'header.php';

include "check_admin_auth.php";

include "../../api_routes/curl_api.php";

$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hairdresser/getHairdresserById?hd_id=' . $_GET["hd_id"], false);
$response = json_decode($make_call, true);
$status = $response["status"];
$hd = $response["data"];

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Hairdresser Status
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
                        <form action="../../api_routes/panel_routes/update_hd_route.php" method="POST"
                              id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <input type="hidden" name="hd_name" value="<?php echo $hd["hdName"]; ?>">
                            <input type="hidden" name="hd_email" value="<?php echo $hd["hdEmail"]; ?>">
                            <input type="hidden" name="hd_type" value="<?php echo $hd["hdType"]; ?>">
                            <input type="hidden" name="hd_password" value="">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="hd_status" required="">
                                        <option value="0" <?php if ($hd['hdStatus'] == 0) echo 'selected="selected"'; ?>>
                                            Kayıt oluşturulmuş
                                        </option>
                                        <option value="-1" <?php if ($hd['hdStatus'] == -1) echo 'selected="selected"'; ?>>
                                            'Kayıt reddet
                                        </option>
                                        <option value="1" <?php if ($hd['hdStatus'] == 1) echo 'selected="selected"'; ?>>
                                            Panel yetkisi ver
                                        </option>
                                        <option value="2" <?php if ($hd['hdStatus'] == 2) echo 'selected="selected"'; ?>>
                                            Aktivolma bekleniyor
                                        </option>
                                        <option value="-2" <?php if ($hd['hdStatus'] == -2) echo 'selected="selected"'; ?>>
                                            Aktivolma reddet
                                        </option>
                                        <option value="3" <?php if ($hd['hdStatus'] == 3) echo 'selected="selected"'; ?>>
                                            Aktiv et
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="hd_update" class="btn btn-success">Update
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
