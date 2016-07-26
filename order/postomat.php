<?php
$city_id =  $_REQUEST['city_id'];

$xml = simplexml_load_file("http://gw.edostavka.ru:11443/pvzlist.php?cityid={$city_id}&type=POSTOMAT");
$result = [];

foreach($xml as $v){
    
    $code = (string)$v->attributes()['Code'];
    $name = (string)$v->attributes()['Name'];
    $address = (string)$v->attributes()['Address'];
    
    $result[$code] = $name.' - '.$address;
}

print $result = json_encode($result);

