<?php

$city = file('city.txt');
print '<pre>';
$f = fopen('City_RUS_20160428.csv', 'r');

$result = [];

while (($s = fgetcsv($f)) !== FALSE) {
    if ($s[3] == 'Москва' || $s[3] == 'Московская обл.') {
        $result[$s[0]] = $s[2];
    }
}
fclose($f);


asort($result);

var_export($result);
