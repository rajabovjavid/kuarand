<?php

include "../curl_api.php";
include "../write_to_file.php";

$data_array = array(
    "cus_name" => $_POST['cus_name'],
    "cus_email" => $_POST['cus_email'],
    "cus_password" => $_POST['cus_password'],
    "cus_phone" => $_POST['cus_password']
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/customer/addCustomer', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if ($status == "ok") {
    header("Location:../../views/signin.php");
    apcu_store("message", "You successfully signed up! You can login here!");
}
elseif ($status == "error"){
    $error_code = $response["error_code"];
    if ($error_code == 1){
        header("Location:../../views/signup.php");
        apcu_store("message", "Email you entered is in use!");
    }
    elseif ($error_code == 2){
        header("Location:../../views/signup.php");
        apcu_store("message", $message);
    }
}
