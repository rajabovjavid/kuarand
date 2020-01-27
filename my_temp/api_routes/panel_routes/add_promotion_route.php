<?php

include "../curl_api.php";

$hdPromoId = $_POST["promo_id"];

if($hdPromoId=="") {

    $data_array = array(
        "hd_id" => $_POST['hd_id'],
        "ser_id" => $_POST['ser_id'],
        "promo_discount" => $_POST["promo_discount"],
        "promo_duration" => $_POST["promo_duration"]
    );

    $make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/hdPromotion/addHdPromotion', json_encode($data_array));
    $response = json_decode($make_call, true);
    $message = $response["message"];
    $status = $response["status"];

    apcu_store("action_status", $status);

    if ($status == null) {
        apcu_store("message", "sistem hatası");
        header("Location:../../nedmin/production/services.php");
        exit;
    }


    apcu_store("message", $message);
    header("Location:../../nedmin/production/services.php");

}
else{
    $data_array = array(
        "hdPromo_id" => $hdPromoId,
        "promo_discount" => $_POST["promo_discount"],
        "promo_duration" => $_POST["promo_duration"]
    );

    $make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/hdPromotion/updateHdPromotion', json_encode($data_array));
    $response = json_decode($make_call, true);
    $message = $response["message"];
    $status = $response["status"];

    apcu_store("action_status", $status);

    if ($status == null) {
        apcu_store("message", "sistem hatası");
        header("Location:../../nedmin/production/services.php");
        exit;
    }


    apcu_store("message", $message);
    header("Location:../../nedmin/production/services.php");
}