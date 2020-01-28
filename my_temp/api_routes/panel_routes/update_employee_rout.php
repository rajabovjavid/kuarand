<?php

include "../curl_api.php";

$data_array = array(
    "employee_id" => $_POST['employee_id'],
    "employee_name" => $_POST['employee_name'],
    "employee_gender" => $_POST["employee_gender"],
    "employee_photo" => $_FILES["image"]["tmp_name"],
    "employee_photo_base64" => $_POST["employee_photo_base64"]
);

$make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/employee/updateEmployee', json_encode($data_array));
$response = json_decode($make_call, true);
$message = $response["message"];
$status = $response["status"];

if($status == null){
    apcu_store("action_status", $status);
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/employee_update.php?emp_id=".$_POST['employee_id']);
    exit;
}

apcu_store("action_status", $status);
apcu_store("message", $message);

header("Location:../../nedmin/production/employee_update.php?emp_id=".$_POST['employee_id']);
exit;