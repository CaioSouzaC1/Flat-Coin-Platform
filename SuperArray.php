<?php
function makeSuperArray($deepCryptoInfo, $topCryptoInfos, $convertCoin){
$superArray = [];
$information = [];

foreach($deepCryptoInfo->data as $ids){
    $cryptos = [];
    array_push($cryptos, $ids->id);
    array_push($cryptos, $ids->name);
    array_push($cryptos, $ids->symbol);
    array_push($cryptos, $ids->slug);

    $quote = [];
    foreach($ids->quote->$convertCoin as $quoteCoin){

        if($quoteCoin != null){
            array_push($quote, $quoteCoin);
        }
    }
    array_push($cryptos, $quote);
    array_push($information, $cryptos);
}
$count = 0;
foreach($topCryptoInfos as $infos){
    foreach($infos as $info){
        array_push($information[$count], $info);
    }
    $count++;
}
array_push($superArray, $information);

return $superArray;
}