<?php

include "../curl_api.php";

$data_array = array(
    "hd_id" => $_POST['hd_id'],
    "work_day" => $_POST['day'],
    "start_hour" => $_POST['start_hour'],
    "finish_hour" => $_POST["finish_hour"],
);

$make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/hdWorkHour/updateHdWorkHour', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if($status == null){
    apcu_store("action_status", $status);
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/hd_work_hour_update.php");
    exit;
}

apcu_store("action_status", $status);
apcu_store("message", $message);

if ($status == "error"){
    header("Location:../../nedmin/production/hd_work_hour_update.php");
    exit;
}
elseif ($status == "ok"){
    header("Location:../../nedmin/production/hd_work_hour_update.php?hd_id=".$response["hd_id"]."&day=".$response["day"]);
    exit;
}
