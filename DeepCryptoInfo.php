<?php
//https://coinmarketcap.com/api/documentation/v1/#operation/getV2CryptocurrencyInfo
//Absolutely information about the crypto

//This function recives as parameters a list of ids and the header and returns a list with
//lists of information about the crypto 
function cryptoInfo($listIds, $headers){
    $url = 'https://pro-api.coinmarketcap.com/v2/cryptocurrency/info';
    $parameters = [
        'id' => $listIds
    ];
    
    $qs = http_build_query($parameters); // query string encode the parameters
    $request = "{$url}?{$qs}"; // create the request URL
    
    $curl = curl_init(); // Get cURL resource
    // Set cURL options
    curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => 1
    ));
    
    $response = curl_exec($curl);
    curl_close($curl); 
    $coinInfo = json_decode($response);

    $infos = [];

    foreach($coinInfo->data as $ids){
        $singleCoin = [];
        array_push($singleCoin, $ids->name);
        array_push($singleCoin, $ids->category);
        array_push($singleCoin, $ids->description);
        array_push($singleCoin, $ids->logo);
        array_push($singleCoin, $ids->urls->website[0]);
        array_push($infos, $singleCoin);
    }
    return $infos;
}
