<?php
include "../curl_api.php";

$data_array = array(
    "hd_name" => $_POST['hd_name'],
    "hd_email" => $_POST['hd_email'],
    "hd_password" => $_POST['hd_password'],
    "hd_type" => $_POST['hd_type'],

    "address_city" => $_POST['address_city'],
    "address_region" => $_POST['address_region'],
    "address_neigh" => $_POST['address_neigh'],
    "address_street" => $_POST['address_street'],
    "address_other" => $_POST['address_other'],
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/hairdresser/addHairdresser', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if($status == null){
    apcu_store("message", "sistem hatası");
    header("Location:../../views/hd_signup.php");
    exit;
}

apcu_store("message", $message);

if ($status == "error"){
    header("Location:../../views/hd_signup.php");
    exit;
}

header("Location:../../nedmin/production/login.php");