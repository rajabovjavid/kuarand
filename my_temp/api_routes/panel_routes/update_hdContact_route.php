<?php
ob_start();
session_start();

include "../curl_api.php";

// api'ye istek için post datası
$data_array = array(
    "hd_contact_id" => $_POST["hdContactId"],
    "hd_contact_type" => $_POST["hdContactType"],
    "hd_contact" => $_POST["hdContact"]
);

// api'ye istek atma
$make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/hdContact/updateHdContact', json_encode($data_array));
$response = json_decode($make_call, true); // api'den gelen response
$message = $response["message"];
$status = $response["status"];

if($status == null){
    apcu_store("action_status", $status);
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/hd_contact_update.php");
    exit;
}

apcu_store("action_status", $status);
apcu_store("message", $message);

if ($status == "error"){
    header("Location:../../nedmin/production/hd_contact_update.php");
    exit;
}
elseif ($status == "ok"){
    header("Location:../../nedmin/production/hd_contact_update.php?hdContact_id=".$response["data"]);
    exit;
}