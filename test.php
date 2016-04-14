<?php

include "config.php";

$adresses_table = pg_query($connect, "SELECT * FROM adresses");
$hostnames_table = pg_query($connect, "SELECT * FROM hostnames");

$hosts = [
    '192.168.0.1',
    '192.168.0.2',
];
//print_r($hosts);

$array_adresses = pg_fetch_all($adresses_table);
//print_r($array_adresses);
$array_hostnames = pg_fetch_all($hostnames_table);
//print_r($array_hostnames);

/*$new_array_adresses = array_column($array_adresses, 'ip', 'id');
//print_r($new_array_adresses);
$new_array_hostnames = array_column($array_hostnames, 'hostname', 'id');
//print_r($new_array_hostnames);

//$array = array_merge($new_array_hostnames, $new_array_adresses);
//print_r($array);

$r = array_diff($new_array_adresses, $hosts);

print_r($r);*/

$array = json_encode($array_adresses);
echo $array;






?>