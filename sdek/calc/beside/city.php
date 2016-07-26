<?php

$city = file('mcity');

foreach ($city as $v) {
    if (mb_strlen(trim($v)) > 2) {
        print $v . "<br/>";
    }
}