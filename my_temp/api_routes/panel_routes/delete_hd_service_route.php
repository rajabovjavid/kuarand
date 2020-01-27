<?php

include "../curl_api.php";

$data_array = array(
    "hd_id" => $_GET['hd_id'],
    "ser_id" => $_GET['ser_id']
);

$make_call = callAPI('DELETE', 'http://localhost/rest_api_slim/public/api/hairdresserServices/deleteHairdresserService', json_encode($data_array));
$response = json_decode($make_call, true);

header("Location:../../nedmin/production/services.php");