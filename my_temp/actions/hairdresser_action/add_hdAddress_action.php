<?php

include '../db.php';

$hdAddress = json_decode($_GET["hdAddress"]);

/*$log_file = fopen("log.txt", "w") or die("Unable to open file!");
fwrite($log_file, $hdAddress->hdId);
fclose($log_file);*/

$hd_address_save = $db->prepare("INSERT INTO HdAddress SET
					hdAddressCity=:city,
					hdAddressRegion=:region,
					hdAddressNeighborhood=:neigh,
					hdAddressStreet=:street,
					hdAddressOtherInfo=:other,
					hdId=:hdId
					");
$insert = $hd_address_save->execute(array(
    'city' => $hdAddress->hdAddressCity,
    'region' => $hdAddress->hdAddressRegion,
    'neigh' => $hdAddress->hdAddressNeigh,
    'street' => $hdAddress->hdAddressStreet,
    'other' => $hdAddress->hdAddressOther,
    'hdId' => $hdAddress->hdId
));
