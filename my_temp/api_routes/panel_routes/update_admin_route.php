<?php

include "../curl_api.php";

$adminType = ($_POST["admin_type"] == "Low") ? 0 : 1;

$data_array = array(
    "admin_name" => $_POST['admin_name'],
    "admin_email" => $_POST['admin_email'],
    "admin_password" => $_POST["admin_password"],
    "admin_type" => $adminType
);

$make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/admin/updateAdmin', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

apcu_store("action_status", $status);

if($status == null) {
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/admin_info.php");
    exit;
}
elseif ($status == "error"){
    apcu_store("message", $message);
    header("Location:../../nedmin/production/admin_info.php");
    exit;
}
elseif ($status == "ok"){
    apcu_store("message", $message);
    apcu_store("user_data", $response["data"]);
    header("Location:../../nedmin/production/admin_info.php");
}