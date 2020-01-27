<?php
ob_start();
session_start();

include "../curl_api.php";

// api'ye istek için post datası
$data_array = array(
    "hd_id" => $_POST["hdId"],
    "address_city" => $_POST["hdAddressCity"],
    "address_region" => $_POST["hdAddressRegion"],
    "address_neigh" => $_POST["hdAddressNeighboor"],
    "address_street" => $_POST["hdAddressStreet"],
    "address_other" => $_POST["hdAddressOtherInfo"]
);

// api'ye istek atma
$make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/hdAddress/updateHdAddress', json_encode($data_array));
$response = json_decode($make_call, true); // api'den gelen response
$status = $response["status"];
$message = $response["message"];

if($status == null) {
    apcu_store("action_status", $status);
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/hd_address.php");
    exit;
}
elseif ($status == "error"){
    apcu_store("action_status", $status);
    apcu_store("message", $message);
    header("Location:../../nedmin/production/hd_address.php");
    exit;
}
elseif ($status == "ok"){
    apcu_store("action_status", $status);
    apcu_store("message", $message);
    apcu_store("user_data", $response["data"]);
    header("Location:../../nedmin/production/hd_address.php");
}