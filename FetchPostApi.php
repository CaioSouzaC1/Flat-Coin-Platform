<?php

require "ListingAllCryptos.php";

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

isset($_POST["coin"]) ? $coin = strtoupper(trim($_POST["coin"])) : $coin = "USD";

if ($coin) {
    echo '[';
    $ret = sendInfoToHome($coin);
    $cont = 0;
    foreach ($ret[0] as $r) {
        echo '{"CryptoName":"' . $r[1] . '","Abrev":"' . $r[2] . '","Category":"' . $r[6] . '","Desc":"' . $r[7] . '","Logo":"' . $r[8] . '","Site":"' . $r[9] . '","Price":"' . $r[4][0] . '","h1":"' . $r[4][3] . '","h24":"' . $r[4][4] . '","d7":"' . $r[4][5] . '","d30":"' . $r[4][6] . '","d60":"' . $r[4][7] . '","d90":"' . $r[4][8] . '","lastUpdated":"' . $r[4][12] . '"}';
        $cont++;
        if ($cont != count($ret[0])) {
            echo ",";
        }
    }
    echo ']';
}
