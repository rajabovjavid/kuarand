<?php

try {

    $db = new mysqli("jvdrjbvaws.cffb5ecxegu8.us-east-2.rds.amazonaws.com", "kuarandawslogin", "kuafofrandevuaws", "kuarand");
    echo "veritabanı bağlantısı başarılı";
} catch (PDOExpception $e) {
    echo $e->getMessage();
}


?>