<?php

ob_start();
session_start();

include '../db.php';


echo $username = htmlspecialchars($_POST['username']);
echo "<br>";
echo $email = htmlspecialchars($_POST['email']);
echo "<br>";

echo $passwordone = trim($_POST['passwordone']);
echo "<br>";
echo $passwordtwo = trim($_POST['passwordtwo']);
echo "<br>";


if ($passwordone == $passwordtwo) {

    if (strlen($passwordone) >= 6) {


        // Başlangıç

        $user_query = $db->prepare("select * from users where email=:mail");
        $user_query->execute(array(
            'mail' => $email
        ));

        //dönen satır sayısını belirtir
        $say = $user_query->rowCount();


        if ($say == 0) {

            //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
            $password = md5($passwordone);

            $yetki = 1;

            //Kullanıcı kayıt işlemi yapılıyor...
            $user_save = $db->prepare("INSERT INTO users SET
					username=:username,
					email=:email,
					password=:password,
					yetki=:yetki
					");
            $insert = $user_save->execute(array(
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'yetki' => $yetki
            ));

            if ($insert) {

                header("Location:../../views/user_views/signin.php?durum=ok");

            } else {

                header("Location:../../views/user_views/signup.php?durum=notok");

            }

        } else {

            header("Location:../../views/user_views/signup.php?durum=used_email");

        }


        // Bitiş


    }
    else {
        header("Location:../../views/user_views/signup.php?durum=eksiksifre");
    }
} else {
    header("Location:../../views/user_views/signup.php?durum=farklisifre");
}