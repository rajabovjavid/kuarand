<?php

try {

    $db = new PDO("mysql:host=remotemysql.com;dbname=faYpJ2XCps;charset=utf8", 'faYpJ2XCps', 'Xe0ZbhAxe4');
    //echo "veritabanı bağlantısı başarılı";
} catch (PDOExpception $e) {
    echo $e->getMessage();
}


?>