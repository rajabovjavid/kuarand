<?php
ob_start();
session_start();

include "../curl_api.php";

$hdStatus = isset($_POST["radio"])? $_POST["radio"] : $_POST["hd_status"];

// api'ye istek için post datası
$data_array = array(
    "hd_name" => $_POST["hd_name"],
    "hd_email" => $_POST["hd_email"],
    "hd_password" => $_POST["hd_password"],
    "hd_type" => $_POST["hd_type"],
    "hd_status" => $hdStatus
);

// api'ye istek atma
$make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/hairdresser/updateHairdresser', json_encode($data_array));
$response = json_decode($make_call, true); // api'den gelen response
$status = $response["status"];
$message = $response["message"];

apcu_store("action_status", $status);

if($status == null) {
    apcu_store("message", "sistem hatası");
    if($_SESSION["auth"]==1){
        header("Location:../../nedmin/production/hairdressers.php");
    }elseif ($_SESSION["auth"]==2){
        header("Location:../../nedmin/production/hd_info.php");
    }
    exit;
}
elseif ($status == "error"){
    apcu_store("message", $message);
    if($_SESSION["auth"]==1){
        header("Location:../../nedmin/production/hairdressers.php");
    }elseif ($_SESSION["auth"]==2){
        header("Location:../../nedmin/production/hd_info.php");
    }
    exit;
}
elseif ($status == "ok"){
    apcu_store("message", $message);
    if($_SESSION["auth"]==1){
        header("Location:../../nedmin/production/hairdressers.php");
    }elseif ($_SESSION["auth"]==2){
        apcu_store("user_data", $response["data"]);
        header("Location:../../nedmin/production/hd_info.php");
    }
    exit;
}

