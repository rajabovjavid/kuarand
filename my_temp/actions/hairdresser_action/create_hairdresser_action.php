<?php

ob_start();
session_start();

include '../db.php';


$hdName = htmlspecialchars($_POST['hairdresser_name']);
$hdEmail = htmlspecialchars($_POST['email']);

$hdContact = new stdClass();
$hdContact->hdEmail = $hdEmail;

$hdAddress = new stdClass();
$hdAddress->hdAddressCity = htmlspecialchars($_POST['address_city']);
$hdAddress->hdAddressRegion = htmlspecialchars($_POST['address_region']);
$hdAddress->hdAddressNeigh = htmlspecialchars($_POST['address_neigh']);
$hdAddress->hdAddressStreet = htmlspecialchars($_POST['address_street']);
$hdAddress->hdAddressOther = htmlspecialchars($_POST['address_other']);


$hdType = $_POST['type'];

$passwordone = trim($_POST['passwordone']);
$passwordtwo = trim($_POST['passwordtwo']);


if ($passwordone == $passwordtwo) {

    if (strlen($passwordone) >= 6) {


        // Başlangıç

        $hd_query = $db->prepare("select * from Hairdresser where hdEmail=:mail");
        $hd_query->execute(array(
            'mail' => $hdEmail
        ));

        //dönen satır sayısını belirtir
        $say1 = $hd_query->rowCount();

        if ($say1 == 0) {

            //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
            $password = md5($passwordone);

            //Kullanıcı kayıt işlemi yapılıyor...
            $hd_save = $db->prepare("INSERT INTO Hairdresser SET
					hdName=:hdName,
					hdEmail=:mail,
					hdPassword=:password,
					hdType=:hdType
					");
            $insert = $hd_save->execute(array(
                'hdName' => $hdName,
                'mail' => $hdEmail,
                'password' => $password,
                'hdType' => $hdType
            ));



            /*$log_file = fopen("log.txt", "w") or die("Unable to open file!");
            fwrite($log_file, $insert);
            fclose($log_file);*/

            if ($insert) {
                $hdAddress->hdId = $db->lastInsertId();
                header("Location:add_hdAddress_action.php?hdAddress=".json_encode($hdAddress));
                //header("Location:add_hdContact_action.php?hdContact=$hdContact");
                header("Location:../../views/signin.php?durum=ok");
            }
            else {
                header("Location:../../views/create_hairdresser.php?durum=notok");
            }

        }
        else {
            header("Location:../../views/create_hairdresser.php?durum=used_email");
        }


        // Bitiş


    }
    else {
        header("Location:../../views/create_hairdresser.php?durum=eksiksifre");
    }
}
else {
    header("Location:../../views/create_hairdresser.php?durum=farklisifre");
}