<?php

include "../curl_api.php";

$data_array = array(
    "ser_name" => $_POST["ser_name"],
    "ser_type" => $_POST["ser_type"]
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/service/addService', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

apcu_store("action_status", $status);

if($status == null){
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/services.php");
    exit;
}
elseif ($status == "error"){
    apcu_store("message", $message);
    header("Location:../../nedmin/production/services.php");
    exit;
}



$data_array1 = array(
    "hd_id" => $_POST['hd_id'],
    "ser_id" => $response["data"]["serId"],
    "ser_price" => $_POST["ser_price"],
    "ser_min_time" => $_POST["ser_min_time"]
);

$make_call1 = callAPI('POST', 'http://localhost/rest_api_slim/public/api/hairdresserServices/addHairdresserService', json_encode($data_array1));
$response1 = json_decode($make_call1, true);
$message1 = $response1["message"];
$status1 = $response1["status"];

apcu_store("action_status", $status1);

if($status1 == null){
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/services.php");
    exit;
}

apcu_store("message", $message1);
header("Location:../../nedmin/production/services.php");




