<?php

include 'header.php';


?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ürün Düzenleme <small>,

                                <?php

                                if ($_GET['durum'] == "ok") { ?>

                                    <b style="color:green;">İşlem Başarılı...</b>

                                <?php } elseif ($_GET['durum'] == "no") { ?>

                                    <b style="color:red;">İşlem Başarısız...</b>

                                <?php }

                                ?>


                            </small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>

                        <form action="../../api_routes/panel_routes/add_hd_work_hour_route.php" method="POST"
                              id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <input type="hidden" name="hd_id" value="<?php echo apcu_fetch("user_data")["hdId"]; ?>">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Day
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" class="form-control" name="day" required="">
                                        <option value=0>Monday</option>
                                        <option value=1>Tuesday</option>
                                        <option value=2>Wednesday</option>
                                        <option value=3>Thursday</option>
                                        <option value=4>Friday</option>
                                        <option value=5>Saturday</option>
                                        <option value=6>Sunday</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Start Hour
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="start_hour" name="start_hour"
                                           value="" required="required"
                                           class="form-control col-md-7 col-xs-12" placeholder="9:00:00">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Finish hour
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="finish_hour" name="finish_hour"
                                           value="" required="required"
                                           class="form-control col-md-7 col-xs-12" placeholder="17:00:00">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="hdworkhour_add" class="btn btn-success">Ekle
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
