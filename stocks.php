
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

function getStockValue($stockName){
    $client = initApi();
    $quote = $client->getQuote($stockName);
    $output = $stockName . ' = '  . getValue($quote);
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

function getValue($obj){
    $reflectObj = new ReflectionClass(get_class($obj));
    $value = $reflectObj->getProperty('bookValue');
    $value->setAccessible(true);
    return $value->getValue($obj);

}


?>
