<?php

include "../curl_api.php";

$data_array = array(
    "ser_id" => $_POST['ser_id'],
    "hd_id" => $_POST['hd_id'],
    "ser_price" => $_POST['ser_price'],
    "ser_min_time" => $_POST['ser_min_time']
);

$make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/hairdresserServices/updateHairdresserService', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if($status == null){
    apcu_store("action_status", $status);
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/service_update.php");
    exit;
}

apcu_store("action_status", $status);
apcu_store("message", $message);

if ($status == "error"){
    header("Location:../../nedmin/production/service_update.php");
    exit;
}
elseif ($status == "ok"){
    header("Location:../../nedmin/production/service_update.php?ser_id=".$_POST['ser_id']);
    exit;
}