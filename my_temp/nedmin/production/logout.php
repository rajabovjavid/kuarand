<?php 
session_start();

apcu_clear_cache();
apcu_store("message", "Başarıyla çıkış yaptınız");
session_destroy();
header("Location:login.php");

 ?>