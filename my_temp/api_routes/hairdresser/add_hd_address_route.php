<?php

$data_address_array = array(
    "address_city" => $_POST['address_city'],
    "address_region" => $_POST['address_region'],
    "address_neigh" => $_POST['address_neigh'],
    "address_street" => $_POST['address_street'],
    "address_other" => $_POST['address_other']
);

$hd_id = $_POST['hd_id'];

$make_call_address = callAPI('POST', 'http://localhost/rest_api_slim/public/api/hairdresser/add_address/'.$hd_id, json_encode($data_address_array));
$response_of_address = json_decode($make_call_address, true);