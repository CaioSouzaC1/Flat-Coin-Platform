<?php
//https://coinmarketcap.com/api/documentation/v1/#operation/getV2CryptocurrencyQuotesLatest
//List market quotes for the crypto
//Belive this will most usede with the ListingAllCrypos and DeepCryptoInfo
function listDeepInfoCrypto($listIds, $coin, $headers)
{
    $url = 'https://pro-api.coinmarketcap.com/v2/cryptocurrency/quotes/latest';
    $parameters = [
        'id' => $listIds,
        'convert' => $coin
    ];

    $qs = http_build_query($parameters); // query string encode the parameters
    $request = "{$url}?{$qs}"; // create the request URL


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            // set the request URL
        CURLOPT_HTTPHEADER => $headers,     // set the headers 
        CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $DeepCryptoInfo = json_decode($response);
    return $DeepCryptoInfo;
}
