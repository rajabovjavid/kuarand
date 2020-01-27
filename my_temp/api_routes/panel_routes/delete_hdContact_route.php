<?php

include "../curl_api.php";

$data_array = array(
    "hd_contact_id" => $_GET['hdContact_id']
);

$make_call = callAPI('DELETE', 'http://localhost/rest_api_slim/public/api/hdContact/deleteHdContact', json_encode($data_array));
$response = json_decode($make_call, true);

header("Location:../../nedmin/production/hd_contacts.php");