<?php
include "config.php";

$meaning_from_db1 = pg_query($connect, "SELECT * FROM adresses");
$meaning_from_db2 = pg_query($connect, "SELECT * FROM hostnames");

$hosts = [
    '192.168.0.1',
    '192.168.0.2',
    '192.168.0.10',
];
//print_r($hosts);

$conclusion_array1 = pg_fetch_all($meaning_from_db1);
//print_r($conclusion_array1);
$conclusion_array2 = pg_fetch_all($meaning_from_db2);
//print_r($conclusion_array2);

$new_array1 = array_column($conclusion_array1, 'id', 'ip');
//print_r($new_array1);
$new_array2 = array_column($conclusion_array2, 'hostname', 'id');
//print_r($new_array2);

$select_from_array = '';

foreach ($hosts as $key) {
    if (array_key_exists($key, $new_array1)) {
        $id = $new_array1[$key];
//        print_r($id);
        $result_host = $new_array2[$id];
//        print_r($result_host);
        $select_from_array = $select_from_array . "<option value=\"$id\">" . $result_host . "</option>";
    }
}
echo "<select multiple=\"multiple\">" . $select_from_array . "</select>"



?>