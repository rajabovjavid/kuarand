<?php

include 'header.php';
include "check_hd_status.php";

include "../../api_routes/curl_api.php";

$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/employee/getEmployeeById?emp_id=' . $_GET["emp_id"], false);
$response = json_decode($make_call, true);
$status = $response["status"];
$employee = $response["data"];

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Employee Info
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
                        <form action="../../api_routes/panel_routes/update_employee_rout.php" method="POST" enctype="multipart/form-data"
                              id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <input type="hidden" name="employee_id" value="<?php echo $employee["employeeId"]; ?>">
                            <input type="hidden" name="employee_photo_base64" value="<?php echo $employee["employeePhoto"]; ?>">

                            <div class="form-group">
                                <img src="data:image/jpeg;base64,<?php echo $employee['employeePhoto']?>" height="200" width="200" class="img-thumnail" />
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="image"  name="image"  class="form-control col-md-7 col-xs-12" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name Surname
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="employee_name"
                                           value="<?php echo $employee["employeeName"]; ?>" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gender
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="employee_gender" required="">
                                        <option value="0" <?php if ($employee['employeeGender'] == 0) echo 'selected="selected"'; ?>>
                                            Kadın
                                        </option>
                                        <option value="1" <?php if ($employee['employeeGender'] == 1) echo 'selected="selected"'; ?>>
                                            Erkek
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="employee_update" class="btn btn-success">Güncelle
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
