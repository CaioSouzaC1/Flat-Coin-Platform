<?php

require "CryptoQuotes.php";
require "ListTrueCoins.php";
require "DeepCryptoInfo.php";
require "SuperArray.php";

//https://coinmarketcap.com/api/documentation/v1/#operation/getV1CryptocurrencyMap
//List all cryptos
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/map';
$parameters = [
    'start' => '1',
    'limit' => '1',
    'sort' => 'cmc_rank'
];

$headers = [
    'Accepts: application/json',
    'X-CMC_PRO_API_KEY: 8cf8663a-adcf-4af0-8656-318a71758cd8'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
    CURLOPT_URL => $request,            // set the request URL
    CURLOPT_HTTPHEADER => $headers,     // set the headers 
    CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
curl_close($curl); // Close request

$cryptos = json_decode($response);

$realCoins = listTrueCoins(1, 10, $headers);
$convertCoin = [];
foreach($realCoins->data as $coin){
    array_push($convertCoin, $coin->symbol);
}
$convertCoin = $convertCoin[rand(0,9)];

$topCryptoIds = '';
foreach ($cryptos->data as $cry) {
    $topCryptoIds = $topCryptoIds . $cry->id . ',';
}
$topCryptoIds = rtrim($topCryptoIds, ",");

$deepCryptoInfo = listDeepInfoCrypto($topCryptoIds, $convertCoin, $headers);
$topCryptoInfos = cryptoInfo($topCryptoIds, $headers);

$superArray = makeSuperArray($deepCryptoInfo, $topCryptoInfos, $convertCoin);

echo ("<pre>");
print_r($superArray);
echo ("</pre>");