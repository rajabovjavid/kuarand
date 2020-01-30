<?php

include "../curl_api.php";

$data_array = array(
    "admin_email" => $_GET['admin_email']
);

$make_call = callAPI('DELETE', 'http://localhost/rest_api_slim/public/api/admin/deleteAdmin', json_encode($data_array));
$response = json_decode($make_call, true);

header("Location:../../nedmin/production/admins.php");