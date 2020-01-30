<?php

ob_start();
session_start();

if($_SESSION["auth"]!=1){
    apcu_store("message", "admin panel kullanıcısı değilsiniz");
    header("Location:login.php");
    exit;
}
