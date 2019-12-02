<?php

ob_start();
session_start();

include "../curl_api.php";
include "../write_to_file.php";

$data_array = array(
    "cus_email" => $_POST['cus_email'],
    "cus_password" => $_POST['cus_password']
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/customer/signin', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if ($status=="ok"){
    $customer = $response["data"];

    $_SESSION['email'] = $customer["customerEmail"];

    header("Location:../../index.php");
    exit;
}
elseif ($status == "error"){
    header("Location:../../views/signin.php?message=$message");
}