<?php
$a = array("hello","hello","hello","hi","hi","cút");
$b = array_count_values($a);
foreach ($b as $key => $value) {
    echo "$key <br>";
}
require_once "../config/connect.php";
Database::connect();
require_once "../models/quantri.php";
$tt = quantri::hienthithuoctinh(76);
// $c = array_count_values($tt);
$c = array();
foreach ($tt as $key) {
    $ten = $key->têntt;
    $c[] = $ten;
}
$d = array_count_values($c);
foreach ($d as $key => $value) {
    echo "hello".$key."<br>";
}
$e = quantri::info();
$f = array();
foreach ($e as $key) {
    $f[] = $key->id;
    $f[] = $key->họ_tên;
    $f[] = $key->địa_chỉ;
    $f[] = $key->sdt;
}
$g = array_count_values($f);
var_dump($g);

?>