<?php

include 'header.php';

include "check_hd_status.php";

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Photo <small>,

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

                        <form action="../../api_routes/panel_routes/add_hdPhoto_route.php" method="POST" enctype="multipart/form-data"
                              id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <input type="hidden" name="hd_id" value="<?php echo $user_data["hdId"]; ?>">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Choose a photo<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="image"  name="image"  class="form-control col-md-7 col-xs-12" required="required"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Priority
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="priority"
                                           value="" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="insert_image" id="insert_image" class="btn btn-success">
                                        Add
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
