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

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/hairdresser/signup', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if($status == "error"){
    $error_code = $response["error_code"];
    if ($error_code == 1){
        header("Location:../../views/hd_signup.php?message=$message");
    }
    elseif ($error_code == 2){
        header("Location:../../views/hd_signup.php?message=$message");
    }
}

header("Location:../../views/signin.php?message=$message");