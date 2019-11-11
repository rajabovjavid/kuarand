<?php

ob_start();
session_start();

include '../db.php';

$email = htmlspecialchars($_POST['email']);
$password = md5(trim($_POST['password']));



$user_query = $db->prepare("select * from customer where email=:email and  yetki=:yetki and  password=:password" );

$user_query->execute(array(
    'email' => $email,
    'yetki' => 1,
    'password' => $password
));


$say1 = $user_query->rowCount();
echo $say1;

if ($say1 == 1) {

    $_SESSION['email'] = $email;

    header("Location:../../index.php");
    exit;

}
else {

    $hd_query = $db->prepare("select * from hairdressers where hdEmail=:email and  hdPassword=:password" );

    $hd_query->execute(array(
        'email' => $email,
        'password' => $password
    ));


    $say2 = $hd_query->rowCount();
    echo $say2;

    if($say2 == 1){
        $_SESSION['email'] = $email;

        header("Location:../../views/hairdresser_views/hd_account.php");
        exit;
    }
    else {
        header("Location:../../views/user_views/signin.php?durum=basarisizgiris");
    }

}