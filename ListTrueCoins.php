<?php
//https://coinmarketcap.com/api/documentation/v1/#operation/getV1FiatMap
//List all coins que exits in real life
function listTrueCoins($start,$limit, $headers){
    $url = 'https://pro-api.coinmarketcap.com/v1/fiat/map';
    $parameters = [
        'start' => strval($start),
        'limit' => strval($limit),
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
    
    $response = curl_exec($curl);
    curl_close($curl); 
    $realCoins = json_decode($response);
    return $realCoins;
}

function listConvertCoins(){

    $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: 8cf8663a-adcf-4af0-8656-318a71758cd8'
    ];

    $realCoins = listTrueCoins(1, 10, $headers);
    $convertCoin = [];
    foreach($realCoins->data as $coin){
        array_push($convertCoin, $coin->symbol);
    }
    return $convertCoin;
}