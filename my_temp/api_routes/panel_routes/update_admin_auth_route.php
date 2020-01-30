<?php

include "../curl_api.php";

$data_array = array(
    "admin_id" => $_POST['admin_id'],
    "admin_type" => $_POST["admin_auth"]
);

$make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/admin/updateAdminAuth', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

header("Location:../../nedmin/production/admins.php");