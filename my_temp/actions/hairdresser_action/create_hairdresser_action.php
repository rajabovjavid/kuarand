<?php

ob_start();
session_start();

include '../db.php';


$hdName = htmlspecialchars($_POST['hairdresser_name']);
$hdEmail = htmlspecialchars($_POST['email']);

$hdAddress = htmlspecialchars($_POST['hairdresser_address']);

$hdType = $_POST['type'];

$sehir = $_POST['sehir'];

$passwordone = trim($_POST['passwordone']);
$passwordtwo = trim($_POST['passwordtwo']);


if ($passwordone == $passwordtwo) {

    if (strlen($passwordone) >= 6) {


        // Başlangıç

        $hd_query = $db->prepare("select * from hairdressers where email=:mail");
        $hd_query->execute(array(
            'mail' => $hdEmail
        ));

        //dönen satır sayısını belirtir
        $say1 = $hd_query->rowCount();

        $user_query = $db->prepare("select * from users where email=:mail");
        $user_query->execute(array(
            'mail' => $hdEmail
        ));

        //dönen satır sayısını belirtir
        $say2 = $user_query->rowCount();


        if ($say1+$say2 == 0) {

            //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
            $password = md5($passwordone);

            //Kullanıcı kayıt işlemi yapılıyor...
            $hd_save = $db->prepare("INSERT INTO hairdressers SET
					hdName=:hdName,
					hdAddress=:address,
					hdEmail=:mail,
					hdPassword=:password,
					hdType=:hdType,
					sehir=:sehir
					");
            $insert = $hd_save->execute(array(
                'hdName' => $hdName,
                'address' => $hdAddress,
                'mail' => $hdEmail,
                'password' => $password,
                'hdType' => $hdType,
                'sehir' => $sehir
            ));

            if ($insert) {
                header("Location:../../views/user_views/signin.php?durum=ok");

            } else {

                header("Location:../../views/hairdresser_views/create_hairdresser.php?durum=notok");

            }

        } else {

            header("Location:../../views/hairdresser_views/create_hairdresser.php?durum=used_email");

        }


        // Bitiş


    }
    else {
        header("Location:../../views/hairdresser_views/create_hairdresser.php?durum=eksiksifre");
    }
} else {
    header("Location:../../views/hairdresser_views/create_hairdresser.php?durum=farklisifre");
}