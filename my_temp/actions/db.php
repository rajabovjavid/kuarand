<?php

try {

    $db = new PDO("mysql:host=localhost;dbname=randevu;charset=utf8", 'root', 'mysql');
    //echo "veritabanı bağlantısı başarılı";
} catch (PDOExpception $e) {
    echo $e->getMessage();
}


?>