<?php

$db = new PDO('mysql:host=localhost', 'root', '');
$db->exec('use testintim');
$db->exec('SET NAMES utf8');

$q = $db->query("SELECT * FROM data");

while ($r = $q->fetchObject()) {
    file_put_contents(__DIR__."/img/img_{$r->id}.jpg", file_get_contents($r->URL));
    print $r->id.' ';
}