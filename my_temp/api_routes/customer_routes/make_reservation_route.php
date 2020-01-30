<?php
ob_start();
session_start();

include "../curl_api.php";

if (!isset($_SESSION["email"])){
    header("Location:../../views/signin.php");
    exit;
}

$data_array = array(
    "hd_id" => $_POST['hd_id'],
    "ser_id" => $_POST['ser_id'],
    "customer_id" => $_POST["cus_id"],
    "reservation_date" => $_POST["reserv_date"],
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/reservation/addReservation', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

apcu_store("action_status", $status);

if($status == null){
    apcu_store("message", "sistem hatası");
    header("Location:../../views/index.php");
    exit;
}

apcu_store("message", $message);
header("Location:../../views/index.php");
