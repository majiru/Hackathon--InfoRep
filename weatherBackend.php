<?php

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
require 'cacheData.php';

require_once __DIR__ .'/vendor/autoload.php';
#ini_set('display_errors', 1);

#$cli = false;
#$lf = '<br>';
#if (php_sapi_name() === 'cli') {
#    $lf = "\n";
#    $cli = true;
#}

$apiKey = '85e638e29174761a5111c47ccabebfc6';

$owm = null;
// Language of data (try your own language here!):
$lang = 'en'; //ToDo: grab these from settings

// Units (can be 'metric' or 'imperial' [default]):
$units = 'imperial';//ToDo: grab these from settings


function initApi()
{
    global $owm;
    if ($owm == null){//ToDo: check if settings have changed then recreate
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

function getWeatherData($location)
{
    global $dateFormat;
    $weather = getWeatherObj($location);
    $objWeather = new DaysWeather();
    $jsonFileName = $location . '-weather';
    if (shouldUpdate($jsonFileName)){
        $objWeather->date = $weather->lastUpdate->format('M d');
        $objWeather->temp = $weather->temperature->now->getFormatted();
        $objWeather->tempLow = $weather->temperature->min->getFormatted();
        $objWeather->tempHigh =$weather->temperature->max->getFormatted();
        $objWeather->pressure =$weather->precipitation->getFormatted();
        $objWeather->humidity=$weather->humidity->getFormatted();
        $objWeather->precip =$weather->precipitation->getFormatted();
        $objWeather->sunrise =$weather->sun->rise->format('g:i a');
        $objWeather->sunset = $weather->sun->set->format('g:i a');
        storeJson($jsonFileName, $objWeather);
    }else{
        $objWeather = getStoredArray($jsonFileName);
    }

    return json_encode($objWeather);
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

    $objDays = array();
    $jsonFileName = $location . '-forecast-' .$days;

    if (shouldUpdate($jsonFileName)){

        $forecast = getForecastObj($location,$days);

        foreach($forecast as $weather)
        {
            $objDay = new Forecast;
            $objDay->date = $weather->time->day->format($dateFormat);
            $objDay->tempLow = $weather->temperature->min->getFormatted();
            $objDay->tempHigh = $weather->temperature->max->getFormatted();
            $objDay->precip =   $weather->precipitation->getFormatted();

            $objDays[] = $objDay;
        }
        storeJson($jsonFileName,$objDays);
    }else
    {
        $objDays = getStoredArray( $jsonFileName);
    }

    return json_encode($objDays);
}



//echo "Hello World!";
//echo getTemperatureMax('ames,ia');
//echo getTemperatureMorning('ames,ia');
//echo getTemperatureDay('ames,ia');
//echo getTemperatureNight('ames,ia');
//echo getHumidity('ames,ia');
//echo getPressure('ames,ia');
//echo getSunrise('ames,ia');
//echo getSunset('ames,ia');
//echo $lf;
//echo getWeatherData('ames, ia');
//echo $lf;
//echo getForecastData('ames, ia',3,'M d');


class Forecast
{
	public $date=NULL;
    public $tempLow=NULL;
    public $tempHigh=NULL;
    public $precip=NULL;
}

class DaysWeather{
	public $date=NULL;
    public $humidity=NULL;
    public $pressure=NULL;
    public $sunrise=NULL;
    public $sunset=NULL;
    public $tempLow=NULL;
    public $tempHigh=NULL;
    public $precip=NULL;
}


?>
