<?php

include "../curl_api.php";

$data_array = array(
    "hd_id" => $_POST['hd_id'],
    "employee_name" => $_POST['employee_name'],
    "employee_gender" => $_POST["employee_gender"],
    "employee_photo" => ""
);

$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/employee/addEmployee', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if($status == null){
    apcu_store("action_status", $status);
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/employees.php");
    exit;
}

apcu_store("action_status", $status);
apcu_store("message", $message);
header("Location:../../nedmin/production/employees.php");
