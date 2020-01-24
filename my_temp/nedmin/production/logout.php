<?php 
session_start();

apc_clear_cache("user");
apc_store("message", "Başarıyla çıkış yaptınız");
session_destroy();
header("Location:login.php");

 ?>