<?php
include "config.php";

$adresses_table = pg_query($connect, "SELECT * FROM adresses");
$hostnames_table = pg_query($connect, "SELECT * FROM hostnames");

$hosts = [
    '192.168.0.1',
    '192.168.0.2',
    '192.168.0.3',
];
//print_r($hosts);

$array_adresses = pg_fetch_all($adresses_table);
//print_r($array_adresses);
$array_hostnames = pg_fetch_all($hostnames_table);
//print_r($array_hostnames);

$new_array_adresses = array_column($array_adresses, 'ip', 'id');
//print_r($new_array_adresses);
$new_array_hostnames = array_column($array_hostnames, 'hostname', 'id');
//print_r($new_array_hostnames);


$exist_array = array_diff($new_array_adresses, $hosts);

//print_r($exist_array);


$multiple_arrays = '';


foreach ($hosts as $key => $value) {
    if (array_key_exists($key, $new_array_adresses)) {
        $name_id = $new_array_adresses[$key];
//        print_r($id);
        $result_hostname = $new_array_hostnames[$key];
//        print_r($result_hostname);
        $multiple_arrays .= '<option value="' . $name_id . '">' . $result_hostname . '</option>';
    }
}
foreach ($exist_array as $key => $value) {
    $multiple_arrays .= '<option value="' . $value . '">' . $new_array_hostnames[$key] . '</option>';
}
echo '<select multiple="multiple">' . $multiple_arrays . '</select>';


?>


