<?php

include "../curl_api.php";

$data_array = array(
    "hd_name" => $_POST['hd_name'],
    "city" => $_POST['city'],
    "region" => $_POST["region"],
    "ser_name" => $_POST["ser_name"],
    "hd_type" => $_POST["hd_type"],
);

$make_call = callAPI('GET', 'http://localhost/rest_api_slim/public/api/hairdresser/searchHairdressers', $data_array);
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];
$searchData = json_decode($response["data"]);

apcu_store("action_status", $status);

if($status == null){
    apcu_store("message", "sistem hatası");
    header("Location:../../index.php");
    exit;
}

apcu_store("message", $message);
apcu_store("user_data", $response["data"]); // user data or smth else?
header("Location:../../views/search_hairdressers_results.php");
