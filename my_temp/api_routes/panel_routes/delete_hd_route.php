<?php

include "../curl_api.php";

$data_array = array(
    "hd_email" => $_GET['hd_email']
);

$make_call = callAPI('DELETE', 'http://localhost/rest_api_slim/public/api/hairdresser/deleteHairdresser', json_encode($data_array));
$response = json_decode($make_call, true);

header("Location:../../nedmin/production/hairdressers.php");