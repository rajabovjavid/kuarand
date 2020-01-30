<?php 
session_start();

apcu_clear_cache();
apcu_store("message", "Exited successfully");
session_destroy();
header("Location:login.php");

 ?>