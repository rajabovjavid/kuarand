<?php

include "../curl_api.php";

$data_array = array(
    "hd_id" => $_POST['hd_id'],
    "ser_id" => $_POST['ser_id'],
    "ser_price" => $_POST["ser_price"],
    "ser_min_time" => $_POST["ser_min_time"]
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/hairdresserServices/addHairdresserService', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

apcu_store("action_status", $status);

if($status == null){
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/services.php");
    exit;
}

apcu_store("message", $message);
header("Location:../../nedmin/production/services.php");
