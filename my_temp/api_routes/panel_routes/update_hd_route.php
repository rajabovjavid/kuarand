<?php
ob_start();
session_start();

if(apcu_fetch("panel_type")=="admin"){ // kuaför güncelleme isteği admin tarafından gelmişse
    exit;
}
elseif (apcu_fetch("panel_type")=="hairdresser"){ // kuaför kendi bilgilerini güncellemek istiyorsa
    $hd = apcu_fetch("user_data");

    $hdName = $_POST["hdName"]; // kuaför ismini formdan alıyoruz
    if($hdName==""){// eğer ismi boş göndermişse, apc'deki ismi kullanıyoruz
        $hdName = $hd["hdName"];
    }

    $hdEmail = $hd["hdEmail"]; // emaili güncelliyemeyeceği için, apc'de tutduğumuz user data'dan alıyoruz

    $hdPassword = $_POST["hdPassword"]; // kuaför şifresini formdan alıyoruz
    if($hdPassword==""){ // eğer şifreyi boş göndermişse, apc'deki şifreyi kullanıyoruz
        $hdPassword = $hd["hdPassword"];
    }

    $hdType = $_POST["hdType"]; // kuaför type'ını formdan alıyoruz

    $hdStatus = $hd["hdStatus"]; // kuaför status'unu formdan güncelliyemiyor zaten, ondan dolayı apc'deki status alıyoruz
}

// api'ye istek için post datası
$data_array = array(
    "hd_name" => $hdName,
    "hd_email" => $hdEmail,
    "hd_password" => $hdPassword,
    "hd_type" => $hdType,
    "hd_status" => $hdStatus
);

// api'ye istek atma
$make_call = callAPI('POST', 'http://localhost/rest_api_slim/public/api/hairdresser/updateHairdresser', json_encode($data_array));
$response = json_decode($make_call, true); // api'den gelen response
$status = $response["status"];
$message = $response["message"];

if($status == null) {
    apcu_store("action_status", $status);
    apcu_store("message", "sistem hatası");
    header("Location:../../nedmin/production/kuafor_bilgileri.php");
    exit;
}
elseif ($status == "error"){
    apcu_store("action_status", $status);
    apcu_store("message", $message);
    header("Location:../../nedmin/production/kuafor_bilgileri.php");
    exit;
}
elseif ($status == "ok"){
    apcu_delete("user_data");

}

