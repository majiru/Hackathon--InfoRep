
<?php

require __DIR__ . '/vendor/autoload.php';

use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;
use GuzzleHttp\Client;

function getExchangeRate($curFrom, $curTo){
    $client = initApi();
    $exchangeRate = $client->getExchangeRate($curFrom, $curTo);
    $output = "1 " . $curFrom . " = " . getRates($exchangeRate) ." "  . $curTo;
    return $output;
}

function initApi(){
    $client = ApiClientFactory::createApiClient();
    return $client;
}

function getRates($obj){
    $reflectObj = new ReflectionClass(get_class($obj)); 
    $rate = $reflectObj->getProperty('rate');
    $rate->setAccessible(true);
    return $rate->getValue($obj);
}

?>
