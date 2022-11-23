<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

$coin = $_POST["coin"];

if ($coin) {
    echo '[{"CoinSelected":"' . $coin . ' "}]';
}
