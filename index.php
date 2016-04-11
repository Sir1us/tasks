<pre>
<?php
include "config.php";

$arr1 = pg_query($connect, "SELECT a.id, a.ip, h.hostname FROM adresses a JOIN hostnames h ON a.id = h.id");

$hosts = [
    '192.168.0.1',
    '192.168.0.2',
    '192.168.0.10',
];

$p = pg_fetch_all($arr1);

//print_r ($p);
//$n = pg_num_rows($arr1);
//for ($i = 0; $i<$n; $i++) {
//
//    echo $p[$i]['ip'].'<br/>';
//}

echo "<select multiple='multiple'>";

function build_sorter($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}

usort($p, build_sorter('id'));

foreach ($p as $item) {
    echo "<option>";
    echo $item['id'] . ' => ' . $item['ip'] . ' => ' . $item['hostname'];
    echo "</option>";

}
echo "</select>";


// требуеться по данным которые возврощаються из БД построить форму <select>
// в случае если ip адрес из БД осутствует в $host мы не рендарим этот пункт





?>
    </pre>
