<?php

include "../curl_api.php";

$data_array = array(
    "hd_id" => $_POST['hdId'],
    "hd_contact_type" => $_POST['hdContactType'],
    "hd_contact" => $_POST["hdContact"]
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/hdContact/addHdContact', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if($status == null){
    apcu_store("action_status", $status);
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/hd_contacts.php");
    exit;
}

apcu_store("action_status", $status);
apcu_store("message", $message);
header("Location:../../nedmin/production/hd_contacts.php");
