<?php

$data_contact_array = array(
    "hd_contact" => $_POST['hd_email'],
    "hd_contact_type" => 0
);

$hd_id = $_POST['hd_id'];

$make_call_contact = callAPI('POST', 'http://localhost/rest_api_slim/public/api/panel_routes/add_contact/'.$hd_id, json_encode($data_contact_array));
$response_of_contact = json_decode($make_call_contact, true);