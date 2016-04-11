<?php

$list1 = ['Tom', 'Forman', '1985'];


$arr1 = array("Tom" => "firstname", "Forman" => "secondname", "1985" => "age");

$list2 = ['Tom','1985'];




foreach ($list1 as $key) {

    echo "$arr1[$key]<br/>";



}

foreach ($arr1 as $key => $value) {
    if (in_array($list2, $arr1) ) {
        echo 'present ' . $arr1[$key] . '<br/>';
    }
    else {
        echo 'not present ' . $arr1[$key] . '<br/>';

    }

}


//нужно пройти по списку $list1 и попытаться получить по каждому значению из списка $list1 значение по этому
//ключю из $arr1

?>