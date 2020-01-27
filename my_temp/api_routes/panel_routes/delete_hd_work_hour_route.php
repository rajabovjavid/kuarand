<?php

include "../curl_api.php";

$data_array = array(
    "hd_id" => $_GET['hd_id'],
    "work_day" => $_GET['day'],
);

$make_call = callAPI('DELETE', 'http://localhost/rest_api_slim/public/api/hdWorkHour/deleteHdWorkHour', json_encode($data_array));
$response = json_decode($make_call, true);

header("Location:../../nedmin/production/hd_work_hour.php");
