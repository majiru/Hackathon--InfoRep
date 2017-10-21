
<?php

require __DIR__ . '/vendor/autoload.php';
require 'cacheData.php';

use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;
use GuzzleHttp\Client;

function getExchangeRate($curFrom, $curTo){
    if(!shouldUpdate($curFrom . $curTo . "CUR")){
        $rate = getStoredArray($curFrom . $curTo . "CUR");
        $output = "1 " . $curFrom . " = " . $rate->rate ." "  . $curTo;
        return $output;
    }
    
    $client = initApi();
    $exchangeRate = $client->getExchangeRate($curFrom, $curTo);
    storeJson($curFrom . $curTo . "CUR", $exchangeRate);
    $rate = getStoredArray($curFrom . $curTo . "CUR");
    $output = "1 " . $curFrom . " = " . $rate->rate ." "  . $curTo;
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
