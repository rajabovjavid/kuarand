<?php
include "../curl_api.php";
include "../write_to_file.php";

//include "";

$panel_type = $_POST["panel_type"];

if($panel_type == "0"){
    echo 0;
}
elseif ($panel_type == "1"){
    $data_array = array(
        "hd_email" => $_POST['email'],
        "hd_password" => $_POST['password']
    );


    $make_call = callAPI('POST', 'http://localhost:8888/rest_api_slim/public/api/hairdresser/signinHairdresser', json_encode($data_array));
    $response = json_decode($make_call, true);
    $message = $response["message"];
    $status = $response["status"];

    write_to_file("log.txt",$status);

    if($status == "error"){
        header("Location:../../nedmin/production/login.php?message=$message");
        exit;
    }

    $_SESSION['email'] = $response["data"]["hdEmail"];
    apc_store("is_panel_user", "1");
    apc_store("user_data", $response["data"]);
    header("Location:../../nedmin/production/index.php?message=$message");
}

