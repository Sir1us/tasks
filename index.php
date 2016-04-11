<?php
include "config.php";

$adresses_table = pg_query($connect, "SELECT * FROM adresses");
$hostnames_table = pg_query($connect, "SELECT * FROM hostnames");

$hosts = [
    '192.168.0.1',
    '192.168.0.2',
    '192.168.0.10',
];
//print_r($hosts);

$array_adresses = pg_fetch_all($adresses_table);
//print_r($array_adresses);
$array_hostnames = pg_fetch_all($hostnames_table);
//print_r($array_hostnames);

$new_array_adresses = array_column($array_adresses, 'id', 'ip');
//print_r($new_array_adresses);
$new_array_hostnames = array_column($array_hostnames, 'hostname', 'id');
//print_r($new_array_hostnames);

$multiple_arrays = '';

foreach ($hosts as $key) {
    if (array_key_exists($key, $new_array_adresses)) {
        $id = $new_array_adresses[$key];
//        print_r($id);
        $result_host = $new_array_hostnames[$id];
//        print_r($new_array_hostnames);
        $multiple_arrays = $multiple_arrays . "<option value=\"$id\">" . $result_host . "</option>";
    }
}
echo "<select multiple=\"multiple\">" . $multiple_arrays . "</select>"



?>