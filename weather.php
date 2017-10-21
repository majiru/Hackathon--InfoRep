<?php

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;

require_once __DIR__ .'/vendor/autoload.php';
ini_set('display_errors', 1);

$cli = false;
$lf = '<br>';
if (php_sapi_name() === 'cli') {
    $lf = "\n";
    $cli = true;
}

$apiKey = '85e638e29174761a5111c47ccabebfc6';

$owm = null;
// Language of data (try your own language here!):
$lang = 'en';

// Units (can be 'metric' or 'imperial' [default]):
$units = 'imperial';

function initApi()
{
    global $owm;
    if ($owm == null){
        // Get OpenWeatherMap object. Don't use caching (take a look into Example_Cache.php to see how it works).
        global $apiKey;
        $owm = new OpenWeatherMap();
        $owm->setApiKey($apiKey);
    }
    return $owm;
}

function getWeatherObj($location)
{
    $owm  = initApi();
    global $lang, $units;

    $weather = null;
    try
    {
    $weather = $owm->getWeather($location,$units,$lang);

    }
    catch (OpenWeatherMap\Exception $exception)
    {
        //ToDo: handle exceptions
    }

    return $weather;
}

function getForecastObj($location, $days){
    $owm  = initApi();
    global $lang, $units;

    $forecast = null;
    try
    {
        $forecast = $owm->getWeatherForecast($location,$units,$lang,'',$days);

    }
    catch (OpenWeatherMap\Exception $exception)
    {
        //ToDo: handle exceptions
    }

    return $forecast;
}

/**
 * 
 * 
 * @param string $location 
 * @param integer $days 
 * @param string $dateFormat default 'M d'
 * @return string JSON encoded string of the forecast data for last $days
 */
function getForecastData($location, $days, $dateFormat = 'M d'){
    $forecast = getForecastObj($location,$days);
    $objDays = array();

    foreach($forecast as $weather)
    {
        $objDay = new Forecast;
        $objDay->date = $weather->time->day->format($dateFormat);
        $objDay->tempLow = $weather->temperature->min->getFormatted();
        $objDay->tempHigh = $weather->temperature->max->getFormatted();
        $objDay->precip =   $weather->precipitation->getFormatted();

        $objDays[] = $objDay;
    }

    return json_encode($objDays);
}

function getTemperatureCurrent($location){
    $weather = getWeatherObj($location);
    return $weather->temperature;
}
function getTemperatureMax($location){
    $weather = getWeatherObj($location);
    return $weather->temperature->max;
}
function getTemperatureMorning($location){
    $weather = getWeatherObj($location);
    return $weather->temperature->morning;
}
function getTemperatureDay($location){
    $weather = getWeatherObj($location);
    return $weather->temperature->day;
}
function getTemperatureNight($location){
    $weather = getWeatherObj($location);
    return $weather->temperature->night;
}
function getHumidity($location)
{
    $weather = getWeatherObj($location);
    return $weather->humidity;
}

function getPressure($location)
{
    $weather = getWeatherObj($location);
    return $weather->pressure;
}

function getSunrise($location)
{
    $weather = getWeatherObj($location);
    return $weather->sun->rise->format('r');
}

function getSunset($location)
{
    $weather = getWeatherObj($location);
    return $weather->sun->set->format('r');
}


//echo "Hello World!";
//echo getTemperatureCurrent('ames,ia');
//echo getTemperatureMax('ames,ia');
//echo getTemperatureMorning('ames,ia');
//echo getTemperatureDay('ames,ia');
//echo getTemperatureNight('ames,ia');
//echo getHumidity('ames,ia');
//echo getPressure('ames,ia');
//echo getSunrise('ames,ia');
//echo getSunset('ames,ia');
//echo $lf;
//echo getForecastData('ames, ia', 5);


class Forecast
{
	public $date=NULL;
    public $tempLow=NULL;
    public $tempHigh=NULL;
    public $precip=NULL;
}


?>