<?php

ob_start();
session_start();

include '../db.php';

$email = htmlspecialchars($_POST['email']);
$password = md5(trim($_POST['password']));

$log_file = fopen("log.txt", "w") or die("Unable to open file!");
fwrite($log_file, $email." ".$password);
fclose($log_file);

$customer_query = $db->prepare("select * from Customer where customerEmail=:email and  customerPassword=:password" );

$customer_query->execute(array(
    'email' => $email,
    'password' => $password
));

$say1 = $customer_query->rowCount();

if ($say1 == 1) {

    $_SESSION['email'] = $email;

    header("Location:../../index.php");
    exit;

}
else {
    header("Location:../../views/signin.php?durum=basarisizgiris");
}

/*else {

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
        header("Location:../../views/signin.php?durum=basarisizgiris");
    }
}*/