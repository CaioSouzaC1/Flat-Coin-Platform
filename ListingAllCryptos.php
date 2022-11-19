<?php

require "CryptoQuotes.php";

//https://coinmarketcap.com/api/documentation/v1/#operation/getV1CryptocurrencyMap
//List all cryptos
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/map';
$parameters = [
    'start' => '1',
    'limit' => '5',
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

$topCryptoIds = '';
foreach ($cryptos->data as $cry) {
    $topCryptoIds = $topCryptoIds . $cry->id . ',';
}
$topCryptoIds = rtrim($topCryptoIds, ",");

$convertCoin = 'BRL';

$deepCryptoInfo = listDeepInfoCrypto($topCryptoIds, $convertCoin, $headers);

echo ("<pre>");
print_r($deepCryptoInfo);
echo ("</pre>");

//rand(0,9)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
</body>

</html>