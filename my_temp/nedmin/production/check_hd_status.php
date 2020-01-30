<?php

$userdata = apcu_fetch("user_data");
if($userdata["hdStatus"]==0 || $userdata["hdStatus"]==-1){
    header("Location:index.php");
    exit;
}