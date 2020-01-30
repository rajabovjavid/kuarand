<?php

include 'header.php';
include "check_hd_status.php";

include '../../api_routes/curl_api.php';

$user_data = apcu_fetch("user_data");

// filter employee by hd _route
$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/employee/filterEmployeeByHd?hd_id=' . $user_data["hdId"], false);
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
                        <h2>Employees
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
                            <a href="add_employee.php">
                                <button class="btn btn-success btn-xs"> Yeni Ekle</button>
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
                                <th>NAME SURNAME</th>
                                <th>GENDER</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php

                            foreach ( $response["data"] as $employee ) { ?>


                                <tr>
                                    <td><?php echo $employee["employeeId"] ?></td>
                                    <td><?php echo $employee["employeeName"] ?></td>
                                    <td><?php echo ($employee["employeeGender"]=='1')?"erkek":'kadın';?></td>
                                    <td>
                                        <center>
                                            <a href="employee_update.php?emp_id=<?php echo $employee["employeeId"]; ?>">
                                                <button class="btn btn-primary btn-xs">Düzenle</button>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="../../api_routes/panel_routes/delete_employee_rout.php?emp_id=<?php echo $employee['employeeId']?>">
                                                <button class="btn btn-danger btn-xs">Sil</button>
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
