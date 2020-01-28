<?php

include "../curl_api.php";

$data_array = array(
    "hdGallery_id" => $_POST['gallery_id'],
    "hdPhoto_priority" => $_POST['priority']
);

$make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/hdGallery/updateHdGallery', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if($status == null){
    apcu_store("action_status", $status);
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/gallery_update.php?gallery_id=".$_POST['gallery_id']);
    exit;
}

apcu_store("action_status", $status);
apcu_store("message", $message);

header("Location:../../nedmin/production/hd_gallery.php");
exit;