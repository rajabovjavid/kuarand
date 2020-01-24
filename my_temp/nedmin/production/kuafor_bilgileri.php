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
                        <h2>Kuaför Bilgileri<small>
                                <?php
                                if (apc_fetch("action_status") == "ok") { ?>
                                    <b style="color:green;"><?php echo apc_fetch("message") ?></b>
                                <?php } elseif (apc_fetch("action_status") == "error") { ?>
                                    <b style="color:red;"><?php echo apc_fetch("message") ?></b>
                                <?php }
                                ?>
                            </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>

                        <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
                        <form action="../../api_routes/panel_routes/update_hd_route.php" method="POST" id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kuaför İsmi <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="hdName"
                                           value="<?php echo $user_data['hdName'] ?>" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kuaför Şifre <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="first-name" name="hdPassword" placeholder="şifreni güncelle"
                                           value="" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kuaför Email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                        <?php echo $user_data['hdEmail'] ?>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kuaför Type <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php if($user_data['hdType']=="0"){ ?>
                                        <select id="first-name" name="hdType">
                                            <option value="0" selected="selected">Kadın Kuaförü</option>
                                            <option value="1">Erkek Kuaförü</option>
                                        </select>
                                    <?php }elseif ($user_data['hdType']=="1"){?>
                                        <select id="first-name" name="hdType">
                                            <option value="0">Kadın Kuaförü</option>
                                            <option value="1" selected="selected">Erkek Kuaförü</option>
                                        </select>
                                    <?php }?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kuaför Durum</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                        <?php if($user_data['hdStatus']=="0"){ ?>
                                            Kayıt talebiniz inceleniyor
                                        <?php }elseif ($user_data['hdStatus']=="-1"){?>
                                            Kayıt talebiniz onaylanmadı
                                        <?php }elseif ($user_data['hdStatus']=="1"){?>
                                            Kayıtınız onaylandı, Kuaför panelinde tüm yetkilere sahipsiniz
                                        <?php }elseif ($user_data['hdStatus']=="2"){?>
                                            Siteye alınma talebiniz inceleniyor
                                        <?php }elseif ($user_data['hdStatus']=="-2"){?>
                                            Siteye alınma talebiniz onaylanmadı
                                        <?php }elseif ($user_data['hdStatus']=="3"){?>
                                            Siteye alınma talebiniz onaylandı, sitede aktif durumdasınız
                                        <?php }?>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kuaför Puanı</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                        <?php echo $user_data['hdRating'] ?>
                                    </label>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="updateHairdresser" class="btn btn-success">Güncelle
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
