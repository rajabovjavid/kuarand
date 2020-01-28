<?php

ob_start();
session_start();

if(isset($_SESSION["auth"])){
    if($_SESSION["auth"]==1 || $_SESSION["auth"]==2){
        header("Location:../nedmin/production/logout.php");
        exit;
    }
}
