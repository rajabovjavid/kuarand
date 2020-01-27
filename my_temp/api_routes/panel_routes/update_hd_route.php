<?php
ob_start();
session_start();

include "../curl_api.php";

/*if(apcu_fetch("panel_type")=="admin"){ // kuaför güncelleme isteği admin tarafından gelmişse

}
elseif (apcu_fetch("panel_type")=="hairdresser"){ // kuaför kendi bilgilerini güncellemek istiyorsa
    // TODO - hdName, hdPassword, hdType en az bir tanesini değiştirmemişse, api call yapılmadan geri dönülmesi lazım
}*/

// api'ye istek için post datası
$data_array = array(
    "hd_name" => $_POST["hdName"],
    "hd_email" => $_POST["hdEmail"],
    "hd_password" => $_POST["hdPassword"],
    "hd_type" => $_POST["hdType"],
    "hd_status" => $_POST["hdStatus"]
);

// api'ye istek atma
$make_call = callAPI('PUT', 'http://localhost/rest_api_slim/public/api/hairdresser/updateHairdresser', json_encode($data_array));
$response = json_decode($make_call, true); // api'den gelen response
$status = $response["status"];
$message = $response["message"];

apcu_store("action_status", $status);

if($status == null) {
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/hd_info.php");
    exit;
}
elseif ($status == "error"){
    apcu_store("message", $message);
    header("Location:../../nedmin/production/hd_info.php");
    exit;
}
elseif ($status == "ok"){
    apcu_store("message", $message);
    apcu_store("user_data", $response["data"]);
    header("Location:../../nedmin/production/hd_info.php");
}

