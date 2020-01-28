<?php

include "../curl_api.php";

$data_array = array(
    "hdGallery_id" => $_GET['gallery_id']
);

$make_call = callAPI('DELETE', 'http://localhost/rest_api_slim/public/api/hdGallery/deleteHdGallery', json_encode($data_array));
$response = json_decode($make_call, true);

header("Location:../../nedmin/production/hd_gallery.php");