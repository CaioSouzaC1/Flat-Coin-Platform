<?php
//https://coinmarketcap.com/api/documentation/v1#operation/getV1ExchangeMap
//??????????????
$url = 'https://pro-api.coinmarketcap.com/v1/exchange/map';
$parameters = [
  'start' => '1',
  'limit' => '20',
  'sort' => 'volume_24h',
  'crypto_id' => '1'

];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: f569a48e-4b7a-4497-bda1-87005aeac4a3'
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
echo "<pre>";
print_r(json_decode($response)); // print json decoded response
echo "</pre>";
curl_close($curl); // Close request
