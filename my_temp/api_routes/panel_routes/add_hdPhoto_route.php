<?php

include "../curl_api.php";

$data_array = array(
    "hd_id" => $_POST['hd_id'],
    "hdPhoto_priority" => $_POST["priority"],
    "hd_photo" => $_FILES["image"]["tmp_name"]
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/hdGallery/addHdGallery', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

apcu_store("action_status", $status);

if($status == null){
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/hd_gallery.php");
    exit;
}

apcu_store("message", $message);
header("Location:../../nedmin/production/hd_gallery.php");
