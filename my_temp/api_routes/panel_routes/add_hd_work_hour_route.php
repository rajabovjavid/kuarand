<?php

include "../curl_api.php";

$data_array = array(
    "hd_id" => $_POST['hd_id'],
    "work_day" => $_POST['day'],
    "start_hour" => $_POST['start_hour'],
    "finish_hour" => $_POST["finish_hour"],
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/hdWorkHour/addHdWorkHour', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if($status == null){
    apcu_store("action_status", $status);
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/hd_work_hour.php");
    exit;
}

apcu_store("action_status", $status);
apcu_store("message", $message);
header("Location:../../nedmin/production/hd_work_hour.php");
