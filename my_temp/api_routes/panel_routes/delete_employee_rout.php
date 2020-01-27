<?php

include "../curl_api.php";

$data_array = array(
    "employee_id" => $_GET['emp_id']
);

$make_call = callAPI('DELETE', 'http://localhost/rest_api_slim/public/api/employee/deleteEmployee', json_encode($data_array));
$response = json_decode($make_call, true);

header("Location:../../nedmin/production/employees.php");