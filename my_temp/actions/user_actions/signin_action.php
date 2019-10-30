<?php

ob_start();
session_start();

include '../db.php';

$email = htmlspecialchars($_POST['email']);
$password = md5(trim($_POST['password']));


$user_query = $db->prepare("select * from users where email=:email and  yetki=:yetki and  password=:password" );

$user_query->execute(array(
    'email' => $email,
    'yetki' => 1,
    'password' => $password
));


$say = $user_query->rowCount();
echo $say;

if ($say == 1) {

    $_SESSION['email'] = $email;

    header("Location:../../index.php");
    exit;

} else {
    header("Location:../../signin.php?durum=basarisizgiris");
}