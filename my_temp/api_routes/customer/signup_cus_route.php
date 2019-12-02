<?php

include "../curl_api.php";
include "../write_to_file.php";

$data_array = array(
    "cus_name" => $_POST['cus_name'],
    "cus_email" => $_POST['cus_email'],
    "cus_password" => $_POST['cus_password']
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/customer/signup', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if ($status == "ok") {
    header("Location:../../views/signin.php?message=$message");
}
elseif ($status == "error"){
    $error_code = $response["error_code"];
    if ($error_code == 1){
        header("Location:../../views/signup.php?message=$message");
    }
    elseif ($error_code == 2){
        header("Location:../../views/signup.php?message=$message");
    }
}
