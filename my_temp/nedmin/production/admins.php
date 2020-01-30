<?php

include 'header.php';

include "check_admin_auth.php";

include "../../api_routes/curl_api.php";

//Belirli veriyi seçme işlemi
$urunsor = $db->prepare("SELECT * FROM urun order by urun_id DESC");
$urunsor->execute();


$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/admin/getAllAdmins', false);
$response = json_decode($make_call, true);
$status = $response["status"];

if ($status != "ok" or $status == null) {
    header("Location:index.php");
    exit;
}

$admins = $response["data"];

?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Hairdressers
                            <small>

                            </small>
                        </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <!-- Div İçerik Başlangıç -->

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Auth</th>
                                <th>Created At</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php

                            foreach ( $admins as $admin ) { ?>


                                <tr>
                                    <td width="20"><?php echo $admin["adminId"] ?></td>
                                    <td><?php echo $admin["adminEmail"] ?></td>
                                    <td><?php echo $admin["adminName"] ?></td>
                                    <td><?php echo ($admin["adminType"]==0)?"Low":"High" ?></td>
                                    <td><?php echo $admin['adminCreatedAt'] ?></td>
                                    <td>
                                        <center><a href="admin_auth_edit.php?admin_id=<?php echo $admin['adminId']; ?>&admin_auth=<?php echo $admin['adminType']; ?>">
                                                <button class="btn btn-primary btn-xs">Auth Edit</button>
                                            </a></center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="../../api_routes/panel_routes/delete_admin_route.php?admin_id=<?php echo $admin['adminId']; ?>">
                                                <button class="btn btn-danger btn-xs">Delete</button>
                                            </a></center>
                                    </td>
                                </tr>


                            <?php }

                            ?>


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
